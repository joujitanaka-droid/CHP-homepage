<?php
/*
 * Template Name: CHP 法人向けページ
 * Description: 金属リサイクルセンター 法人向けサービスページ
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="工場・事業所の金属回収は金属リサイクルセンター（城陽市）にお任せください。鉄くず・ステンレス・アルミ・銅・モーターなど対応。定期回収・スポット回収・コンテナ設置も相談可能。">
  <meta name="keywords" content="法人 金属回収 京都,工場 鉄くず 回収 城陽,スクラップ業者 京都,定期回収 金属 京都府">
  <title>法人向け金属回収サービス | 金属リサイクルセンター（城陽市）</title>
  <meta property="og:title"       content="法人向け金属回収 | 金属リサイクルセンター">
  <meta property="og:description" content="工場・建設業・製造業の金属回収をサポート。定期・スポット・コンテナ設置対応。">
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
        <img src="<?php echo esc_url(get_stylesheet_directory_uri()); ?>/assets/images/logo.png"
             alt="金属リサイクルセンター" class="site-logo-img">
      </a>
    </div>
    <a href="tel:0809604939" class="header-tel">
      <span>📞</span> 080-9604-9939
    </a>
    <nav class="site-nav" aria-label="メインナビゲーション">
      <ul>
        <li><a href="<?php echo esc_url(home_url('/')); ?>">TOP</a></li>
        <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>" class="active">法人向け</a></li>
        <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">買取価格</a></li>
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
  <span>法人向けサービス</span>
</nav>


<!-- ========== ヒーロー ========== -->
<section class="hero-corp" aria-label="法人向けサービス">
  <div class="hero-badge">工場・事業所・解体業者様向け</div>
  <h1>工場・事業所の<br>金属回収 承ります</h1>
  <p>
    鉄くず・ステンレス・アルミ・銅・モーターなど、<br>
    あらゆる金属スクラップの回収・買取に対応しています。<br>
    定期回収からスポット対応まで、お気軽にご相談ください。
  </p>
  <div class="hero-cta" style="justify-content:center;">
    <a href="tel:0809604939" class="btn btn-white">📞 今すぐ相談する</a>
    <a href="#contact-cta" class="btn btn-line">💬 LINEで問い合わせ</a>
  </div>
</section>


<!-- ========== 対応金属種別 ========== -->
<section class="section" id="metals" aria-label="対応金属">
  <div class="container">
    <h2 class="section-title">対応している金属・品目</h2>
    <div class="service-grid">
      <div class="service-card">
        <h3>⚙️ 鉄・鉄スクラップ</h3>
        <ul>
          <li>鉄くず・スクラップ全般</li>
          <li>H鋼・アングル・パイプ</li>
          <li>プレス材・切断材</li>
          <li>機械設備・産業機械</li>
          <li>廃材・建設残材</li>
        </ul>
      </div>
      <div class="service-card">
        <h3>✨ 非鉄金属</h3>
        <ul>
          <li>ステンレス（SUS）全種</li>
          <li>アルミ（板・押出・ダイカスト）</li>
          <li>銅（ピカ銅・並銅・被覆線）</li>
          <li>真鍮（黄銅）各種</li>
          <li>鉛・亜鉛・ニッケル</li>
        </ul>
      </div>
      <div class="service-card">
        <h3>🔌 電気・機械系</h3>
        <ul>
          <li>モーター（各種サイズ）</li>
          <li>電線・ケーブル類</li>
          <li>電気設備機器</li>
          <li>工具類（金属製）</li>
          <li>コンプレッサー・ポンプ類</li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- ========== 対応サービス ========== -->
<section class="section section--gray" id="services" aria-label="対応サービス">
  <div class="container">
    <h2 class="section-title">サービス内容</h2>
    <div class="service-grid">
      <div class="service-card" style="border-left-color: var(--color-orange);">
        <h3 style="color:var(--color-orange);">🔄 定期回収</h3>
        <ul>
          <li>月1回・週1回など定期サイクルで回収</li>
          <li>スクラップヤードの定期整理</li>
          <li>継続的な金属排出先として対応</li>
          <li>回収量・頻度はご要望に合わせて調整</li>
        </ul>
      </div>
      <div class="service-card" style="border-left-color: var(--color-orange);">
        <h3 style="color:var(--color-orange);">📦 スポット回収</h3>
        <ul>
          <li>工場整理・倉庫整理時のまとめて回収</li>
          <li>機械撤去・設備解体後の金属引き取り</li>
          <li>突発的な大量発生にも対応</li>
          <li>解体業・建設業の廃材引き取り</li>
        </ul>
      </div>
      <div class="service-card" style="border-left-color: var(--color-orange);">
        <h3 style="color:var(--color-orange);">🏭 持込・コンテナ設置</h3>
        <ul>
          <li>工場・事業所への回収コンテナ設置</li>
          <li>持込買取にも対応</li>
          <li>コンテナサイズ・設置場所はご相談</li>
          <li>満杯になったら回収に伺います</li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- ========== 対応業種 ========== -->
<section class="section" id="industries" aria-label="対応業種">
  <div class="container">
    <h2 class="section-title">こんな業種・事業者様から<br>ご利用いただいています</h2>
    <div class="industries-grid">
      <div class="industry-tag">🏭 製造業</div>
      <div class="industry-tag">🔨 建設業</div>
      <div class="industry-tag">🔧 設備工事業</div>
      <div class="industry-tag">💥 解体業</div>
      <div class="industry-tag">🚜 農業・農機具業者</div>
      <div class="industry-tag">⚡ 電気工事業</div>
      <div class="industry-tag">🏗️ 鉄鋼関連業</div>
      <div class="industry-tag">🔩 機械加工業</div>
      <div class="industry-tag">♻️ リサイクル業者</div>
      <div class="industry-tag">🏢 その他事業者</div>
    </div>
  </div>
</section>


<!-- ========== ご利用の流れ ========== -->
<section class="section section--blue" id="process" aria-label="利用の流れ">
  <div class="container">
    <h2 class="section-title section-title--white">ご利用の流れ</h2>
    <div class="process-steps" style="max-width:600px; margin:0 auto;">
      <div class="process-step">
        <div class="process-step__num">1</div>
        <div class="process-step__body">
          <h4>お問い合わせ</h4>
          <p>電話またはLINEにて、回収したい金属の種類・量・場所をお知らせください。写真を送っていただくとスムーズです。</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">2</div>
        <div class="process-step__body">
          <h4>現場確認・お見積もり</h4>
          <p>現場を確認のうえ、回収品目・量・方法についてお見積もりをご提示します。</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">3</div>
        <div class="process-step__body">
          <h4>日程調整・回収作業</h4>
          <p>ご都合に合わせて日程を調整。ご指定の場所まで回収に伺います。</p>
        </div>
      </div>
      <div class="process-step">
        <div class="process-step__num">4</div>
        <div class="process-step__body">
          <h4>精算・お支払い</h4>
          <p>計量・確認後、その場で現金にてお支払いします（買取の場合）。</p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- ========== お問い合わせCTA ========== -->
<section class="cta-section" id="contact-cta" aria-label="お問い合わせ">
  <div class="container">
    <h2>まずはお気軽にご相談ください</h2>
    <p>
      回収品目・数量・エリアなどお気軽にご連絡ください。<br>
      定期回収・単発・コンテナ設置など、ご要望に応じてご提案します。
    </p>
    <div class="cta-buttons">
      <a href="tel:0809604939" class="btn btn-white">📞 080-9604-9939</a>
      <a href="https://lin.ee/oHnlYya" class="btn btn-line" target="_blank" rel="noopener noreferrer">💬 LINEで問い合わせ</a>
    </div>
    <p style="margin-top:20px; font-size:0.9rem; opacity:0.85;">
      営業時間: 7:30〜18:00（土日祝 定休）<br>
      所在地: 〒610-0121 京都府城陽市寺田金尾60-6
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
    <span class="fixed-cta__label">LINE問合せ</span>
  </a>
  <a href="https://maps.google.com/maps?q=京都府城陽市寺田金尾60-6" target="_blank" rel="noopener noreferrer" class="fixed-cta__btn fixed-cta__btn--map">
    <span class="fixed-cta__icon">📍</span>
    <span class="fixed-cta__label">地図</span>
  </a>
</div>

<?php wp_footer(); ?>
</body>
</html>
