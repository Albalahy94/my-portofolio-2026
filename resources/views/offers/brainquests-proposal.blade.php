<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — تطبيق Brainquests</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --text: #1A202C; --text2: #4A5568; --text3: #94A3B8;
    --border: #E2E8F0; --bg: #F8FAFC; --white: #FFFFFF;
    --green: #059669; --green-pale: #ECFDF5;
    --red: #DC2626; --red-pale: #FEF2F2;
    --primary: #1D4ED8;
  }
  @media (prefers-color-scheme: dark) {
    :root {
      --text: #F8FAFC; --text2: #CBD5E1; --text3: #94A3B8;
      --border: #1E293B; --bg: #0F172A; --white: #1E293B;
      --green: #10B981; --green-pale: #064E3B;
      --red: #EF4444; --red-pale: #450A0A;
    }
  }
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Cairo', sans-serif; background: var(--bg); color: var(--text); line-height: 1.7; }
  .page { max-width: 960px; margin: 0 auto; padding: 32px 24px 80px; }

  /* HEADER */
  .header {
    border-radius: 20px; padding: 44px 44px 38px;
    margin-bottom: 24px; position: relative; overflow: hidden;
  }
  .h-dots { position: absolute; inset: 0; background-image: radial-gradient(circle, rgba(255,255,255,0.07) 1px, transparent 1px); background-size: 24px 24px; }
  .h-glow { position: absolute; top: -80px; right: -60px; width: 360px; height: 360px; border-radius: 50%; }
  .h-glow2 { position: absolute; bottom: -50px; left: 40px; width: 240px; height: 240px; border-radius: 50%; }

  .header-top { display: flex; align-items: center; justify-content: space-between; margin-bottom: 26px; position: relative; z-index: 1; flex-wrap: wrap; gap: 10px; }
  .brand { display: flex; align-items: center; gap: 12px; }
  .brand-icon { width: 50px; height: 50px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 24px; }
  .brand-name { font-size: 18px; font-weight: 900; color: white; }
  .brand-sub  { font-size: 12px; color: rgba(255,255,255,0.5); }
  .prop-badge { padding: 5px 16px; border-radius: 100px; font-size: 12px; font-weight: 600; }
  .header-body { position: relative; z-index: 1; }
  .header-body h1 { font-size: 32px; font-weight: 900; color: white; line-height: 1.3; margin-bottom: 8px; }
  .header-body p { color: rgba(255,255,255,0.55); font-size: 14px; }
  .header-pills { display: flex; gap: 8px; margin-top: 22px; position: relative; z-index: 1; flex-wrap: wrap; }
  .pill { display: flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.14); color: rgba(255,255,255,0.7); padding: 5px 12px; border-radius: 100px; font-size: 12px; }
  .pill-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }

  /* SECTION */
  .section { margin-bottom: 24px; }
  .section-header { display: flex; align-items: center; gap: 10px; margin-bottom: 14px; }
  .section-icon { width: 38px; height: 38px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 17px; flex-shrink: 0; }
  .section-title { font-size: 18px; font-weight: 800; }
  .section-sub   { font-size: 12px; color: var(--text3); margin-top: 1px; }

  /* CARD */
  .card { background: var(--white); border: 1px solid var(--border); border-radius: 14px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.04); }

  /* FEATURES GRID */
  .feat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .feat-card { background: var(--white); border: 1px solid var(--border); border-radius: 12px; padding: 16px 18px; transition: box-shadow 0.2s; }
  .feat-card:hover { box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
  .feat-icon  { font-size: 22px; margin-bottom: 8px; display: block; }
  .feat-title { font-size: 14px; font-weight: 700; margin-bottom: 5px; }
  .feat-desc  { font-size: 12px; color: var(--text2); line-height: 1.6; }
  .feat-tags  { display: flex; flex-wrap: wrap; gap: 5px; margin-top: 8px; }
  .tag { font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 100px; }

  /* TABLE */
  .tbl { width: 100%; border-collapse: collapse; }
  .tbl thead tr { background: #0F1117; }
  .tbl thead th { padding: 12px 16px; text-align: right; color: rgba(255,255,255,0.72); font-size: 12px; font-weight: 600; }
  .tbl tbody tr { border-bottom: 1px solid var(--border); transition: background 0.12s; }
  .tbl tbody tr:hover { background: var(--bg); }
  .tbl tbody tr:last-child { border-bottom: none; }
  .tbl tbody td { padding: 11px 16px; font-size: 12px; color: var(--text2); }
  .tbl tbody td:first-child { font-weight: 700; color: var(--text); }
  .num { display: inline-flex; align-items: center; justify-content: center; width: 24px; height: 24px; border-radius: 5px; font-size: 11px; font-weight: 700; margin-left: 7px; }
  .badge { font-size: 10px; font-weight: 600; padding: 2px 8px; border-radius: 100px; }

  /* TECH GRID */
  .tech-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; }
  .tech-item { background: var(--white); border: 1px solid var(--border); border-radius: 11px; padding: 14px; text-align: center; }
  .tech-emoji { font-size: 20px; margin-bottom: 6px; display: block; }
  .tech-name  { font-size: 13px; font-weight: 700; margin-bottom: 2px; }
  .tech-role  { font-size: 11px; color: var(--text3); }

  /* PRICING */
  .pricing-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 12px; }
  .plan-card { background: var(--white); border: 2px solid var(--border); border-radius: 16px; padding: 20px 16px; text-align: center; position: relative; transition: transform 0.2s, box-shadow 0.2s; }
  .plan-card:hover { transform: translateY(-3px); box-shadow: 0 10px 28px rgba(0,0,0,0.09); }
  .plan-card.featured::before { content: '⭐ الأكثر طلباً'; position: absolute; top: -12px; left: 50%; transform: translateX(-50%); font-size: 11px; font-weight: 700; padding: 3px 12px; border-radius: 100px; white-space: nowrap; color: white; background: var(--primary); }
  .plan-name  { font-size: 13px; font-weight: 700; color: var(--text2); margin-bottom: 10px; }
  .plan-price { font-size: 32px; font-weight: 900; color: var(--text); line-height: 1; margin-bottom: 3px; }
  .plan-price small { font-size: 13px; font-weight: 500; color: var(--text3); }
  .plan-dur   { font-size: 12px; color: var(--text3); margin-bottom: 14px; }
  .plan-feats { list-style: none; text-align: right; margin-bottom: 16px; }
  .plan-feats li { font-size: 12px; color: var(--text2); padding: 4px 0; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 6px; }
  .plan-feats li:last-child { border-bottom: none; }
  .plan-feats li .ck { color: var(--green); font-size: 12px; flex-shrink: 0; }
  .plan-feats li .xx { color: var(--text3); font-size: 12px; flex-shrink: 0; }
  .plan-btn { width: 100%; padding: 10px; border-radius: 9px; font-family: 'Cairo', sans-serif; font-size: 13px; font-weight: 700; cursor: pointer; border: none; transition: all 0.2s; }
  .plan-btn.outline { background: transparent; border: 2px solid var(--border); color: var(--text2); }

  /* TOTAL BOX */
  .total-box { border-radius: 18px; padding: 30px 36px; display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap; position: relative; overflow: hidden; }
  .total-bg { position: absolute; inset: 0; background-image: radial-gradient(circle, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 20px 20px; }
  .total-glow { position: absolute; top: -30px; right: -30px; width: 180px; height: 180px; border-radius: 50%; }
  .total-left { position: relative; z-index: 1; }
  .total-lbl  { color: rgba(255,255,255,0.45); font-size: 12px; margin-bottom: 6px; }
  .total-price { font-size: 46px; font-weight: 900; color: white; line-height: 1; }
  .total-price small { font-size: 16px; color: rgba(255,255,255,0.5); font-weight: 400; }
  .total-note { font-size: 11px; color: rgba(255,255,255,0.3); margin-top: 6px; }
  .total-right { position: relative; z-index: 1; display: flex; flex-direction: column; gap: 8px; }
  .total-item { display: flex; align-items: center; gap: 8px; color: rgba(255,255,255,0.65); font-size: 12px; }
  .total-item .ic { width: 28px; height: 28px; background: rgba(255,255,255,0.07); border-radius: 7px; display: flex; align-items: center; justify-content: center; font-size: 13px; }

  /* INFO BOX */
  .info-box { border-radius: 11px; padding: 14px 18px; display: flex; gap: 10px; margin-bottom: 16px; }
  .info-box .icon { font-size: 18px; flex-shrink: 0; margin-top: 2px; }
  .info-box .text { font-size: 13px; line-height: 1.7; }

  /* MONETIZE GRID */
  .mon-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-bottom: 16px; }
  .mon-item { background: var(--white); border: 1px solid var(--border); border-radius: 11px; padding: 14px; text-align: center; }
  .mon-icon  { font-size: 20px; margin-bottom: 6px; display: block; }
  .mon-title { font-size: 13px; font-weight: 700; margin-bottom: 3px; }
  .mon-desc  { font-size: 11px; color: var(--text2); }

  @media (max-width: 640px) {
    .feat-grid { grid-template-columns: 1fr; }
    .pricing-grid { grid-template-columns: 1fr; }
    .tech-grid { grid-template-columns: 1fr 1fr; }
    .mon-grid { grid-template-columns: 1fr 1fr; }
    .header { padding: 28px 22px; }
    .header-body h1 { font-size: 24px; }
    .total-box { padding: 24px 20px; }
    .total-price { font-size: 36px; }
  }
