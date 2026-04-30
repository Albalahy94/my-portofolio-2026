<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>عرض سعر — تطبيقات الأطفال التعليمية</title>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
<style>
  :root {
    --text: #1A202C; --text2: #4A5568; --text3: #94A3B8;
    --border: #E2E8F0; --bg: #F8FAFC; --white: #FFFFFF;
    --green: #059669; --green-pale: #ECFDF5;
    --red: #DC2626; --red-pale: #FEF2F2;
    --primary: #7C3AED;
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

  /* TIMELINE */
  .tl-item { display: flex; gap: 16px; padding-bottom: 22px; position: relative; }
  .tl-item::before { content: ''; position: absolute; right: 17px; top: 38px; bottom: 0; width: 2px; background: var(--border); }
  .tl-item:last-child::before { display: none; }
  .tl-dot { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 14px; flex-shrink: 0; position: relative; z-index: 1; border: 2px solid; }
  .tl-body { flex: 1; padding-top: 4px; }
  .tl-week  { font-size: 11px; font-weight: 700; margin-bottom: 2px; }
  .tl-title { font-size: 14px; font-weight: 700; margin-bottom: 2px; }
  .tl-desc  { font-size: 12px; color: var(--text2); }

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

  /* NOTE */
  .note-box { border-radius: 11px; padding: 12px 16px; display: flex; gap: 10px; margin-bottom: 20px; }
  .note-box .icon { font-size: 17px; flex-shrink: 0; margin-top: 2px; }
  .note-box .text { font-size: 12px; line-height: 1.7; }

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
    <div class="header" style="background: linear-gradient(140deg, #3B0764 0%, #5B21B6 50%, #7C3AED 100%);">
      <div class="h-dots"></div>
      <div class="h-glow" style="background: radial-gradient(circle, rgba(167,139,250,0.25) 0%, transparent 60%);"></div>
      <div class="h-glow2" style="background: radial-gradient(circle, rgba(236,72,153,0.15) 0%, transparent 65%);"></div>
      <div class="header-top">
        <div class="brand">
          <div class="brand-icon" style="background: rgba(255,255,255,0.15);">🧒</div>
          <div>
            <div class="brand-name">تطبيقات الأطفال التعليمية</div>
            <div class="brand-sub">Arabic Letters + English Letters + Math For Kids</div>
          </div>
        </div>
        <div class="prop-badge" style="background:rgba(167,139,250,0.25); border:1px solid rgba(167,139,250,0.4); color:#DDD6FE;">عرض سعر رسمي</div>
      </div>
      <div class="header-body">
        <h1>3 تطبيقات أطفال<br><span style="color:#C4B5FD;">تعليمية تفاعلية</span></h1>
        <p>حروف عربية + حروف إنجليزية + رياضيات — Flutter + Laravel — iOS & Android</p>
      </div>
      <div class="header-pills">
        <div class="pill"><div class="pill-dot" style="background:#C4B5FD;"></div> Flutter iOS + Android</div>
        <div class="pill"><div class="pill-dot" style="background:#C4B5FD;"></div> 3 تطبيقات مستقلة</div>
        <div class="pill"><div class="pill-dot" style="background:#C4B5FD;"></div> Laravel Backend مشترك</div>
        <div class="pill"><div class="pill-dot" style="background:#C4B5FD;"></div> تسليم 14 أسبوع</div>
      </div>
    </div>

    <div class="info-box" style="background:#F5F3FF; border:1px solid #DDD6FE;">
      <div class="icon">💡</div>
      <div class="text" style="color:#4C1D95;">3 تطبيقات بـ <strong>backend مشترك واحد</strong> — ده بيوفر تكلفة التطوير بشكل كبير. كل تطبيق مستقل على المتاجر لكنهم بيشتركوا في نظام الإدارة والتتبع والـ analytics.</div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#F5F3FF;">💰</div>
        <div><div class="section-title">نماذج الربح</div><div class="section-sub">إزاي التطبيقات دي بتكسب فلوس</div></div>
      </div>
      <div class="mon-grid">
        <div class="mon-item">
          <span class="mon-icon">📺</span>
          <div class="mon-title">إعلانات Ads</div>
          <div class="mon-desc">AdMob — بانر + interstitial بين الدروس</div>
        </div>
        <div class="mon-item">
          <span class="mon-icon">⭐</span>
          <div class="mon-title">Premium Version</div>
          <div class="mon-desc">رفع القيود، محتوى إضافي، بدون إعلانات</div>
        </div>
        <div class="mon-item">
          <span class="mon-icon">🎮</span>
          <div class="mon-title">In-App Purchases</div>
          <div class="mon-desc">شخصيات، ألعاب إضافية، شارات مميزة</div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#F5F3FF;">⚙️</div>
        <div><div class="section-title">فيتشرز التطبيقات الـ 3</div><div class="section-sub">مشترك + خاص بكل تطبيق</div></div>
      </div>
      <div class="feat-grid">
        <div class="feat-card">
          <span class="feat-icon">🔤</span>
          <div class="feat-title">Arabic Letters For Kids</div>
          <div class="feat-desc">28 حرف عربي بصوت ورسوم، تتبع الكتابة، كلمات مع صور، ألعاب تركيب حروف، وأناشيد تعليمية.</div>
          <div class="feat-tags">
            <span class="tag" style="background:#F5F3FF; color:#7C3AED;">صوت عربي</span>
            <span class="tag" style="background:#ECFDF5; color:#059669;">رسم حروف</span>
            <span class="tag" style="background:#EFF6FF; color:#1D4ED8;">ألعاب</span>
          </div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">🔡</span>
          <div class="feat-title">English Letters For Kids</div>
          <div class="feat-desc">26 حرف إنجليزي، نطق صحيح، Phonics، كلمات بسيطة، تلوين وألعاب تفاعلية.</div>
          <div class="feat-tags">
            <span class="tag" style="background:#F5F3FF; color:#7C3AED;">Phonics</span>
            <span class="tag" style="background:#ECFDF5; color:#059669;">نطق صحيح</span>
            <span class="tag" style="background:#FFFBEB; color:#D97706;">تلوين</span>
          </div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">🔢</span>
          <div class="feat-title">Math For Kids</div>
          <div class="feat-desc">أرقام 1-100، جمع وطرح وضرب تفاعلي، جداول الضرب بالأناشيد، ألعاب حساب ممتعة.</div>
          <div class="feat-tags">
            <span class="tag" style="background:#F5F3FF; color:#7C3AED;">جداول ضرب</span>
            <span class="tag" style="background:#ECFDF5; color:#059669;">ألعاب حساب</span>
            <span class="tag" style="background:#EFF6FF; color:#1D4ED8;">أناشيد</span>
          </div>
        </div>
        <div class="feat-card">
          <span class="feat-icon">🏆</span>
          <div class="feat-title">فيتشرز مشتركة للـ 3</div>
          <div class="feat-desc">نظام نجوم ومكافآت، أوسمة إتمام، تقدم يومي، بروفايل الطفل، وضع أولياء الأمور، وحماية من المحتوى الخارجي.</div>
          <div class="feat-tags">
            <span class="tag" style="background:#F5F3FF; color:#7C3AED;">نجوم</span>
            <span class="tag" style="background:#ECFDF5; color:#059669;">Parent Mode</span>
            <span class="tag" style="background:#FFFBEB; color:#D97706;">أوسمة</span>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#F5F3FF;">🔧</div>
        <div><div class="section-title">التقنيات</div></div>
      </div>
      <div class="tech-grid">
        <div class="tech-item"><span class="tech-emoji">🐦</span><div class="tech-name">Flutter</div><div class="tech-role">iOS + Android (3 تطبيقات)</div></div>
        <div class="tech-item"><span class="tech-emoji">🔴</span><div class="tech-name">Laravel 11</div><div class="tech-role">Backend مشترك</div></div>
        <div class="tech-item"><span class="tech-emoji">📺</span><div class="tech-name">AdMob</div><div class="tech-role">إعلانات Google</div></div>
        <div class="tech-item"><span class="tech-emoji">🎵</span><div class="tech-name">Audio Assets</div><div class="tech-role">أصوات + أناشيد</div></div>
        <div class="tech-item"><span class="tech-emoji">🔔</span><div class="tech-name">Firebase FCM</div><div class="tech-role">إشعارات</div></div>
        <div class="tech-item"><span class="tech-emoji">📊</span><div class="tech-name">Firebase Analytics</div><div class="tech-role">تتبع الاستخدام</div></div>
      </div>
    </div>

    <div class="section">
      <div class="section-header">
        <div class="section-icon" style="background:#F5F3FF;">💰</div>
        <div><div class="section-title">عرض الأسعار</div><div class="section-sub">3 باقات — الـ 3 تطبيقات مع بعض</div></div>
      </div>
      <div class="pricing-grid">
        <div class="plan-card">
          <div class="plan-name">🥉 باقة Starter</div>
          <div class="plan-price">55,000<small> ج</small></div>
          <div class="plan-dur">تسليم 9 أسابيع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> Flutter Android فقط</li>
            <li><span class="ck">✓</span> تطبيق واحد فقط (Arabic)</li>
            <li><span class="ck">✓</span> 28 حرف + صوت</li>
            <li><span class="ck">✓</span> AdMob أساسي</li>
            <li><span class="ck">✓</span> نجوم ومكافآت</li>
            <li><span class="xx">✗</span> iOS</li>
            <li><span class="xx">✗</span> باقي التطبيقات</li>
            <li><span class="xx">✗</span> Parent Dashboard</li>
          </ul>
          <button class="plan-btn outline">اختر هذه الباقة</button>
        </div>
        <div class="plan-card featured">
          <div class="plan-name">🥇 باقة Professional</div>
          <div class="plan-price">110,000<small> ج</small></div>
          <div class="plan-dur">تسليم 14 أسبوع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> Flutter iOS + Android</li>
            <li><span class="ck">✓</span> الـ 3 تطبيقات كاملة</li>
            <li><span class="ck">✓</span> Backend مشترك</li>
            <li><span class="ck">✓</span> AdMob + In-App Purchase</li>
            <li><span class="ck">✓</span> Parent Mode + Dashboard</li>
            <li><span class="ck">✓</span> أوسمة + تقدم يومي</li>
            <li><span class="ck">✓</span> FCM إشعارات</li>
            <li><span class="ck">✓</span> Admin Panel</li>
          </ul>
          <button class="plan-btn" style="background:#7C3AED; color:white;">اختر هذه الباقة</button>
        </div>
        <div class="plan-card">
          <div class="plan-name">💎 باقة Enterprise</div>
          <div class="plan-price">165,000<small> ج</small></div>
          <div class="plan-dur">تسليم 20 أسبوع</div>
          <ul class="plan-feats">
            <li><span class="ck">✓</span> كل حاجة في Professional</li>
            <li><span class="ck">✓</span> AI تكيّف مع مستوى الطفل</li>
            <li><span class="ck">✓</span> تطبيق ولي الأمر منفصل</li>
            <li><span class="ck">✓</span> Multiplayer ألعاب جماعية</li>
            <li><span class="ck">✓</span> Subscription نموذج</li>
            <li><span class="ck">✓</span> دعم 3 أشهر مجاناً</li>
          </ul>
          <button class="plan-btn outline">اختر هذه الباقة</button>
        </div>
      </div>
    </div>

    <div class="note-box" style="background:#FFFBEB; border:1px solid #fde68a;">
      <div class="icon">⚠️</div>
      <div class="text" style="color:#78350f;">الأسعار لا تشمل: رسوم Apple Developer ($99/سنة)، Google Play ($25 مرة)، رسوم AdMob، Assets صوتية ورسوم. الـ 3 تطبيقات بـ Backend مشترك = توفير ~30% مقارنة بتطوير كل تطبيق منفرد.</div>
    </div>

    <div class="total-box" style="background: linear-gradient(140deg, #3B0764, #5B21B6);">
      <div class="total-bg"></div>
      <div class="total-glow" style="background: radial-gradient(circle, rgba(167,139,250,0.25) 0%, transparent 70%);"></div>
      <div class="total-left">
        <div class="total-lbl">الباقة المقترحة (Professional)</div>
        <div class="total-price">110,000 <small>ج.م</small></div>
        <div class="total-note">3 تطبيقات كاملة — iOS + Android</div>
      </div>
      <div class="total-right">
        <div class="total-item"><div class="ic">🧒</div> 3 تطبيقات iOS + Android</div>
        <div class="total-item"><div class="ic">💰</div> AdMob + In-App Purchases</div>
        <div class="total-item"><div class="ic">👨‍👩‍👧</div> Parent Mode + Dashboard</div>
        <div class="total-item"><div class="ic">🛡️</div> ضمان بجز شهر</div>
      </div>
    </div>

    <div class="section" style="margin-top:20px;">
      <div class="card">
        <table class="tbl">
          <thead><tr><th>المرحلة</th><th>التوقيت</th><th>المبلغ</th><th>المستحق عند</th></tr></thead>
          <tbody>
            <tr><td>🔵 أولى</td><td>عند التعاقد</td><td style="color:#7C3AED; font-weight:800;">33,000 ج (30%)</td><td>توقيع العقد</td></tr>
            <tr><td>🟡 ثانية</td><td>بعد الأسبوع 7</td><td style="color:#7C3AED; font-weight:800;">55,000 ج (50%)</td><td>تسليم النسخة الأولى</td></tr>
            <tr><td>🟢 ثالثة</td><td>التسليم النهائي</td><td style="color:#7C3AED; font-weight:800;">22,000 ج (20%)</td><td>نشر على المتاجر</td></tr>
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
