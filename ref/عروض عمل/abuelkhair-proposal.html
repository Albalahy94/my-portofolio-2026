<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — منصة Abuelkhair 365 (Laravel + Flutter)</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --primary: #2563EB;
    --primary2: #3B82F6;
    --primary-pale: #EFF6FF;
    --primary-glow: rgba(37,99,235,0.15);
    --accent: #7C3AED;
    --accent-pale: #F5F3FF;
    --dark: #0F172A;
    --dark2: #1E293B;
    --dark3: #334155;
    --text: #1E293B;
    --text2: #475569;
    --text3: #94A3B8;
    --border: #E2E8F0;
    --bg: #F8FAFC;
    --white: #FFFFFF;
    --green: #10B981;
    --green-pale: #ECFDF5;
    --orange: #F59E0B;
    --orange-pale: #FFFBEB;
    --red: #EF4444;
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
    background: linear-gradient(135deg, #0F172A 0%, #1E293B 55%, #1e3a6e 100%);
    border-radius: 24px;
    padding: 48px 48px 40px;
    margin-bottom: 32px;
    position: relative;
    overflow: hidden;
  }

  .header::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 280px; height: 280px;
    background: radial-gradient(circle, rgba(37,99,235,0.2) 0%, transparent 70%);
    border-radius: 50%;
  }

  .header::after {
    content: '';
    position: absolute;
    bottom: -40px; left: 80px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(124,58,237,0.15) 0%, transparent 70%);
    border-radius: 50%;
  }

  .header-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 32px;
    position: relative; z-index: 1;
    flex-wrap: wrap;
    gap: 12px;
  }

  .brand {
    display: flex;
    align-items: center;
    gap: 14px;
  }

  .brand-icon {
    width: 52px; height: 52px;
    background: var(--primary);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    box-shadow: 0 8px 24px rgba(37,99,235,0.4);
  }

  .brand-text .name { font-size: 20px; font-weight: 900; color: white; line-height: 1.2; }
  .brand-text .sub { font-size: 13px; color: rgba(255,255,255,0.5); font-weight: 400; }

  .proposal-badge {
    background: rgba(37,99,235,0.25);
    border: 1px solid rgba(37,99,235,0.5);
    color: #93C5FD;
    padding: 6px 18px;
    border-radius: 100px;
    font-size: 13px;
    font-weight: 600;
  }

  .header-title { position: relative; z-index: 1; }

  .header-title h1 {
    font-size: 34px;
    font-weight: 900;
    color: white;
    line-height: 1.35;
    margin-bottom: 10px;
  }

  .header-title h1 span { color: #60A5FA; }

  .header-title p { color: rgba(255,255,255,0.55); font-size: 15px; }

  .header-meta {
    display: flex;
    gap: 20px;
    margin-top: 28px;
    position: relative; z-index: 1;
    flex-wrap: wrap;
  }

  .meta-item {
    display: flex;
    align-items: center;
    gap: 8px;
    color: rgba(255,255,255,0.65);
    font-size: 13px;
  }

  .meta-item .dot {
    width: 8px; height: 8px;
    background: #60A5FA;
    border-radius: 50%;
    flex-shrink: 0;
  }

  /* ===== SECTION ===== */
  .section { margin-bottom: 28px; }

  .section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 18px;
  }

  .section-icon {
    width: 40px; height: 40px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
    flex-shrink: 0;
  }

  .section-icon.blue { background: var(--primary-pale); }
  .section-icon.green { background: var(--green-pale); }
  .section-icon.purple { background: var(--accent-pale); }
  .section-icon.orange { background: var(--orange-pale); }

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
  .modules-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
  }

  .module-card {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 14px;
    padding: 20px;
    transition: box-shadow 0.2s, border-color 0.2s;
  }

  .module-card:hover {
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border-color: var(--primary2);
  }

  .module-icon { font-size: 26px; margin-bottom: 10px; display: block; }
  .module-title { font-size: 15px; font-weight: 700; margin-bottom: 6px; }
  .module-desc { font-size: 13px; color: var(--text2); line-height: 1.65; }

  .module-tags { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 10px; }

  .tag {
    font-size: 11px; font-weight: 600;
    padding: 3px 10px; border-radius: 100px;
  }
  .tag.blue { background: var(--primary-pale); color: var(--primary); }
  .tag.green { background: var(--green-pale); color: var(--green); }
  .tag.purple { background: var(--accent-pale); color: var(--accent); }
  .tag.orange { background: var(--orange-pale); color: var(--orange); }

  /* ===== SCREENS TABLE ===== */
  .screens-table { width: 100%; border-collapse: collapse; }

  .screens-table thead tr { background: var(--dark); }

  .screens-table thead th {
    padding: 14px 20px;
    text-align: right;
    color: rgba(255,255,255,0.75);
    font-size: 13px;
    font-weight: 600;
  }

  .screens-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
  }

  .screens-table tbody tr:hover { background: var(--bg); }
  .screens-table tbody tr:last-child { border-bottom: none; }

  .screens-table tbody td {
    padding: 13px 20px;
    font-size: 14px;
    color: var(--text2);
  }

  .screens-table tbody td:first-child { font-weight: 700; color: var(--text); }

  .screen-num {
    display: inline-flex;
    align-items: center; justify-content: center;
    width: 26px; height: 26px;
    background: var(--primary-pale);
    color: var(--primary);
    border-radius: 6px;
    font-size: 12px; font-weight: 700;
    margin-left: 8px;
  }

  .badge { font-size: 11px; font-weight: 600; padding: 2px 10px; border-radius: 100px; }
  .badge.blue { background: var(--primary-pale); color: var(--primary); }
  .badge.green { background: var(--green-pale); color: var(--green); }
  .badge.purple { background: var(--accent-pale); color: var(--accent); }
  .badge.orange { background: var(--orange-pale); color: var(--orange); }

  /* ===== TECH GRID ===== */
  .tech-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }

  .tech-item {
    background: var(--white);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 16px;
    text-align: center;
  }

  .tech-emoji { font-size: 22px; margin-bottom: 8px; display: block; }
  .tech-name { font-size: 14px; font-weight: 700; margin-bottom: 3px; }
  .tech-role { font-size: 12px; color: var(--text3); }

  /* ===== PRICING ===== */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px; }

  .pricing-card {
    background: var(--white);
    border: 2px solid var(--border);
    border-radius: 18px;
    padding: 24px 20px;
    text-align: center;
    position: relative;
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
    background: var(--primary);
    color: white;
    font-size: 12px; font-weight: 700;
    padding: 4px 16px;
    border-radius: 100px;
    white-space: nowrap;
  }

  .plan-name { font-size: 15px; font-weight: 700; color: var(--text2); margin-bottom: 14px; }

  .plan-price {
    font-size: 38px; font-weight: 900;
    color: var(--text); line-height: 1;
    margin-bottom: 4px;
  }

  .plan-price small { font-size: 16px; font-weight: 600; color: var(--text3); }
  .plan-duration { font-size: 13px; color: var(--text3); margin-bottom: 18px; }

  .plan-features { list-style: none; text-align: right; margin-bottom: 20px; }

  .plan-features li {
    font-size: 13px; color: var(--text2);
    padding: 5px 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 8px;
  }

  .plan-features li:last-child { border-bottom: none; }
  .plan-features li .check { color: var(--green); font-size: 14px; flex-shrink: 0; }
  .plan-features li .cross { color: var(--text3); font-size: 14px; flex-shrink: 0; }

  .btn-plan {
    width: 100%; padding: 12px;
    border-radius: 10px;
    font-family: 'Cairo', sans-serif;
    font-size: 14px; font-weight: 700;
    cursor: pointer; border: none;
    transition: all 0.2s;
  }

  .btn-plan.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }
  .btn-plan.solid { background: var(--primary); color: white; box-shadow: 0 4px 16px rgba(37,99,235,0.35); }
  .btn-plan.solid:hover { background: var(--primary2); }

  /* ===== TIMELINE ===== */
  .timeline { padding: 0 8px; }

  .timeline-item {
    display: flex; gap: 20px;
    padding-bottom: 28px;
    position: relative;
  }

  .timeline-item::before {
    content: '';
    position: absolute;
    right: 19px; top: 40px; bottom: 0;
    width: 2px; background: var(--border);
  }

  .timeline-item:last-child::before { display: none; }

  .timeline-dot {
    width: 40px; height: 40px; border-radius: 50%;
    background: var(--primary-pale);
    border: 2px solid var(--primary);
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; flex-shrink: 0;
    position: relative; z-index: 1;
  }

  .timeline-content { flex: 1; padding-top: 6px; }
  .timeline-week { font-size: 12px; color: var(--primary); font-weight: 700; margin-bottom: 4px; }
  .timeline-title { font-size: 15px; font-weight: 700; margin-bottom: 4px; }
  .timeline-desc { font-size: 13px; color: var(--text2); }

  /* ===== TOTAL BOX ===== */
  .total-box {
    background: linear-gradient(135deg, var(--dark) 0%, var(--dark2) 100%);
    border-radius: 20px;
    padding: 36px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 24px; flex-wrap: wrap;
    position: relative; overflow: hidden;
  }

  .total-box::before {
    content: '';
    position: absolute;
    top: -40px; left: -40px;
    width: 200px; height: 200px;
    background: radial-gradient(circle, rgba(37,99,235,0.2) 0%, transparent 70%);
    border-radius: 50%;
  }

  .total-left { position: relative; z-index: 1; }
  .total-label { color: rgba(255,255,255,0.5); font-size: 14px; margin-bottom: 8px; }

  .total-price {
    font-size: 52px; font-weight: 900;
    color: white; line-height: 1;
  }

  .total-price small { font-size: 20px; color: rgba(255,255,255,0.55); font-weight: 500; }
  .total-note { font-size: 13px; color: rgba(255,255,255,0.35); margin-top: 8px; }

  .total-right {
    position: relative; z-index: 1;
    display: flex; flex-direction: column;
    gap: 12px; align-items: flex-start;
  }

  .total-item {
    display: flex; align-items: center; gap: 10px;
    color: rgba(255,255,255,0.7); font-size: 14px;
  }

  .total-item .icon {
    width: 32px; height: 32px;
    background: rgba(255,255,255,0.08);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
  }

  /* ===== NOTE BOX ===== */
  .note-box {
    background: var(--orange-pale);
    border: 1px solid #fde68a;
    border-radius: 12px;
    padding: 16px 20px;
    display: flex; gap: 12px; align-items: flex-start;
  }

  .note-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 13px; color: #92400e; font-weight: 500; line-height: 1.7; }

  .info-box {
    background: var(--primary-pale);
    border: 1px solid #BFDBFE;
    border-radius: 12px;
    padding: 16px 20px;
    display: flex; gap: 12px; align-items: flex-start;
    margin-bottom: 20px;
  }

  .info-box .icon { font-size: 20px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; color: #1e3a8a; font-weight: 500; line-height: 1.7; }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 640px) {
    .modules-grid { grid-template-columns: 1fr; }
    .pricing-grid { grid-template-columns: 1fr; }
    .tech-grid { grid-template-columns: 1fr 1fr; }
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
        <div class="brand-icon">📚</div>
        <div class="brand-text">
          <div class="name">Abuelkhair 365 Clone</div>
          <div class="sub">Laravel + Flutter Stack</div>
        </div>
      </div>
      <div class="proposal-badge">عرض سعر رسمي</div>
    </div>
    <div class="header-title">
      <h1>منصة تعليمية متكاملة<br><span>Laravel Backend + Flutter Mobile</span></h1>
      <p>كورسات • ترجمة قانونية • حضانة • أدوات تعلم ذكية — من الصفر — بالجنيه المصري</p>
    </div>
    <div class="header-meta">
      <div class="meta-item"><div class="dot"></div> Flutter iOS + Android</div>
      <div class="meta-item"><div class="dot"></div> Laravel 11 Backend</div>
      <div class="meta-item"><div class="dot"></div> React Admin Panel</div>
      <div class="meta-item"><div class="dot"></div> تسليم 18 أسبوع</div>
    </div>
  </div>

  <!-- OVERVIEW -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon blue">🔍</div>
      <div>
        <div class="section-title">تحليل المنصة الأصلية</div>
        <div class="section-subtitle">إيه اللي بيعمله Abuelkhair 365 بالضبط</div>
      </div>
    </div>
    <div class="info-box">
      <div class="icon">💡</div>
      <div class="text">
        Abuelkhair 365 منصة تعليمية مصرية متكاملة بتقدم: <strong>كورسات لغة إنجليزية</strong> بأدوات تفاعلية ذكية (Speak 365، Vocab Bank، Write 365، Dictionary 365)، <strong>ترجمة قانونية معتمدة</strong>، <strong>Baby Academy</strong> للأطفال، ونظام اشتراكات بفلوس. المنصة عندها ويب + موبايل + لوحة تحكم للإدارة. هنبني نسخة مشابهة بالكامل بـ Flutter و Laravel.
      </div>
    </div>
    <div style="display:flex; gap:12px; flex-wrap:wrap;">
      <div style="background:var(--primary-pale); color:var(--primary); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">🎓 منصة تعليمية</div>
      <div style="background:var(--green-pale); color:var(--green); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">📝 ترجمة قانونية</div>
      <div style="background:var(--accent-pale); color:var(--accent); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">🧒 Baby Academy</div>
      <div style="background:var(--orange-pale); color:var(--orange); padding:8px 16px; border-radius:10px; font-size:13px; font-weight:700;">💳 نظام اشتراكات</div>
    </div>
  </div>

  <!-- MODULES -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon purple">⚙️</div>
      <div>
        <div class="section-title">الموديولات والفيتشرز الكاملة</div>
        <div class="section-subtitle">تفصيل كل جزء في المنصة</div>
      </div>
    </div>
    <div class="modules-grid">

      <div class="module-card">
        <span class="module-icon">👤</span>
        <div class="module-title">نظام المستخدمين والمصادقة</div>
        <div class="module-desc">تسجيل بالإيميل أو Google، OTP، ملف شخصي كامل، إدارة الاشتراكات، تاريخ الدروس والتقدم.</div>
        <div class="module-tags">
          <span class="tag blue">Laravel Sanctum</span>
          <span class="tag green">Google Auth</span>
          <span class="tag purple">OTP</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🎓</span>
        <div class="module-title">نظام الكورسات</div>
        <div class="module-desc">كورسات مقسمة لـ Levels، فيديوهات، PDF، كويزات، متابعة التقدم، شهادات إتمام، وتقييمات الطلاب.</div>
        <div class="module-tags">
          <span class="tag blue">Video Streaming</span>
          <span class="tag green">Progress Tracking</span>
          <span class="tag orange">Certificates</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🗣️</span>
        <div class="module-title">Speak 365 — تعلم المحادثة</div>
        <div class="module-desc">تمارين نطق تفاعلية، تسجيل صوت ومقارنة بالنموذج، سيناريوهات محادثة، وتقييم النطق.</div>
        <div class="module-tags">
          <span class="tag blue">Audio Recording</span>
          <span class="tag purple">Speech Analysis</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">📖</span>
        <div class="module-title">Vocab Bank 365</div>
        <div class="module-desc">بنك كلمات ضخم مع نطق صوتي، أمثلة، صور، بطاقات مراجعة (Flashcards)، وتتبع الكلمات المحفوظة.</div>
        <div class="module-tags">
          <span class="tag green">Flashcards</span>
          <span class="tag blue">Audio</span>
          <span class="tag orange">Quiz</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">✍️</span>
        <div class="module-title">Write 365</div>
        <div class="module-desc">12 تاسك كتابة مختلفة، نموذج إجابة، ملاحظات المعلم، تقييم الكتابة، وإرسال التصحيح.</div>
        <div class="module-tags">
          <span class="tag purple">Writing Tasks</span>
          <span class="tag green">Teacher Review</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">📚</span>
        <div class="module-title">Dictionary 365</div>
        <div class="module-desc">قاموس مصور ناطق تفاعلي، بحث متقدم، صور توضيحية، نطق بالصوت، وربط بالـ Vocab Bank.</div>
        <div class="module-tags">
          <span class="tag blue">Illustrated</span>
          <span class="tag green">Audio</span>
          <span class="tag purple">Interactive</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🧪</span>
        <div class="module-title">Placement Test 365</div>
        <div class="module-desc">اختبار تحديد المستوى المجاني، نتيجة فورية، توصية بالمسار التعليمي المناسب للطالب.</div>
        <div class="module-tags">
          <span class="tag orange">Free Test</span>
          <span class="tag blue">Auto Grading</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">⚖️</span>
        <div class="module-title">الترجمة القانونية</div>
        <div class="module-desc">طلب ترجمة أونلاين، رفع المستندات، تتبع الطلب، استلام الترجمة، ونظام دفع مدمج.</div>
        <div class="module-tags">
          <span class="tag blue">File Upload</span>
          <span class="tag green">Order Tracking</span>
          <span class="tag purple">Payment</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🧒</span>
        <div class="module-title">Baby Academy (الحضانة)</div>
        <div class="module-desc">محتوى تعليمي للأطفال، تسجيل في البرامج، متابعة ولي الأمر، صور وتقارير تقدم الطفل.</div>
        <div class="module-tags">
          <span class="tag orange">Kids Content</span>
          <span class="tag green">Parent Portal</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">💳</span>
        <div class="module-title">نظام الاشتراكات والدفع</div>
        <div class="module-desc">باقات متعددة (شهري / سنوي / Lifetime)، Paymob، فودافون كاش، رفع إيصال، وإدارة تجديد الاشتراكات.</div>
        <div class="module-tags">
          <span class="tag blue">Paymob</span>
          <span class="tag green">فودافون كاش</span>
          <span class="tag orange">InstaPay</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">🔔</span>
        <div class="module-title">الإشعارات والتواصل</div>
        <div class="module-desc">Push Notifications لتذكير الدروس، إعلانات جديدة، انتهاء الاشتراك، ونظام رسائل مع الدعم.</div>
        <div class="module-tags">
          <span class="tag blue">FCM</span>
          <span class="tag green">In-App Inbox</span>
        </div>
      </div>

      <div class="module-card">
        <span class="module-icon">📊</span>
        <div class="module-title">لوحة تحكم الإدارة</div>
        <div class="module-desc">إدارة الكورسات، الطلاب، الاشتراكات، طلبات الترجمة، المحتوى، التقارير، والكوبونات — كلها من الداشبورد.</div>
        <div class="module-tags">
          <span class="tag blue">Admin Panel</span>
          <span class="tag purple">Analytics</span>
          <span class="tag green">Reports</span>
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
        <div class="section-subtitle">تفصيل كامل لشاشات الموبايل + الويب</div>
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
          <tr><td><span class="screen-num">1</span></td><td>Splash + Onboarding</td><td>ترحيب + تعريف بخدمات المنصة</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">2</span></td><td>تسجيل / دخول</td><td>إيميل + Google + OTP</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">3</span></td><td>الرئيسية (Home)</td><td>الخدمات، أحدث الكورسات، البانرات</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">4</span></td><td>Placement Test</td><td>اختبار تحديد المستوى المجاني</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">5</span></td><td>Platform 365</td><td>الأدوات التعليمية الذكية</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">6</span></td><td>Speak 365</td><td>تمارين المحادثة والنطق</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">7</span></td><td>Vocab Bank 365</td><td>بنك الكلمات + Flashcards</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">8</span></td><td>Write 365</td><td>تاسكات الكتابة وتصحيح المعلم</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">9</span></td><td>Dictionary 365</td><td>القاموس المصور الناطق</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">10</span></td><td>الكورسات</td><td>قائمة الكورسات + فلتر المستوى</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">11</span></td><td>تفاصيل الكورس</td><td>المحتوى، الفيديوهات، الكويزات</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">12</span></td><td>Baby Academy</td><td>برامج الأطفال + تقدم الطفل</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">13</span></td><td>الترجمة القانونية</td><td>طلب + رفع مستند + تتبع</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">14</span></td><td>الاشتراكات والدفع</td><td>الباقات + Paymob + رفع إيصال</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">15</span></td><td>الملف الشخصي</td><td>بيانات الطالب + تقدمه + اشتراكه</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">16</span></td><td>الإشعارات</td><td>كل الإشعارات والتحديثات</td><td><span class="badge blue">موبايل</span></td></tr>
          <tr><td><span class="screen-num">17</span></td><td>المكتبة التعليمية</td><td>الكتب والمواد للبيع</td><td><span class="badge purple">إضافي</span></td></tr>
          <tr><td><span class="screen-num">18</span></td><td>I Plan 365</td><td>خطة التعلم الشخصية</td><td><span class="badge purple">إضافي</span></td></tr>
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
        <div class="section-subtitle">Stack كامل ومتكامل</div>
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
        <span class="tech-emoji">⚡</span>
        <div class="tech-name">Laravel Echo + Pusher</div>
        <div class="tech-role">Real-time Notifications</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">💳</span>
        <div class="tech-name">Paymob</div>
        <div class="tech-role">بوابة الدفع + فودافون كاش</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">🔔</span>
        <div class="tech-name">Firebase FCM</div>
        <div class="tech-role">Push Notifications</div>
      </div>
      <div class="tech-item">
        <span class="tech-emoji">☁️</span>
        <div class="tech-name">DigitalOcean + S3</div>
        <div class="tech-role">Hosting + Media Storage</div>
      </div>
    </div>
  </div>

  <!-- TIMELINE -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon blue">📅</div>
      <div>
        <div class="section-title">خطة التنفيذ</div>
        <div class="section-subtitle">18 أسبوع تسليم كامل</div>
      </div>
    </div>
    <div class="card" style="padding: 28px;">
      <div class="timeline">
        <div class="timeline-item">
          <div class="timeline-dot">🎨</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 1 – 2</div>
            <div class="timeline-title">UI/UX Design</div>
            <div class="timeline-desc">تصميم كل الشاشات على Figma — موبايل + Admin Dashboard. مراجعة وموافقة العميل.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">⚙️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 3 – 5</div>
            <div class="timeline-title">Laravel Backend Foundation</div>
            <div class="timeline-desc">إعداد السيرفر، قاعدة البيانات، نظام Auth، APIs الأساسية للمستخدمين والكورسات والاشتراكات.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">📱</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 6 – 9</div>
            <div class="timeline-title">Flutter App (Core Screens)</div>
            <div class="timeline-desc">الشاشات الأساسية: الهوم، الكورسات، الاشتراكات، الملف الشخصي، ونظام الدفع.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🛠️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 10 – 13</div>
            <div class="timeline-title">الأدوات التعليمية الذكية</div>
            <div class="timeline-desc">Speak 365، Vocab Bank، Write 365، Dictionary 365، وPlacement Test — كل أداة بكامل فيتشرزها.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">⚖️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 14 – 15</div>
            <div class="timeline-title">الترجمة + Baby Academy</div>
            <div class="timeline-desc">نظام طلب الترجمة القانونية كامل، وموديول Baby Academy مع بورتال ولي الأمر.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🖥️</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 16</div>
            <div class="timeline-title">Admin Dashboard (React)</div>
            <div class="timeline-desc">لوحة التحكم الكاملة: الطلاب، الكورسات، الاشتراكات، الترجمة، التقارير، والكوبونات.</div>
          </div>
        </div>
        <div class="timeline-item">
          <div class="timeline-dot">🧪</div>
          <div class="timeline-content">
            <div class="timeline-week">الأسبوع 17 – 18</div>
            <div class="timeline-title">Testing & Launch</div>
            <div class="timeline-desc">اختبار شامل، إصلاح البجز، رفع على App Store و Play Store، وتسليم السورس كود الكامل.</div>
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
        <div class="plan-price">90,000<small> ج</small></div>
        <div class="plan-duration">تسليم 12 أسبوع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> Flutter Android فقط</li>
          <li><span class="check">✓</span> Laravel API أساسي</li>
          <li><span class="check">✓</span> نظام الكورسات</li>
          <li><span class="check">✓</span> Placement Test</li>
          <li><span class="check">✓</span> Paymob + رفع إيصال</li>
          <li><span class="check">✓</span> لوحة تحكم بسيطة</li>
          <li><span class="cross">✗</span> iOS</li>
          <li><span class="cross">✗</span> Speak / Vocab / Write</li>
          <li><span class="cross">✗</span> الترجمة القانونية</li>
        </ul>
        <button class="btn-plan outline">اختر هذه الباقة</button>
      </div>

      <div class="pricing-card featured">
        <div class="plan-name">🥇 باقة Professional</div>
        <div class="plan-price">175,000<small> ج</small></div>
        <div class="plan-duration">تسليم 18 أسبوع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> Flutter iOS + Android</li>
          <li><span class="check">✓</span> Laravel 11 API كامل</li>
          <li><span class="check">✓</span> كل الأدوات التعليمية</li>
          <li><span class="check">✓</span> الترجمة القانونية</li>
          <li><span class="check">✓</span> Baby Academy</li>
          <li><span class="check">✓</span> React Admin Dashboard</li>
          <li><span class="check">✓</span> Paymob + فودافون كاش</li>
          <li><span class="check">✓</span> Push Notifications</li>
        </ul>
        <button class="btn-plan solid">اختر هذه الباقة</button>
      </div>

      <div class="pricing-card">
        <div class="plan-name">💎 باقة Enterprise</div>
        <div class="plan-price">260,000<small> ج</small></div>
        <div class="plan-duration">تسليم 22 أسبوع</div>
        <ul class="plan-features">
          <li><span class="check">✓</span> كل حاجة في Professional</li>
          <li><span class="check">✓</span> AI تقييم النطق</li>
          <li><span class="check">✓</span> Live Classes (Zoom API)</li>
          <li><span class="check">✓</span> بورتال المعلم المنفصل</li>
          <li><span class="check">✓</span> Advanced Analytics</li>
          <li><span class="check">✓</span> Multi-Language دعم</li>
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
      الأسعار لا تشمل: رسوم Video Hosting (Vimeo ~$20/شهر أو Mux)، رسوم Apple Developer ($99/سنة)، Google Play ($25 مرة)، Pusher، Firebase، Paymob، ورسوم الاستضافة (~2,000 – 5,000 ج/شهر). كلها تُحسب منفصلة حسب حجم الاستخدام.
    </div>
  </div>

  <!-- TOTAL -->
  <div class="section">
    <div class="total-box">
      <div class="total-left">
        <div class="total-label">الباقة المقترحة (Professional)</div>
        <div class="total-price">175,000 <small>ج.م</small></div>
        <div class="total-note">يمكن تقسيمها على 3 دفعات حسب مراحل التسليم</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="icon">🐦</div> Flutter iOS + Android</div>
        <div class="total-item"><div class="icon">🔴</div> Laravel 11 API كامل</div>
        <div class="total-item"><div class="icon">🛠️</div> كل الأدوات التعليمية</div>
        <div class="total-item"><div class="icon">⚖️</div> الترجمة + Baby Academy</div>
        <div class="total-item"><div class="icon">🛡️</div> ضمان إصلاح بجز شهر كامل</div>
      </div>
    </div>
  </div>

  <!-- PAYMENT TERMS -->
  <div class="section">
    <div class="section-header">
      <div class="section-icon blue">💸</div>
      <div>
        <div class="section-title">شروط الدفع</div>
        <div class="section-subtitle">تقسيم على مراحل التسليم</div>
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
            <td style="color:var(--primary); font-weight:800;">52,500 ج (30%)</td>
            <td>توقيع العقد وبدء الشغل</td>
          </tr>
          <tr>
            <td>🟡 دفعة ثانية</td>
            <td>بعد الأسبوع 9</td>
            <td style="color:var(--primary); font-weight:800;">87,500 ج (50%)</td>
            <td>تسليم النسخة الأولى للتجربة</td>
          </tr>
          <tr>
            <td>🟢 دفعة ثالثة</td>
            <td>عند التسليم النهائي</td>
            <td style="color:var(--primary); font-weight:800;">35,000 ج (20%)</td>
            <td>رفع على المتاجر + تسليم السورس</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- FOOTER -->
  <div style="text-align:center; margin-top:40px; padding-top:28px; border-top: 1px solid var(--border);">
    <div style="font-size:22px; font-weight:900; color:var(--text); margin-bottom:8px;">جاهز نبدأ؟ 🚀</div>
    <div style="font-size:14px; color:var(--text2);">العرض ده صالح لمدة 14 يوم من تاريخه — تواصل معنا لأي استفسار أو تعديل</div>
  </div>

</div>
</body>
</html>
