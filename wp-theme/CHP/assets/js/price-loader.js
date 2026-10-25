'use strict';

/* ========================================================
   買取価格ページ専用: Googleスプレッドシート連携で価格表を取得・描画する。
   デザイン(corporate-mock.css)とは独立しており、#price-container が
   ページに存在する場合のみ動作する。ロジックは元のassets/js/main.jsから移植。
   ======================================================== */
const SPREADSHEET_CSV_URL = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vSBfDH58b_jX1ElHjiHijoJGOKXL3VuyQteE0wfLjK7ATQkv-A-PzkbQ8h1-S-i-91H-1dJxvQuttuH/pub?gid=766720699&single=true&output=csv';

/* XSS対策: HTML エスケープ */
function escapeHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g,  '&amp;')
    .replace(/</g,  '&lt;')
    .replace(/>/g,  '&gt;')
    .replace(/"/g,  '&quot;')
    .replace(/'/g,  '&#039;');
}

/* CSV パーサー(RFC 4180対応・ダブルクォート処理あり) */
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

/* 価格カード(モバイル用)レンダリング */
function renderPriceCards(rows) {
  if (!rows.length) return '<p style="text-align:center;padding:24px;">データがありません</p>';

  return rows.map(row => {
    const name  = escapeHtml(row['品目']   || '');
    const price = escapeHtml(row['買取価格'] || '');
    const unit  = escapeHtml(row['単位']   || 'kg');
    const note  = escapeHtml(row['備考']   || '');
    const date  = escapeHtml(row['更新日'] || '');
    return `
      <div class="price-card">
        <div class="price-card__name">${name}</div>
        <div class="price-card__price-wrap">
          <span class="price-card__price">${price ? price + '円' : '要確認'}</span>
          <span class="price-card__unit">/ ${unit}</span>
        </div>
        ${note ? `<div class="price-card__note">${note}</div>` : ''}
        ${date ? `<div class="price-card__date">更新: ${date}</div>` : ''}
      </div>`;
  }).join('');
}

/* 価格テーブル(デスクトップ用)レンダリング */
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

/* スプレッドシートからデータ取得・表示 */
async function loadPricesFromSheet() {
  const container = document.getElementById('price-container');
  const loading    = document.getElementById('price-loading');
  const errorEl    = document.getElementById('price-error');
  if (!container) return;

  try {
    // Googleサーバー側のキャッシュを回避するためタイムスタンプを付与
    const url = `${SPREADSHEET_CSV_URL}&t=${Date.now()}`;
    const res = await fetch(url, { cache: 'no-cache' });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);

    const csv  = await res.text();
    const rows = parseCSV(csv);
    if (!rows.length) throw new Error('行データなし');

    container.innerHTML =
      `<div class="price-cards">${renderPriceCards(rows)}</div>` +
      renderPriceTable(rows);

    if (loading) loading.style.display = 'none';
    if (errorEl)  errorEl.style.display = 'none';

  } catch (err) {
    console.error('[価格表] 読み込みエラー:', err);
    if (loading) loading.style.display = 'none';
    if (errorEl)  errorEl.style.display = 'block';
  }
}

/* 価格表リフレッシュボタン */
function initRefreshButton() {
  const btn = document.getElementById('refreshBtn');
  if (!btn) return;

  btn.addEventListener('click', async () => {
    const container = document.getElementById('price-container');
    const loading    = document.getElementById('price-loading');
    const errorEl    = document.getElementById('price-error');

    if (container) container.innerHTML = '';
    if (errorEl)   errorEl.style.display = 'none';
    if (loading)   loading.style.display = 'block';

    await loadPricesFromSheet();
  });
}

document.addEventListener('DOMContentLoaded', () => {
  initRefreshButton();
  if (document.getElementById('price-container')) {
    loadPricesFromSheet();
  }
});
