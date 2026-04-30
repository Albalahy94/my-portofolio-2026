<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — برنامج محاسبة للشركات الصغيرة</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --primary:      #1E40AF;
    --primary2:     #3B82F6;
    --primary-pale: #EFF6FF;
    --gold:         #B45309;
    --gold2:        #D97706;
    --gold-pale:    #FFFBEB;
    --ink:          #0A0F1E;
    --ink2:         #111827;
    --ink3:         #1F2A44;
    --green:        #047857;
    --green-pale:   #ECFDF5;
    --red:          #B91C1C;
    --red-pale:     #FEF2F2;
    --purple:       #6D28D9;
    --purple-pale:  #F5F3FF;
    --text:         #1E293B;
    --text2:        #475569;
    --text3:        #94A3B8;
    --border:       #E2E8F0;
    --bg:           #F8FAFC;
    --white:        #FFFFFF;
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
    background: linear-gradient(140deg, var(--ink) 0%, var(--ink2) 50%, var(--ink3) 100%);
    border-radius: 22px;
    padding: 50px 50px 44px;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }

  .h-dots {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(59,130,246,0.08) 1px, transparent 1px);
    background-size: 28px 28px;
  }

  .h-glow1 {
    position: absolute; top: -80px; right: -60px;
    width: 380px; height: 380px;
    background: radial-gradient(circle, rgba(59,130,246,0.2) 0%, transparent 60%);
    border-radius: 50%;
  }

  .h-glow2 {
    position: absolute; bottom: -60px; left: 60px;
    width: 260px; height: 260px;
    background: radial-gradient(circle, rgba(212,163,9,0.12) 0%, transparent 65%);
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
    box-shadow: 0 8px 28px rgba(59,130,246,0.4);
  }

  .brand-name { font-size: 20px; font-weight: 900; color: white; }
  .brand-sub  { font-size: 12px; color: rgba(255,255,255,0.45); }

  .proposal-badge {
    background: rgba(59,130,246,0.18);
    border: 1px solid rgba(59,130,246,0.4);
    color: #93C5FD; padding: 6px 18px;
    border-radius: 100px; font-size: 13px; font-weight: 600;
  }

  .header-body { position: relative; z-index: 1; }

  .header-body h1 {
    font-size: 36px; font-weight: 900; color: white;
    line-height: 1.28; margin-bottom: 10px;
  }

  .header-body h1 span { color: #93C5FD; }
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

  /* ===== KPIS ===== */
  .kpis {
    display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px;
    margin-bottom: 28px;
  }

  .kpi {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 16px; text-align: center;
  }

  .kpi-icon  { font-size: 24px; margin-bottom: 8px; }
  .kpi-val   { font-size: 22px; font-weight: 900; color: var(--text); margin-bottom: 3px; }
  .kpi-label { font-size: 12px; color: var(--text3); }

  /* ===== SECTION ===== */
  .section { margin-bottom: 28px; }

  .section-header { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }

  .section-icon {
    width: 40px; height: 40px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
  }

  .si-blue   { background: var(--primary-pale); }
  .si-green  { background: var(--green-pale); }
  .si-gold   { background: var(--gold-pale); }
  .si-purple { background: var(--purple-pale); }
  .si-red    { background: var(--red-pale); }

  .section-title { font-size: 20px; font-weight: 800; color: var(--text); }
  .section-sub   { font-size: 13px; color: var(--text3); margin-top: 2px; }

  /* ===== CARD ===== */
  .card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
    box-shadow: 0 2px 12px rgba(30,64,175,0.05);
  }

  /* ===== INFO BOX ===== */
  .info-box {
    background: var(--primary-pale); border: 1px solid rgba(59,130,246,0.2);
    border-radius: 12px; padding: 16px 20px;
    display: flex; gap: 12px; margin-bottom: 18px;
  }

  .info-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; color: #1E3A8A; line-height: 1.7; }

  /* ===== MODULES ===== */
  .modules-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .mod-card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 20px;
    transition: box-shadow 0.2s, border-color 0.2s;
  }

  .mod-card:hover { box-shadow: 0 4px 20px rgba(30,64,175,0.1); border-color: var(--primary2); }

  .mod-card.gold {
    border-color: var(--gold2);
    background: linear-gradient(150deg, #fff 55%, var(--gold-pale));
  }

  .mod-top   { display: flex; align-items: flex-start; justify-content: space-between; gap: 8px; margin-bottom: 8px; }
  .mod-icon  { font-size: 24px; }
  .mod-star  { font-size: 11px; background: var(--gold2); color: white; padding: 2px 8px; border-radius: 100px; font-weight: 700; white-space: nowrap; }
  .mod-title { font-size: 15px; font-weight: 700; color: var(--text); margin-bottom: 6px; }
  .mod-desc  { font-size: 13px; color: var(--text2); line-height: 1.6; }
  .mod-tags  { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }

  .tag { font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 100px; }
  .tag-blue   { background: var(--primary-pale); color: var(--primary); }
  .tag-green  { background: var(--green-pale);   color: var(--green); }
  .tag-gold   { background: var(--gold-pale);    color: var(--gold); }
  .tag-purple { background: var(--purple-pale);  color: var(--purple); }
  .tag-red    { background: var(--red-pale);     color: var(--red); }

  /* ===== TABLE ===== */
  .tbl { width: 100%; border-collapse: collapse; }
  .tbl thead tr { background: var(--ink); }
  .tbl thead th { padding: 13px 18px; text-align: right; color: rgba(255,255,255,0.72); font-size: 13px; font-weight: 600; }
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
  .badge-acc    { background: var(--green-pale);     color: var(--green); }
  .badge-report { background: var(--purple-pale);    color: var(--purple); }
  .badge-extra  { background: var(--gold-pale);      color: var(--gold); }

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

  .plan-card:hover { transform: translateY(-4px); box-shadow: 0 14px 36px rgba(30,64,175,0.1); }

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
  .plan-feats li .ck { color: var(--green); font-size: 13px; flex-shrink: 0; }
  .plan-feats li .xx { color: var(--text3);  font-size: 13px; flex-shrink: 0; }

  .plan-btn {
    width: 100%; padding: 11px; border-radius: 10px;
    font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700;
    cursor: pointer; border: none; transition: all 0.2s;
  }

  .plan-btn.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }
  .plan-btn.solid   { background: var(--primary); color: white; box-shadow: 0 4px 14px rgba(30,64,175,0.35); }
  .plan-btn.solid:hover { background: var(--primary2); }

  /* ===== TOTAL BOX ===== */
  .total-box {
    background: linear-gradient(145deg, var(--ink) 0%, var(--ink2) 55%, var(--ink3) 100%);
    border-radius: 20px; padding: 36px 40px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap; position: relative; overflow: hidden;
  }

  .total-dots {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(59,130,246,0.07) 1px, transparent 1px);
    background-size: 24px 24px;
  }

  .total-glow {
    position: absolute; top: -30px; right: -30px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(59,130,246,0.2) 0%, transparent 70%);
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
    width: 30px; height: 30px;
    background: rgba(255,255,255,0.07); border-radius: 7px;
    display: flex; align-items: center; justify-content: center; font-size: 14px;
  }

  /* ===== NOTE ===== */
  .note-box {
    background: var(--gold-pale); border: 1px solid #fde68a;
    border-radius: 12px; padding: 14px 18px;
    display: flex; gap: 10px; margin-bottom: 24px;
  }

  .note-box .icon { font-size: 18px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 13px; color: #78350f; line-height: 1.7; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .kpis          { grid-template-columns: 1fr 1fr; }
    .modules-grid  { grid-template-columns: 1fr; }
    .pricing-grid  { grid-template-columns: 1fr; }
    .tech-grid     { grid-template-columns: 1fr 1fr; }
    .header        { padding: 28px 22px; }
    .header-body h1 { font-size: 26px; }
    .total-box     { padding: 26px 22px; }
    .total-price   { font-size: 40px; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="h-dots"></div>
    <div class="h-glow1"></div>
    <div class="h-glow2"></div>

    <div class="header-top">
      <div class="brand">
        <div class="brand-icon">📒</div>
        <div>
          <div class="brand-name">برنامج محاسبة — الشركات الصغيرة</div>
          <div class="brand-sub">Flutter Desktop + Laravel Stack</div>
        </div>
      </div>
      <div class="proposal-badge">عرض سعر رسمي</div>
    </div>

    <div class="header-body">
      <h1>برنامج محاسبة متكامل<br><span>للشركات والمحلات الصغيرة</span></h1>
      <p>فواتير • قيود محاسبية • ميزانية • أرباح وخسائر • ضرائب — Flutter Desktop + Laravel 11</p>
    </div>

    <div class="header-pills">
      <div class="pill"><div class="pill-dot"></div> Flutter Desktop</div>
      <div class="pill"><div class="pill-dot"></div> Laravel 11 Backend</div>
      <div class="pill"><div class="pill-dot"></div> محاسبة القيد المزدوج</div>
      <div class="pill"><div class="pill-dot"></div> PDF + Excel تقارير</div>
      <div class="pill"><div class="pill-dot"></div> تسليم 16 أسبوع</div>
    </div>
  </div>

  <!-- KPIS -->
  <div class="kpis">
    <div class="kpi">
      <div class="kpi-icon">🖥️</div>
      <div class="kpi-val">3</div>
      <div class="kpi-label">أنظمة تشغيل (Win/Mac/Linux)</div>
    </div>
    <div class="kpi">
      <div class="kpi-icon">📋</div>
      <div class="kpi-val">20+</div>
      <div class="kpi-label">شاشة وموديول</div>
    </div>
    <div class="kpi">
      <div class="kpi-icon">📊</div>
      <div class="kpi-val">15+</div>
      <div class="kpi-label">تقرير مالي متخصص</div>
    </div>
    <div class="kpi">
      <div class="kpi-icon">📅</div>
      <div class="kpi-val">16</div>
      <div class="kpi-label">أسبوع تسليم كامل</div>
    </div>
  </div>

  <!-- OVERVIEW -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-blue">🔍</div>
      <div>
        <div class="section-title">نظرة عامة</div>
        <div class="section-sub">إيه اللي هنبنيه بالضبط</div>
      </div>
    </div>

    <div class="info-box">
      <div class="icon">💡</div>
      <div class="text">
        برنامج محاسبة احترافي يشتغل على الكمبيوتر (Windows / macOS / Linux) مصمم خصيصاً للشركات والمحلات الصغيرة والمتوسطة. يشمل: <strong>إصدار وتتبع الفواتير</strong>، <strong>نظام القيد المزدوج الكامل</strong>، <strong>إدارة الحسابات والدفاتر</strong>، <strong>تقارير الأرباح والخسائر والميزانية العمومية</strong>، وتقارير ضريبة القيمة المضافة — مع لوحة تحكم ويب للمدير لمتابعة الوضع المالي عن بعد.
      </div>
    </div>

    <div style="display:flex; gap:10px; flex-wrap:wrap;">
      <div style="background:var(--primary-pale); color:var(--primary); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📒 قيد مزدوج كامل</div>
      <div style="background:var(--green-pale); color:var(--green); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">🧾 فواتير مبيعات ومشتريات</div>
      <div style="background:var(--gold-pale); color:var(--gold); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📊 ميزانية + أرباح وخسائر</div>
      <div style="background:var(--purple-pale); color:var(--purple); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">💸 ضريبة القيمة المضافة</div>
      <div style="background:var(--red-pale); color:var(--red); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">💱 متعدد العملات</div>
    </div>
  </div>

  <!-- MODULES -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-purple">⚙️</div>
      <div>
        <div class="section-title">الموديولات والفيتشرز</div>
        <div class="section-sub">كل جزء في البرنامج مفصّل</div>
      </div>
    </div>

    <div class="modules-grid">

      <div class="mod-card gold">
        <div class="mod-top">
          <span class="mod-icon">🧾</span>
          <span class="mod-star">أساسي</span>
        </div>
        <div class="mod-title">فواتير المبيعات</div>
        <div class="mod-desc">إنشاء فواتير احترافية للعملاء بأصناف وخدمات، فواتير مؤجلة، خصومات، ضريبة، طباعة أو إرسال PDF بالإيميل.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">PDF</span>
          <span class="tag tag-green">إيميل</span>
          <span class="tag tag-gold">ضريبة VAT</span>
        </div>
      </div>

      <div class="mod-card gold">
        <div class="mod-top">
          <span class="mod-icon">🛒</span>
          <span class="mod-star">أساسي</span>
        </div>
        <div class="mod-title">فواتير المشتريات</div>
        <div class="mod-desc">تسجيل فواتير الموردين، ربطها بأوامر الشراء، متابعة المدفوع والمتبقي، ومرتجعات المشتريات.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">ربط PO</span>
          <span class="tag tag-gold">مدفوع/متبقي</span>
          <span class="tag tag-green">مرتجعات</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">📒</span>
        <div class="mod-title">دفتر الأستاذ (قيد مزدوج)</div>
        <div class="mod-desc">نظام القيود المحاسبية الكاملة، شجرة الحسابات المخصصة، يومية عامة، تحليل كل حساب على حدة.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">شجرة حسابات</span>
          <span class="tag tag-purple">يومية</span>
          <span class="tag tag-green">ميزان مراجعة</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">👥</span>
        <div class="mod-title">إدارة العملاء والموردين</div>
        <div class="mod-desc">ملف كامل لكل عميل ومورد، سجل فواتيره، رصيد الحساب، مديونيات متأخرة، وتقرير العمر الزمني للديون.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">رصيد حساب</span>
          <span class="tag tag-red">ديون متأخرة</span>
          <span class="tag tag-gold">عمر الدين</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">💵</span>
        <div class="mod-title">إدارة الخزينة والبنوك</div>
        <div class="mod-desc">حسابات بنكية متعددة، حركات الإيداع والسحب، تسوية بنكية، إدارة الشيكات الواردة والصادرة.</div>
        <div class="mod-tags">
          <span class="tag tag-green">تسوية بنكية</span>
          <span class="tag tag-blue">شيكات</span>
          <span class="tag tag-gold">إيداع/سحب</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">📦</span>
        <div class="mod-title">إدارة المخزون والأصناف</div>
        <div class="mod-desc">قائمة الأصناف مع أسعار الشراء والبيع، تحديث تلقائي عند الفواتير، رصيد المخزون الحالي، وتكلفة البضاعة المباعة (COGS).</div>
        <div class="mod-tags">
          <span class="tag tag-blue">COGS</span>
          <span class="tag tag-green">رصيد مخزون</span>
          <span class="tag tag-gold">FIFO</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">💸</span>
        <div class="mod-title">المصاريف والنفقات</div>
        <div class="mod-desc">تسجيل مصاريف الشركة بالفئات (إيجار، رواتب، كهرباء..)، مصاريف متكررة، إرفاق إيصالات، وتقرير المصاريف الشهري.</div>
        <div class="mod-tags">
          <span class="tag tag-red">فئات مصاريف</span>
          <span class="tag tag-blue">متكررة</span>
          <span class="tag tag-gold">إيصالات</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">👷</span>
        <div class="mod-title">الرواتب والموظفين</div>
        <div class="mod-desc">بيانات الموظفين، الراتب الأساسي، البدلات والخصومات، إجمالي الراتب، قسيمة الراتب بـ PDF، ومسير الرواتب الشهري.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">قسيمة راتب</span>
          <span class="tag tag-green">مسير رواتب</span>
          <span class="tag tag-gold">بدلات/خصومات</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">💱</span>
        <div class="mod-title">متعدد العملات</div>
        <div class="mod-desc">فواتير بعملات مختلفة (جنيه — دولار — ريال — يورو)، أسعار صرف يومية، تقارير بالعملة الأساسية وفروق العملة.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">ج.م + $</span>
          <span class="tag tag-gold">أسعار صرف</span>
          <span class="tag tag-green">فروق عملة</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">🧮</span>
        <div class="mod-title">ضريبة القيمة المضافة (VAT)</div>
        <div class="mod-desc">حساب VAT تلقائي على الفواتير، تقرير الضريبة الشهري/الربعي، الضريبة المحصلة والمسددة، وإعداد الإقرار الضريبي.</div>
        <div class="mod-tags">
          <span class="tag tag-purple">VAT 14%</span>
          <span class="tag tag-blue">إقرار ضريبي</span>
          <span class="tag tag-red">ربعي/شهري</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">📊</span>
        <div class="mod-title">التقارير المالية الكاملة</div>
        <div class="mod-desc">قائمة الأرباح والخسائر، الميزانية العمومية، التدفق النقدي، ميزان المراجعة، تقرير العمر الزمني للمديونيات — كلها PDF وExcel.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">P&L</span>
          <span class="tag tag-green">Balance Sheet</span>
          <span class="tag tag-gold">Cash Flow</span>
        </div>
      </div>

      <div class="mod-card">
        <span class="mod-icon">🌐</span>
        <div class="mod-title">لوحة تحكم ويب (للمدير)</div>
        <div class="mod-desc">React Dashboard لمتابعة الوضع المالي عن بعد: مبيعات، أرباح، ديون، مصاريف، وتنبيهات — من أي متصفح.</div>
        <div class="mod-tags">
          <span class="tag tag-blue">React.js</span>
          <span class="tag tag-green">Real-time</span>
          <span class="tag tag-purple">KPIs</span>
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
        <div class="section-sub">تفصيل كامل لكل شاشة</div>
      </div>
    </div>

    <div class="card">
      <table class="tbl">
        <thead>
          <tr><th>#</th><th>الشاشة</th><th>الوصف</th><th>النوع</th></tr>
        </thead>
        <tbody>
          <tr><td><span class="num">1</span></td><td>تسجيل الدخول + صلاحيات</td><td>Login + Role-based (مدير — محاسب — مشاهد)</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">2</span></td><td>الداشبورد المالي</td><td>إجمالي مبيعات، مصاريف، أرباح، تنبيهات</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">3</span></td><td>فواتير المبيعات</td><td>إنشاء + قائمة + طباعة PDF + تتبع</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">4</span></td><td>فواتير المشتريات</td><td>تسجيل فواتير موردين + مرتجعات</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">5</span></td><td>إدارة العملاء</td><td>ملف عميل + رصيد + ديون + سجل</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">6</span></td><td>إدارة الموردين</td><td>ملف مورد + مديونيات + سجل شراء</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">7</span></td><td>الأصناف والمنتجات</td><td>قائمة أصناف + أسعار + رصيد مخزون</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">8</span></td><td>المصاريف والنفقات</td><td>تسجيل مصروف + فئات + إيصالات</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">9</span></td><td>الخزينة والبنوك</td><td>حسابات بنكية + حركات + تسوية</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">10</span></td><td>الشيكات</td><td>شيكات واردة وصادرة + تتبع التحصيل</td><td><span class="badge badge-acc">محاسبي</span></td></tr>
          <tr><td><span class="num">11</span></td><td>دفتر الأستاذ</td><td>شجرة حسابات + يومية عامة + قيود</td><td><span class="badge badge-acc">محاسبي</span></td></tr>
          <tr><td><span class="num">12</span></td><td>قائمة الأرباح والخسائر</td><td>P&L شهري/ربعي/سنوي — PDF</td><td><span class="badge badge-report">تقرير</span></td></tr>
          <tr><td><span class="num">13</span></td><td>الميزانية العمومية</td><td>Balance Sheet في أي تاريخ</td><td><span class="badge badge-report">تقرير</span></td></tr>
          <tr><td><span class="num">14</span></td><td>تقرير التدفق النقدي</td><td>Cash Flow Statement</td><td><span class="badge badge-report">تقرير</span></td></tr>
          <tr><td><span class="num">15</span></td><td>ميزان المراجعة</td><td>Trial Balance بأي فترة</td><td><span class="badge badge-report">تقرير</span></td></tr>
          <tr><td><span class="num">16</span></td><td>تقرير الضريبة (VAT)</td><td>ملخص ضريبي شهري + إقرار</td><td><span class="badge badge-acc">محاسبي</span></td></tr>
          <tr><td><span class="num">17</span></td><td>الرواتب ومسير الرواتب</td><td>موظفين + رواتب + قسائم PDF</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">18</span></td><td>إدارة المستخدمين</td><td>إضافة + صلاحيات + Audit Log</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">19</span></td><td>الإعدادات</td><td>بيانات الشركة، عملات، ضريبة، نسخ احتياطي</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">+</span></td><td>Web Dashboard (ويب)</td><td>React — متابعة المدير عن بعد</td><td><span class="badge badge-report">ويب</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- TECH STACK -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-gold">🔧</div>
      <div>
        <div class="section-title">التقنيات المستخدمة</div>
        <div class="section-sub">Stack ديسكتوب + ويب احترافي</div>
      </div>
    </div>

    <div class="tech-grid">
      <div class="tech-item">
        <span class="tech-emoji">🐦</span>
        <div class="tech-name">Flutter Desktop</div>
        <div class="tech-role">تطبيق (Win / Mac / Linux)</div>
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
        <div class="tech-role">Web Dashboard للمدير</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">📄</span>
        <div class="tech-name">PDF + Excel Export</div>
        <div class="tech-role">فواتير وتقارير مالية</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">📧</span>
        <div class="tech-name">Mail (SMTP)</div>
        <div class="tech-role">إرسال فواتير بالإيميل</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">💾</span>
        <div class="tech-name">Auto Backup</div>
        <div class="tech-role">نسخ احتياطي يومي تلقائي</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">⚡</span>
        <div class="tech-name">Laravel Echo</div>
        <div class="tech-role">تنبيهات Real-time</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🔒</span>
        <div class="tech-name">Encryption + SSL</div>
        <div class="tech-role">حماية البيانات المالية</div>
      </div>
    </div>
  </div>

  <!-- TIMELINE -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon si-blue">📅</div>
      <div>
        <div class="section-title">خطة التنفيذ</div>
        <div class="section-sub">16 أسبوع تسليم كامل</div>
      </div>
    </div>

    <div class="card" style="padding: 26px;">
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-dot">🎨</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 1 – 2</div>
            <div class="tl-title">UI/UX Design</div>
            <div class="tl-desc">تصميم كل الشاشات على Figma — ديسكتوب + Web Dashboard. مراجعة وموافقة العميل قبل التطوير.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🗄️</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 3 – 4</div>
            <div class="tl-title">قاعدة البيانات المحاسبية + Laravel</div>
            <div class="tl-desc">تصميم schema المحاسبة الكاملة (Chart of Accounts، Journal Entries، Ledger)، وبناء APIs الأساسية.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🧾</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 5 – 7</div>
            <div class="tl-title">الفواتير + العملاء + الموردين</div>
            <div class="tl-desc">فواتير مبيعات ومشتريات كاملة، إدارة العملاء والموردين، المرتجعات، وطباعة PDF + إرسال إيميل.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">📒</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 8 – 10</div>
            <div class="tl-title">المحاسبة الكاملة</div>
            <div class="tl-desc">شجرة الحسابات، اليومية العامة، دفتر الأستاذ، الخزينة والبنوك، الشيكات، المصاريف، والرواتب.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">📊</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 11 – 13</div>
            <div class="tl-title">التقارير المالية + الضرائب</div>
            <div class="tl-desc">P&L، Blance Sheet، Cash Flow، ميزان المراجعة، تقرير VAT، وتصدير PDF + Excel لكل تقرير.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🌐</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 14 – 15</div>
            <div class="tl-title">Web Dashboard + متعدد العملات</div>
            <div class="tl-desc">لوحة تحكم React للمدير، دعم العملات المتعددة، أسعار الصرف، والنسخ الاحتياطي التلقائي.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🧪</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 16</div>
            <div class="tl-title">Testing & Delivery</div>
            <div class="tl-desc">اختبار شامل بسيناريوهات محاسبية حقيقية، إصلاح بجز، Installer، وتسليم السورس كود كامل.</div>
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
        <div class="plan-price">60,000<small> ج</small></div>
        <div class="plan-dur">تسليم 10 أسابيع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop Windows</li>
          <li><span class="ck">✓</span> فواتير مبيعات ومشتريات</li>
          <li><span class="ck">✓</span> عملاء + موردين</li>
          <li><span class="ck">✓</span> مصاريف + خزينة</li>
          <li><span class="ck">✓</span> تقارير P&L + PDF</li>
          <li><span class="xx">✗</span> قيد مزدوج / دفتر أستاذ</li>
          <li><span class="xx">✗</span> رواتب موظفين</li>
          <li><span class="xx">✗</span> متعدد العملات</li>
          <li><span class="xx">✗</span> Web Dashboard</li>
        </ul>
        <button class="plan-btn outline">اختر هذه الباقة</button>
      </div>

      <div class="plan-card featured">
        <div class="plan-name">🥇 باقة Professional</div>
        <div class="plan-price">125,000<small> ج</small></div>
        <div class="plan-dur">تسليم 16 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop (Win/Mac)</li>
          <li><span class="ck">✓</span> كل الـ Starter</li>
          <li><span class="ck">✓</span> قيد مزدوج + دفتر أستاذ</li>
          <li><span class="ck">✓</span> رواتب + مسير رواتب</li>
          <li><span class="ck">✓</span> VAT + إقرار ضريبي</li>
          <li><span class="ck">✓</span> متعدد العملات</li>
          <li><span class="ck">✓</span> ميزانية + تدفق نقدي</li>
          <li><span class="ck">✓</span> Web Dashboard (React)</li>
        </ul>
        <button class="plan-btn solid">اختر هذه الباقة</button>
      </div>

      <div class="plan-card">
        <div class="plan-name">💎 باقة Enterprise</div>
        <div class="plan-price">190,000<small> ج</small></div>
        <div class="plan-dur">تسليم 22 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> كل حاجة في Professional</li>
          <li><span class="ck">✓</span> Multi-Branch شركات</li>
          <li><span class="ck">✓</span> تطبيق موبايل للمدير</li>
          <li><span class="ck">✓</span> تكامل مع بوابات دفع</li>
          <li><span class="ck">✓</span> بنود الميزانية (Budgeting)</li>
          <li><span class="ck">✓</span> AI تحليل مالي ذكي</li>
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
      الأسعار لا تشمل: رسوم استضافة الـ Backend (~1,500 – 3,000 ج/شهر)، رسوم SMTP للإيميل (Mailgun/SendGrid)، ورسوم SSL. Setup Installer للـ Windows والـ Mac مدرجة في السعر. البرنامج يعمل Offline بالكامل مع Sync عند توفر الإنترنت.
    </div>
  </div>

  <!-- TOTAL -->
  <div class="section">
    <div class="total-box">
      <div class="total-dots"></div>
      <div class="total-glow"></div>
      <div class="total-left">
        <div class="total-lbl">الباقة المقترحة (Professional)</div>
        <div class="total-price">125,000 <small>ج.م</small></div>
        <div class="total-note">يمكن تقسيمها على 3 دفعات حسب مراحل التسليم</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="ic">📒</div> قيد مزدوج + دفتر أستاذ</div>
        <div class="total-item"><div class="ic">🧾</div> فواتير + عملاء + موردين</div>
        <div class="total-item"><div class="ic">📊</div> 15+ تقرير مالي PDF/Excel</div>
        <div class="total-item"><div class="ic">💱</div> متعدد العملات + VAT</div>
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
            <td style="color:var(--primary); font-weight:800;">37,500 ج (30%)</td>
            <td>توقيع العقد وبدء الشغل</td>
          </tr>
          <tr>
            <td>🟡 دفعة ثانية</td>
            <td>بعد الأسبوع 9</td>
            <td style="color:var(--primary); font-weight:800;">62,500 ج (50%)</td>
            <td>تسليم الفواتير + المحاسبة الكاملة</td>
          </tr>
          <tr>
            <td>🟢 دفعة ثالثة</td>
            <td>عند التسليم النهائي</td>
            <td style="color:var(--primary); font-weight:800;">25,000 ج (20%)</td>
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