</style>
</head>
<body>
<div class="page">
    <div class="header" style="background: linear-gradient(140deg, #0C2340 0%, #0E3A6E 50%, #1D4ED8 100%);">
      <div class="h-dots"></div>
      <div class="h-glow" style="background: radial-gradient(circle, rgba(59,130,246,0.25) 0%, transparent 60%);"></div>
      <div class="h-glow2" style="background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 65%);"></div>
      <div class="header-top">
        <div class="brand">
          <div class="brand-icon" style="background: rgba(255,255,255,0.12);">🧠</div>
          <div>
            <div class="brand-name">Brainquests</div>
            <div class="brand-sub">Flutter + Laravel Stack</div>
          </div>
        </div>
        <div class="prop-badge" style="background:rgba(59,130,246,0.25); border:1px solid rgba(59,130,246,0.4); color:#93C5FD;">عرض سعر رسمي</div>
      </div>
      <div class="header-body">
        <h1>تطبيق ألغاز<br><span style="color:#93C5FD;">وكويزات ذكية</span></h1>
        <p>Gamification كاملة — تحديات يومية — لوحة متصدرين — Flutter iOS + Android</p>
      </div>
      <div class="header-pills">
        <div class="pill"><div class="pill-dot" style="background:#93C5FD;"></div> Flutter iOS + Android</div>
        <div class="pill"><div class="pill-dot" style="background:#93C5FD;"></div> Laravel 11 Backend</div>
        <div class="pill"><div class="pill-dot" style="background:#93C5FD;"></div> Gamification كاملة</div>
        <div class="pill"><div class="pill-dot" style="background:#93C5FD;"></div> تسليم 12 أسبوع</div>
      </div>
    </div>

    <div class="info-box" style="background:#EFF6FF; border:1px solid #BFDBFE;">
      <div class="icon">💡</div>
      <div class="text" style="color:#1E3A8A;">Brainquests تطبيق كويزات وألغاز ذكية بـ Gamification قوية — تحديات يومية، League system، مكافآت، وMultiplayer. نموذج Duolingo لكن للمعرفة العامة والمسابقات.</div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#EFF6FF;">💰</div>
        <div><div class="section-title">نماذج الربح</div></div>
      </div>
      <div class="mon-grid">
        <div class="mon-item"><span class="mon-icon">💎</span><div class="mon-title">Coins System</div><div class="mon-desc">شراء عملات داخلية للتلميحات والحياة الإضافية</div></div>
        <div class="mon-item"><span class="mon-icon">👑</span><div class="mon-title">Premium Subscription</div><div class="mon-desc">بدون إعلانات + مستويات حصرية + تحليلات</div></div>
        <div class="mon-item"><span class="mon-icon">📺</span><div class="mon-title">Rewarded Ads</div><div class="mon-desc">شاهد إعلان وكسب حياة إضافية</div></div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#EFF6FF;">⚙️</div>
        <div><div class="section-title">الفيتشرز الكاملة</div></div>
      </div>
      <div class="feat-grid">
        <div class="feat-card">
          <span class="feat-icon">🎮</span>
          <div class="feat-title">أنواع الكويزات</div>
          <div class="feat-desc">اختيار من متعدد، صح/خطأ، ترتيب، ملء الفراغ، وصور. تايمر، نقاط، streak، وتلميحات.</div>
          <div class="feat-tags"><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Multi-type</span><span class="tag" style="background:#ECFDF5; color:#059669;">Timer</span></div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">🏆</span>
          <div class="feat-title">Leagues + Leaderboard</div>
          <div class="feat-desc">Bronze → Silver → Gold → Diamond leagues، ترقية وهبوط أسبوعي، لوحة المتصدرين المحلية والعالمية.</div>
          <div class="feat-tags"><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Leagues</span><span class="tag" style="background:#FFFBEB; color:#D97706;">Weekly</span></div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">📅</span>
          <div class="feat-title">Daily Challenges</div>
          <div class="feat-desc">تحدي يومي لكل المستخدمين، Streak system، مكافآت الحضور اليومي، وتحديات أسبوعية خاصة.</div>
          <div class="feat-tags"><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Daily</span><span class="tag" style="background:#ECFDF5; color:#059669;">Streak</span></div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">⚔️</span>
          <div class="feat-title">1vs1 Challenge</div>
          <div class="feat-desc">تحدي مباشر مع صديق أو عشوائي، نفس الأسئلة بنفس الوقت، نتيجة فورية.</div>
          <div class="feat-tags"><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Real-time</span><span class="tag" style="background:#F5F3FF; color:#7C3AED;">Multiplayer</span></div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">📚</span>
          <div class="feat-title">فئات متنوعة</div>
          <div class="feat-desc">ثقافة عامة، علوم، تاريخ، رياضيات، لغات، دين، وترفيه — مع فلتر حسب الاهتمام.</div>
          <div class="feat-tags"><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Categories</span><span class="tag" style="background:#FFFBEB; color:#D97706;">Filter</span></div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">🎖️</span>
          <div class="feat-title">Badges + Achievements</div>
          <div class="feat-desc">أكثر من 50 إنجاز، شارات قابلة للمشاركة، ملف شخصي مميز، وتاريخ الإنجازات.</div>
          <div class="feat-tags"><span class="tag" style="background:#ECFDF5; color:#059669;">50+ Badges</span><span class="tag" style="background:#EFF6FF; color:#1D4ED8;">Share</span></div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#EFF6FF;">🔧</div>
        <div><div class="section-title">التقنيات</div></div>
      </div>
      <div class="tech-grid">
        <div class="tech-item"><span class="tech-emoji">🐦</span><div class="tech-name">Flutter</div><div class="tech-role">iOS + Android</div></div>
        <div class="tech-item"><span class="tech-emoji">🔴</span><div class="tech-name">Laravel 11</div><div class="tech-role">API + Game Logic</div></div>
        <div class="tech-item"><span class="tech-emoji">⚡</span><div class="tech-name">Pusher / Sockets</div><div class="tech-role">1vs1 Real-time</div></div>
        <div class="tech-item"><span class="tech-emoji">📊</span><div class="tech-name">Firebase Analytics</div><div class="tech-role">تتبع السلوك</div></div>
        <div class="tech-item"><span class="tech-emoji">📺</span><div class="tech-name">AdMob</div><div class="tech-role">Rewarded Ads</div></div>
        <div class="tech-item"><span class="tech-emoji">🔔</span><div class="tech-name">FCM</div><div class="tech-role">تحديات + تذكير Streak</div></div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#EFF6FF;">💰</div>
        <div><div class="section-title">عرض الأسعار</div></div>
      </div>
      <div class="pricing-grid">
        <div class="plan-card">
          <div class="plan-name">🥉 Starter</div>
          <div class="plan-price">45,000<small> ج</small></div>
          <div class="plan-dur">تسليم 8 أسابيع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> Flutter Android</li>
            <li><span class="ck">✓</span> كويزات متعددة</li>
            <li><span class="ck">✓</span> Leaderboard</li>
            <li><span class="ck">✓</span> AdMob</li>
            <li><span class="xx">✗</span> iOS</li>
            <li><span class="xx">✗</span> 1vs1 Real-time</li>
            <li><span class="xx">✗</span> Leagues</li>
          </ul>
          <button class="plan-btn outline">اختر</button>
        </div>
        <div class="plan-card featured">
          <div class="plan-name">🥇 Professional</div>
          <div class="plan-price">85,000<small> ج</small></div>
          <div class="plan-dur">تسليم 12 أسبوع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> Flutter iOS + Android</li>
            <li><span class="ck">✓</span> كل فيتشرز الـ Starter</li>
            <li><span class="ck">✓</span> 1vs1 Real-time Challenge</li>
            <li><span class="ck">✓</span> Leagues System</li>
            <li><span class="ck">✓</span> Daily Challenges + Streak</li>
            <li><span class="ck">✓</span> Coins + In-App Purchase</li>
            <li><span class="ck">✓</span> 50+ Badges + Achievements</li>
            <li><span class="ck">✓</span> Admin + بنك أسئلة</li>
          </ul>
          <button class="plan-btn" style="background:#1D4ED8; color:white;">اختر</button>
        </div>
        <div class="plan-card">
          <div class="plan-name">💎 Enterprise</div>
          <div class="plan-price">130,000<small> ج</small></div>
          <div class="plan-dur">تسليم 18 أسبوع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> كل Professional</li>
            <li><span class="ck">✓</span> Tournament نظام بطولات</li>
            <li><span class="ck">✓</span> AI توليد أسئلة تلقائي</li>
            <li><span class="ck">✓</span> Team vs Team</li>
            <li><span class="ck">✓</span> Live Quiz Events</li>
            <li><span class="ck">✓</span> دعم 3 أشهر</li>
          </ul>
          <button class="plan-btn outline">اختر</button>
        </div>
      </div>
    </div>

    <div class="total-box" style="background: linear-gradient(140deg, #0C2340, #0E3A6E);" >
      <div class="total-bg"></div>
      <div class="total-glow" style="background: radial-gradient(circle, rgba(59,130,246,0.22) 0%, transparent 70%);"></div>
      <div class="total-left">
        <div class="total-lbl">الباقة المقترحة (Professional)</div>
        <div class="total-price">85,000 <small>ج.م</small></div>
        <div class="total-note">iOS + Android — 12 أسبوع</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="ic">⚔️</div> 1vs1 Real-time</div>
        <div class="total-item"><div class="ic">🏆</div> Leagues System</div>
        <div class="total-item"><div class="ic">💎</div> Coins + IAP</div>
        <div class="total-item"><div class="ic">🛡️</div> ضمان بجز شهر</div>
      </div>
    </div>

    <div class="section" style="margin-top:20px;">
      <div class="card">
        <table class="tbl">
          <thead><tr><th>المرحلة</th><th>التوقيت</th><th>المبلغ</th><th>المستحق عند</th></tr></thead>
          <tbody>
            <tr><td>🔵 أولى</td><td>عند التعاقد</td><td style="color:#1D4ED8; font-weight:800;">25,500 ج (30%)</td><td>توقيع العقد</td></tr>
            <tr><td>🟡 ثانية</td><td>بعد الأسبوع 6</td><td style="color:#1D4ED8; font-weight:800;">42,500 ج (50%)</td><td>تسليم النسخة الأولى</td></tr>
            <tr><td>🟢 ثالثة</td><td>التسليم النهائي</td><td style="color:#1D4ED8; font-weight:800;">17,000 ج (20%)</td><td>نشر على المتاجر</td></tr>
          </tbody>
        </table>
      </div>
    </div>

  <div style="text-align:center; margin-top:48px; padding-top:28px; border-top:1px solid var(--border);">
    <div style="font-size:20px; font-weight:900; margin-bottom:8px;">جاهز نبدأ؟ 🚀</div>
    <div style="font-size:13px; color:var(--text2);">العرض صالح لمدة 14 يوم — تواصل معنا لأي استفسار أو تعديل</div>
  </div>
</div>
</body>
</html>
