<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — برنامج إدارة صيدلية POS</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --primary: #0F766E;
    --primary2: #14B8A6;
    --primary-pale: #F0FDFA;
    --primary-glow: rgba(15,118,110,0.15);
    --emerald: #059669;
    --emerald-pale: #ECFDF5;
    --ink: #0C1A1A;
    --ink2: #132929;
    --ink3: #1A3535;
    --red: #DC2626;
    --red-pale: #FEF2F2;
    --amber: #D97706;
    --amber-pale: #FFFBEB;
    --blue: #1D4ED8;
    --blue-pale: #EFF6FF;
    --text: #134040;
    --text2: #4A6060;
    --text3: #7A9090;
    --border: #D1E8E8;
    --bg: #F5FAFA;
    --white: #FFFFFF;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Cairo', sans-serif;
    background: var(--bg);
    color: var(--text);
    line-height: 1.7;
  }

  .page { max-width: 920px; margin: 0 auto; padding: 40px 24px 80px; }

  /* ===== HEADER ===== */
  .header {
    background: linear-gradient(145deg, var(--ink) 0%, var(--ink2) 50%, var(--ink3) 100%);
    border-radius: 22px;
    padding: 48px 48px 42px;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }

  .hx-cross {
    position: absolute; inset: 0; opacity: 0.04;
    background-image:
      repeating-linear-gradient(0deg, transparent, transparent 29px, #0FF 30px),
      repeating-linear-gradient(90deg, transparent, transparent 29px, #0FF 30px);
  }

  .hx-glow1 {
    position: absolute; top: -100px; right: -60px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(20,184,166,0.22) 0%, transparent 60%);
    border-radius: 50%;
  }

  .hx-glow2 {
    position: absolute; bottom: -70px; left: 80px;
    width: 280px; height: 280px;
    background: radial-gradient(circle, rgba(5,150,105,0.14) 0%, transparent 60%);
    border-radius: 50%;
  }

  .header-top {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 30px; position: relative; z-index: 1; flex-wrap: wrap; gap: 12px;
  }

  .brand { display: flex; align-items: center; gap: 14px; }

  .brand-icon {
    width: 54px; height: 54px;
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary2) 100%);
    border-radius: 15px;
    display: flex; align-items: center; justify-content: center; font-size: 26px;
    box-shadow: 0 8px 28px rgba(20,184,166,0.45);
  }

  .brand-name { font-size: 20px; font-weight: 900; color: white; }
  .brand-sub  { font-size: 12px; color: rgba(255,255,255,0.45); }

  .proposal-badge {
    background: rgba(20,184,166,0.18);
    border: 1px solid rgba(20,184,166,0.4);
    color: #5EEAD4; padding: 6px 18px;
    border-radius: 100px; font-size: 13px; font-weight: 600;
  }

  .header-body { position: relative; z-index: 1; }

  .header-body h1 {
    font-size: 38px; font-weight: 900; color: white;
    line-height: 1.25; margin-bottom: 10px;
  }

  .header-body h1 span { color: var(--primary2); }
  .header-body p { color: rgba(255,255,255,0.5); font-size: 14px; }

  .header-pills {
    display: flex; gap: 10px; margin-top: 26px;
    position: relative; z-index: 1; flex-wrap: wrap;
  }

  .pill {
    display: flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    color: rgba(255,255,255,0.7);
    padding: 6px 14px; border-radius: 100px; font-size: 12px;
  }

  .pill-dot { width: 6px; height: 6px; background: var(--primary2); border-radius: 50%; flex-shrink: 0; }

  /* ===== HIGHLIGHT STRIP ===== */
  .highlight-strip {
    background: linear-gradient(135deg, var(--primary) 0%, var(--emerald) 100%);
    border-radius: 14px; padding: 16px 24px;
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 28px;
  }

  .hs-icon { font-size: 28px; flex-shrink: 0; }
  .hs-text { font-size: 14px; color: white; line-height: 1.6; font-weight: 500; }
  .hs-text strong { font-weight: 900; }

  /* ===== SECTION ===== */
  .section { margin-bottom: 28px; }

  .section-header { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }

  .section-icon {
    width: 40px; height: 40px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
  }

  .si-teal   { background: var(--primary-pale); }
  .si-green  { background: var(--emerald-pale); }
  .si-blue   { background: var(--blue-pale); }
  .si-amber  { background: var(--amber-pale); }
  .si-red    { background: var(--red-pale); }

  .section-title { font-size: 20px; font-weight: 800; color: var(--text); }
  .section-sub   { font-size: 13px; color: var(--text3); margin-top: 2px; }

  /* ===== CARD ===== */
  .card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
    box-shadow: 0 2px 12px rgba(15,118,110,0.06);
  }

  /* ===== FEATURES GRID ===== */
  .features-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .feat-card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 20px;
    transition: box-shadow 0.2s, border-color 0.2s;
  }

  .feat-card:hover { box-shadow: 0 4px 20px rgba(15,118,110,0.1); border-color: var(--primary2); }

  .feat-card.special {
    border-color: var(--primary);
    background: linear-gradient(150deg, #fff 60%, var(--primary-pale));
  }

  .feat-top { display: flex; align-items: flex-start; justify-content: space-between; gap: 8px; margin-bottom: 8px; }
  .feat-icon  { font-size: 24px; }
  .feat-star  { font-size: 11px; background: var(--primary); color: white; padding: 2px 8px; border-radius: 100px; font-weight: 700; white-space: nowrap; }
  .feat-title { font-size: 15px; font-weight: 700; margin-bottom: 6px; color: var(--text); }
  .feat-desc  { font-size: 13px; color: var(--text2); line-height: 1.6; }
  .feat-tags  { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }

  .tag { font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 100px; }
  .tag-teal  { background: var(--primary-pale);  color: var(--primary); }
  .tag-green { background: var(--emerald-pale);  color: var(--emerald); }
  .tag-blue  { background: var(--blue-pale);     color: var(--blue); }
  .tag-amber { background: var(--amber-pale);    color: var(--amber); }
  .tag-red   { background: var(--red-pale);      color: var(--red); }

  /* ===== TABLE ===== */
  .tbl { width: 100%; border-collapse: collapse; }

  .tbl thead tr { background: var(--ink); }

  .tbl thead th {
    padding: 13px 18px; text-align: right;
    color: rgba(255,255,255,0.72); font-size: 13px; font-weight: 600;
  }

  .tbl tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
  .tbl tbody tr:hover { background: var(--bg); }
  .tbl tbody tr:last-child { border-bottom: none; }

  .tbl tbody td { padding: 12px 18px; font-size: 13px; color: var(--text2); }
  .tbl tbody td:first-child { font-weight: 700; color: var(--text); }

  .num {
    display: inline-flex; align-items: center; justify-content: center;
    width: 26px; height: 26px;
    background: var(--primary-pale); color: var(--primary);
    border-radius: 6px; font-size: 12px; font-weight: 700; margin-left: 8px;
  }

  .badge { font-size: 11px; font-weight: 600; padding: 2px 9px; border-radius: 100px; }
  .badge-core   { background: var(--primary-pale);  color: var(--primary); }
  .badge-pharm  { background: var(--emerald-pale);  color: var(--emerald); }
  .badge-extra  { background: var(--amber-pale);    color: var(--amber); }
  .badge-report { background: var(--blue-pale);     color: var(--blue); }

  /* ===== TECH GRID ===== */
  .tech-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }

  .tech-item {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 12px; padding: 16px; text-align: center;
    transition: border-color 0.2s;
  }

  .tech-item:hover { border-color: var(--primary2); }

  .tech-emoji { font-size: 22px; margin-bottom: 8px; display: block; }
  .tech-name  { font-size: 14px; font-weight: 700; color: var(--text); margin-bottom: 3px; }
  .tech-role  { font-size: 12px; color: var(--text3); }

  /* ===== TIMELINE ===== */
  .timeline { padding: 4px 8px; }

  .tl-item { display: flex; gap: 18px; padding-bottom: 26px; position: relative; }

  .tl-item::before {
    content: ''; position: absolute;
    right: 18px; top: 40px; bottom: 0;
    width: 2px; background: var(--border);
  }

  .tl-item:last-child::before { display: none; }

  .tl-dot {
    width: 38px; height: 38px; border-radius: 50%;
    background: var(--primary-pale); border: 2px solid var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; flex-shrink: 0; position: relative; z-index: 1;
  }

  .tl-body { flex: 1; padding-top: 5px; }
  .tl-week  { font-size: 12px; color: var(--primary); font-weight: 700; margin-bottom: 3px; }
  .tl-title { font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 3px; }
  .tl-desc  { font-size: 13px; color: var(--text2); }

  /* ===== PRICING ===== */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }

  .plan-card {
    background: var(--white); border: 2px solid var(--border);
    border-radius: 18px; padding: 24px 18px; text-align: center;
    position: relative; transition: transform 0.2s, box-shadow 0.2s;
  }

  .plan-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(15,118,110,0.12); }

  .plan-card.featured {
    border-color: var(--primary);
    background: linear-gradient(160deg, #fff 55%, var(--primary-pale));
  }

  .plan-card.featured::before {
    content: '⭐ الأكثر طلباً';
    position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
    background: var(--primary); color: white;
    font-size: 11px; font-weight: 700;
    padding: 4px 14px; border-radius: 100px; white-space: nowrap;
  }

  .plan-name  { font-size: 14px; font-weight: 700; color: var(--text2); margin-bottom: 12px; }
  .plan-price { font-size: 36px; font-weight: 900; color: var(--text); line-height: 1; margin-bottom: 3px; }
  .plan-price small { font-size: 14px; font-weight: 500; color: var(--text3); }
  .plan-dur   { font-size: 12px; color: var(--text3); margin-bottom: 16px; }

  .plan-feats { list-style: none; text-align: right; margin-bottom: 18px; }

  .plan-feats li {
    font-size: 12px; color: var(--text2); padding: 5px 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 7px;
  }

  .plan-feats li:last-child { border-bottom: none; }
  .plan-feats li .ck { color: var(--emerald); font-size: 13px; flex-shrink: 0; }
  .plan-feats li .xx { color: var(--text3); font-size: 13px; flex-shrink: 0; }

  .plan-btn {
    width: 100%; padding: 11px; border-radius: 10px;
    font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700;
    cursor: pointer; border: none; transition: all 0.2s;
  }

  .plan-btn.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }
  .plan-btn.solid   { background: var(--primary); color: white; box-shadow: 0 4px 14px rgba(15,118,110,0.35); }
  .plan-btn.solid:hover { background: var(--primary2); }

  /* ===== TOTAL BOX ===== */
  .total-box {
    background: linear-gradient(145deg, var(--ink) 0%, var(--ink2) 60%, var(--ink3) 100%);
    border-radius: 20px; padding: 36px 40px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap; position: relative; overflow: hidden;
  }

  .total-bg-grid {
    position: absolute; inset: 0; opacity: 0.04;
    background-image:
      repeating-linear-gradient(0deg, transparent, transparent 29px, #0FF 30px),
      repeating-linear-gradient(90deg, transparent, transparent 29px, #0FF 30px);
  }

  .total-glow {
    position: absolute; top: -30px; left: -30px;
    width: 220px; height: 220px;
    background: radial-gradient(circle, rgba(20,184,166,0.2) 0%, transparent 70%);
    border-radius: 50%;
  }

  .total-left { position: relative; z-index: 1; }
  .total-lbl  { color: rgba(255,255,255,0.45); font-size: 13px; margin-bottom: 8px; }

  .total-price { font-size: 54px; font-weight: 900; color: white; line-height: 1; }
  .total-price small { font-size: 18px; color: rgba(255,255,255,0.5); font-weight: 400; }
  .total-note { font-size: 12px; color: rgba(255,255,255,0.3); margin-top: 8px; }

  .total-right {
    position: relative; z-index: 1;
    display: flex; flex-direction: column; gap: 10px;
  }

  .total-item { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.65); font-size: 13px; }

  .total-item .ic {
    width: 30px; height: 30px; background: rgba(255,255,255,0.07);
    border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 14px;
  }

  /* ===== NOTE / INFO ===== */
  .note-box {
    background: var(--amber-pale); border: 1px solid #fde68a;
    border-radius: 12px; padding: 14px 18px;
    display: flex; gap: 10px; margin-bottom: 24px;
  }

  .note-box .icon { font-size: 18px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 13px; color: #78350f; line-height: 1.7; }

  .info-box {
    background: var(--primary-pale); border: 1px solid rgba(15,118,110,0.2);
    border-radius: 12px; padding: 16px 20px;
    display: flex; gap: 12px; margin-bottom: 18px;
  }

  .info-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; color: #134E4A; line-height: 1.7; }

  /* ===== COMPARE ===== */
  .compare-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 20px; }

  .cmp-card { background: var(--white); border: 1px solid var(--border); border-radius: 14px; padding: 18px 20px; }
  .cmp-title { font-size: 14px; font-weight: 800; margin-bottom: 12px; color: var(--text); }
  .cmp-list { list-style: none; }
  .cmp-list li { font-size: 13px; color: var(--text2); padding: 5px 0; border-bottom: 1px solid var(--border); display: flex; gap: 8px; }
  .cmp-list li:last-child { border-bottom: none; }
  .cmp-list li .dot { color: var(--primary); flex-shrink: 0; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .features-grid { grid-template-columns: 1fr; }
    .pricing-grid  { grid-template-columns: 1fr; }
    .tech-grid     { grid-template-columns: 1fr 1fr; }
    .compare-grid  { grid-template-columns: 1fr; }
    .header        { padding: 28px 22px; }
    .header-body h1 { font-size: 28px; }
    .total-box     { padding: 26px 22px; }
    .total-price   { font-size: 40px; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="hx-cross"></div>
    <div class="hx-glow1"></div>
    <div class="hx-glow2"></div>

    <div class="header-top">
      <div class="brand">
        <div class="brand-icon">💊</div>
        <div>
          <div class="brand-name">Pharmacy POS — إدارة صيدلية</div>
          <div class="brand-sub">Flutter Desktop + Laravel Stack</div>
        </div>
      </div>
      <div class="proposal-badge">عرض سعر رسمي</div>
    </div>

    <div class="header-body">
      <h1>برنامج إدارة صيدلية<br><span>متكامل + كاشير POS</span></h1>
      <p>مخزون أدوية • وصفات طبية • بدائل • كاشير سريع • تنبيه انتهاء صلاحية — Flutter Desktop + Laravel</p>
    </div>

    <div class="header-pills">
      <div class="pill"><div class="pill-dot"></div>Flutter Desktop</div>
      <div class="pill"><div class="pill-dot"></div>Laravel 11 Backend</div>
      <div class="pill"><div class="pill-dot"></div>كاشير POS سريع</div>
      <div class="pill"><div class="pill-dot"></div>باركود + طابعة حرارية</div>
      <div class="pill"><div class="pill-dot"></div>تسليم 15 أسبوع</div>
    </div>
  </div>

  <!-- HIGHLIGHT STRIP -->
  <div class="highlight-strip">
    <div class="hs-icon">⭐</div>
    <div class="hs-text">
      <strong>ميزة تنافسية حصرية:</strong> إنت صيدلاني ومبرمج في نفس الوقت — ده بيخليك تبني البرنامج ده بفهم المجال من جوه. معرفتك بالأدوية والوصفات والتفاعلات هتفرق جداً في جودة المنتج النهائي.
    </div>
  </div>

  <!-- OVERVIEW -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-teal">🔍</div>
      <div>
        <div class="section-title">نظرة عامة على المشروع</div>
        <div class="section-sub">إيه اللي هنبنيه بالضبط</div>
      </div>
    </div>

    <div class="info-box">
      <div class="icon">💡</div>
      <div class="text">
        برنامج إدارة صيدلية متكامل يشتغل على الكمبيوتر (Windows / macOS) — بيجمع بين <strong>كاشير POS سريع</strong> للبيع اليومي، <strong>إدارة مخزون الأدوية</strong> بالباركود، <strong>الوصفات الطبية</strong>، <strong>بدائل الأدوية</strong>، تنبيه انتهاء الصلاحية ونقص المخزون، وتقارير مالية كاملة. مع لوحة تحكم ويب للمالك لمتابعة المبيعات عن بعد في أي وقت.
      </div>
    </div>

    <div style="display:flex; gap:10px; flex-wrap:wrap;">
      <div style="background:var(--primary-pale); color:var(--primary); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">💊 إدارة أدوية متخصصة</div>
      <div style="background:var(--emerald-pale); color:var(--emerald); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">🧾 كاشير POS سريع</div>
      <div style="background:var(--blue-pale); color:var(--blue); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📋 وصفات + بدائل</div>
      <div style="background:var(--amber-pale); color:var(--amber); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">🚨 تنبيه صلاحية</div>
      <div style="background:var(--red-pale); color:var(--red); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📊 تقارير مالية</div>
    </div>
  </div>

  <!-- FEATURES -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-blue">⚙️</div>
      <div>
        <div class="section-title">الفيتشرز الكاملة</div>
        <div class="section-sub">كل موديول في البرنامج مفصّل</div>
      </div>
    </div>

    <div class="features-grid">

      <div class="feat-card special">
        <div class="feat-top">
          <span class="feat-icon">🧾</span>
          <span class="feat-star">أهم ميزة</span>
        </div>
        <div class="feat-title">كاشير POS سريع</div>
        <div class="feat-desc">شاشة بيع سريعة بالباركود أو البحث بالاسم، إضافة أصناف للفاتورة، خصومات، دفع نقدي أو شبكي، فاتورة حرارية فورية.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">باركود</span>
          <span class="tag tag-green">طباعة فورية</span>
          <span class="tag tag-blue">خصومات</span>
        </div>
      </div>

      <div class="feat-card special">
        <div class="feat-top">
          <span class="feat-icon">💊</span>
          <span class="feat-star">تخصصي</span>
        </div>
        <div class="feat-title">قاعدة بيانات الأدوية</div>
        <div class="feat-desc">بيانات كل دواء: المادة الفعالة، التصنيف العلاجي، الجرعة، موانع الاستخدام، التفاعلات الدوائية، وبدائل الأدوية المتاحة.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">مادة فعالة</span>
          <span class="tag tag-red">تفاعلات</span>
          <span class="tag tag-green">بدائل</span>
        </div>
      </div>

      <div class="feat-card special">
        <div class="feat-top">
          <span class="feat-icon">📋</span>
          <span class="feat-star">تخصصي</span>
        </div>
        <div class="feat-title">الوصفات الطبية</div>
        <div class="feat-desc">تسجيل وصفة طبية كاملة، ربط الأدوية بالوصفة، صرف الوصفة مع تقليل المخزون تلقائياً، حفظ سجل الوصفات لكل عميل.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">سجل وصفات</span>
          <span class="tag tag-green">صرف تلقائي</span>
          <span class="tag tag-blue">عميل</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">📦</span>
        <div class="feat-title">إدارة مخزون الأدوية</div>
        <div class="feat-desc">مخزون كامل بالاسم التجاري والجنيسي، وحدات (علبة/شريط/حبة)، سعر التكلفة والبيع، الحد الأدنى للمخزون، ورقم الدُفعة (Batch).</div>
        <div class="feat-tags">
          <span class="tag tag-teal">Batch Number</span>
          <span class="tag tag-green">وحدات متعددة</span>
          <span class="tag tag-blue">جنيسي/تجاري</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🚨</span>
        <div class="feat-title">تنبيه انتهاء الصلاحية</div>
        <div class="feat-desc">تنبيه مبكر قبل انتهاء الصلاحية بـ 30/60/90 يوم، قائمة الأدوية القريبة من الانتهاء، ومساعدة في اتخاذ قرار الإرجاع للمورد.</div>
        <div class="feat-tags">
          <span class="tag tag-amber">تنبيه مبكر</span>
          <span class="tag tag-red">قريب انتهاء</span>
          <span class="tag tag-teal">إرجاع مورد</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🤝</span>
        <div class="feat-title">الموردين وفواتير الشراء</div>
        <div class="feat-desc">ملف كامل لكل مورد، تسجيل فاتورة شراء مع تحديث المخزون تلقائياً، سجل المديونيات، وأوامر الشراء.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">فاتورة شراء</span>
          <span class="tag tag-green">مديونيات</span>
          <span class="tag tag-blue">PO</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">👥</span>
        <div class="feat-title">إدارة العملاء</div>
        <div class="feat-desc">ملف عميل بسجل وصفاته ومشترياته، نقاط الولاء، تنبيه الدواء المنتهي (للعملاء المزمنين)، وتاريخ الشراء.</div>
        <div class="feat-tags">
          <span class="tag tag-green">سجل مشتريات</span>
          <span class="tag tag-teal">نقاط ولاء</span>
          <span class="tag tag-blue">أمراض مزمنة</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🔄</span>
        <div class="feat-title">المرتجعات والاستبدال</div>
        <div class="feat-desc">إرجاع مبيعات، إرجاع مشتريات للمورد، تصحيح الفاتورة، وتحديث المخزون تلقائياً عند الإرجاع.</div>
        <div class="feat-tags">
          <span class="tag tag-amber">مرتجع بيع</span>
          <span class="tag tag-red">مرتجع مورد</span>
          <span class="tag tag-teal">تصحيح فاتورة</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">💰</span>
        <div class="feat-title">الخزينة والتقارير المالية</div>
        <div class="feat-desc">إجمالي المبيعات اليومية/الشهرية، الأرباح، مصاريف الشراء، حركة الخزينة، وتقرير الضريبة إن وجدت.</div>
        <div class="feat-tags">
          <span class="tag tag-green">أرباح</span>
          <span class="tag tag-teal">خزينة</span>
          <span class="tag tag-blue">PDF</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🏷️</span>
        <div class="feat-title">الباركود وطباعة الملصقات</div>
        <div class="feat-desc">مسح باركود بـ Scanner خارجي أو كاميرا، طباعة ملصقات أسعار بالباركود، وطباعة فواتير حرارية.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">Scanner</span>
          <span class="tag tag-green">ملصقات أسعار</span>
          <span class="tag tag-amber">Thermal</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">👤</span>
        <div class="feat-title">صلاحيات المستخدمين</div>
        <div class="feat-desc">مستويات متعددة (صاحب الصيدلية — صيدلاني — كاشير)، سجل تدقيق لكل عملية، منع التعديل على الفواتير المغلقة.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">Roles</span>
          <span class="tag tag-blue">Audit Log</span>
          <span class="tag tag-red">حماية بيانات</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🌐</span>
        <div class="feat-title">لوحة تحكم ويب (للمالك)</div>
        <div class="feat-desc">React Dashboard يتيح لصاحب الصيدلية مراقبة المبيعات والمخزون والتنبيهات عن بعد من أي جهاز أو موبايل.</div>
        <div class="feat-tags">
          <span class="tag tag-blue">React.js</span>
          <span class="tag tag-teal">Real-time</span>
          <span class="tag tag-green">Mobile-friendly</span>
        </div>
      </div>

    </div>
  </div>

  <!-- SCREENS -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-green">🖥️</div>
      <div>
        <div class="section-title">شاشات البرنامج</div>
        <div class="section-sub">تفصيل كامل للشاشات</div>
      </div>
    </div>

    <div class="card">
      <table class="tbl">
        <thead>
          <tr><th>#</th><th>الشاشة</th><th>الوصف</th><th>النوع</th></tr>
        </thead>
        <tbody>
          <tr><td><span class="num">1</span></td><td>تسجيل الدخول + صلاحيات</td><td>Login + Role-based (مالك / صيدلاني / كاشير)</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">2</span></td><td>الداشبورد الرئيسي</td><td>مبيعات اليوم، تنبيهات، أسرع الأدوية مبيعاً</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">3</span></td><td>شاشة POS الكاشير</td><td>بيع سريع بباركود أو بحث + فاتورة حرارية</td><td><span class="badge badge-pharm">كاشير</span></td></tr>
          <tr><td><span class="num">4</span></td><td>الوصفات الطبية</td><td>تسجيل وصفة + ربط بعميل + صرف تلقائي</td><td><span class="badge badge-pharm">صيدلي</span></td></tr>
          <tr><td><span class="num">5</span></td><td>إدارة الأدوية</td><td>قاعدة بيانات الأدوية + مادة فعالة + بدائل</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">6</span></td><td>المخزون الحالي</td><td>رصيد كل دواء + فلتر + تنبيه نقص</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">7</span></td><td>تنبيهات الصلاحية</td><td>قائمة الأدوية القريبة من الانتهاء</td><td><span class="badge badge-pharm">صيدلي</span></td></tr>
          <tr><td><span class="num">8</span></td><td>فواتير الشراء (وارد)</td><td>تسجيل فاتورة مورد + تحديث مخزون</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">9</span></td><td>الموردين</td><td>ملف مورد + مديونيات + سجل التعامل</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">10</span></td><td>العملاء</td><td>ملف عميل + سجل وصفات + نقاط ولاء</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">11</span></td><td>سجل المبيعات</td><td>كل الفواتير + بحث + طباعة + تعديل</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">12</span></td><td>المرتجعات</td><td>إرجاع بيع أو مشتريات + تحديث مخزون</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">13</span></td><td>الخزينة اليومية</td><td>فتح وإغلاق يوم + مبيعات + خزينة</td><td><span class="badge badge-pharm">مالي</span></td></tr>
          <tr><td><span class="num">14</span></td><td>التقارير المالية</td><td>مبيعات، أرباح، ضرائب — PDF + Excel</td><td><span class="badge badge-report">تقرير</span></td></tr>
          <tr><td><span class="num">15</span></td><td>طباعة باركود وملصقات</td><td>طباعة ملصقات أسعار بالجملة</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">16</span></td><td>إدارة المستخدمين</td><td>إضافة + صلاحيات + Audit Log</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">17</span></td><td>الإعدادات</td><td>بيانات الصيدلية، النسخ الاحتياطي، الضرائب</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">+</span></td><td>Web Dashboard (ويب)</td><td>React — متابعة المالك عن بعد</td><td><span class="badge badge-report">ويب</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- TECH STACK -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-amber">🔧</div>
      <div>
        <div class="section-title">التقنيات المستخدمة</div>
        <div class="section-sub">Stack ديسكتوب + ويب متكامل</div>
      </div>
    </div>

    <div class="tech-grid">
      <div class="tech-item">
        <span class="tech-emoji">🐦</span>
        <div class="tech-name">Flutter Desktop</div>
        <div class="tech-role">تطبيق الديسكتوب (Win/Mac)</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🔴</span>
        <div class="tech-name">Laravel 11</div>
        <div class="tech-role">Backend API + Sanctum Auth</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🗄️</span>
        <div class="tech-name">MySQL + Redis</div>
        <div class="tech-role">قاعدة البيانات + Cache</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">⚛️</span>
        <div class="tech-name">React.js</div>
        <div class="tech-role">Web Dashboard للمالك</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🏷️</span>
        <div class="tech-name">Barcode / QR</div>
        <div class="tech-role">مسح وطباعة الباركود</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🖨️</span>
        <div class="tech-name">Thermal Printer</div>
        <div class="tech-role">فواتير وملصقات أسعار</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">📄</span>
        <div class="tech-name">PDF + Excel Export</div>
        <div class="tech-role">تقارير مالية وجرد</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">💾</span>
        <div class="tech-name">Auto Backup</div>
        <div class="tech-role">نسخ احتياطي تلقائي يومي</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">⚡</span>
        <div class="tech-name">Laravel Echo</div>
        <div class="tech-role">تنبيهات Real-time</div>
      </div>
    </div>
  </div>

  <!-- TIMELINE -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-teal">📅</div>
      <div>
        <div class="section-title">خطة التنفيذ</div>
        <div class="section-sub">15 أسبوع تسليم كامل</div>
      </div>
    </div>

    <div class="card" style="padding: 26px;">
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-dot">🎨</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 1 – 2</div>
            <div class="tl-title">UI/UX Design</div>
            <div class="tl-desc">تصميم كل الشاشات على Figma — ديسكتوب + Web Dashboard. موافقة العميل قبل التطوير.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">⚙️</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 3 – 4</div>
            <div class="tl-title">Laravel Backend + قاعدة الأدوية</div>
            <div class="tl-desc">قاعدة البيانات، Auth، APIs، وبناء قاعدة بيانات الأدوية بالمادة الفعالة والبدائل والتصنيفات.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🧾</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 5 – 7</div>
            <div class="tl-title">POS الكاشير + المبيعات</div>
            <div class="tl-desc">شاشة الكاشير السريعة، الباركود، الفواتير الحرارية، المرتجعات، وإغلاق اليوم.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">💊</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 8 – 10</div>
            <div class="tl-title">المخزون + الوصفات + الموردين</div>
            <div class="tl-desc">إدارة مخزون الأدوية الكامل، الوصفات الطبية، فواتير الشراء، الموردين، والمرتجعات.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🚨</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 11 – 12</div>
            <div class="tl-title">التنبيهات + العملاء + الخزينة</div>
            <div class="tl-desc">تنبيه انتهاء الصلاحية، نقص المخزون، ملفات العملاء، نقاط الولاء، والخزينة اليومية.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">📊</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 13</div>
            <div class="tl-title">التقارير + الطباعة</div>
            <div class="tl-desc">تقارير مالية PDF وExcel، طباعة ملصقات الأسعار، والنسخ الاحتياطي التلقائي.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🌐</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 14</div>
            <div class="tl-title">Web Dashboard (React)</div>
            <div class="tl-desc">لوحة تحكم المالك: مبيعات، مخزون، تنبيهات، تقارير — من أي متصفح أو موبايل.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🧪</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 15</div>
            <div class="tl-title">Testing & Delivery</div>
            <div class="tl-desc">اختبار شامل، إصلاح بجز، Setup Installer للـ Windows، وتسليم السورس كود الكامل.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PRICING -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-green">💰</div>
      <div>
        <div class="section-title">عرض الأسعار</div>
        <div class="section-sub">3 باقات حسب احتياج العميل</div>
      </div>
    </div>

    <div class="pricing-grid">

      <div class="plan-card">
        <div class="plan-name">🥉 باقة Starter</div>
        <div class="plan-price">55,000<small> ج</small></div>
        <div class="plan-dur">تسليم 9 أسابيع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop Windows</li>
          <li><span class="ck">✓</span> POS كاشير أساسي</li>
          <li><span class="ck">✓</span> مخزون أدوية + باركود</li>
          <li><span class="ck">✓</span> فواتير + طباعة حرارية</li>
          <li><span class="ck">✓</span> تنبيه انتهاء صلاحية</li>
          <li><span class="ck">✓</span> تقارير أساسية PDF</li>
          <li><span class="xx">✗</span> وصفات طبية</li>
          <li><span class="xx">✗</span> ملف عملاء + ولاء</li>
          <li><span class="xx">✗</span> Web Dashboard</li>
        </ul>
        <button class="plan-btn outline">اختر هذه الباقة</button>
      </div>

      <div class="plan-card featured">
        <div class="plan-name">🥇 باقة Professional</div>
        <div class="plan-price">115,000<small> ج</small></div>
        <div class="plan-dur">تسليم 15 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop Win + Mac</li>
          <li><span class="ck">✓</span> كل الـ Starter</li>
          <li><span class="ck">✓</span> وصفات طبية كاملة</li>
          <li><span class="ck">✓</span> قاعدة بيانات الأدوية + بدائل</li>
          <li><span class="ck">✓</span> ملف عملاء + نقاط ولاء</li>
          <li><span class="ck">✓</span> موردين + مرتجعات</li>
          <li><span class="ck">✓</span> خزينة + تقارير مالية</li>
          <li><span class="ck">✓</span> Web Dashboard (React)</li>
        </ul>
        <button class="plan-btn solid">اختر هذه الباقة</button>
      </div>

      <div class="plan-card">
        <div class="plan-name">💎 باقة Enterprise</div>
        <div class="plan-price">170,000<small> ج</small></div>
        <div class="plan-dur">تسليم 20 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> كل حاجة في Professional</li>
          <li><span class="ck">✓</span> تطبيق موبايل للعميل</li>
          <li><span class="ck">✓</span> توصيل أدوية (Delivery)</li>
          <li><span class="ck">✓</span> تكامل مع HIS طبي</li>
          <li><span class="ck">✓</span> Multi-Branch صيدليات</li>
          <li><span class="ck">✓</span> تحليل تفاعلات دوائية AI</li>
          <li><span class="ck">✓</span> دعم 3 أشهر مجاناً</li>
          <li><span class="ck">✓</span> سيرفر مُعدّ ومُأمَّن</li>
        </ul>
        <button class="plan-btn outline">اختر هذه الباقة</button>
      </div>

    </div>
  </div>

  <!-- NOTE -->
  <div class="note-box">
    <div class="icon">⚠️</div>
    <div class="text">
      الأسعار لا تشمل: رسوم استضافة الـ Backend (~1,500 – 3,000 ج/شهر)، أجهزة الباركود Scanner الخارجية (~500 – 2,000 ج)، والطابعة الحرارية (~1,500 – 3,500 ج). قاعدة بيانات الأدوية المصرية مدرجة في السعر. البرنامج يشتغل Offline كامل مع Sync عند توفر الإنترنت.
    </div>
  </div>

  <!-- TOTAL -->
  <div class="section">
    <div class="total-box">
      <div class="total-bg-grid"></div>
      <div class="total-glow"></div>
      <div class="total-left">
        <div class="total-lbl">الباقة المقترحة (Professional)</div>
        <div class="total-price">115,000 <small>ج.م</small></div>
        <div class="total-note">يمكن تقسيمها على 3 دفعات حسب مراحل التسليم</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="ic">💊</div> قاعدة بيانات أدوية + بدائل</div>
        <div class="total-item"><div class="ic">🧾</div> POS كاشير سريع</div>
        <div class="total-item"><div class="ic">📋</div> وصفات طبية كاملة</div>
        <div class="total-item"><div class="ic">🌐</div> Web Dashboard للمالك</div>
        <div class="total-item"><div class="ic">🛡️</div> ضمان بجز شهر كامل</div>
      </div>
    </div>
  </div>

  <!-- PAYMENT TERMS -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-blue">💸</div>
      <div>
        <div class="section-title">شروط الدفع</div>
        <div class="section-sub">تقسيم على 3 مراحل</div>
      </div>
    </div>

    <div class="card">
      <table class="tbl">
        <thead>
          <tr><th>المرحلة</th><th>التوقيت</th><th>المبلغ</th><th>المستحق عند</th></tr>
        </thead>
        <tbody>
          <tr>
            <td>🔵 دفعة أولى</td>
            <td>عند التعاقد</td>
            <td style="color:var(--primary); font-weight:800;">34,500 ج (30%)</td>
            <td>توقيع العقد وبدء الشغل</td>
          </tr>
          <tr>
            <td>🟡 دفعة ثانية</td>
            <td>بعد الأسبوع 8</td>
            <td style="color:var(--primary); font-weight:800;">57,500 ج (50%)</td>
            <td>تسليم النسخة الأولى (POS + مخزون)</td>
          </tr>
          <tr>
            <td>🟢 دفعة ثالثة</td>
            <td>عند التسليم النهائي</td>
            <td style="color:var(--primary); font-weight:800;">23,000 ج (20%)</td>
            <td>Installer + Web Dashboard + السورس</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- FOOTER -->
  <div style="text-align:center; margin-top:40px; padding-top:28px; border-top:1px solid var(--border);">
    <div style="font-size:22px; font-weight:900; color:var(--text); margin-bottom:8px;">جاهز نبدأ؟ 🚀</div>
    <div style="font-size:14px; color:var(--text2);">العرض ده صالح لمدة 14 يوم من تاريخه — تواصل معنا لأي استفسار أو تعديل</div>
  </div>

</div>
</body>
</html>
