<?php
/*
 * Template Name: CHP TOPページ
 * Description: まちの資源ステーションCHP TOPページ
 */

// このページはCSS/JSをすべてページ内で完結させるため、functions.phpの
// 共通アセット読み込み(chp_enqueue_styles)をこのテンプレート内でのみ無効化する。
// functions.php自体は変更しない。
remove_action('wp_enqueue_scripts', 'chp_enqueue_styles', 10);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="京都府城陽市のまちの資源ステーションCHP。ご家庭の金属製品・家電を現金買取。壊れていても古くてもOK！出張査定・LINE査定対応。古物商許可取得済み。">
  <meta name="keywords" content="京都 金属買取,城陽 金属買取,城陽市 スクラップ買取,京都 鉄くず 買取,金属買取価格 京都,家電 買取 城陽,法人 金属回収 京都">
  <link rel="canonical" href="https://chp-recycle.com/">
  <title>まちの資源ステーションCHP | 京都府城陽市の金属・家電 現金買取</title>
  <meta property="og:title"       content="まちの資源ステーションCHP | 城陽市の金属・家電 現金買取">
  <meta property="og:description" content="壊れていても・古くてもOK！ご家庭の金属・家電を現金買取。LINE写真送るだけで即見積。">
  <meta property="og:type"        content="website">
  <meta property="og:locale"      content="ja_JP">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700;800&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>

