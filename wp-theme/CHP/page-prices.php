<?php
/*
 * Template Name: CHP 買取価格ページ
 * Description: 金属リサイクルセンター 金属買取価格ページ（Googleスプレッドシート連携）
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="金属リサイクルセンター（城陽市）の本日の金属買取価格。鉄・ステンレス・アルミ・銅・真鍮・モーターなど毎日更新。京都府城陽市の金属スクラップ買取。">
  <meta name="keywords" content="金属買取価格 京都,スクラップ価格 城陽,鉄くず買取価格,銅 買取価格 京都,ステンレス 買取価格">
  <title>本日の金属買取価格 | 金属リサイクルセンター（城陽市）</title>
  <meta property="og:title"       content="本日の金属買取価格 | 金属リサイクルセンター">
  <meta property="og:description" content="鉄・ステンレス・アルミ・銅・真鍮の本日買取価格を毎日更新中。城陽市の金属リサイクルセンター。">
  <meta property="og:type"        content="website">
  <meta property="og:locale"      content="ja_JP">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ========== ヘッダー ========== -->
<header class="site-header">
  <div class="header-inner">
    <div class="header-logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <span class="logo-text">金属リサイクルセンター</span>
        <span class="logo-sub">京都府城陽市</span>
      </a>
    </div>
    <a href="tel:0809604939" class="header-tel">
      <span>📞</span> 080-9604-9939
    </a>
    <nav class="site-nav" aria-label="メインナビゲーション">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
        <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向け</a></li>
        <li><a href="<?php echo esc_url(home_url('/prices/')); ?>" class="active">買取価格</a></li>
      </ul>
    </nav>
    <button class="menu-btn" id="menuBtn" aria-label="メニューを開く">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<!-- モバイルナビ -->
<div class="nav-overlay" id="navOverlay" role="dialog" aria-label="ナビゲーション">
  <nav class="mobile-nav">
    <ul>
      <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
      <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向け</a></li>
      <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">買取価格</a></li>
    </ul>
    <a href="tel:0809604939" class="mobile-tel">📞 080-9604-9939</a>
  </nav>
</div>


<!-- ========== パンくずリスト ========== -->
<nav class="breadcrumb" aria-label="パンくずリスト">
  <a href="<?php echo esc_url(home_url('/')); ?>">TOP</a>
  <span>金属買取価格</span>
</nav>


<!-- ========== ヒーロー ========== -->
<section class="prices-hero" aria-label="買取価格ページ">
  <h1>本日の金属買取価格</h1>
  <p>毎日更新・最新価格をご確認ください（相場により変動します）</p>
</section>


<!-- ========== 価格表 ========== -->
<section class="section" id="price-section" aria-label="金属買取価格表">
  <div class="container">

    <div class="prices-meta">
      <span class="update-date" id="last-updated">読み込み中...</span>
      <button class="refresh-btn" id="refreshBtn" type="button">🔄 最新価格を取得</button>
    </div>

    <div class="price-loading" id="price-loading" aria-live="polite">
      <div class="loading-spinner" role="status" aria-label="読み込み中"></div>
      <p>価格表を読み込んでいます...</p>
    </div>

    <div class="price-error" id="price-error" role="alert">
      <p class="error-title">⚠️ 現在価格表を準備中です</p>
      <p class="error-note">
        最新の買取価格はお電話でご確認ください。<br>
        <a href="tel:0809604939" style="color:var(--color-orange); font-weight:700;">📞 080-9604-9939</a>
      </p>
    </div>

    <div id="price-container" aria-label="買取価格一覧"></div>

    <div class="price-notes">
      <h3>📌 価格についてのご注意</h3>
      <ul>
        <li>価格は国際相場・市況により毎日変動します</li>
        <li>品目の状態（錆・汚れ・混合物の有無など）により価格が変わる場合があります</li>
        <li>大量・法人のお客様はご相談ください（応相談）</li>
        <li>持込・出張回収どちらにも対応しています</li>
        <li>詳細はお電話またはLINEにてお気軽にお問い合わせください</li>
      </ul>
    </div>

  </div>
</section>


<!-- ========== 問い合わせCTA ========== -->
<section class="cta-section" aria-label="お問い合わせ">
  <div class="container">
    <h2>価格の詳細・お見積もりはこちら</h2>
    <p>
      写真を送っていただくだけで査定可能です。<br>
      お気軽にご連絡ください。
    </p>
    <div class="cta-buttons">
      <a href="tel:0809604939" class="btn btn-white">📞 080-9604-9939</a>
      <a href="https://lin.ee/oHnlYya" class="btn btn-line" target="_blank" rel="noopener noreferrer">💬 LINEで査定依頼</a>
    </div>
    <p style="margin-top:16px; font-size:0.9rem; opacity:0.85;">
      営業時間: 7:30〜18:00（土日祝 定休）
    </p>
  </div>
</section>


<!-- ========== フッター ========== -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-info">
        <h3>金属リサイクルセンター</h3>
        <p>〒610-0121 京都府城陽市寺田金尾60-6</p>
        <p>TEL: <a href="tel:0809604939">080-9604-9939</a></p>
        <p>営業時間: 7:30〜18:00（土日祝 定休）</p>
        <p>古物商許可: 京都府公安委員会許可 第611092230062号</p>
        <p>登録番号: T9130001072348</p>
      </div>
      <div class="footer-nav">
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">TOPページ</a></li>
          <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向けサービス</a></li>
          <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">金属買取価格</a></li>
        </ul>
      </div>
    </div>
    <p class="footer-copy">&copy; <?php echo date('Y'); ?> 金属リサイクルセンター All Rights Reserved.</p>
  </div>
</footer>


<!-- ========== 固定CTAバー（スマホ下部） ========== -->
<div class="fixed-cta" role="navigation" aria-label="クイックアクセス">
  <a href="tel:0809604939" class="fixed-cta__btn fixed-cta__btn--tel">
    <span class="fixed-cta__icon">📞</span>
    <span class="fixed-cta__label">電話する</span>
  </a>
  <a href="https://lin.ee/oHnlYya" class="fixed-cta__btn fixed-cta__btn--line" target="_blank" rel="noopener noreferrer">
    <span class="fixed-cta__icon">💬</span>
    <span class="fixed-cta__label">LINE査定</span>
  </a>
  <a href="https://maps.google.com/maps?q=京都府城陽市寺田金尾60-6" target="_blank" rel="noopener noreferrer" class="fixed-cta__btn fixed-cta__btn--map">
    <span class="fixed-cta__icon">📍</span>
    <span class="fixed-cta__label">地図</span>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
