'use strict';

/* ========================================================
   金属リサイクルセンター メインJavaScript
   ========================================================

   【設定必要】下記の SPREADSHEET_CSV_URL を書き換えてください。
   取得方法:
     1. Googleスプレッドシートを開く
     2. ファイル → 共有 → ウェブに公開
     3. 「シート1」を「カンマ区切り形式（.csv）」で公開
     4. 表示されたURLをコピーして下記に貼り付ける

   ======================================================== */
const SPREADSHEET_CSV_URL = 'YOUR_SPREADSHEET_CSV_URL_HERE';
// 例: 'https://docs.google.com/spreadsheets/d/1ABCxyz123/pub?output=csv'


/* --------------------------------------------------------
   XSS対策: HTML エスケープ
   -------------------------------------------------------- */
function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g,  '&amp;')
    .replace(/</g,  '&lt;')
    .replace(/>/g,  '&gt;')
    .replace(/"/g,  '&quot;')
    .replace(/'/g,  '&#039;');
}


/* --------------------------------------------------------
   CSV パーサー（RFC 4180 対応・ダブルクォート処理あり）
   -------------------------------------------------------- */
function parseCSVRow(line) {
  const result = [];
  let current = '';
  let inQuotes = false;

  for (let i = 0; i < line.length; i++) {
    const ch = line[i];
    if (ch === '"') {
      if (inQuotes && line[i + 1] === '"') { current += '"'; i++; }
      else { inQuotes = !inQuotes; }
    } else if (ch === ',' && !inQuotes) {
      result.push(current.trim());
      current = '';
    } else {
      current += ch;
    }
  }
  result.push(current.trim());
  return result;
}

function parseCSV(csvText) {
  const lines = csvText.trim().split(/\r?\n/);
  if (lines.length < 2) return [];

  const headerLine = lines[0].replace(/^﻿/, ''); // BOM除去
  const headers = parseCSVRow(headerLine);

  return lines.slice(1)
    .filter(line => line.trim())
    .map(line => {
      const values = parseCSVRow(line);
      const row = {};
      headers.forEach((h, i) => { row[h] = values[i] || ''; });
      return row;
    });
}


/* --------------------------------------------------------
   価格カード（モバイル用）レンダリング
   -------------------------------------------------------- */
function renderPriceCards(rows) {
  if (!rows.length) return '<p style="text-align:center;padding:24px;">データがありません</p>';

  return rows.map(row => {
    const name  = escapeHtml(row['品目']   || '');
    const price = escapeHtml(row['買取価格'] || '');
    const unit  = escapeHtml(row['単位']   || 'kg');
    const note  = escapeHtml(row['備考']   || '');

    return `
      <div class="price-card">
        <div class="price-card__name">${name}</div>
        <div class="price-card__price-wrap">
          <span class="price-card__price">${price ? price + '円' : '要確認'}</span>
          <span class="price-card__unit">/ ${unit}</span>
        </div>
        ${note ? `<div class="price-card__note">${note}</div>` : ''}
      </div>`;
  }).join('');
}


/* --------------------------------------------------------
   価格テーブル（デスクトップ用）レンダリング
   -------------------------------------------------------- */
function renderPriceTable(rows) {
  if (!rows.length) return '';

  const tbody = rows.map(row => {
    const name  = escapeHtml(row['品目']   || '');
    const price = escapeHtml(row['買取価格'] || '');
    const unit  = escapeHtml(row['単位']   || 'kg');
    const date  = escapeHtml(row['更新日'] || '');
    const note  = escapeHtml(row['備考']   || '');

    return `
      <tr>
        <td><strong>${name}</strong></td>
        <td class="price-cell">${price ? price + '円' : '要確認'}</td>
        <td>${unit}</td>
        <td>${date}</td>
        <td class="note-cell">${note}</td>
      </tr>`;
  }).join('');

  return `
    <div class="price-table-wrapper">
      <table class="price-table">
        <thead>
          <tr>
            <th>品目</th>
            <th>買取価格</th>
            <th>単位</th>
            <th>更新日</th>
            <th>備考</th>
          </tr>
        </thead>
        <tbody>${tbody}</tbody>
      </table>
    </div>`;
}


/* --------------------------------------------------------
   デモデータ（URL未設定時の表示）
   -------------------------------------------------------- */
function displayDemoData(container, lastUpdatedEl) {
  const today = new Date().toLocaleDateString('ja-JP', { year:'numeric', month:'2-digit', day:'2-digit' });
  const rows = [
    { '品目': '鉄（鉄スクラップ）', '買取価格': '',   '単位': 'kg', '更新日': today, '備考': '状態により変動' },
    { '品目': 'ステンレス',         '買取価格': '',   '単位': 'kg', '更新日': today, '備考': '種類により異なります' },
    { '品目': 'アルミ',             '買取価格': '',   '単位': 'kg', '更新日': today, '備考': '種類により異なります' },
    { '品目': '銅',                 '買取価格': '',   '単位': 'kg', '更新日': today, '備考': 'ピカ銅・並銅など' },
    { '品目': '真鍮（黄銅）',       '買取価格': '',   '単位': 'kg', '更新日': today, '備考': '' },
    { '品目': 'モーター',           '買取価格': '',   '単位': 'kg', '更新日': today, '備考': '' },
  ];

  if (lastUpdatedEl) lastUpdatedEl.textContent = `最終更新: ${today}（価格はお電話でご確認ください）`;
  container.innerHTML =
    `<div class="price-cards">${renderPriceCards(rows)}</div>` +
    renderPriceTable(rows);
}


/* --------------------------------------------------------
   スプレッドシートからデータ取得・表示
   -------------------------------------------------------- */
async function loadPricesFromSheet() {
  const container    = document.getElementById('price-container');
  const loading      = document.getElementById('price-loading');
  const errorEl      = document.getElementById('price-error');
  const lastUpdatedEl= document.getElementById('last-updated');

  if (!container) return;

  // URLが設定されていない場合はデモ表示
  if (!SPREADSHEET_CSV_URL || SPREADSHEET_CSV_URL === 'YOUR_SPREADSHEET_CSV_URL_HERE') {
    if (loading) loading.style.display = 'none';
    displayDemoData(container, lastUpdatedEl);
    return;
  }

  try {
    const res = await fetch(SPREADSHEET_CSV_URL, { cache: 'no-cache' });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    const csv  = await res.text();
    const rows = parseCSV(csv);
    if (!rows.length) throw new Error('行データなし');

    // 最終更新日（最初の有効な更新日を使用）
    const latestDate = rows.find(r => r['更新日'])?.['更新日'] || '';
    if (lastUpdatedEl && latestDate) {
      lastUpdatedEl.textContent = `最終更新: ${latestDate}`;
    }

    container.innerHTML =
      `<div class="price-cards">${renderPriceCards(rows)}</div>` +
      renderPriceTable(rows);

    if (loading) loading.style.display = 'none';

  } catch (err) {
    console.error('[価格表] 読み込みエラー:', err);
    if (loading) loading.style.display = 'none';
    if (errorEl)  errorEl.style.display = 'block';
  }
}


/* --------------------------------------------------------
   モバイルメニュー開閉
   -------------------------------------------------------- */
function initMobileMenu() {
  const menuBtn   = document.getElementById('menuBtn');
  const navOverlay= document.getElementById('navOverlay');
  if (!menuBtn || !navOverlay) return;

  menuBtn.addEventListener('click', () => {
    const isOpen = navOverlay.classList.toggle('active');
    menuBtn.classList.toggle('active', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });

  // オーバーレイ背景クリックで閉じる
  navOverlay.addEventListener('click', e => {
    if (e.target === navOverlay) {
      navOverlay.classList.remove('active');
      menuBtn.classList.remove('active');
      document.body.style.overflow = '';
    }
  });
}


/* --------------------------------------------------------
   スムーススクロール（#アンカーリンク対応）
   -------------------------------------------------------- */
function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      const id = this.getAttribute('href');
      if (id === '#') return;
      const target = document.querySelector(id);
      if (!target) return;
      e.preventDefault();

      // モバイルメニューが開いていたら閉じる
      const navOverlay = document.getElementById('navOverlay');
      const menuBtn    = document.getElementById('menuBtn');
      if (navOverlay) navOverlay.classList.remove('active');
      if (menuBtn)    menuBtn.classList.remove('active');
      document.body.style.overflow = '';

      const headerH = document.querySelector('.site-header')?.offsetHeight || 0;
      const top = target.getBoundingClientRect().top + window.pageYOffset - headerH - 8;
      window.scrollTo({ top, behavior: 'smooth' });
    });
  });
}


/* --------------------------------------------------------
   価格表リフレッシュボタン
   -------------------------------------------------------- */
function initRefreshButton() {
  const btn = document.getElementById('refreshBtn');
  if (!btn) return;

  btn.addEventListener('click', async () => {
    const container = document.getElementById('price-container');
    const loading   = document.getElementById('price-loading');
    const errorEl   = document.getElementById('price-error');

    if (container) container.innerHTML = '';
    if (errorEl)   errorEl.style.display = 'none';
    if (loading)   loading.style.display = 'block';

    await loadPricesFromSheet();
  });
}


/* --------------------------------------------------------
   初期化
   -------------------------------------------------------- */
document.addEventListener('DOMContentLoaded', () => {
  initMobileMenu();
  initSmoothScroll();
  initRefreshButton();

  if (document.getElementById('price-container')) {
    loadPricesFromSheet();
  }
});
