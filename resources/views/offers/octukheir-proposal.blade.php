<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — أكاديمية OctuKheir (Laravel + Flutter)</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --primary: #7C3AED;
    --primary2: #8B5CF6;
    --primary-pale: #F5F3FF;
    --primary-glow: rgba(124,58,237,0.15);
    --accent: #EC4899;
    --accent-pale: #FDF2F8;
    --dark: #0F0A1E;
    --dark2: #1A1035;
    --dark3: #2D1B5E;
    --text: #1E1B4B;
    --text2: #4B5563;
    --text3: #9CA3AF;
    --border: #E5E7EB;
    --bg: #FAFAFF;
    --white: #FFFFFF;
    --green: #10B981;
    --green-pale: #ECFDF5;
    --blue: #3B82F6;
    --blue-pale: #EFF6FF;
    --orange: #F59E0B;
    --orange-pale: #FFFBEB;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Cairo', sans-serif;
    background: var(--bg);
    color: var(--text);
    line-height: 1.7;
  }

  .page {
    max-width: 920px;
    margin: 0 auto;
    padding: 40px 24px 80px;
  }

  /* ===== HEADER ===== */
  .header {
    background: linear-gradient(135deg, #0F0A1E 0%, #1A1035 50%, #2D1B5E 100%);
    border-radius: 24px;
    padding: 48px 48px 40px;
    margin-bottom: 32px;
    position: relative;
    overflow: hidden;
  }

  .header::before {
    content: '';
    position: absolute;
    top: -80px; right: -80px;
    width: 320px; height: 320px;
    background: radial-gradient(circle, rgba(124,58,237,0.25) 0%, transparent 70%);
    border-radius: 50%;
  }

  .header::after {
    content: '';
    position: absolute;
    bottom: -50px; left: 60px;
    width: 240px; height: 240px;
    background: radial-gradient(circle, rgba(236,72,153,0.15) 0%, transparent 70%);
    border-radius: 50%;
  }

  .header-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 32px;
    position: relative; z-index: 1;
    flex-wrap: wrap; gap: 12px;
  }

  .brand { display: flex; align-items: center; gap: 14px; }

  .brand-icon {
    width: 52px; height: 52px;
    background: var(--primary);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    box-shadow: 0 8px 24px rgba(124,58,237,0.45);
  }

  .brand-text .name { font-size: 20px; font-weight: 900; color: white; line-height: 1.2; }
  .brand-text .sub { font-size: 13px; color: rgba(255,255,255,0.5); font-weight: 400; }

  .proposal-badge {
    background: rgba(124,58,237,0.25);
    border: 1px solid rgba(124,58,237,0.5);
    color: #C4B5FD;
    padding: 6px 18px;
    border-radius: 100px;
    font-size: 13px; font-weight: 600;
  }

  .header-title { position: relative; z-index: 1; }

  .header-title h1 {
    font-size: 34px; font-weight: 900;
    color: white; line-height: 1.35;
    margin-bottom: 10px;
  }

  .header-title h1 span { color: #C4B5FD; }
  .header-title p { color: rgba(255,255,255,0.55); font-size: 15px; }

  .header-meta {
    display: flex; gap: 20px;
    margin-top: 28px;
    position: relative; z-index: 1;
    flex-wrap: wrap;
  }

  .meta-item {
    display: flex; align-items: center; gap: 8px;
    color: rgba(255,255,255,0.65); font-size: 13px;
  }

  .meta-item .dot {
    width: 8px; height: 8px;
    background: #A78BFA;
    border-radius: 50%; flex-shrink: 0;
  }

  /* ===== SECTION ===== */
  .section { margin-bottom: 28px; }

  .section-header {
    display: flex; align-items: center; gap: 12px;
    margin-bottom: 18px;
  }

  .section-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; flex-shrink: 0;
  }

  .section-icon.purple { background: var(--primary-pale); }
  .section-icon.green  { background: var(--green-pale); }
  .section-icon.blue   { background: var(--blue-pale); }
  .section-icon.orange { background: var(--orange-pale); }
  .section-icon.pink   { background: var(--accent-pale); }

  .section-title { font-size: 20px; font-weight: 800; }
  .section-subtitle { font-size: 13px; color: var(--text3); font-weight: 400; margin-top: 2px; }

  /* ===== CARD ===== */
  .card {
    background: var(--white);
    border-radius: 16px;
    border: 1px solid var(--border);
    overflow: hidden;
    box-shadow: 0 2px 12px rgba(0,0,0,0.05);
  }

  /* ===== MODULES GRID ===== */
  .modules-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .module-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 20px;
    transition: box-shadow 0.2s, border-color 0.2s;
  }

  .module-card:hover {
    box-shadow: 0 4px 20px rgba(124,58,237,0.1);
    border-color: var(--primary2);
  }

  .module-icon { font-size: 26px; margin-bottom: 10px; display: block; }
  .module-title { font-size: 15px; font-weight: 700; margin-bottom: 6px; }
  .module-desc { font-size: 13px; color: var(--text2); line-height: 1.65; }
  .module-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px; }

  .tag { font-size: 11px; font-weight: 600; padding: 3px 10px; border-radius: 100px; }
  .tag.purple { background: var(--primary-pale); color: var(--primary); }
  .tag.green  { background: var(--green-pale);   color: var(--green); }
  .tag.blue   { background: var(--blue-pale);    color: var(--blue); }
  .tag.orange { background: var(--orange-pale);  color: var(--orange); }
  .tag.pink   { background: var(--accent-pale);  color: var(--accent); }

  /* ===== SCREENS TABLE ===== */
  .screens-table { width: 100%; border-collapse: collapse; }

  .screens-table thead tr { background: var(--dark); }

  .screens-table thead th {
    padding: 14px 20px; text-align: right;
    color: rgba(255,255,255,0.75);
    font-size: 13px; font-weight: 600;
  }

  .screens-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
  }

  .screens-table tbody tr:hover { background: var(--bg); }
  .screens-table tbody tr:last-child { border-bottom: none; }

  .screens-table tbody td { padding: 13px 20px; font-size: 14px; color: var(--text2); }
  .screens-table tbody td:first-child { font-weight: 700; color: var(--text); }

  .screen-num {
    display: inline-flex; align-items: center; justify-content: center;
    width: 26px; height: 26px;
    background: var(--primary-pale); color: var(--primary);
    border-radius: 6px; font-size: 12px; font-weight: 700;
    margin-left: 8px;
  }

  .badge { font-size: 11px; font-weight: 600; padding: 2px 10px; border-radius: 100px; }
  .badge.purple { background: var(--primary-pale); color: var(--primary); }
  .badge.green  { background: var(--green-pale);   color: var(--green); }
  .badge.blue   { background: var(--blue-pale);    color: var(--blue); }
  .badge.orange { background: var(--orange-pale);  color: var(--orange); }

  /* ===== TECH GRID ===== */
  .tech-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }

  .tech-item {
    background: var(--white); border: 1px solid var(--border);
    border-radius: 12px; padding: 16px; text-align: center;
  }

  .tech-emoji { font-size: 22px; margin-bottom: 8px; display: block; }
  .tech-name  { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
  .tech-role  { font-size: 12px; color: var(--text3); }

  /* ===== PRICING ===== */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }

  .pricing-card {
    background: var(--white);
    border: 2px solid var(--border);
    border-radius: 18px; padding: 24px 20px;
    text-align: center; position: relative;
    transition: transform 0.2s, box-shadow 0.2s;
  }

  .pricing-card:hover { transform: translateY(-4px); box-shadow: 0 12px 36px rgba(0,0,0,0.1); }

  .pricing-card.featured {
    border-color: var(--primary);
    background: linear-gradient(160deg, #fff 60%, var(--primary-pale));
  }

  .pricing-card.featured::before {
    content: '⭐ الأكثر طلباً';
    position: absolute;
    top: -14px; left: 50%; transform: translateX(-50%);
    background: var(--primary); color: white;
    font-size: 12px; font-weight: 700;
    padding: 4px 16px; border-radius: 100px;
    white-space: nowrap;
  }

  .plan-name { font-size: 15px; font-weight: 700; color: var(--text2); margin-bottom: 14px; }
  .plan-price { font-size: 38px; font-weight: 900; color: var(--text); line-height: 1; margin-bottom: 4px; }
  .plan-price small { font-size: 16px; font-weight: 600; color: var(--text3); }
  .plan-duration { font-size: 13px; color: var(--text3); margin-bottom: 18px; }

  .plan-features { list-style: none; text-align: right; margin-bottom: 20px; }

  .plan-features li {
    font-size: 13px; color: var(--text2);
    padding: 5px 0; border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 8px;
  }

  .plan-features li:last-child { border-bottom: none; }
  .plan-features li .check { color: var(--green); font-size: 14px; flex-shrink: 0; }
  .plan-features li .cross { color: var(--text3); font-size: 14px; flex-shrink: 0; }

  .btn-plan {
    width: 100%; padding: 12px;
    border-radius: 10px; font-family: 'Cairo', sans-serif;
    font-size: 14px; font-weight: 700;
    cursor: pointer; border: none; transition: all 0.2s;
  }

  .btn-plan.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }
  .btn-plan.solid { background: var(--primary); color: white; box-shadow: 0 4px 16px rgba(124,58,237,0.35); }
  .btn-plan.solid:hover { background: var(--primary2); }

  /* ===== TIMELINE ===== */
  .timeline { padding: 0 8px; }

  .timeline-item { display: flex; gap: 20px; padding-bottom: 28px; position: relative; }

  .timeline-item::before {
    content: '';
    position: absolute;
    right: 19px; top: 40px; bottom: 0;
    width: 2px; background: var(--border);
  }

  .timeline-item:last-child::before { display: none; }

  .timeline-dot {
    width: 40px; height: 40px; border-radius: 50%;
    background: var(--primary-pale); border: 2px solid var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0; position: relative; z-index: 1;
  }

  .timeline-content { flex: 1; padding-top: 6px; }
  .timeline-week { font-size: 12px; color: var(--primary); font-weight: 700; margin-bottom: 4px; }
  .timeline-title { font-size: 15px; font-weight: 700; margin-bottom: 4px; }
  .timeline-desc { font-size: 13px; color: var(--text2); }

  /* ===== TOTAL BOX ===== */
  .total-box {
    background: linear-gradient(135deg, var(--dark) 0%, var(--dark2) 60%, var(--dark3) 100%);
    border-radius: 20px; padding: 36px 40px;
    display: flex; align-items: center;
    justify-content: space-between;
    gap: 24px; flex-wrap: wrap;
    position: relative; overflow: hidden;
  }

  .total-box::before {
    content: '';
    position: absolute; top: -40px; left: -40px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(124,58,237,0.25) 0%, transparent 70%);
    border-radius: 50%;
  }

  .total-left { position: relative; z-index: 1; }
  .total-label { color: rgba(255,255,255,0.5); font-size: 14px; margin-bottom: 8px; }
  .total-price { font-size: 52px; font-weight: 900; color: white; line-height: 1; }
  .total-price small { font-size: 20px; color: rgba(255,255,255,0.55); font-weight: 500; }
  .total-note { font-size: 13px; color: rgba(255,255,255,0.35); margin-top: 8px; }

  .total-right {
    position: relative; z-index: 1;
    display: flex; flex-direction: column;
    gap: 12px; align-items: flex-start;
  }

  .total-item { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,0.7); font-size: 14px; }

  .total-item .icon {
    width: 32px; height: 32px;
    background: rgba(255,255,255,0.08); border-radius: 8px;
    display: flex; align-items: center; justify-content: center; font-size: 14px;
  }

  /* ===== NOTE BOX ===== */
  .note-box {
    background: var(--orange-pale); border: 1px solid #fde68a;
    border-radius: 12px; padding: 16px 20px;
    display: flex; gap: 12px; align-items: flex-start;
  }

  .note-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 13px; color: #92400e; font-weight: 500; line-height: 1.7; }

  .info-box {
    background: var(--primary-pale); border: 1px solid #DDD6FE;
    border-radius: 12px; padding: 16px 20px;
    display: flex; gap: 12px; align-items: flex-start;
    margin-bottom: 20px;
  }

  .info-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; color: #4C1D95; font-weight: 500; line-height: 1.7; }

  /* ===== COMPARE TABLE ===== */
  .compare-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 20px;
  }

  .compare-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 18px 20px;
  }

  .compare-title {
    font-size: 14px; font-weight: 800;
    margin-bottom: 12px;
    display: flex; align-items: center; gap: 8px;
  }

  .compare-list { list-style: none; }

  .compare-list li {
    font-size: 13px; color: var(--text2);
    padding: 5px 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 8px;
  }

  .compare-list li:last-child { border-bottom: none; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .modules-grid { grid-template-columns: 1fr; }
    .pricing-grid { grid-template-columns: 1fr; }
    .tech-grid { grid-template-columns: 1fr 1fr; }
    .compare-grid { grid-template-columns: 1fr; }
    .header { padding: 32px 24px; }
    .header-title h1 { font-size: 24px; }
    .total-box { padding: 28px 24px; }
    .total-price { font-size: 38px; }
  }