<style>
  /* ===== Design tokens ===== */
  :root {
    --bg: #FFFDF7;
    --header-bg: #FFFFFF;
    --hero-bg: #FFF9EC;
    --bg-personal: #FFF0D2;
    --bg-green: #E3F5E8;
    --bg-corp: #E7F5F7;
    --final-cta-bg: #E5F6EA;
    --surface: #FFFFFF;

    --persimmon: #E36A3B;
    --persimmon-dark: #C9532C;
    --blue-gray: #568491;
    --blue-gray-dark: #315966;

    --ink: #29322E;
    --ink-soft: #61706A;
    --ink-faint: #8b968f;
    --border: #E8DFD2;
    --footer-bg: #3B5549;
    --line-green: #06C755;

    --font-heading: "M PLUS Rounded 1c", "Hiragino Maru Gothic ProN", "Yu Gothic", sans-serif;
    --font-body: "Noto Sans JP", "Hiragino Sans", "Yu Gothic", sans-serif;

    --container: 1160px;
    --radius-card: 17px;
    --radius-btn: 13px;
    --shadow-card: 0 4px 16px rgba(41, 50, 46, 0.07);
  }

  @media (prefers-color-scheme: dark) {
    :root:not([data-theme="light"]) {
      --bg: #21251d;
      --header-bg: #21251d;
      --hero-bg: #21251d;
      --bg-personal: #2c2417;
      --bg-green: #1d2620;
      --bg-corp: #1c262a;
      --final-cta-bg: #1d2620;
      --surface: #2a2e27;
      --persimmon: #ef8058;
      --persimmon-dark: #e0703f;
      --blue-gray: #7fa3ae;
      --blue-gray-dark: #5c8993;
      --ink: #F1EEE6;
      --ink-soft: #C1C6BC;
      --ink-faint: #8b968f;
      --border: rgba(241, 238, 230, 0.16);
      --footer-bg: #1a2119;
      --shadow-card: 0 4px 16px rgba(0, 0, 0, 0.3);
    }
  }
  :root[data-theme="dark"] {
    --bg: #21251d;
    --header-bg: #21251d;
    --hero-bg: #21251d;
    --bg-personal: #2c2417;
    --bg-green: #1d2620;
    --bg-corp: #1c262a;
    --final-cta-bg: #1d2620;
    --surface: #2a2e27;
    --persimmon: #ef8058;
    --persimmon-dark: #e0703f;
    --blue-gray: #7fa3ae;
    --blue-gray-dark: #5c8993;
    --ink: #F1EEE6;
    --ink-soft: #C1C6BC;
    --ink-faint: #8b968f;
    --border: rgba(241, 238, 230, 0.16);
    --footer-bg: #1a2119;
    --shadow-card: 0 4px 16px rgba(0, 0, 0, 0.3);
  }

  * { box-sizing: border-box; }
  html { scroll-behavior: smooth; }
  @media (prefers-reduced-motion: reduce) {
    html { scroll-behavior: auto; }
    * { animation-duration: 0.01ms !important; transition-duration: 0.01ms !important; }
  }

  body {
    margin: 0;
    background: var(--bg);
    color: var(--ink);
    font-family: var(--font-body);
    font-size: 16px;
    line-height: 1.85;
    -webkit-font-smoothing: antialiased;
    overflow-x: hidden;
  }

  img, svg { max-width: 100%; display: block; }
  a { color: inherit; }

  h1, h2, h3 {
    font-family: var(--font-heading);
    font-weight: 800;
    line-height: 1.45;
    text-wrap: balance;
    margin: 0;
  }

  .container { max-width: var(--container); margin: 0 auto; padding: 0 1.5rem; }

  .eyebrow {
    display: flex; align-items: center; gap: 0.55em;
    font-family: var(--font-heading);
    font-size: 0.78rem; font-weight: 700; letter-spacing: 0.1em;
    color: var(--persimmon-dark);
    margin-bottom: 0.8rem;
  }
  .eyebrow::before { content: ""; width: 8px; height: 8px; border-radius: 3px; background: var(--persimmon); flex-shrink: 0; }
  .eyebrow--blue { color: var(--blue-gray-dark); }
  .eyebrow--blue::before { background: var(--blue-gray); }

  .section-head { max-width: 660px; margin: 0 auto 2.8rem; text-align: center; }
  .section-head .eyebrow { justify-content: center; }
  .section-head h2 { font-size: clamp(1.5rem, 3.1vw, 2rem); }
  .section-head p { color: var(--ink-soft); margin: 0.9rem 0 0; }

  section { padding: 5rem 0; }
  @media (max-width: 640px) { section { padding: 3.2rem 0; } }

  /* ===== Buttons ===== */
  .btn {
    display: inline-flex; align-items: center; justify-content: center; gap: 0.5em;
    font-family: var(--font-heading); font-weight: 700; font-size: 0.95rem;
    min-height: 48px;
    padding: 0.85rem 1.6rem;
    border-radius: var(--radius-btn);
    border: 1.5px solid transparent;
    text-decoration: none; cursor: pointer;
    transition: background-color .15s ease, border-color .15s ease, color .15s ease, transform .1s ease, box-shadow .15s ease;
    white-space: nowrap;
  }
  .btn:active { transform: translateY(1px); }
  .btn svg { width: 1.1em; height: 1.1em; flex-shrink: 0; }

  .btn-persimmon { background: var(--persimmon); color: #fff; box-shadow: 0 3px 10px rgba(227,106,59,0.28); }
  .btn-persimmon:hover { background: var(--persimmon-dark); }

  .btn-blue-outline { background: var(--surface); color: var(--blue-gray-dark); border-color: var(--blue-gray); }
  .btn-blue-outline:hover { background: var(--blue-gray); color: #fff; }

  .btn-blue { background: var(--blue-gray); color: #fff; }
  .btn-blue:hover { background: var(--blue-gray-dark); }

  .btn-outline { background: transparent; color: var(--ink); border-color: var(--border); }
  .btn-outline:hover { border-color: var(--persimmon); color: var(--persimmon-dark); }

  .btn-line { background: var(--line-green); color: #fff; }
  .btn-line:hover { filter: brightness(1.07); }

  .icon { width: 22px; height: 22px; stroke: currentColor; fill: none; stroke-width: 1.7; stroke-linecap: round; stroke-linejoin: round; }

  /* ===== Header ===== */
  .site-header {
    position: sticky; top: 0; z-index: 100;
    background: color-mix(in srgb, var(--header-bg) 96%, transparent);
    backdrop-filter: blur(8px);
    border-bottom: 1px solid var(--border);
  }
  .site-header__inner {
    max-width: var(--container); margin: 0 auto; padding: 0 1.5rem;
    height: 70px; display: flex; align-items: center; gap: 1.6rem;
  }
  .brand { display: flex; align-items: center; gap: 0.65rem; text-decoration: none; color: var(--ink); flex-shrink: 0; }
  .brand__mark {
    width: 38px; height: 38px; border-radius: 11px;
    background: var(--persimmon);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-heading); font-weight: 800; font-size: 0.85rem;
    flex-shrink: 0;
  }
  .brand__text { font-family: var(--font-heading); font-weight: 800; font-size: 1.02rem; line-height: 1.25; }
  .brand__text small { display: block; font-family: var(--font-body); font-weight: 500; font-size: 0.63rem; letter-spacing: 0.08em; color: var(--ink-faint); }

  .main-nav { display: flex; align-items: center; gap: 1.6rem; flex: 1; justify-content: center; }
  .main-nav a {
    font-size: 0.9rem; font-weight: 500; text-decoration: none; color: var(--ink-soft);
    white-space: nowrap; padding: 0.3rem 0; border-bottom: 2px solid transparent;
    transition: color .15s ease, border-color .15s ease;
  }
  .main-nav a:hover { color: var(--ink); border-color: var(--persimmon); }

  .header-actions { display: flex; align-items: center; gap: 0.7rem; flex-shrink: 0; }
  .header-tel { display: flex; flex-direction: column; text-decoration: none; color: var(--ink); line-height: 1.2; text-align: right; }
  .header-tel__num { font-family: var(--font-heading); font-weight: 800; font-size: 1.02rem; color: var(--persimmon-dark); font-variant-numeric: tabular-nums; }
  .header-tel__note { font-size: 0.64rem; color: var(--ink-faint); }

  .menu-btn {
    display: none; width: 42px; height: 42px; border: 1.5px solid var(--border);
    background: var(--surface); border-radius: 11px;
    flex-direction: column; align-items: center; justify-content: center; gap: 4px;
    cursor: pointer; flex-shrink: 0;
  }
  .menu-btn span { width: 18px; height: 2px; border-radius: 1px; background: var(--ink); }

  @media (max-width: 920px) { .main-nav { display: none; } .header-tel__note { display: none; } }
  @media (max-width: 640px) {
    .header-actions .btn-line-icon { display: none; }
    .header-tel { display: none; }
    .menu-btn { display: flex; }
  }

  .mobile-nav-panel {
    display: none; position: fixed; inset: 70px 0 0 0; background: var(--bg); z-index: 99;
    padding: 1.5rem; overflow-y: auto;
  }
  .mobile-nav-panel.is-open { display: block; }
  .mobile-nav-panel ul { list-style: none; margin: 0; padding: 0; }
  .mobile-nav-panel li { border-bottom: 1px solid var(--border); }
  .mobile-nav-panel a { display: block; padding: 1.05rem 0.2rem; text-decoration: none; color: var(--ink); font-weight: 500; font-size: 1.02rem; }

  /* ===== Hero (image-less, single column) ===== */
  .hero {
    padding: 4.2rem 0 4.4rem;
    background:
      radial-gradient(circle at 12% 18%, rgba(227, 106, 59, 0.10), transparent 42%),
      radial-gradient(circle at 88% 82%, rgba(86, 132, 145, 0.10), transparent 46%),
      var(--hero-bg);
  }
  .hero-inner { max-width: 860px; margin: 0 auto; text-align: center; }

  .hero-eyebrow { font-family: var(--font-heading); font-size: 0.9rem; font-weight: 700; color: var(--persimmon-dark); margin-bottom: 0.9rem; }
  .hero h1 { font-size: clamp(1.9rem, 3.6vw, 2.7rem); margin-bottom: 1.2rem; }
  @media (max-width: 480px) { .hero h1 { font-size: 2.05rem; line-height: 1.5; } }
  .hero-desc { color: var(--ink-soft); max-width: 34em; margin: 0 auto 1.8rem; }
  .hero-cta { display: flex; flex-wrap: wrap; justify-content: center; gap: 0.9rem; margin-bottom: 1.8rem; }
  @media (max-width: 480px) { .hero-cta { flex-direction: column; } .hero-cta .btn { width: 100%; } }
  .hero-tel { display: inline-flex; align-items: center; gap: 0.55rem; text-decoration: none; color: var(--ink); }
  .hero-tel svg { color: var(--persimmon); }
  .hero-tel__num { font-family: var(--font-heading); font-weight: 800; font-size: 1.3rem; color: var(--ink); font-variant-numeric: tabular-nums; }
  .hero-tel__note { font-size: 0.78rem; color: var(--ink-faint); }

  /* ===== Trust strip ===== */
  .trust-strip { padding: 0 0 1rem; }
  .trust-strip__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
  @media (max-width: 700px) { .trust-strip__grid { grid-template-columns: 1fr; } }
  .trust-strip__item {
    display: flex; align-items: center; gap: 0.8rem;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius-card); padding: 1.1rem 1.3rem;
    box-shadow: var(--shadow-card);
  }
  .trust-strip__item svg { color: var(--persimmon); width: 26px; height: 26px; flex-shrink: 0; }
  .trust-strip__item span { font-weight: 700; font-size: 0.95rem; }

  /* ===== About ===== */
  .about-inner { max-width: 760px; margin: 0 auto; text-align: center; }
  .about-inner h2 { font-size: clamp(1.45rem, 3vw, 1.95rem); }
  .about-inner p { color: var(--ink-soft); margin: 1.2rem 0 0; }
  .about-badges { display: flex; flex-wrap: wrap; justify-content: center; gap: 0.7rem; margin-top: 2rem; }
  .about-badge {
    display: flex; align-items: center; gap: 0.5em; font-size: 0.82rem; font-weight: 500;
    padding: 0.55rem 1rem; background: var(--bg-green); border-radius: 999px; color: var(--ink-soft);
  }
  .about-badge svg { width: 1.1em; height: 1.1em; color: var(--persimmon); }

  /* ===== Personal section ===== */
  .item-cards-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.2rem; margin-top: 2.4rem; }
  @media (max-width: 900px) { .item-cards-grid { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 480px) { .item-cards-grid { grid-template-columns: 1fr; } }
  .item-card {
    background: var(--surface); border-radius: var(--radius-card); box-shadow: var(--shadow-card);
    padding: 1.6rem 1.3rem; text-align: center;
  }
  .item-card__icon {
    width: 52px; height: 52px; border-radius: 14px; background: var(--bg-personal);
    display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;
    color: var(--persimmon-dark);
  }
  .item-card:nth-child(2n) .item-card__icon { background: var(--bg-green); color: var(--blue-gray-dark); }
  .item-card h3 { font-size: 0.98rem; margin-bottom: 0.4rem; }
  .item-card p { font-size: 0.8rem; color: var(--ink-soft); margin: 0; }

  .assurance-green-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; margin-top: 2.4rem; }
  @media (max-width: 760px) { .assurance-green-grid { grid-template-columns: 1fr; } }
  .assurance-green-item {
    display: flex; align-items: center; gap: 0.8rem;
    background: var(--bg-green); border-radius: var(--radius-card); padding: 1.1rem 1.3rem;
  }
  .assurance-green-item svg { color: var(--blue-gray-dark); width: 22px; height: 22px; flex-shrink: 0; }
  .assurance-green-item span { font-size: 0.9rem; font-weight: 500; }

  /* ===== Why cards (generic, first-time / why-chosen) ===== */
  .why-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.2rem; margin-top: 2.4rem; }
  @media (max-width: 900px) { .why-grid { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 520px) { .why-grid { grid-template-columns: 1fr; } }
  .why-grid--3 { grid-template-columns: repeat(3, 1fr); }
  @media (max-width: 900px) { .why-grid--3 { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 520px) { .why-grid--3 { grid-template-columns: 1fr; } }
  .why-card { background: var(--surface); border-radius: var(--radius-card); box-shadow: var(--shadow-card); padding: 1.5rem; }
  .why-card__num { font-family: var(--font-heading); font-weight: 800; color: var(--persimmon); font-size: 0.85rem; }
  .why-card h3 { font-size: 1rem; margin-top: 0.5rem; }
  .why-card p { font-size: 0.86rem; color: var(--ink-soft); margin: 0.5rem 0 0; }

  /* ===== Flow ===== */
  .flow-list { display: flex; counter-reset: flow; gap: 0; margin-top: 2.4rem; overflow-x: auto; padding-bottom: 0.5rem; }
  .flow-step { counter-increment: flow; flex: 1 1 0; min-width: 150px; padding: 0 1.1rem; position: relative; text-align: center; }
  .flow-step:not(:last-child)::after {
    content: ""; position: absolute; top: 22px; left: 60%; width: 80%; height: 2px; background: var(--border);
  }
  .flow-step__num {
    width: 44px; height: 44px; border-radius: 14px; background: var(--persimmon); color: #fff;
    font-family: var(--font-heading); font-weight: 800;
    display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;
    position: relative; z-index: 1;
  }
  .flow-step h3 { font-size: 0.92rem; }
  .flow-step p { font-size: 0.78rem; color: var(--ink-faint); margin: 0.35rem 0 0; }
  @media (max-width: 760px) {
    .flow-list { flex-direction: column; gap: 1.4rem; }
    .flow-step { text-align: left; display: flex; gap: 1rem; align-items: flex-start; padding: 0; }
    .flow-step:not(:last-child)::after { display: none; }
    .flow-step__num { margin: 0; flex-shrink: 0; }
  }

  /* ===== Corporate (image-less, full-width panel) ===== */
  .corp-top-panel {
    background: var(--blue-gray); color: #fff; border-radius: var(--radius-card);
    padding: 2.8rem 2rem; margin-bottom: 2.6rem; text-align: center;
  }
  .corp-top-panel-inner { max-width: 760px; margin: 0 auto; }
  .corp-top-panel .eyebrow { color: #fff; opacity: 0.85; justify-content: center; }
  .corp-top-panel .eyebrow::before { background: #fff; }
  .corp-top-panel h2 { font-size: clamp(1.4rem, 2.8vw, 1.85rem); color: #fff; }
  .corp-top-panel p { margin: 1rem 0 0; color: rgba(255,255,255,0.88); }

  .corp-service-cards { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.1rem; margin-bottom: 2.6rem; }
  @media (max-width: 900px) { .corp-service-cards { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 480px) { .corp-service-cards { grid-template-columns: 1fr; } }
  .service-card { background: var(--surface); border-radius: var(--radius-card); box-shadow: var(--shadow-card); padding: 1.5rem; }
  .service-card h3 { font-size: 1rem; color: var(--blue-gray-dark); margin-bottom: 0.4rem; }
  .service-card p { font-size: 0.84rem; color: var(--ink-soft); margin: 0; }

  .corp-chip-block { margin-bottom: 1.6rem; }
  .corp-chip-block h4 {
    font-family: var(--font-heading); font-size: 0.8rem; font-weight: 700; letter-spacing: 0.04em;
    color: var(--blue-gray-dark); margin: 0 0 0.8rem;
  }
  .chip-row { display: flex; flex-wrap: wrap; gap: 0.5rem; }
  .chip { font-size: 0.84rem; padding: 0.42rem 0.9rem; background: var(--surface); border: 1px solid var(--border); border-radius: 999px; color: var(--ink-soft); }

  .corp-cta { display: flex; flex-wrap: wrap; gap: 0.9rem; margin-top: 2rem; }

  /* ===== Prices ===== */
  .price-split-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.4rem; margin-top: 2.4rem; }
  @media (max-width: 760px) { .price-split-grid { grid-template-columns: 1fr; } }
  .price-panel-box { border-radius: var(--radius-card); padding: 2rem; display: flex; flex-direction: column; gap: 1.1rem; }
  .price-panel-box--green { background: var(--bg-green); }
  .price-panel-box--persimmon { background: var(--persimmon); color: #fff; }
  .price-panel-box--green svg { color: var(--blue-gray-dark); width: 28px; height: 28px; }
  .price-panel-box--persimmon svg { color: #fff; width: 28px; height: 28px; }
  .price-panel-box p { margin: 0; }
  .price-panel-box--green p { color: var(--ink-soft); }
  .price-panel-box--persimmon .btn { margin-top: 0.4rem; align-self: flex-start; }

  /* ===== Store (text-only cards) ===== */
  .store-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.2rem; margin-top: 2.4rem; }
  @media (max-width: 900px) { .store-grid { grid-template-columns: 1fr 1fr; } }
  @media (max-width: 480px) { .store-grid { grid-template-columns: 1fr; } }
  .store-item {
    background: var(--surface); border-radius: var(--radius-card); box-shadow: var(--shadow-card);
    padding: 1.6rem 1.3rem; text-align: center;
  }
  .store-item h3 { font-size: 0.98rem; margin: 0 0 0.4rem; }
  .store-item p { font-size: 0.84rem; color: var(--ink-soft); margin: 0; }

  /* ===== FAQ ===== */
  .faq-cols { display: grid; grid-template-columns: 1fr 1fr; gap: 2.2rem; margin-top: 2.4rem; }
  @media (max-width: 780px) { .faq-cols { grid-template-columns: 1fr; gap: 1rem; } }
  .faq-col h3 { font-family: var(--font-heading); font-size: 0.88rem; font-weight: 700; color: var(--ink-faint); margin-bottom: 0.5rem; }
  .faq-item { border-bottom: 1px solid var(--border); }
  .faq-item summary {
    list-style: none; display: flex; justify-content: space-between; align-items: center; gap: 1rem;
    padding: 1.05rem 0; cursor: pointer; font-weight: 500; font-size: 0.95rem;
  }
  .faq-item summary::-webkit-details-marker { display: none; }
  .faq-item summary::after {
    content: "+"; font-family: var(--font-heading); font-weight: 700; font-size: 1.3rem; color: var(--persimmon);
    flex-shrink: 0; transition: transform .15s ease;
  }
  .faq-item[open] summary::after { transform: rotate(45deg); }
  .faq-item .faq-a { margin: 0 0 1.2rem; color: var(--ink-soft); font-size: 0.9rem; }

  /* ===== Access ===== */
  .access-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2.6rem; align-items: stretch; }
  @media (max-width: 860px) { .access-grid { grid-template-columns: 1fr; } }
  .access-map iframe { width: 100%; height: 100%; min-height: 320px; border: 1px solid var(--border); border-radius: var(--radius-card); }
  .access-table { list-style: none; margin: 0; padding: 0; }
  .access-table li { display: flex; gap: 1.2rem; padding: 0.95rem 0; border-top: 1px solid var(--border); }
  .access-table li:last-child { border-bottom: 1px solid var(--border); }
  .access-table .label { flex-shrink: 0; width: 6.5em; font-size: 0.82rem; color: var(--ink-faint); display: flex; align-items: center; gap: 0.4em; }
  .access-table .label svg { width: 16px; height: 16px; }
  .access-table .value { font-size: 0.95rem; }
  .access-table .value a:hover { color: var(--persimmon-dark); }
  .access-map-btn { margin-top: 1.4rem; }

  /* ===== Final CTA ===== */
  .final-cta { text-align: center; background: var(--final-cta-bg); }
  .final-cta h2 { font-size: clamp(1.4rem, 3.2vw, 1.9rem); max-width: 16em; margin: 0 auto; }
  .final-cta-actions { display: flex; justify-content: center; flex-wrap: wrap; gap: 1rem; margin-top: 2.1rem; }
  @media (max-width: 480px) { .final-cta-actions { flex-direction: column; align-items: stretch; } }

  /* ===== Footer ===== */
  .site-footer { background: var(--footer-bg); color: #F4F1E8; padding: 4rem 0 6.5rem; }
  .footer-grid { display: grid; grid-template-columns: 1.3fr 1fr 1fr; gap: 2.5rem; }
  @media (max-width: 720px) { .footer-grid { grid-template-columns: 1fr; gap: 2rem; } }
  .footer-brand__mark { display: flex; align-items: center; gap: 0.7rem; margin-bottom: 1.1rem; }
  .footer-brand__mark .brand__mark { background: #fff; color: var(--persimmon-dark); }
  .footer-brand__mark span { font-family: var(--font-heading); font-weight: 800; font-size: 1.1rem; }
  .site-footer p { font-size: 0.92rem; color: rgba(244, 241, 232, 0.88); margin: 0.4rem 0; line-height: 1.8; }
  .footer-col h4 { font-size: 0.8rem; font-weight: 700; letter-spacing: 0.06em; color: rgba(244,241,232,0.55); margin: 0 0 1rem; }
  .footer-col ul { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 0.7rem; }
  .footer-col a { font-size: 0.92rem; text-decoration: none; color: rgba(244,241,232,0.92); }
  .footer-col a:hover { color: var(--persimmon); }
  .footer-bottom {
    max-width: var(--container); margin: 3rem auto 0; padding: 1.5rem 1.5rem 0;
    border-top: 1px solid rgba(244, 241, 232, 0.18); font-size: 0.8rem; color: rgba(244, 241, 232, 0.55);
  }

  /* ===== Mobile fixed CTA ===== */
  .fixed-cta { display: none; position: fixed; left: 0; right: 0; bottom: 0; z-index: 90; background: var(--surface); border-top: 1px solid var(--border); }
  @media (max-width: 640px) { .fixed-cta { display: grid; grid-template-columns: 1fr 1fr 1fr; } }
  .fixed-cta a {
    display: flex; flex-direction: column; align-items: center; gap: 0.25rem; padding: 0.6rem 0 0.7rem;
    text-decoration: none; color: var(--ink-soft); font-size: 0.68rem; font-weight: 500; border-right: 1px solid var(--border);
  }
  .fixed-cta a:last-child { border-right: none; }
  .fixed-cta a svg { width: 20px; height: 20px; }
  .fixed-cta a.fc-tel { color: var(--persimmon-dark); }
  .fixed-cta a.fc-line { color: var(--line-green); }
  .fixed-cta a.fc-corp { color: var(--blue-gray-dark); }
</style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ========== Header ========== -->
<header class="site-header">
  <div class="site-header__inner">
    <a class="brand" href="#top">
      <span class="brand__mark">CHP</span>
      <span class="brand__text">まちの資源ステーションCHP<small>KYOTO JOYO</small></span>
    </a>
    <nav class="main-nav" aria-label="メインナビゲーション">
      <a href="#personal">個人のお客様</a>
      <a href="#prices">買取価格</a>
      <a href="#corporate">法人向け</a>
      <a href="#access">アクセス</a>
    </nav>
    <div class="header-actions">
      <a class="header-tel" href="tel:0756002874">
        <span class="header-tel__num">075-600-2874</span>
        <span class="header-tel__note">受付 9:00〜17:00(日曜定休)</span>
      </a>
      <a class="btn btn-line btn-line-icon" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer" aria-label="LINEで査定相談">
        <svg class="icon" viewBox="0 0 24 24" stroke="#fff"><path d="M21 11.5c0 4.7-4.5 8.5-10 8.5-.9 0-1.8-.1-2.6-.3L4 21l1-3.8C3.7 15.8 3 13.7 3 11.5 3 6.8 7.5 3 13 3s8 3.8 8 8.5Z"/></svg>
        LINE査定
      </a>
      <button class="menu-btn" id="menuBtn" aria-label="メニューを開く" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
    </div>
  </div>
  <div class="mobile-nav-panel" id="mobileNav">
    <ul>
      <li><a href="#personal">個人のお客様</a></li>
      <li><a href="#prices">買取価格</a></li>
      <li><a href="#corporate">法人向け</a></li>
      <li><a href="#access">アクセス</a></li>
      <li><a href="tel:0756002874">お電話 075-600-2874</a></li>
    </ul>
  </div>
</header>

<main id="top">

  <!-- ========== Hero (image-less) ========== -->
  <section class="hero">
    <div class="container hero-inner">
      <p class="hero-eyebrow">京都・城陽のまちの資源ステーション</p>
      <h1>ご家庭の一点から、<br>工場の大量回収まで。</h1>
      <p class="hero-desc">金属製品・家電を一点から丁寧に査定。<span style="white-space:nowrap;">持込買取</span>、出張査定、工場・事業所の金属回収まで、初めての方にも分かりやすくご案内します。</p>
      <div class="hero-cta">
        <a class="btn btn-persimmon" href="#personal">家庭の金属・家電を売りたい</a>
        <a class="btn btn-blue-outline" href="#corporate">工場・現場の回収を相談したい</a>
      </div>
      <a class="hero-tel" href="tel:0756002874">
        <svg class="icon" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
        <span>
          <span class="hero-tel__num">075-600-2874</span><br>
          <span class="hero-tel__note">受付時間 9:00〜17:00(日曜定休)</span>
        </span>
      </a>
    </div>
  </section>

  <!-- ========== Trust strip ========== -->
  <section class="trust-strip">
    <div class="container trust-strip__grid">
      <div class="trust-strip__item">
        <svg class="icon" viewBox="0 0 24 24"><path d="M12 21s-7-4.5-9-9a5 5 0 0 1 9-3 5 5 0 0 1 9 3c-2 4.5-9 9-9 9Z"/></svg>
        <span>城陽市の地域密着店</span>
      </div>
      <div class="trust-strip__item">
        <svg class="icon" viewBox="0 0 24 24"><path d="M4 12h16M8 8l-4 4 4 4M16 8l4 4-4 4"/></svg>
        <span>丁寧な査定・計量</span>
      </div>
      <div class="trust-strip__item">
        <svg class="icon" viewBox="0 0 24 24"><path d="M12 2 4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
        <span>古物商許可取得済み</span>
      </div>
    </div>
  </section>

  <!-- ========== About ========== -->
  <section>
    <div class="container about-inner">
      <p class="eyebrow" style="justify-content:center;">CHPについて</p>
      <h2>まちの中に眠る資源を、丁寧に次へつなぐ。</h2>
      <p>まちの資源ステーションCHPは、京都府城陽市寺田金尾に拠点を置く金属リサイクル・買取の会社です。古物商許可(京都府公安委員会許可 第611092230062号)のもと、ご家庭から出る金属製品一点から、工場・事業所の大量の金属資源まで、丁寧な査定と分別で次の価値へとつなぎます。</p>
      <div class="about-badges">
        <div class="about-badge">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 2 4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4Z"/><path d="m9 12 2 2 4-4"/></svg>
          古物商許可取得済み
        </div>
        <div class="about-badge">
          <svg class="icon" viewBox="0 0 24 24"><path d="M12 21s-7-4.5-9-9a5 5 0 0 1 9-3 5 5 0 0 1 9 3c-2 4.5-9 9-9 9Z"/></svg>
          京都府城陽市 地域密着
        </div>
        <div class="about-badge">
          <svg class="icon" viewBox="0 0 24 24"><path d="M3 11l9-7 9 7"/><path d="M5 10v10h14V10"/></svg>
          〒610-0121 寺田金尾60-6
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Personal ========== -->
  <section id="personal" style="background:var(--bg-personal);">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">FOR YOUR HOME</p>
        <h2>ご家庭の不要品を、気軽に資源へ。</h2>
        <p>壊れていても、古くても、汚れていても、まずはご相談ください。</p>
      </div>

      <div class="item-cards-grid">
        <div class="item-card">
          <div class="item-card__icon"><svg class="icon" viewBox="0 0 24 24"><circle cx="6" cy="17" r="3.2"/><circle cx="18" cy="17" r="3.2"/><path d="M6 17 10 7h4l4 10"/><path d="M10 7 8 12h6"/></svg></div>
          <h3>自転車・金属用品</h3>
          <p>自転車、物干し竿、脚立 など</p>
        </div>
        <div class="item-card">
          <div class="item-card__icon"><svg class="icon" viewBox="0 0 24 24"><path d="M14 6l4 4-8 8H6v-4l8-8Z"/><path d="M6 20h12"/></svg></div>
          <h3>工具・農機具</h3>
          <p>工具類、農機具 など</p>
        </div>
        <div class="item-card">
          <div class="item-card__icon"><svg class="icon" viewBox="0 0 24 24"><path d="M4 12h12a4 4 0 0 1 0 8H8a4 4 0 0 1-4-4v-4Z"/><path d="M16 13V8a2 2 0 0 1 4 0"/></svg></div>
          <h3>鍋・フライパン</h3>
          <p>調理器具全般</p>
        </div>
        <div class="item-card">
          <div class="item-card__icon"><svg class="icon" viewBox="0 0 24 24"><rect x="4" y="3" width="16" height="18" rx="2"/><path d="M8 7h8M8 11h8M9 15h1M14 15h1"/></svg></div>
          <h3>家電製品</h3>
          <p>電子レンジ、炊飯器、扇風機 など</p>
        </div>
      </div>

      <div class="assurance-green-grid">
        <div class="assurance-green-item">
          <svg class="icon" viewBox="0 0 24 24"><path d="M5 13l4 4 10-10"/></svg>
          <span>一点から相談できます</span>
        </div>
        <div class="assurance-green-item">
          <svg class="icon" viewBox="0 0 24 24"><path d="M5 13l4 4 10-10"/></svg>
          <span>壊れていてもご相談可能</span>
        </div>
        <div class="assurance-green-item">
          <svg class="icon" viewBox="0 0 24 24"><path d="M5 13l4 4 10-10"/></svg>
          <span>LINEで写真を送るだけ</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== First time ========== -->
  <section id="first-time">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">FOR FIRST-TIME VISITORS</p>
        <h2>初めての方にも安心な理由</h2>
      </div>
      <div class="why-grid">
        <div class="why-card">
          <div class="why-card__num">01</div>
          <h3>写真を送るだけのLINE査定</h3>
          <p>来店前に写真を送るだけで、おおよその目安をご案内します。</p>
        </div>
        <div class="why-card">
          <div class="why-card__num">02</div>
          <h3>一点からご相談可能</h3>
          <p>大量でなくても、一点だけの持込みでも承ります。</p>
        </div>
        <div class="why-card">
          <div class="why-card__num">03</div>
          <h3>査定内容を丁寧に説明</h3>
          <p>金額の根拠や品物の状態について、都度ご説明いたします。</p>
        </div>
        <div class="why-card">
          <div class="why-card__num">04</div>
          <h3>城陽市の分かりやすい店舗</h3>
          <p>寺田金尾60-6、地図で分かりやすい場所にございます。</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Flow ========== -->
  <section style="background:var(--bg-green);">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">FLOW</p>
        <h2>個人向け買取の流れ</h2>
      </div>
      <div class="flow-list">
        <div class="flow-step"><div class="flow-step__num">1</div><h3>電話・LINEで相談</h3><p>まずはお気軽にご連絡ください</p></div>
        <div class="flow-step"><div class="flow-step__num">2</div><h3>写真・現物確認</h3><p>写真送付、または店頭・出張で確認</p></div>
        <div class="flow-step"><div class="flow-step__num">3</div><h3>査定金額をご案内</h3><p>内容を丁寧にご説明します</p></div>
        <div class="flow-step"><div class="flow-step__num">4</div><h3>持込または回収</h3><p>ご都合の良い方法をお選びください</p></div>
        <div class="flow-step"><div class="flow-step__num">5</div><h3>精算</h3><p>その場で精算いたします</p></div>
      </div>
    </div>
  </section>

  <!-- ========== Corporate (image-less) ========== -->
  <section id="corporate" style="background:var(--bg-corp);">
    <div class="container">
      <div class="corp-top-panel">
        <div class="corp-top-panel-inner">
          <p class="eyebrow">FOR BUSINESS</p>
          <h2>工場・現場の金属資源を、<br>迅速に回収。</h2>
          <p>鉄くず、ステンレス・アルミ端材、銅、真鍮、電線から、切粉・廃機械まで。定期回収からスポット対応、コンテナ設置までご相談いただけます。</p>
        </div>
      </div>

      <div class="corp-service-cards">
        <div class="service-card"><h3>定期回収</h3><p>周期を定めて回収します。</p></div>
        <div class="service-card"><h3>スポット回収</h3><p>設備入替・工場整理時に対応。</p></div>
        <div class="service-card"><h3>コンテナ設置</h3><p>排出量・品目に応じて提案。</p></div>
        <div class="service-card"><h3>現地確認・見積</h3><p>写真または現地で条件確認。</p></div>
      </div>

      <div class="corp-chip-block">
        <h4>対象品目</h4>
        <div class="chip-row">
          <span class="chip">鉄くず</span><span class="chip">ステンレス端材</span><span class="chip">アルミ端材</span>
          <span class="chip">銅</span><span class="chip">真鍮</span><span class="chip">電線・ケーブル</span>
          <span class="chip">切粉・ダライ粉</span><span class="chip">プレス端材</span><span class="chip">モーター</span>
          <span class="chip">廃機械・設備</span>
        </div>
      </div>
      <div class="corp-chip-block" style="margin-bottom:0;">
        <h4>対象業種</h4>
        <div class="chip-row">
          <span class="chip">金属加工業</span><span class="chip">製造業</span><span class="chip">建設業</span>
          <span class="chip">設備工事業</span><span class="chip">自動車整備業</span>
        </div>
      </div>

      <div class="corp-cta">
        <a class="btn btn-blue" href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向け回収サービスを見る</a>
        <a class="btn btn-outline" href="tel:0756002874">回収・見積を相談する</a>
      </div>
    </div>
  </section>

  <!-- ========== Why chosen ========== -->
  <section>
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">WHY CHP</p>
        <h2>CHPが選ばれる理由</h2>
      </div>
      <div class="why-grid why-grid--3">
        <div class="why-card"><h3>地域密着による迅速な対応</h3><p>城陽市を拠点に、近隣からのご相談に迅速に対応します。</p></div>
        <div class="why-card"><h3>品目ごとの丁寧な査定・分別</h3><p>金属の種類ごとに適正に査定・分別します。</p></div>
        <div class="why-card"><h3>計量・査定内容の明確化</h3><p>計量方法や査定根拠を分かりやすくお伝えします。</p></div>
        <div class="why-card"><h3>持込・出張の相談に対応</h3><p>ご都合に応じて持込みまたは出張査定を選べます。</p></div>
        <div class="why-card"><h3>個人・法人どちらにも対応</h3><p>ご家庭の一点から工場の大量回収まで承ります。</p></div>
        <div class="why-card"><h3>会社情報を明示</h3><p>古物商許可・所在地・連絡先を明確にしています。</p></div>
      </div>
    </div>
  </section>

  <!-- ========== Prices ========== -->
  <section id="prices">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">PRICES</p>
        <h2>金属買取価格</h2>
      </div>
      <div class="price-split-grid">
        <div class="price-panel-box price-panel-box--green">
          <svg viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          <p>相場や品物の状態により価格が変動します。品目と数量が分かる写真をお送りいただくと、より具体的な目安をご案内できます。</p>
          <a class="btn btn-outline" style="align-self:flex-start;" href="<?php echo esc_url(home_url('/prices/')); ?>">買取価格ページを見る</a>
        </div>
        <div class="price-panel-box price-panel-box--persimmon">
          <svg viewBox="0 0 24 24"><path d="M21 11.5c0 4.7-4.5 8.5-10 8.5-.9 0-1.8-.1-2.6-.3L4 21l1-3.8C3.7 15.8 3 13.7 3 11.5 3 6.8 7.5 3 13 3s8 3.8 8 8.5Z"/></svg>
          <p>LINEまたは電話で確認いただけます。写真を送っていただくとスムーズです。</p>
          <a class="btn btn-line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer"><svg class="icon" viewBox="0 0 24 24" stroke="#fff"><path d="M21 11.5c0 4.7-4.5 8.5-10 8.5-.9 0-1.8-.1-2.6-.3L4 21l1-3.8C3.7 15.8 3 13.7 3 11.5 3 6.8 7.5 3 13 3s8 3.8 8 8.5Z"/></svg>LINEで確認する</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Store / staff (text-only cards) ========== -->
  <section style="background:var(--bg-green);">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">STORE</p>
        <h2>店舗・スタッフ紹介</h2>
        <p>どのような店舗で、誰が対応するのか。安心してお越しいただけるよう、実際の様子を掲載予定です。</p>
      </div>
      <div class="store-grid">
        <div class="store-item">
          <h3>店舗外観</h3><p>寺田金尾60-6の店舗建物</p>
        </div>
        <div class="store-item">
          <h3>受付・スタッフ</h3><p>査定対応スタッフのご紹介</p>
        </div>
        <div class="store-item">
          <h3>計量・査定風景</h3><p>その場で分かりやすくご説明</p>
        </div>
        <div class="store-item">
          <h3>駐車・持込場所</h3><p>お車での持込み動線</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== FAQ ========== -->
  <section>
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">FAQ</p>
        <h2>よくある質問</h2>
      </div>
      <div class="faq-cols">
        <div class="faq-col">
          <h3>個人のお客様</h3>
          <details class="faq-item"><summary>一点だけでも持ち込めますか？</summary><p class="faq-a">はい、一点からご相談いただけます。まずはお電話かLINEでご連絡ください。</p></details>
          <details class="faq-item"><summary>壊れた物でも大丈夫ですか？</summary><p class="faq-a">はい、壊れている物もご相談いただけます。状態を確認のうえ査定いたします。</p></details>
          <details class="faq-item"><summary>汚れやさびがあっても大丈夫ですか？</summary><p class="faq-a">油汚れ・ほこり・さびがあってもご相談いただけます。</p></details>
          <details class="faq-item"><summary>重くて運べない場合は相談できますか？</summary><p class="faq-a">運搬が難しい品物は出張査定をご相談いただけます。</p></details>
        </div>
        <div class="faq-col">
          <h3>法人・事業者様</h3>
          <details class="faq-item"><summary>少量でも回収相談できますか？</summary><p class="faq-a">はい、数量にかかわらずご相談いただけます。まずはお電話でお問い合わせください。</p></details>
          <details class="faq-item"><summary>定期回収に対応できますか？</summary><p class="faq-a">はい、周期を定めた定期回収のご相談を承ります。</p></details>
          <details class="faq-item"><summary>コンテナ設置は可能ですか？</summary><p class="faq-a">排出量や設置場所に応じてご提案しますので、まずはご相談ください。</p></details>
          <details class="faq-item"><summary>廃機械や設備も相談できますか？</summary><p class="faq-a">はい、廃機械・設備についてもご相談いただけます。</p></details>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Access ========== -->
  <section id="access" style="background:var(--bg-green);">
    <div class="container">
      <div class="section-head">
        <p class="eyebrow">ACCESS</p>
        <h2>アクセス・営業時間</h2>
      </div>
      <div class="access-grid">
        <div class="access-map">
          <iframe
            src="https://maps.google.com/maps?q=34.8476305,135.7646817&hl=ja&z=17&output=embed"
            allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="まちの資源ステーションCHP 地図"></iframe>
        </div>
        <div>
          <ul class="access-table">
            <li>
              <span class="label"><svg class="icon" viewBox="0 0 24 24"><path d="M12 21s-7-4.5-9-9a5 5 0 0 1 9-3 5 5 0 0 1 9 3c-2 4.5-9 9-9 9Z"/></svg>住所</span>
              <span class="value">〒610-0121 京都府城陽市寺田金尾60-6</span>
            </li>
            <li>
              <span class="label"><svg class="icon" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>電話</span>
              <span class="value"><a href="tel:0756002874">075-600-2874</a></span>
            </li>
            <li>
              <span class="label"><svg class="icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>営業時間</span>
              <span class="value">9:00〜17:00</span>
            </li>
            <li>
              <span class="label"><svg class="icon" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="17" rx="1.5"/><path d="M3 9h18M8 2v4M16 2v4"/></svg>定休日</span>
              <span class="value">日曜日</span>
            </li>
            <li>
              <span class="label"><svg class="icon" viewBox="0 0 24 24"><path d="M12 2 4 6v6c0 5 3.5 8.5 8 10 4.5-1.5 8-5 8-10V6l-8-4Z"/></svg>許可</span>
              <span class="value">京都府公安委員会許可 第611092230062号</span>
            </li>
          </ul>
          <a class="btn btn-outline access-map-btn" href="https://www.google.com/maps?q=34.8476305,135.7646817" target="_blank" rel="noopener noreferrer">
            Googleマップで開く
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ========== Final CTA ========== -->
  <section class="final-cta">
    <div class="container">
      <h2>捨てる前に、まずはCHPへご相談ください。</h2>
      <div class="final-cta-actions">
        <a class="btn btn-line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer"><svg class="icon" viewBox="0 0 24 24" stroke="#fff"><path d="M21 11.5c0 4.7-4.5 8.5-10 8.5-.9 0-1.8-.1-2.6-.3L4 21l1-3.8C3.7 15.8 3 13.7 3 11.5 3 6.8 7.5 3 13 3s8 3.8 8 8.5Z"/></svg>LINEで写真査定</a>
        <a class="btn btn-persimmon" href="tel:0756002874"><svg class="icon" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>電話で相談</a>
        <a class="btn btn-blue-outline" href="#corporate">法人・回収相談</a>
      </div>
    </div>
  </section>

</main>

<!-- ========== Footer ========== -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div>
        <div class="footer-brand__mark">
          <span class="brand__mark">CHP</span>
          <span>まちの資源ステーションCHP</span>
        </div>
        <p>運営：株式会社CHP</p>
        <p>〒610-0121 京都府城陽市寺田金尾60-6</p>
        <p>TEL. 075-600-2874　受付 9:00〜17:00(日曜定休)</p>
        <p>古物商許可：京都府公安委員会許可 第611092230062号</p>
        <p>登録番号：T9130001072348</p>
      </div>
      <div class="footer-col">
        <h4>ページ</h4>
        <ul>
          <li><a href="#top">TOP</a></li>
          <li><a href="#personal">個人のお客様へ</a></li>
          <li><a href="<?php echo esc_url(home_url('/corporate/')); ?>">法人向けサービス</a></li>
          <li><a href="<?php echo esc_url(home_url('/prices/')); ?>">買取価格</a></li>
          <li><a href="#access">アクセス</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>お問い合わせ</h4>
        <ul>
          <li><a href="tel:0756002874">電話：075-600-2874</a></li>
          <li><a href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">LINE公式アカウント</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-bottom">&copy; 2026 まちの資源ステーションCHP / 株式会社CHP. All Rights Reserved.</div>
</footer>

<div class="fixed-cta">
  <a class="fc-tel" href="tel:0756002874">
    <svg class="icon" viewBox="0 0 24 24"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z"/></svg>
    電話する
  </a>
  <a class="fc-line" href="https://lin.ee/oHnlYya" target="_blank" rel="noopener noreferrer">
    <svg class="icon" viewBox="0 0 24 24"><path d="M21 11.5c0 4.7-4.5 8.5-10 8.5-.9 0-1.8-.1-2.6-.3L4 21l1-3.8C3.7 15.8 3 13.7 3 11.5 3 6.8 7.5 3 13 3s8 3.8 8 8.5Z"/></svg>
    LINE査定
  </a>
  <a class="fc-corp" href="#corporate">
    <svg class="icon" viewBox="0 0 24 24"><path d="M3 21V9l7-4v16"/><path d="M10 21V5l7 4v12"/></svg>
    法人相談
  </a>
</div>

<script>
  (function () {
    var btn = document.getElementById('menuBtn');
    var panel = document.getElementById('mobileNav');
    if (!btn || !panel) return;
    btn.addEventListener('click', function () {
      var open = panel.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    panel.querySelectorAll('a').forEach(function (a) {
      a.addEventListener('click', function () {
        panel.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
      });
    });
  })();
</script>

<?php wp_footer(); ?>
</body>
</html>
