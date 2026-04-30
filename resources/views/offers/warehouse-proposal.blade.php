<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — برنامج إدارة مخزن ومستودع</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --ink:     #0D1117;
    --ink2:    #1C2333;
    --ink3:    #2D3748;
    --teal:    #0EA5A0;
    --teal2:   #14B8A6;
    --teal-pale: #F0FDFA;
    --teal-glow: rgba(14,165,160,0.12);
    --amber:   #D97706;
    --amber-pale: #FFFBEB;
    --red:     #DC2626;
    --green:   #059669;
    --green-pale: #ECFDF5;
    --blue:    #2563EB;
    --blue-pale: #EFF6FF;
    --text:    #1A202C;
    --text2:   #4A5568;
    --text3:   #718096;
    --border:  #E2E8F0;
    --bg:      #F7FAFC;
    --white:   #FFFFFF;
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
    background: var(--ink);
    border-radius: 20px;
    padding: 48px 48px 40px;
    margin-bottom: 28px;
    position: relative;
    overflow: hidden;
  }

  .header-grid {
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(14,165,160,0.06) 1px, transparent 1px),
      linear-gradient(90deg, rgba(14,165,160,0.06) 1px, transparent 1px);
    background-size: 40px 40px;
  }

  .header-glow {
    position: absolute;
    top: -80px; left: -80px;
    width: 360px; height: 360px;
    background: radial-gradient(circle, rgba(14,165,160,0.18) 0%, transparent 65%);
    border-radius: 50%;
  }

  .header-glow2 {
    position: absolute;
    bottom: -60px; right: 40px;
    width: 260px; height: 260px;
    background: radial-gradient(circle, rgba(37,99,235,0.12) 0%, transparent 65%);
    border-radius: 50%;
  }

  .header-top {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 32px; position: relative; z-index: 1; flex-wrap: wrap; gap: 12px;
  }

  .brand { display: flex; align-items: center; gap: 14px; }

  .brand-icon {
    width: 52px; height: 52px;
    background: var(--teal);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    box-shadow: 0 8px 24px rgba(14,165,160,0.4);
  }

  .brand-name { font-size: 20px; font-weight: 900; color: white; }
  .brand-sub  { font-size: 13px; color: rgba(255,255,255,0.45); }

  .proposal-badge {
    background: rgba(14,165,160,0.2);
    border: 1px solid rgba(14,165,160,0.45);
    color: #5EEAD4;
    padding: 6px 18px; border-radius: 100px;
    font-size: 13px; font-weight: 600;
  }

  .header-body { position: relative; z-index: 1; }

  .header-body h1 {
    font-size: 36px; font-weight: 900; color: white;
    line-height: 1.3; margin-bottom: 10px;
  }

  .header-body h1 span { color: var(--teal2); }
  .header-body p { color: rgba(255,255,255,0.5); font-size: 15px; }

  .header-meta {
    display: flex; gap: 20px; margin-top: 28px;
    position: relative; z-index: 1; flex-wrap: wrap;
  }

  .meta-item {
    display: flex; align-items: center; gap: 8px;
    color: rgba(255,255,255,0.6); font-size: 13px;
  }

  .meta-dot { width: 7px; height: 7px; background: var(--teal2); border-radius: 50%; }

  /* ===== SECTION ===== */
  .section { margin-bottom: 28px; }

  .section-header { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }

  .section-icon {
    width: 40px; height: 40px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
  }

  .si-teal   { background: var(--teal-pale); }
  .si-green  { background: var(--green-pale); }
  .si-blue   { background: var(--blue-pale); }
  .si-amber  { background: var(--amber-pale); }

  .section-title { font-size: 20px; font-weight: 800; }
  .section-sub   { font-size: 13px; color: var(--text3); margin-top: 2px; }

  /* ===== CARD ===== */
  .card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 16px; overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
  }

  /* ===== INFO BOX ===== */
  .info-box {
    background: var(--teal-pale); border: 1px solid rgba(14,165,160,0.25);
    border-radius: 12px; padding: 16px 20px;
    display: flex; gap: 12px; margin-bottom: 16px;
  }

  .info-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; color: #134E4A; line-height: 1.7; }

  /* ===== FEATURES GRID ===== */
  .features-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .feat-card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 20px;
    transition: box-shadow 0.2s, border-color 0.2s;
  }

  .feat-card:hover { box-shadow: 0 4px 18px rgba(14,165,160,0.1); border-color: var(--teal2); }

  .feat-icon  { font-size: 24px; margin-bottom: 10px; display: block; }
  .feat-title { font-size: 15px; font-weight: 700; margin-bottom: 6px; }
  .feat-desc  { font-size: 13px; color: var(--text2); line-height: 1.6; }
  .feat-tags  { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 10px; }

  .tag { font-size: 11px; font-weight: 600; padding: 3px 9px; border-radius: 100px; }
  .tag-teal  { background: var(--teal-pale);  color: var(--teal); }
  .tag-green { background: var(--green-pale); color: var(--green); }
  .tag-blue  { background: var(--blue-pale);  color: var(--blue); }
  .tag-amber { background: var(--amber-pale); color: var(--amber); }

  /* ===== SCREENS TABLE ===== */
  .tbl { width: 100%; border-collapse: collapse; }

  .tbl thead tr { background: var(--ink); }

  .tbl thead th {
    padding: 13px 18px; text-align: right;
    color: rgba(255,255,255,0.7); font-size: 13px; font-weight: 600;
  }

  .tbl tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
  .tbl tbody tr:hover { background: var(--bg); }
  .tbl tbody tr:last-child { border-bottom: none; }

  .tbl tbody td { padding: 12px 18px; font-size: 13px; color: var(--text2); }
  .tbl tbody td:first-child { font-weight: 700; color: var(--text); }

  .num {
    display: inline-flex; align-items: center; justify-content: center;
    width: 26px; height: 26px;
    background: var(--teal-pale); color: var(--teal);
    border-radius: 6px; font-size: 12px; font-weight: 700;
    margin-left: 8px;
  }

  .badge { font-size: 11px; font-weight: 600; padding: 2px 9px; border-radius: 100px; }
  .badge-core   { background: var(--blue-pale);  color: var(--blue); }
  .badge-extra  { background: var(--amber-pale); color: var(--amber); }
  .badge-report { background: var(--green-pale); color: var(--green); }

  /* ===== TECH GRID ===== */
  .tech-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }

  .tech-item {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 12px; padding: 16px; text-align: center;
  }

  .tech-emoji { font-size: 22px; margin-bottom: 8px; display: block; }
  .tech-name  { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
  .tech-role  { font-size: 12px; color: var(--text3); }

  /* ===== TIMELINE ===== */
  .timeline { padding: 0 8px; }

  .tl-item { display: flex; gap: 18px; padding-bottom: 26px; position: relative; }

  .tl-item::before {
    content: ''; position: absolute;
    right: 18px; top: 40px; bottom: 0;
    width: 2px; background: var(--border);
  }

  .tl-item:last-child::before { display: none; }

  .tl-dot {
    width: 38px; height: 38px; border-radius: 50%;
    background: var(--teal-pale); border: 2px solid var(--teal);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; flex-shrink: 0; z-index: 1;
  }

  .tl-body { flex: 1; padding-top: 5px; }
  .tl-week  { font-size: 12px; color: var(--teal); font-weight: 700; margin-bottom: 3px; }
  .tl-title { font-size: 15px; font-weight: 700; margin-bottom: 3px; }
  .tl-desc  { font-size: 13px; color: var(--text2); }

  /* ===== PRICING ===== */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; }

  .plan-card {
    background: var(--white); border: 2px solid var(--border);
    border-radius: 18px; padding: 22px 18px; text-align: center;
    position: relative; transition: transform 0.2s, box-shadow 0.2s;
  }

  .plan-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.09); }

  .plan-card.featured {
    border-color: var(--teal);
    background: linear-gradient(160deg, #fff 55%, var(--teal-pale));
  }

  .plan-card.featured::before {
    content: '⭐ الأكثر طلباً';
    position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
    background: var(--teal); color: white;
    font-size: 11px; font-weight: 700;
    padding: 3px 14px; border-radius: 100px; white-space: nowrap;
  }

  .plan-name  { font-size: 14px; font-weight: 700; color: var(--text2); margin-bottom: 12px; }
  .plan-price { font-size: 36px; font-weight: 900; color: var(--text); line-height: 1; margin-bottom: 4px; }
  .plan-price small { font-size: 15px; font-weight: 500; color: var(--text3); }
  .plan-dur   { font-size: 12px; color: var(--text3); margin-bottom: 16px; }

  .plan-feats { list-style: none; text-align: right; margin-bottom: 18px; }

  .plan-feats li {
    font-size: 12px; color: var(--text2); padding: 5px 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 7px;
  }

  .plan-feats li:last-child { border-bottom: none; }
  .plan-feats li .ck { color: var(--green); font-size: 13px; flex-shrink: 0; }
  .plan-feats li .xx { color: var(--text3); font-size: 13px; flex-shrink: 0; }

  .plan-btn {
    width: 100%; padding: 11px; border-radius: 10px;
    font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700;
    cursor: pointer; border: none; transition: all 0.2s;
  }

  .plan-btn.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }
  .plan-btn.solid   { background: var(--teal); color: white; box-shadow: 0 4px 14px rgba(14,165,160,0.35); }
  .plan-btn.solid:hover { background: var(--teal2); }

  /* ===== TOTAL BOX ===== */
  .total-box {
    background: var(--ink);
    border-radius: 20px; padding: 36px 40px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 24px; flex-wrap: wrap; position: relative; overflow: hidden;
  }

  .total-grid-bg {
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(14,165,160,0.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(14,165,160,0.05) 1px, transparent 1px);
    background-size: 32px 32px;
  }

  .total-glow {
    position: absolute; top: -30px; right: -30px;
    width: 180px; height: 180px;
    background: radial-gradient(circle, rgba(14,165,160,0.2) 0%, transparent 70%);
    border-radius: 50%;
  }

  .total-left { position: relative; z-index: 1; }
  .total-lbl  { color: rgba(255,255,255,0.45); font-size: 13px; margin-bottom: 8px; }

  .total-price {
    font-size: 52px; font-weight: 900; color: white; line-height: 1;
  }

  .total-price small { font-size: 18px; color: rgba(255,255,255,0.5); font-weight: 400; }
  .total-note { font-size: 12px; color: rgba(255,255,255,0.3); margin-top: 8px; }

  .total-right {
    position: relative; z-index: 1;
    display: flex; flex-direction: column; gap: 10px;
  }

  .total-item {
    display: flex; align-items: center; gap: 10px;
    color: rgba(255,255,255,0.65); font-size: 13px;
  }

  .total-item .ic {
    width: 30px; height: 30px;
    background: rgba(255,255,255,0.07); border-radius: 7px;
    display: flex; align-items: center; justify-content: center; font-size: 14px;
  }

  /* ===== NOTE ===== */
  .note-box {
    background: var(--amber-pale); border: 1px solid #fde68a;
    border-radius: 12px; padding: 14px 18px;
    display: flex; gap: 10px; margin-bottom: 24px;
  }

  .note-box .icon { font-size: 18px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 13px; color: #78350f; line-height: 1.7; }

  /* ===== COMPARE ===== */
  .compare-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 20px; }

  .cmp-card {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 14px; padding: 18px 20px;
  }

  .cmp-title { font-size: 14px; font-weight: 800; margin-bottom: 12px; display: flex; align-items: center; gap: 8px; }

  .cmp-list { list-style: none; }

  .cmp-list li {
    font-size: 13px; color: var(--text2); padding: 5px 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: flex-start; gap: 8px;
  }

  .cmp-list li:last-child { border-bottom: none; }
  .cmp-list li .dot { color: var(--teal); flex-shrink: 0; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .features-grid { grid-template-columns: 1fr; }
    .pricing-grid  { grid-template-columns: 1fr; }
    .tech-grid     { grid-template-columns: 1fr 1fr; }
    .compare-grid  { grid-template-columns: 1fr; }
    .header        { padding: 28px 22px; }
    .header-body h1 { font-size: 26px; }
    .total-box     { padding: 26px 22px; }
    .total-price   { font-size: 38px; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="header-grid"></div>
    <div class="header-glow"></div>
    <div class="header-glow2"></div>

    <div class="header-top">
      <div class="brand">
        <div class="brand-icon">🏭</div>
        <div>
          <div class="brand-name">WMS — برنامج إدارة مخزن</div>
          <div class="brand-sub">Flutter Desktop + Laravel Stack</div>
        </div>
      </div>
      <div class="proposal-badge">عرض سعر رسمي</div>
    </div>

    <div class="header-body">
      <h1>برنامج إدارة مخزن<br>ومستودع <span>احترافي</span></h1>
      <p>Warehouse Management System — ديسكتوب + لوحة ويب — من الصفر — بالجنيه المصري</p>
    </div>

    <div class="header-meta">
      <div class="meta-item"><div class="meta-dot"></div> Flutter Desktop</div>
      <div class="meta-item"><div class="meta-dot"></div> Laravel 11 Backend</div>
      <div class="meta-item"><div class="meta-dot"></div> React Admin Panel</div>
      <div class="meta-item"><div class="meta-dot"></div> تسليم 13 أسبوع</div>
      <div class="meta-item"><div class="meta-dot"></div> Barcode + Thermal Print</div>
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
        برنامج WMS متكامل يشتغل على الكمبيوتر (Windows / macOS / Linux) لإدارة المخازن والمستودعات. يشمل: تتبع المخزون بالباركود، حركات الوارد والصادر، إدارة الموردين وأوامر الشراء، تنبيهات نقص المخزون والانتهاء، جرد دوري، وتقارير شاملة — كل ده مع لوحة تحكم ويب للمديرين عن بعد.
      </div>
    </div>

    <div style="display:flex; gap:10px; flex-wrap:wrap;">
      <div style="background:var(--teal-pale); color:var(--teal); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">🖥️ Flutter Desktop</div>
      <div style="background:var(--green-pale); color:var(--green); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📦 إدارة مخزون كاملة</div>
      <div style="background:var(--blue-pale); color:var(--blue); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">📊 تقارير PDF + Excel</div>
      <div style="background:var(--amber-pale); color:var(--amber); padding:7px 14px; border-radius:10px; font-size:13px; font-weight:700;">🔔 تنبيهات ذكية</div>
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

      <div class="feat-card">
        <span class="feat-icon">📦</span>
        <div class="feat-title">إدارة المنتجات والفئات</div>
        <div class="feat-desc">إضافة وتعديل المنتجات، صور، وحدات القياس، الفئات والأقسام، الحد الأدنى للمخزون، وسعر التكلفة.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">باركود</span>
          <span class="tag tag-blue">صور</span>
          <span class="tag tag-green">كاتيجوريز</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">📥</span>
        <div class="feat-title">حركات الوارد (استلام)</div>
        <div class="feat-desc">تسجيل عمليات الاستلام من الموردين، ربط بأمر الشراء، تحديث المخزون تلقائياً، طباعة استلام.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">فاتورة وارد</span>
          <span class="tag tag-blue">ربط PO</span>
          <span class="tag tag-green">طباعة</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">📤</span>
        <div class="feat-title">حركات الصادر (صرف)</div>
        <div class="feat-desc">صرف للإنتاج أو المبيعات أو الأقسام، أذون صرف، تتبع المستلم، وحركة المخزون اللحظية.</div>
        <div class="feat-tags">
          <span class="tag tag-amber">إذن صرف</span>
          <span class="tag tag-teal">FIFO</span>
          <span class="tag tag-blue">تتبع</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🏷️</span>
        <div class="feat-title">نظام الباركود</div>
        <div class="feat-desc">مسح باركود بالكاميرا أو Scanner خارجي، طباعة ملصقات باركود، بحث سريع بالكود، وربط بالمنتج.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">Scanner</span>
          <span class="tag tag-blue">طباعة ملصقات</span>
          <span class="tag tag-green">QR Code</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🚨</span>
        <div class="feat-title">التنبيهات الذكية</div>
        <div class="feat-desc">تنبيه نقص المخزون عند الوصول للحد الأدنى، تنبيه انتهاء الصلاحية مبكراً، تنبيه أوامر الشراء المعلقة.</div>
        <div class="feat-tags">
          <span class="tag tag-amber">نقص مخزون</span>
          <span class="tag tag-teal">صلاحية</span>
          <span class="tag tag-blue">Notification</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🤝</span>
        <div class="feat-title">إدارة الموردين</div>
        <div class="feat-desc">ملف كامل لكل مورد، سجل المشتريات منه، الأسعار، شروط الدفع، ومقارنة الأسعار.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">ملف مورد</span>
          <span class="tag tag-green">سجل مشتريات</span>
          <span class="tag tag-blue">مقارنة أسعار</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🛒</span>
        <div class="feat-title">أوامر الشراء (PO)</div>
        <div class="feat-desc">إنشاء طلب شراء، إرسال للمورد، متابعة حالة الطلب، ربط الاستلام بالأمر، وتتبع الفارق.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">PO</span>
          <span class="tag tag-amber">حالة الطلب</span>
          <span class="tag tag-green">ربط استلام</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🔄</span>
        <div class="feat-title">الجرد الدوري</div>
        <div class="feat-desc">جرد كامل أو جزئي، مقارنة الفعلي بالنظام، تسجيل الفروقات، تقرير الجرد مع التوقيعات.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">جرد كامل</span>
          <span class="tag tag-blue">فروقات</span>
          <span class="tag tag-green">تقرير PDF</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">📊</span>
        <div class="feat-title">التقارير والإحصاءات</div>
        <div class="feat-desc">تقرير حركة المخزون، الأكثر صرفاً، الأبطأ حركة، قيمة المخزون، تقارير PDF وExcel قابلة للطباعة.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">PDF</span>
          <span class="tag tag-green">Excel</span>
          <span class="tag tag-blue">Charts</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">👥</span>
        <div class="feat-title">إدارة المستخدمين والصلاحيات</div>
        <div class="feat-desc">مستويات صلاحيات متعددة (مدير — أمين مخزن — مشاهد)، سجل تدقيق لكل عملية، وحماية البيانات.</div>
        <div class="feat-tags">
          <span class="tag tag-amber">Roles</span>
          <span class="tag tag-teal">Audit Log</span>
          <span class="tag tag-blue">Permissions</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🖨️</span>
        <div class="feat-title">الطباعة الحرارية</div>
        <div class="feat-desc">طباعة أذون الصرف والاستلام على Thermal Printer، ملصقات باركود، وتقارير مخصصة.</div>
        <div class="feat-tags">
          <span class="tag tag-teal">Thermal Printer</span>
          <span class="tag tag-green">ملصقات</span>
        </div>
      </div>

      <div class="feat-card">
        <span class="feat-icon">🌐</span>
        <div class="feat-title">لوحة تحكم ويب (للمدير)</div>
        <div class="feat-desc">داشبورد React يتيح للمدير متابعة المخزون عن بعد، التقارير، الموردين، والمستخدمين من أي متصفح.</div>
        <div class="feat-tags">
          <span class="tag tag-blue">React.js</span>
          <span class="tag tag-teal">Real-time</span>
          <span class="tag tag-green">Dashboard</span>
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
        <div class="section-sub">تفصيل كل شاشة في التطبيق</div>
      </div>
    </div>

    <div class="card">
      <table class="tbl">
        <thead>
          <tr>
            <th>#</th>
            <th>الشاشة</th>
            <th>الوصف</th>
            <th>النوع</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><span class="num">1</span></td><td>تسجيل الدخول + صلاحيات</td><td>Login بـ Username/Password + Role-based</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">2</span></td><td>الداشبورد الرئيسي</td><td>ملخص المخزون، التنبيهات، الحركات الأخيرة</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">3</span></td><td>إدارة المنتجات</td><td>قائمة + إضافة + تعديل + باركود</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">4</span></td><td>الفئات والأقسام</td><td>شجرة فئات المنتجات</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">5</span></td><td>شاشة الوارد (استلام)</td><td>تسجيل الاستلام + باركود + طباعة</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">6</span></td><td>شاشة الصادر (صرف)</td><td>إذن صرف + تحديد المستلم + طباعة</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">7</span></td><td>الرصيد الحالي للمخزون</td><td>رصيد كل منتج + فلتر + بحث</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">8</span></td><td>حركات المخزون</td><td>كل حركة وارد وصادر بالتاريخ</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">9</span></td><td>الموردين</td><td>قائمة + ملف مورد + سجل التعامل</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">10</span></td><td>أوامر الشراء (PO)</td><td>إنشاء + متابعة + ربط بالاستلام</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">11</span></td><td>طباعة الباركود</td><td>طباعة ملصقات باركود / QR بالجملة</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">12</span></td><td>التنبيهات</td><td>نقص مخزون + انتهاء صلاحية + PO معلق</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">13</span></td><td>الجرد الدوري</td><td>إنشاء جرد + تسجيل فعلي + تقرير فروقات</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">14</span></td><td>التقارير</td><td>حركة المخزون، قيمة المخزون، الموردين</td><td><span class="badge badge-core">أساسي</span></td></tr>
          <tr><td><span class="num">15</span></td><td>إدارة المستخدمين</td><td>إضافة مستخدم + صلاحيات + Audit Log</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">16</span></td><td>إعدادات البرنامج</td><td>بيانات الشركة، النسخ الاحتياطي، اللغة</td><td><span class="badge badge-extra">إضافي</span></td></tr>
          <tr><td><span class="num">+</span></td><td>Web Dashboard (ويب)</td><td>React — متابعة عن بعد للمدير</td><td><span class="badge badge-report">ويب</span></td></tr>
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
        <div class="tech-role">تطبيق الديسكتوب (Win/Mac/Linux)</div>
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
        <span class="tech-emoji">🏷️</span>
        <div class="tech-name">Barcode / QR</div>
        <div class="tech-role">مسح وطباعة الباركود</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🖨️</span>
        <div class="tech-name">Thermal Printer</div>
        <div class="tech-role">طباعة أذون وملصقات</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">📄</span>
        <div class="tech-name">PDF + Excel Export</div>
        <div class="tech-role">تصدير التقارير</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">💾</span>
        <div class="tech-name">Auto Backup</div>
        <div class="tech-role">نسخ احتياطي تلقائي</div>
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
        <div class="section-sub">13 أسبوع تسليم كامل</div>
      </div>
    </div>
    <div class="card" style="padding: 26px;">
      <div class="timeline">
        <div class="tl-item">
          <div class="tl-dot">🎨</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 1 – 2</div>
            <div class="tl-title">UI/UX Design</div>
            <div class="tl-desc">تصميم كل الشاشات على Figma — ديسكتوب + داشبورد ويب. موافقة العميل قبل التطوير.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">⚙️</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 3 – 4</div>
            <div class="tl-title">Laravel Backend</div>
            <div class="tl-desc">قاعدة البيانات، Auth، APIs للمنتجات، الفئات، الموردين، الحركات، والمستخدمين.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🖥️</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 5 – 8</div>
            <div class="tl-title">Flutter Desktop (Core)</div>
            <div class="tl-desc">الداشبورد، إدارة المنتجات، شاشات الوارد والصادر، الرصيد الحالي، وربط الباركود.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🛒</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 9 – 10</div>
            <div class="tl-title">الموردين + PO + الجرد</div>
            <div class="tl-desc">أوامر الشراء، إدارة الموردين، الجرد الدوري، والتنبيهات الذكية.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">📊</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 11</div>
            <div class="tl-title">التقارير + طباعة</div>
            <div class="tl-desc">كل التقارير PDF وExcel، طباعة الباركود، الطابعة الحرارية، والنسخ الاحتياطي.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🌐</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 12</div>
            <div class="tl-title">Web Dashboard (React)</div>
            <div class="tl-desc">لوحة التحكم للمدير: مخزون، حركات، تنبيهات، تقارير — من المتصفح.</div>
          </div>
        </div>
        <div class="tl-item">
          <div class="tl-dot">🧪</div>
          <div class="tl-body">
            <div class="tl-week">الأسبوع 13</div>
            <div class="tl-title">Testing & Delivery</div>
            <div class="tl-desc">اختبار شامل، إصلاح بجز، تجهيز Setup Installer، وتسليم السورس كود الكامل.</div>
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
        <div class="plan-price">45,000<small> ج</small></div>
        <div class="plan-dur">تسليم 8 أسابيع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop (Windows)</li>
          <li><span class="ck">✓</span> إدارة منتجات + باركود</li>
          <li><span class="ck">✓</span> وارد وصادر أساسي</li>
          <li><span class="ck">✓</span> رصيد حالي + تقارير</li>
          <li><span class="ck">✓</span> تنبيه نقص مخزون</li>
          <li><span class="xx">✗</span> أوامر شراء PO</li>
          <li><span class="xx">✗</span> جرد دوري</li>
          <li><span class="xx">✗</span> Web Dashboard</li>
        </ul>
        <button class="plan-btn outline">اختر هذه الباقة</button>
      </div>

      <div class="plan-card featured">
        <div class="plan-name">🥇 باقة Professional</div>
        <div class="plan-price">80,000<small> ج</small></div>
        <div class="plan-dur">تسليم 13 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> Flutter Desktop (Win/Mac)</li>
          <li><span class="ck">✓</span> كل موديولات الـ Starter</li>
          <li><span class="ck">✓</span> موردين + أوامر شراء PO</li>
          <li><span class="ck">✓</span> جرد دوري كامل</li>
          <li><span class="ck">✓</span> تنبيه انتهاء صلاحية</li>
          <li><span class="ck">✓</span> PDF + Excel تقارير</li>
          <li><span class="ck">✓</span> طباعة حرارية + باركود</li>
          <li><span class="ck">✓</span> Web Dashboard (React)</li>
        </ul>
        <button class="plan-btn solid">اختر هذه الباقة</button>
      </div>

      <div class="plan-card">
        <div class="plan-name">💎 باقة Enterprise</div>
        <div class="plan-price">120,000<small> ج</small></div>
        <div class="plan-dur">تسليم 18 أسبوع</div>
        <ul class="plan-feats">
          <li><span class="ck">✓</span> كل حاجة في Professional</li>
          <li><span class="ck">✓</span> Multi-warehouse دعم</li>
          <li><span class="ck">✓</span> تحويل بين المخازن</li>
          <li><span class="ck">✓</span> تكامل مع نظام محاسبة</li>
          <li><span class="ck">✓</span> موبايل تطبيق للمندوب</li>
          <li><span class="ck">✓</span> Advanced Analytics</li>
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
      الأسعار لا تشمل: رسوم الاستضافة للـ Backend (~1,500 – 3,000 ج/شهر)، أجهزة الباركود Scanner الخارجية، والطابعة الحرارية. Setup Installer للـ Windows مدرج في السعر. البرنامج يشتغل Offline بشكل كامل مع Sync عند توفر الإنترنت.
    </div>
  </div>

  <!-- TOTAL -->
  <div class="section">
    <div class="total-box">
      <div class="total-grid-bg"></div>
      <div class="total-glow"></div>
      <div class="total-left">
        <div class="total-lbl">الباقة المقترحة (Professional)</div>
        <div class="total-price">80,000 <small>ج.م</small></div>
        <div class="total-note">يمكن تقسيمها على 3 دفعات حسب مراحل التسليم</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="ic">🖥️</div> Flutter Desktop Win + Mac</div>
        <div class="total-item"><div class="ic">🔴</div> Laravel 11 API</div>
        <div class="total-item"><div class="ic">🏷️</div> Barcode + طباعة حرارية</div>
        <div class="total-item"><div class="ic">📊</div> PDF + Excel تقارير</div>
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
            <td style="color:var(--teal); font-weight:800;">24,000 ج (30%)</td>
            <td>توقيع العقد وبدء الشغل</td>
          </tr>
          <tr>
            <td>🟡 دفعة ثانية</td>
            <td>بعد الأسبوع 7</td>
            <td style="color:var(--teal); font-weight:800;">40,000 ج (50%)</td>
            <td>تسليم النسخة الأولى للتجربة</td>
          </tr>
          <tr>
            <td>🟢 دفعة ثالثة</td>
            <td>عند التسليم النهائي</td>
            <td style="color:var(--teal); font-weight:800;">16,000 ج (20%)</td>
            <td>تسليم Installer + السورس كود</td>
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