</style>
</head>
<body>
<div class="page">

  <!-- HEADER -->
  <div class="header">
    <div class="header-top">
      <div class="brand">
        <div class="brand-icon">🎓</div>
        <div class="brand-text">
          <div class="name">OctuKheir Academy Clone</div>
          <div class="sub">Laravel + Flutter Stack</div>
        </div>
      </div>
      <div class="proposal-badge">عرض سعر رسمي</div>
    </div>
    <div class="header-title">
      <h1>أكاديمية كليات علمية متكاملة<br><span>Laravel Backend + Flutter Mobile</span></h1>
      <p>كورسات • حصص مباشرة • نظام مكافآت • مدونة • معرض أعمال — من الصفر — بالجنيه المصري</p>
    </div>
    <div class="header-meta">
      <div class="meta-item"><div class="dot"></div> Flutter iOS + Android</div>
      <div class="meta-item"><div class="dot"></div> Laravel 11 Backend</div>
      <div class="meta-item"><div class="dot"></div> React Admin Panel</div>
      <div class="meta-item"><div class="dot"></div> تسليم 16 أسبوع</div>
    </div>
  </div>

  <!-- OVERVIEW -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon purple">🔍</div>
      <div>
        <div class="section-title">تحليل المنصة الأصلية</div>
        <div class="section-subtitle">إيه اللي بيعمله OctuKheir بالضبط</div>
      </div>
    </div>
    <div class="info-box">
      <div class="icon">💡</div>
      <div class="text">
        OctuKheir Academy منصة تعليمية متخصصة في <strong>مواد الكليات العلمية</strong> (صيدلة، طب، بيوتكنولوجي، طب أسنان). بتقدم: كورسات مسجلة بأسعار مختلفة (200 – 3,500 ج)، <strong>حصص مباشرة Live</strong> مع الدكاترة، <strong>فيديو تجريبي مجاني</strong> لكل كورس، <strong>نظام مكافآت وأوسمة</strong>، <strong>مدونة</strong> طبية وتعليمية، و<strong>معرض أعمال Portfolio</strong>. ودي نقطة مميزة جداً — دعم متعدد العملات (جنيه + ريال سعودي).
      </div>
    </div>
    <div style="display:flex; gap:12px; flex-wrap:wrap;">
      <div style="background:var(--primary-pale); color:var(--primary); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">🎓 كورسات علمية</div>
      <div style="background:var(--accent-pale); color:var(--accent); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">🔴 Live Classes</div>
      <div style="background:var(--orange-pale); color:var(--orange); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">🏆 نظام مكافآت</div>
      <div style="background:var(--green-pale); color:var(--green); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">💱 متعدد العملات</div>
      <div style="background:var(--blue-pale); color:var(--blue); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">📰 مدونة + Portfolio</div>
    </div>
  </div>

  <!-- FEATURES -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon pink">⚙️</div>
      <div>
        <div class="section-title">الموديولات والفيتشرز الكاملة</div>
        <div class="section-subtitle">كل جزء في المنصة مفصّل</div>
      </div>
    </div>
    <div class="modules-grid">

      <div class="module-card">
        <span class="module-icon">👤</span>
        <div class="module-title">نظام المستخدمين والمصادقة</div>
        <div class="module-desc">تسجيل بالإيميل أو Google، OTP، ملف شخصي كامل، بروفايل الطالب، الكورسات المشتراة، وسجل الأوسمة.</div>
        <div class="module-tags">
          <span class="tag purple">Laravel Sanctum</span>
          <span class="tag green">Google Auth</span>
          <span class="tag blue">OTP</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🎓</span>
        <div class="module-title">نظام الكورسات</div>
        <div class="module-desc">كورسات بفيديوهات، PDF، وفيديو تجريبي مجاني لكل كورس. فلتر بالتخصص والجامعة، تقييمات، وعدد الطلاب.</div>
        <div class="module-tags">
          <span class="tag purple">Free Preview</span>
          <span class="tag green">Video Streaming</span>
          <span class="tag orange">Ratings</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🔴</span>
        <div class="module-title">الحصص المباشرة (Live Classes)</div>
        <div class="module-desc">جدول الحصص المباشرة، حجز مقعد، بث مباشر مع الدكتور، تسجيل الحصة بعدها، والأسئلة والأجوبة.</div>
        <div class="module-tags">
          <span class="tag pink">Live Stream</span>
          <span class="tag blue">Recording</span>
          <span class="tag green">Q&A</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🏆</span>
        <div class="module-title">نظام المكافآت والأوسمة</div>
        <div class="module-desc">نقاط مكافآت عند إتمام الكورسات والتفاعل، أوسمة (Badges) قابلة للعرض في البروفايل، لوحة المتصدرين Leaderboard.</div>
        <div class="module-tags">
          <span class="tag orange">Badges</span>
          <span class="tag purple">Leaderboard</span>
          <span class="tag green">Points</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">💳</span>
        <div class="module-title">نظام الدفع متعدد العملات</div>
        <div class="module-desc">شراء كورسات بالجنيه المصري أو الريال السعودي، Paymob + فودافون كاش، رفع إيصال، وفواتير إلكترونية.</div>
        <div class="module-tags">
          <span class="tag blue">Paymob</span>
          <span class="tag green">ج.م + ر.س</span>
          <span class="tag orange">فودافون كاش</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">📰</span>
        <div class="module-title">المدونة التعليمية (Blog)</div>
        <div class="module-desc">مقالات طبية وعلمية، تصنيفات، بحث، وقت القراءة، صور، وربط المقالات بالكورسات ذات الصلة.</div>
        <div class="module-tags">
          <span class="tag purple">Rich Editor</span>
          <span class="tag green">Categories</span>
          <span class="tag blue">Search</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🎨</span>
        <div class="module-title">معرض الأعمال (Portfolio)</div>
        <div class="module-desc">عرض أعمال المدرسين والأكاديمية، صور وفيديوهات، تصفية بالنوع، وربطه بالمدونة.</div>
        <div class="module-tags">
          <span class="tag pink">Portfolio</span>
          <span class="tag orange">Media Gallery</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🔔</span>
        <div class="module-title">الإشعارات والتواصل</div>
        <div class="module-desc">Push Notifications لتذكير الحصص والكورسات الجديدة، إشعارات الأوسمة، ورسائل الدعم الفني.</div>
        <div class="module-tags">
          <span class="tag blue">FCM</span>
          <span class="tag green">In-App</span>
          <span class="tag purple">Support Chat</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">⭐</span>
        <div class="module-title">التقييمات والمراجعات</div>
        <div class="module-desc">تقييم الكورس بعد إتمامه، عرض التقييمات العامة، ريفيوهات الطلاب، وصفحة آراء الطلاب.</div>
        <div class="module-tags">
          <span class="tag orange">Reviews</span>
          <span class="tag purple">Star Rating</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">📊</span>
        <div class="module-title">لوحة تحكم الإدارة</div>
        <div class="module-desc">إدارة الكورسات، الحصص، الطلاب، الدفعات، المدونة، معرض الأعمال، الأوسمة، والتقارير الكاملة.</div>
        <div class="module-tags">
          <span class="tag blue">Admin Panel</span>
          <span class="tag green">Analytics</span>
          <span class="tag purple">Reports</span>
        </div>
      </div>

    </div>
  </div>

  <!-- SCREENS -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon green">📱</div>
      <div>
        <div class="section-title">الشاشات المطلوبة</div>
        <div class="section-subtitle">تفصيل كامل شاشات Flutter + Admin</div>
      </div>
    </div>
    <div class="card">
      <table class="screens-table">
        <thead>
          <tr>
            <th>#</th>
            <th>الشاشة</th>
            <th>الوصف</th>
            <th>النوع</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><span class="screen-num">1</span></td><td>Splash + Onboarding</td><td>شاشة ترحيب + تعريف بالأكاديمية</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">2</span></td><td>تسجيل / دخول</td><td>إيميل + Google Auth + OTP</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">3</span></td><td>الرئيسية (Home)</td><td>أحدث الكورسات، الحصص القادمة، أخبار</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">4</span></td><td>الكورسات</td><td>قائمة بفلتر التخصص والجامعة والسعر</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">5</span></td><td>تفاصيل الكورس</td><td>الوصف + فيديو تجريبي + محتوى + تقييمات</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">6</span></td><td>مشاهد الكورس (Player)</td><td>مشغل فيديو + قائمة الدروس + تقدم</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">7</span></td><td>الحصص المباشرة</td><td>جدول الحصص + حجز + دخول البث</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">8</span></td><td>شاشة البث المباشر</td><td>Live stream + Q&A + شات</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">9</span></td><td>الدفع والشراء</td><td>Paymob + فودافون كاش + رفع إيصال</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">10</span></td><td>المدونة</td><td>قائمة المقالات + بحث + تصنيفات</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">11</span></td><td>تفاصيل المقال</td><td>محتوى المقال + مقالات ذات صلة</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">12</span></td><td>معرض الأعمال</td><td>Portfolio الأكاديمية + فلتر</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">13</span></td><td>الملف الشخصي</td><td>بيانات + كورساتي + أوسمتي + إعدادات</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">14</span></td><td>الإنجازات والأوسمة</td><td>Badges + لوحة المتصدرين</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">15</span></td><td>الإشعارات</td><td>كل الإشعارات والتحديثات</td><td><span class="badge purple">موبايل</span></td></tr>
          <tr><td><span class="screen-num">16</span></td><td>البحث</td><td>بحث في الكورسات والمقالات</td><td><span class="badge blue">إضافي</span></td></tr>
          <tr><td><span class="screen-num">17</span></td><td>التقييمات والآراء</td><td>صفحة آراء الطلاب العامة</td><td><span class="badge blue">إضافي</span></td></tr>
          <tr><td><span class="screen-num">+</span></td><td>Admin Dashboard (ويب)</td><td>لوحة تحكم React.js كاملة</td><td><span class="badge orange">ويب</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- TECH STACK -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon orange">🔧</div>
      <div>
        <div class="section-title">التقنيات المستخدمة</div>
        <div class="section-subtitle">Stack احترافي ومتكامل</div>
      </div>
    </div>
    <div class="tech-grid">
      <div class="tech-item">
        <span class="tech-emoji">🐦</span>
        <div class="tech-name">Flutter</div>
        <div class="tech-role">تطبيق الموبايل (iOS & Android)</div>
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
        <div class="tech-role">Admin Dashboard (ويب)</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🎥</span>
        <div class="tech-name">Vimeo / Mux</div>
        <div class="tech-role">Video Streaming للكورسات</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🔴</span>
        <div class="tech-name">Agora / Zoom SDK</div>
        <div class="tech-role">الحصص المباشرة Live</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">⚡</span>
        <div class="tech-name">Laravel Echo + Pusher</div>
        <div class="tech-role">Real-time + Live Chat</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">💳</span>
        <div class="tech-name">Paymob</div>
        <div class="tech-role">ج.م + ر.س + فودافون كاش</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🔔</span>
        <div class="tech-name">Firebase FCM</div>
        <div class="tech-role">Push Notifications</div>
      </div>
    </div>
  </div>

  <!-- TIMELINE -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon blue">📅</div>
      <div>
        <div class="section-title">خطة التنفيذ</div>
        <div class="section-subtitle">16 أسبوع تسليم كامل</div>
      </div>
    </div>
    <div class="card" style="padding: 28px;">
      <div class="timeline">
        <div class="timeline-item">
          <div class="timeline-dot">🎨</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 1 – 2</div>
            <div class="timeline-title">UI/UX Design</div>
            <div class="timeline-desc">تصميم كل الشاشات على Figma — موبايل + داشبورد. مراجعة وموافقة العميل قبل بدء التطوير.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">⚙️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 3 – 5</div>
            <div class="timeline-title">Laravel Backend</div>
            <div class="timeline-desc">قاعدة البيانات، Auth، APIs الكورسات، الطلاب، الدفع، المدونة، ونظام الأوسمة.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">📱</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 6 – 9</div>
            <div class="timeline-title">Flutter App (Core)</div>
            <div class="timeline-desc">الهوم، الكورسات، تفاصيل الكورس، مشغل الفيديو، الدفع، والملف الشخصي.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🔴</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 10 – 12</div>
            <div class="timeline-title">Live Classes + المكافآت</div>
            <div class="timeline-desc">نظام الحصص المباشرة بـ Agora SDK، لوحة المتصدرين، نظام الأوسمة والنقاط.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">📰</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 13 – 14</div>
            <div class="timeline-title">المدونة + Portfolio + الإشعارات</div>
            <div class="timeline-desc">نظام المدونة الكامل، معرض الأعمال، Push Notifications، وشاشة التقييمات.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🖥️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 15</div>
            <div class="timeline-title">Admin Dashboard (React)</div>
            <div class="timeline-desc">لوحة التحكم الكاملة: الكورسات، الطلاب، الحصص، الدفعات، المدونة، الأوسمة، والتقارير.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🧪</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 16</div>
            <div class="timeline-title">Testing & Launch</div>
            <div class="timeline-desc">اختبار شامل، إصلاح البجز، رفع على App Store و Play Store، تسليم السورس كامل.</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- PRICING -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon green">💰</div>
      <div>
        <div class="section-title">عرض الأسعار</div>
        <div class="section-subtitle">3 باقات حسب احتياج العميل</div>
      </div>
    </div>
    <div class="pricing-grid">

      <div class="pricing-card">
        <div class="plan-name">🥉 باقة Starter</div>
        <div class="plan-price">80,000<small> ج</small></div>
        <div class="plan-duration">تسليم 10 أسابيع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> Flutter Android فقط</li>
          <li><span class="check">✓</span> Laravel API أساسي</li>
          <li><span class="check">✓</span> كورسات + فيديو تجريبي</li>
          <li><span class="check">✓</span> Paymob + رفع إيصال</li>
          <li><span class="check">✓</span> لوحة تحكم بسيطة</li>
          <li><span class="cross">✗</span> iOS</li>
          <li><span class="cross">✗</span> Live Classes</li>
          <li><span class="cross">✗</span> نظام مكافآت</li>
          <li><span class="cross">✗</span> مدونة + Portfolio</li>
        </ul>
        <button class="btn-plan outline">اختر هذه الباقة</button>
      </div>

      <div class="pricing-card featured">
        <div class="plan-name">🥇 باقة Professional</div>
        <div class="plan-price">155,000<small> ج</small></div>
        <div class="plan-duration">تسليم 16 أسبوع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> Flutter iOS + Android</li>
          <li><span class="check">✓</span> Laravel 11 API كامل</li>
          <li><span class="check">✓</span> كورسات + Live Classes</li>
          <li><span class="check">✓</span> نظام مكافآت + Leaderboard</li>
          <li><span class="check">✓</span> مدونة + Portfolio</li>
          <li><span class="check">✓</span> React Admin Dashboard</li>
          <li><span class="check">✓</span> Paymob + فودافون كاش</li>
          <li><span class="check">✓</span> Push Notifications</li>
        </ul>
        <button class="btn-plan solid">اختر هذه الباقة</button>
      </div>

      <div class="pricing-card">
        <div class="plan-name">💎 باقة Enterprise</div>
        <div class="plan-price">235,000<small> ج</small></div>
        <div class="plan-duration">تسليم 20 أسبوع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> كل حاجة في Professional</li>
          <li><span class="check">✓</span> بورتال مدرس منفصل</li>
          <li><span class="check">✓</span> كويزات وامتحانات</li>
          <li><span class="check">✓</span> شهادات إتمام PDF</li>
          <li><span class="check">✓</span> Multi-Language (عربي/إنجليزي)</li>
          <li><span class="check">✓</span> Advanced Analytics</li>
          <li><span class="check">✓</span> دعم 3 أشهر مجاناً</li>
          <li><span class="check">✓</span> سيرفر مُعدّ ومُأمَّن</li>
        </ul>
        <button class="btn-plan outline">اختر هذه الباقة</button>
      </div>

    </div>
  </div>

  <!-- NOTE -->
  <div class="note-box" style="margin-bottom:28px;">
    <div class="icon">⚠️</div>
    <div class="text">
      الأسعار لا تشمل: رسوم Agora أو Zoom SDK للحصص المباشرة، رسوم Video Hosting (Vimeo/Mux)، Apple Developer ($99/سنة)، Google Play ($25 مرة)، Pusher، Firebase، Paymob، ورسوم الاستضافة (~2,000 – 5,000 ج/شهر). كلها تُحسب منفصلة حسب حجم الاستخدام.
    </div>
  </div>

  <!-- TOTAL -->
  <div class="section">
    <div class="total-box">
      <div class="total-left">
        <div class="total-label">الباقة المقترحة (Professional)</div>
        <div class="total-price">155,000 <small>ج.م</small></div>
        <div class="total-note">يمكن تقسيمها على 3 دفعات حسب مراحل التسليم</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="icon">🐦</div> Flutter iOS + Android</div>
        <div class="total-item"><div class="icon">🔴</div> Laravel 11 + Live Classes</div>
        <div class="total-item"><div class="icon">🏆</div> مكافآت + Leaderboard</div>
        <div class="total-item"><div class="icon">📰</div> مدونة + Portfolio</div>
        <div class="total-item"><div class="icon">🛡️</div> ضمان إصلاح بجز شهر</div>
      </div>
    </div>
  </div>

  <!-- PAYMENT TERMS -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon blue">💸</div>
      <div>
        <div class="section-title">شروط الدفع</div>
        <div class="section-subtitle">تقسيم على 3 مراحل</div>
      </div>
    </div>
    <div class="card">
      <table class="screens-table">
        <thead>
          <tr>
            <th>المرحلة</th>
            <th>التوقيت</th>
            <th>المبلغ</th>
            <th>المستحق عند</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🔵 دفعة أولى</td>
            <td>عند التعاقد</td>
            <td style="color:var(--primary); font-weight:800;">46,500 ج (30%)</td>
            <td>توقيع العقد وبدء الشغل</td>
          </tr>
          <tr>
            <td>🟡 دفعة ثانية</td>
            <td>بعد الأسبوع 8</td>
            <td style="color:var(--primary); font-weight:800;">77,500 ج (50%)</td>
            <td>تسليم النسخة الأولى للتجربة</td>
          </tr>
          <tr>
            <td>🟢 دفعة ثالثة</td>
            <td>عند التسليم النهائي</td>
            <td style="color:var(--primary); font-weight:800;">31,000 ج (20%)</td>
            <td>رفع على المتاجر + تسليم السورس</td>
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
