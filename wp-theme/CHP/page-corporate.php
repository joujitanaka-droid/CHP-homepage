<?php
/*
 * Template Name: CHP 法人向けページ
 * Description: まちの資源ステーションCHP 法人向けサービスページ
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="工場・事業所の金属回収はまちの資源ステーションCHP（城陽市）にお任せください。鉄くず・ステンレス・アルミ・銅・モーターなど対応。定期回収・スポット回収・コンテナ設置も相談可能。">
  <meta name="keywords" content="法人 金属回収 京都,工場 鉄くず 回収 城陽,スクラップ業者 京都,定期回収 金属 京都府">
  <title>法人向け金属回収サービス | まちの資源ステーションCHP（城陽市）</title>
  <meta property="og:title"       content="法人向け金属回収 | まちの資源ステーションCHP">
  <meta property="og:description" content="工場・建設業・製造業の金属回収をサポート。定期・スポット・コンテナ設置対応。">
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
        <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>" aria-current="page">法人向け</a></li>
        <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">買取価格</a></li>
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
      <li>法人向けサービス</li>
    </ol>
  </div>
</nav>

<main id="main">

  <section class="page-hero">
    <div class="container">
      <p class="page-hero__label">FOR BUSINESS</p>
      <h1>工場・事業所から発生する金属資源を適正に回収します</h1>
      <p class="page-hero__lead">
        鉄、ステンレス、アルミ、銅、真鍮、電線、加工端材、切粉、廃機械など、種類や数量に応じて適切な回収方法をご提案します。
      </p>
      <div class="section__cta content-buttons">
        <a class="btn btn--hero btn--outline-light" href="tel:0756002874">📞 電話で相談する</a>
        <a class="btn btn--hero btn--line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">💬 LINEで相談する</a>
      </div>
    </div>
  </section>

  <section class="content-block">
    <div class="container content-narrow">
      <p>
        工場、事業所、建設現場、設備工事などで発生する金属資源の回収・買取に対応しています。
        回収時には、車両の通行、作業時間、騒音、積込み方法など、周辺環境への配慮を重視します。
      </p>
    </div>
  </section>

  <section class="content-block content-block--alt">
    <div class="container">
      <h2 class="content-block__title">対象業種</h2>
      <ul class="chip-list">
        <li>金属加工業</li>
        <li>製造業</li>
        <li>板金・製缶業</li>
        <li>建設業</li>
        <li>設備工事業</li>
        <li>電気工事業</li>
        <li>解体業</li>
        <li>自動車整備業</li>
        <li>倉庫・物流業</li>
      </ul>
    </div>
  </section>

  <section class="content-block">
    <div class="container">
      <h2 class="content-block__title">対象品目</h2>
      <ul class="chip-list">
        <li>鉄くず</li>
        <li>ステンレス端材</li>
        <li>アルミ端材</li>
        <li>銅</li>
        <li>真鍮</li>
        <li>電線</li>
        <li>ケーブル</li>
        <li>切粉</li>
        <li>ダライ粉</li>
        <li>プレス端材</li>
        <li>モーター</li>
        <li>廃機械</li>
        <li>設備</li>
      </ul>
    </div>
  </section>

  <section class="content-block content-block--alt">
    <div class="container">
      <h2 class="content-block__title content-block__title--center">サービス内容</h2>
      <div class="card-grid card-grid--values">
        <div class="card">
          <h3>定期回収</h3>
          <p>定めた周期で回収します。</p>
        </div>
        <div class="card">
          <h3>スポット回収</h3>
          <p>設備入替えや工場整理時に対応します。</p>
        </div>
        <div class="card">
          <h3>コンテナ設置</h3>
          <p>排出量、設置場所、品目に応じて提案します。</p>
        </div>
        <div class="card">
          <h3>現地確認・見積り</h3>
          <p>写真または現地確認により条件を確認します。</p>
        </div>
      </div>
      <div class="section__cta">
        <a class="btn btn--primary" href="tel:0756002874">電話で相談する</a>
      </div>
    </div>
  </section>

  <section class="content-block">
    <div class="container">
      <h2 class="content-block__title content-block__title--center">CHPが選ばれる理由</h2>
      <ol class="reason-list">
        <li>周辺環境に配慮した回収</li>
        <li>品目ごとの適正な分別</li>
        <li>計量・査定内容の明確化</li>
        <li>定期回収への対応</li>
        <li>地域密着による迅速な対応</li>
        <li>許可・法令に基づく適正運営</li>
      </ol>
    </div>
  </section>

  <section class="content-block content-block--alt">
    <div class="container">
      <h2 class="content-block__title content-block__title--center">回収の流れ</h2>
      <ol class="step-list">
        <li>問い合わせ</li>
        <li>品目・数量確認</li>
        <li>写真確認または現地確認</li>
        <li>見積り</li>
        <li>回収日調整</li>
        <li>回収・計量</li>
        <li>精算</li>
      </ol>
    </div>
  </section>

  <section class="content-block">
    <div class="container section__cta">
      <h2 class="section__title">まずはお気軽にご相談ください</h2>
      <div class="content-buttons">
        <a class="btn btn--primary" href="tel:0756002874">📞 075-600-2874</a>
        <a class="btn btn--line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">💬 LINEで問い合わせ</a>
      </div>
      <p class="items__note" style="margin-top:20px;">
        受付時間 9:00～17:00(日曜定休) ／ 〒610-0121 京都府城陽市寺田金尾60-6
      </p>
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
  <a href="<?php echo esc_url(home_url('/prices/')); ?>"><span aria-hidden="true">💴</span>買取価格</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
