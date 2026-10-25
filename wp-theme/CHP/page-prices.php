<?php
/*
 * Template Name: CHP 買取価格ページ
 * Description: まちの資源ステーションCHP 金属買取価格ページ（Googleスプレッドシート連携）
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="まちの資源ステーションCHP（城陽市）の本日の金属買取価格。鉄・ステンレス・アルミ・銅・真鍮・モーターなど毎日更新。京都府城陽市の金属スクラップ買取。">
  <meta name="keywords" content="金属買取価格 京都,スクラップ価格 城陽,鉄くず買取価格,銅 買取価格 京都,ステンレス 買取価格">
  <title>本日の金属買取価格 | まちの資源ステーションCHP（城陽市）</title>
  <meta property="og:title"       content="本日の金属買取価格 | まちの資源ステーションCHP">
  <meta property="og:description" content="鉄・ステンレス・アルミ・銅・真鍮の本日買取価格を毎日更新中。城陽市のまちの資源ステーションCHP。">
  <meta property="og:type"        content="website">
  <meta property="og:locale"      content="ja_JP">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link" href="#main">本文へスキップ</a>

<header class="site-header">
  <div class="site-header__inner">
    <div class="site-logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo.png"
             alt="まちの資源ステーションCHP" class="site-logo__img">
        <span class="site-logo__text">
          <span class="site-logo__main">まちの資源ステーションCHP</span>
        </span>
      </a>
    </div>

    <nav class="global-nav" aria-label="グローバルナビゲーション">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
        <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向け</a></li>
        <li><a href="<?php echo esc_url(home_url('/prices/')); ?>" aria-current="page">買取価格</a></li>
      </ul>
    </nav>

    <div class="header-contact">
      <a class="header-contact__tel" href="tel:0756002874">
        <span class="header-contact__telnum">TEL. 075-600-2874</span>
        <span class="header-contact__telnote">受付時間 9:00～17:00</span>
      </a>
      <a class="btn btn--line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">LINEで相談</a>
    </div>

    <button class="nav-toggle" aria-label="メニューを開く" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<nav class="breadcrumb" aria-label="パンくずリスト">
  <div class="container">
    <ol>
      <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
      <li>金属買取価格</li>
    </ol>
  </div>
</nav>

<main id="main">

  <section class="page-hero">
    <div class="container">
      <p class="page-hero__label">PRICES</p>
      <h1>本日の金属買取価格</h1>
      <p class="page-hero__lead">
        毎日更新・最新価格をご確認ください(相場により変動します)。
      </p>
    </div>
  </section>

  <section class="content-block">
    <div class="container">

      <div class="prices-meta">
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
          <a href="tel:0756002874">📞 075-600-2874</a>
        </p>
      </div>

      <div id="price-container" aria-label="買取価格一覧"></div>

      <div class="price-notes">
        <h3>📌 価格についてのご注意</h3>
        <ul>
          <li>価格は国際相場・市況により毎日変動します</li>
          <li>品目の状態(錆・汚れ・混合物の有無など)により価格が変わる場合があります</li>
          <li>大量・法人のお客様はご相談ください(応相談)</li>
          <li>持込・出張回収どちらにも対応しています</li>
          <li>詳細はお電話またはLINEにてお気軽にお問い合わせください</li>
        </ul>
      </div>

    </div>
  </section>

  <section class="content-block content-block--alt">
    <div class="container">
      <h2 class="content-block__title content-block__title--center">価格確認・査定のご相談方法</h2>
      <div class="card-grid card-grid--3col">
        <div class="card">
          <div class="card__icon" aria-hidden="true">📞</div>
          <h3>お電話で確認</h3>
          <p>TEL. <a href="tel:0756002874">075-600-2874</a><br>受付時間 9:00～17:00(日曜定休)</p>
        </div>
        <div class="card">
          <div class="card__icon" aria-hidden="true">💬</div>
          <h3>LINE査定</h3>
          <p>公式LINEアカウントを友だち追加のうえ、品目やおおよその数量をお送りください。</p>
        </div>
        <div class="card">
          <div class="card__icon" aria-hidden="true">📷</div>
          <h3>写真送信による査定</h3>
          <p>LINEに写真を添付いただくと、より具体的な目安をお伝えできます。</p>
        </div>
      </div>
    </div>
  </section>

  <section class="content-block">
    <div class="container section__cta">
      <h2 class="section__title">価格の詳細・お見積もりはこちら</h2>
      <p style="text-align:center;">
        写真を送っていただくだけで査定可能です。お気軽にご連絡ください。
      </p>
      <div class="content-buttons">
        <a class="btn btn--primary" href="tel:0756002874">📞 075-600-2874</a>
        <a class="btn btn--line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">💬 LINEで査定依頼</a>
      </div>
    </div>
  </section>

</main>

<footer class="site-footer">
  <div class="container site-footer__inner">
    <div class="site-footer__brand">
      <p class="site-footer__name">まちの資源ステーションCHP</p>
      <p>運営：株式会社CHP</p>
      <p>〒610-0121 京都府城陽市寺田金尾60-6</p>
      <p>TEL. 075-600-2874 ／ 受付時間 9:00～17:00 ／ 定休日 日曜日</p>
      <p>古物商許可：京都府公安委員会許可 第611092230062号</p>
      <p>登録番号：T9130001072348</p>
    </div>

    <nav class="site-footer__nav" aria-label="フッターナビゲーション">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>">TOPページ</a></li>
        <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向けサービス</a></li>
        <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">金属買取価格</a></li>
      </ul>
    </nav>
  </div>
  <p class="site-footer__copyright">Copyright &copy; <?php echo esc_html(date('Y')); ?> まちの資源ステーションCHP. All Rights Reserved.</p>
</footer>

<div class="mobile-fixed-nav">
  <a href="tel:0756002874"><span aria-hidden="true">📞</span>電話する</a>
  <a href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer"><span aria-hidden="true">💬</span>LINE相談</a>
  <a href="<?php echo esc_url(home_url('/corporate/')); ?>"><span aria-hidden="true">🏭</span>法人向け</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
