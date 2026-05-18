# 金属リサイクルセンター ホームページ

## ファイル構成

```
metal-recycle-kyoto/
├── index.html          ← TOPページ
├── corporate.html      ← 法人向けページ
├── prices.html         ← 金属買取価格ページ
├── css/
│   └── style.css       ← 全ページ共通スタイル
├── js/
│   └── main.js         ← JavaScript（価格表・メニュー等）
├── images/
│   └── line-qr.png     ← LINE QRコード画像（要差し替え）
└── README.md           ← この説明書
```

---

## 1. 最初にやること（必須設定）

### LINE URL の設定
LINE公式アカウントの友だち追加URLを取得して、以下の箇所を書き換えます。

**対象ファイル**: `index.html`, `corporate.html`, `prices.html`
**検索文字列**: `href="#"` となっているLINEリンク（3ファイルに各1〜2箇所）
**書き換え例**: `href="https://line.me/ti/p/@あなたのLINEID"`

### LINE QRコード画像の配置
1. LINE公式アカウントのQRコード画像を保存
2. `images/line-qr.png` として配置
3. `index.html` の img タグの `onerror` 属性を削除

### Googleマップ埋め込みコードの取得（推奨）
1. [Google マップ](https://maps.google.com/) で「京都府城陽市寺田金尾60-6」を検索
2. 「共有」→「地図を埋め込む」をクリック
3. `<iframe>` タグをコピー
4. `index.html` の既存 `<iframe>` タグを置き換え

---

## 2. Googleスプレッドシート連携（買取価格の自動更新）

### スプレッドシートの準備

**1. スプレッドシートを作成する**

新しいGoogleスプレッドシートを作成し、1行目に以下のヘッダーを入力してください（順番通り）：

| A | B | C | D | E |
|---|---|---|---|---|
| 品目 | 買取価格 | 単位 | 更新日 | 備考 |

**2. データ例**

| 品目 | 買取価格 | 単位 | 更新日 | 備考 |
|------|---------|------|--------|------|
| 鉄（鉄スクラップ） | 12 | kg | 2026-05-17 | 状態により変動 |
| ステンレス | 45 | kg | 2026-05-17 | 種類により異なります |
| アルミ | 80 | kg | 2026-05-17 | 種類により異なります |
| 銅（ピカ銅） | 950 | kg | 2026-05-17 | |
| 真鍮（黄銅） | 350 | kg | 2026-05-17 | |
| モーター | 30 | kg | 2026-05-17 | |

※ 「買取価格」列は数字のみ（円記号不要）

**3. CSVで公開する**

1. スプレッドシートを開いた状態で「ファイル」→「共有」→「ウェブに公開」をクリック
2. 「シート1」を選択し、形式を「カンマ区切り形式（.csv）」に変更
3. 「公開」ボタンをクリック
4. 表示されたURLをコピー（例: `https://docs.google.com/spreadsheets/d/1XXXX/pub?output=csv`）

**4. JavaScriptにURLを設定する**

`js/main.js` を開き、先頭付近の以下の行を書き換えます：

```js
// 変更前
const SPREADSHEET_CSV_URL = 'YOUR_SPREADSHEET_CSV_URL_HERE';

// 変更後（コピーしたURLを貼り付け）
const SPREADSHEET_CSV_URL = 'https://docs.google.com/spreadsheets/d/1XXXX/pub?output=csv';
```

**5. 動作確認**

`prices.html` をブラウザで開き、スプレッドシートのデータが表示されれば設定完了です。

### 価格の更新方法（日常運用）

スプレッドシートの「買取価格」列と「更新日」列を書き換えて保存するだけです。
ホームページの価格表は次回読み込み時（ページ更新・「最新価格を取得」ボタン）に自動で反映されます。

---

## 3. WordPressへの設置手順

### 方法A: カスタムHTMLブロックに貼り付け（最簡単）

1. WordPressダッシュボードで「固定ページ」→「新規追加」
2. 右上の「ブロックエディタ」でページを作成
3. 「カスタムHTML」ブロックを追加
4. 各HTMLファイルの `<body>` 〜 `</body>` の中身（ヘッダー・フッター以外）を貼り付け
5. CSSは「外観」→「カスタマイズ」→「追加CSS」に貼り付け

### 方法B: 固定ページテンプレートとして設置（推奨）

WordPressの子テーマディレクトリに以下のファイルを作成します。

**例: TOPページ用テンプレート `page-top.php`**

```php
<?php
/*
 * Template Name: 金属リサイクル TOPページ
 */
get_header(); // テーマのヘッダーを使う場合
?>

<!-- index.html の <body> 内のコンテンツをここに貼り付け -->

<?php get_footer(); ?>
```

1. 子テーマの `functions.php` でCSSとJSをエンキュー：

```php
function kinzoku_enqueue() {
    wp_enqueue_style(
        'kinzoku-style',
        get_stylesheet_directory_uri() . '/kinzoku/css/style.css',
        [], '1.0'
    );
    wp_enqueue_script(
        'kinzoku-main',
        get_stylesheet_directory_uri() . '/kinzoku/js/main.js',
        [], '1.0', true
    );
}
add_action('wp_enqueue_scripts', 'kinzoku_enqueue');
```

2. CSSとJSを子テーマの `/kinzoku/css/` と `/kinzoku/js/` に配置
3. 固定ページ編集画面の「ページ属性」→「テンプレート」で上記テンプレートを選択

### LINE QRコード・画像の管理
WordPressの「メディア」にLINE QRコード画像をアップロードし、
HTML内の `src="images/line-qr.png"` をWordPressのメディアURLに書き換えてください。

---

## 4. SEOチェックポイント

- [ ] 各ページの `<title>` タグに「城陽」「金属買取」「京都」などを含む
- [ ] `<meta name="description">` に主要キーワードを含む
- [ ] Googleサーチコンソールにサイトを登録
- [ ] Googleビジネスプロフィールを作成・設置住所を登録
- [ ] ページ速度の確認（PageSpeed Insights）

---

## 5. 差し替え・カスタマイズ箇所一覧

| 項目 | ファイル | 変更箇所 |
|------|---------|---------|
| LINE URL | index.html, corporate.html, prices.html | `href="#"` のLINEリンク |
| LINE QR画像 | images/ | `line-qr.png` を配置 |
| Googleマップ | index.html | `<iframe>` の `src` |
| スプレッドシートURL | js/main.js | `SPREADSHEET_CSV_URL` |
| 会社ロゴ画像 | index.html | ロゴテキストを `<img>` に変更 |
| 店舗写真 | 各HTML | ヒーロー背景画像として追加可能 |

---

## 技術仕様

- **言語**: HTML5 / CSS3 / Vanilla JavaScript (ES2017+)
- **対応ブラウザ**: Chrome / Safari / Firefox / Edge（最新2バージョン）
- **スマートフォン**: iOS Safari / Android Chrome 対応
- **フレームワーク**: 不使用（外部依存ゼロ）
- **Googleスプレッドシート連携**: Fetch API + CSV パーサー
- **アクセシビリティ**: WAI-ARIA 基本対応、alt属性付き

---

Copyright 2026 金属リサイクルセンター
