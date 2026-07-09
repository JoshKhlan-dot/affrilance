<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AfriLance — Work Without Borders</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --ink:#111210;
  --ink2:#3d3d3a;
  --ink3:#888882;
  --gold:#b5800e;
  --gold2:#d4980f;
  --gold-bg:#fdf6e7;
  --teal:#176b55;
  --teal2:#1d9e75;
  --teal-bg:#eaf5f0;
  --red:#c94a2a;
  --red-bg:#fdf0ec;
  --bg:#ffffff;
  --bg2:#f8f6f2;
  --bg3:#f1ede7;
  --border:#e5e0d8;
}
html{scroll-behavior:smooth}
body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--ink);overflow-x:hidden}

/* NAV */
nav{position:fixed;top:0;left:0;right:0;z-index:100;display:flex;align-items:center;justify-content:space-between;padding:1rem 5rem;background:rgba(255,255,255,0.95);backdrop-filter:blur(10px);border-bottom:1px solid var(--border)}
.logo{font-family:'Playfair Display',serif;font-size:1.45rem;font-weight:900;color:var(--ink);text-decoration:none;letter-spacing:-0.02em}
.logo span{color:var(--gold)}
.nav-links{display:flex;gap:2.5rem;list-style:none}
.nav-links a{color:var(--ink2);text-decoration:none;font-size:0.875rem;font-weight:400;transition:color 0.2s}
.nav-links a:hover{color:var(--gold)}
.nav-right{display:flex;gap:1rem;align-items:center}
.nav-login{color:var(--ink2);text-decoration:none;font-size:0.875rem;font-weight:400;transition:color 0.2s}
.nav-login:hover{color:var(--gold)}
.nav-btn{background:var(--ink);color:#fff;padding:0.55rem 1.3rem;border-radius:5px;text-decoration:none;font-size:0.85rem;font-weight:500;transition:background 0.2s}
.nav-btn:hover{background:var(--gold)}

/* HERO */
.hero{min-height:100vh;display:flex;align-items:center;padding:7rem 5rem 4rem;position:relative;overflow:hidden;background:var(--bg)}
.hero::before{content:'';position:absolute;top:0;right:0;width:55%;height:100%;background:radial-gradient(ellipse at 80% 40%,rgba(23,107,85,0.06) 0%,transparent 65%);pointer-events:none}
.hero::after{content:'';position:absolute;bottom:0;left:0;width:40%;height:60%;background:radial-gradient(ellipse at 20% 80%,rgba(181,128,14,0.05) 0%,transparent 60%);pointer-events:none}
.hero-left{flex:1;max-width:620px;position:relative;z-index:1}
.hero-tag{display:inline-flex;align-items:center;gap:7px;background:var(--gold-bg);border:1px solid rgba(181,128,14,0.2);color:var(--gold);padding:5px 13px;border-radius:100px;font-size:0.72rem;font-weight:600;letter-spacing:0.07em;text-transform:uppercase;margin-bottom:1.8rem}
.hero-tag::before{content:'';width:6px;height:6px;border-radius:50%;background:var(--gold);animation:blink 2s infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:0.2}}
h1{font-family:'Playfair Display',serif;font-size:clamp(2.8rem,5.5vw,4.8rem);font-weight:900;line-height:1.06;letter-spacing:-0.03em;color:var(--ink);margin-bottom:1.5rem}
h1 em{font-style:italic;color:var(--gold)}
h1 .muted{color:var(--ink3)}
.hero-desc{font-size:1.05rem;font-weight:300;line-height:1.8;color:var(--ink2);max-width:480px;margin-bottom:2.2rem}
.hero-btns{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:3rem}
.btn-dark{background:var(--ink);color:#fff;padding:0.85rem 1.8rem;border-radius:5px;text-decoration:none;font-size:0.9rem;font-weight:500;transition:background 0.2s,transform 0.15s;display:inline-block}
.btn-dark:hover{background:var(--gold);transform:translateY(-1px)}
.btn-outline{border:1.5px solid var(--border);color:var(--ink2);padding:0.85rem 1.8rem;border-radius:5px;text-decoration:none;font-size:0.9rem;font-weight:400;transition:all 0.2s;display:inline-block}
.btn-outline:hover{border-color:var(--gold);color:var(--gold)}
.hero-stats{display:flex;gap:2.5rem;padding-top:2rem;border-top:1px solid var(--border)}
.stat-val{font-family:'Playfair Display',serif;font-size:1.9rem;font-weight:700;color:var(--gold);display:block}
.stat-lbl{font-size:0.72rem;color:var(--ink3);text-transform:uppercase;letter-spacing:0.05em;margin-top:2px;display:block}

/* HERO CARDS */
.hero-right{width:380px;position:relative;height:480px;flex-shrink:0;margin-left:3rem}
.hcard{background:#fff;border:1px solid var(--border);border-radius:14px;padding:1rem 1.2rem;position:absolute;box-shadow:0 2px 20px rgba(17,18,16,0.06)}
.hcard.c1{top:0;right:0;width:215px;animation:f1 4s ease-in-out infinite}
.hcard.c2{top:145px;right:55px;width:245px;animation:f2 5s ease-in-out infinite}
.hcard.c3{top:305px;right:15px;width:205px;animation:f1 6s ease-in-out infinite 1s}
@keyframes f1{0%,100%{transform:translateY(0)}50%{transform:translateY(-9px)}}
@keyframes f2{0%,100%{transform:translateY(0)}50%{transform:translateY(7px)}}
.hcard-lbl{font-size:0.62rem;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:5px}
.hcard-name{font-size:0.87rem;font-weight:600;color:var(--ink)}
.hcard-role{font-size:0.71rem;color:var(--ink3);margin-top:1px}
.hcard-pill{display:inline-block;margin-top:8px;background:var(--teal-bg);color:var(--teal);font-size:0.63rem;font-weight:500;padding:3px 9px;border-radius:100px}
.hcard-amount{font-family:'Playfair Display',serif;font-size:1.25rem;color:var(--ink);margin-top:3px}
.hcard-sub{font-size:0.69rem;color:var(--ink3);margin-top:1px}
.match-row{display:flex;align-items:center;gap:7px;margin-top:8px}
.match-bar{flex:1;height:3px;background:var(--bg3);border-radius:2px;overflow:hidden}
.match-fill{height:100%;background:var(--teal2);border-radius:2px}
.match-pct{font-size:0.7rem;color:var(--teal);font-weight:600}

/* MARQUEE */
.marquee-section{overflow:hidden;padding:0.9rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:var(--bg2)}
.marquee-track{display:flex;gap:0;white-space:nowrap;animation:scroll 25s linear infinite}
.marquee-item{font-size:0.72rem;letter-spacing:0.1em;text-transform:uppercase;color:var(--ink3);padding:0 2rem}
.marquee-item b{color:var(--gold);margin-right:2rem}

/* SECTIONS */
.section{padding:5.5rem 5rem}
.section-tag{font-size:0.68rem;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:0.8rem}
h2{font-family:'Playfair Display',serif;font-size:clamp(1.9rem,3vw,2.7rem);font-weight:700;line-height:1.15;letter-spacing:-0.025em;color:var(--ink)}
h2 em{font-style:italic;color:var(--gold)}

/* HOW IT WORKS */
.how{background:var(--bg2)}
.steps{display:grid;grid-template-columns:repeat(4,1fr);gap:0;margin-top:3.5rem;border:1px solid var(--border)}
.step{padding:2rem;background:var(--bg);border-right:1px solid var(--border);position:relative;transition:box-shadow 0.2s}
.step:last-child{border-right:none}
.step:hover{box-shadow:inset 0 0 0 1.5px var(--gold);z-index:1}
.step-n{font-family:'Playfair Display',serif;font-size:2.8rem;font-weight:900;color:rgba(181,128,14,0.08);position:absolute;top:1rem;right:1.1rem;line-height:1}
.step-icon{width:40px;height:40px;background:var(--gold-bg);border:1px solid rgba(181,128,14,0.18);border-radius:9px;display:flex;align-items:center;justify-content:center;margin-bottom:1.1rem;font-size:1rem;color:var(--gold)}
.step h3{font-size:0.95rem;font-weight:600;color:var(--ink);margin-bottom:0.45rem}
.step p{font-size:0.82rem;color:var(--ink2);line-height:1.65}

/* FEATURES */
.features-grid{display:grid;grid-template-columns:1fr 1fr;gap:1.1rem;margin-top:3rem}
.fcard{background:var(--bg);border:1px solid var(--border);border-radius:12px;padding:1.8rem;transition:border-color 0.2s,box-shadow 0.2s}
.fcard:hover{border-color:rgba(181,128,14,0.25);box-shadow:0 3px 16px rgba(17,18,16,0.05)}
.fcard.wide{grid-column:span 2;display:grid;grid-template-columns:1fr 1fr;gap:2.5rem;align-items:center}
.ftag{display:inline-block;font-size:0.63rem;font-weight:600;padding:3px 9px;border-radius:100px;letter-spacing:0.06em;text-transform:uppercase;margin-bottom:0.9rem;background:var(--teal-bg);color:var(--teal)}
.ftag.gold{background:var(--gold-bg);color:var(--gold)}
.ftag.red{background:var(--red-bg);color:var(--red)}
.fcard h3{font-size:1rem;font-weight:600;color:var(--ink);margin-bottom:0.5rem}
.fcard p{font-size:0.83rem;color:var(--ink2);line-height:1.7}
.pill-wrap{display:flex;flex-wrap:wrap;gap:7px;margin-top:1rem}
.pill{background:var(--bg2);border:1px solid var(--border);border-radius:100px;padding:4px 13px;font-size:0.76rem;color:var(--ink2)}
.ai-box{background:var(--teal-bg);border:1px solid rgba(23,107,85,0.14);border-radius:10px;padding:1.4rem}
.ai-lbl{font-size:0.63rem;font-weight:600;color:var(--teal);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:12px}
.ai-row{display:flex;align-items:flex-start;gap:9px;margin-bottom:11px}
.ai-dot{width:7px;height:7px;border-radius:50%;background:var(--teal2);flex-shrink:0;margin-top:5px}
.ai-label{font-size:0.77rem;color:var(--ink2);margin-bottom:3px}
.ai-bar{height:3px;border-radius:2px;background:rgba(23,107,85,0.1);overflow:hidden}
.ai-fill{height:100%;border-radius:2px;background:var(--teal2)}
.ai-total{display:flex;justify-content:space-between;align-items:center;margin-top:12px;padding-top:11px;border-top:1px solid rgba(23,107,85,0.12)}
.ai-total span:first-child{font-size:0.72rem;color:var(--ink3)}
.ai-total span:last-child{font-size:1.05rem;font-weight:600;color:var(--teal)}
.zero-box{margin-top:1.1rem;padding:0.9rem 1rem;background:var(--gold-bg);border-radius:8px;border:1px solid rgba(181,128,14,0.14)}
.zero-tag{font-size:0.63rem;font-weight:600;color:var(--gold);text-transform:uppercase;letter-spacing:0.06em}
.zero-val{font-family:'Playfair Display',serif;font-size:1.7rem;color:var(--gold);margin:2px 0}
.zero-sub{font-size:0.72rem;color:var(--ink3)}

/* TESTIMONIALS */
.testimonials{background:var(--bg2);border-top:1px solid var(--border)}
.testi-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.1rem;margin-top:3rem}
.tcard{background:var(--bg);border:1px solid var(--border);border-radius:12px;padding:1.7rem}
.stars{color:var(--gold);font-size:0.8rem;letter-spacing:2px;margin-bottom:0.85rem}
.tcard-text{font-size:0.88rem;line-height:1.78;color:var(--ink2);font-style:italic;margin-bottom:1.1rem}
.tcard-author{display:flex;align-items:center;gap:9px}
.avatar{width:34px;height:34px;border-radius:50%;background:var(--teal);display:flex;align-items:center;justify-content:center;font-size:0.7rem;font-weight:600;color:#fff;flex-shrink:0}
.author-name{font-size:0.83rem;font-weight:600;color:var(--ink)}
.author-role{font-size:0.7rem;color:var(--ink3);margin-top:1px}

/* CTA */
.cta-section{background:var(--ink);padding:6rem 5rem;text-align:center}
.cta-section .section-tag{color:var(--gold)}
.cta-section h2{color:#fff;max-width:560px;margin:0 auto 0.7rem}
.cta-section h2 em{color:var(--gold)}
.cta-section p{color:rgba(255,255,255,0.45);font-size:0.92rem;margin-bottom:1.8rem}
.tabs{display:flex;justify-content:center;gap:4px;margin-bottom:1.6rem}
.tab{padding:6px 17px;border-radius:100px;font-size:0.78rem;border:1px solid rgba(255,255,255,0.15);cursor:pointer;background:transparent;color:rgba(255,255,255,0.45);transition:all 0.2s;font-family:'Inter',sans-serif}
.tab.active{background:var(--gold);color:var(--ink);border-color:var(--gold);font-weight:600}
.signup-form{display:flex;gap:9px;max-width:440px;margin:0 auto}
.signup-form input{flex:1;padding:0.8rem 1rem;background:rgba(255,255,255,0.07);border:1px solid rgba(255,255,255,0.14);border-radius:5px;color:#fff;font-size:0.87rem;font-family:'Inter',sans-serif;outline:none;transition:border-color 0.2s}
.signup-form input::placeholder{color:rgba(255,255,255,0.28)}
.signup-form input:focus{border-color:var(--gold)}
.btn-gold{background:var(--gold);color:var(--ink);padding:0.8rem 1.5rem;border-radius:5px;font-size:0.87rem;font-weight:600;border:none;cursor:pointer;font-family:'Inter',sans-serif;transition:background 0.2s;white-space:nowrap}
.btn-gold:hover{background:var(--gold2)}
.form-msg{margin-top:0.9rem;font-size:0.82rem;min-height:18px;color:#1d9e75}

/* FOOTER */
footer{padding:2.5rem 5rem;border-top:1px solid var(--border);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem;background:var(--bg)}
.footer-links{display:flex;gap:2rem;list-style:none}
.footer-links a{color:var(--ink3);text-decoration:none;font-size:0.78rem;transition:color 0.2s}
.footer-links a:hover{color:var(--gold)}
.footer-copy{font-size:0.73rem;color:var(--ink3)}

@keyframes scroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}

@media(max-width:960px){
  nav{padding:1rem 1.5rem}
  .nav-links{display:none}
  .hero{padding:6.5rem 1.5rem 3rem;flex-direction:column}
  .hero-right{display:none}
  .section{padding:4rem 1.5rem}
  .steps{grid-template-columns:1fr 1fr}
  .step{border-bottom:1px solid var(--border)}
  .features-grid{grid-template-columns:1fr}
  .fcard.wide{grid-column:span 1;grid-template-columns:1fr}
  .testi-grid{grid-template-columns:1fr}
  .cta-section{padding:4rem 1.5rem}
  .signup-form{flex-direction:column}
  footer{flex-direction:column;text-align:center;padding:2rem 1.5rem}
}
</style>
</head>
<body>

<nav>
  <a href="#" class="logo">Afri<span>Lance</span></a>
  <ul class="nav-links">
    <li><a href="#how">How it works</a></li>
    <li><a href="#features">Features</a></li>
    <li><a href="#testimonials">Stories</a></li>
  </ul>
  <div class="nav-right">
    <a href="{{ route('login') }}" class="nav-login">Sign in</a>
    <a href="{{ route('register') }}" class="nav-btn">Get started</a>
  </div>
</nav>

<section class="hero">
  <div class="hero-left">
    <div class="hero-tag">Early access now open</div>
    <h1>Africa's <em>talent.</em><br><span class="muted">The world's work.</span></h1>
    <p class="hero-desc">AfriLance connects Africa's most skilled freelancers with global clients. Powered by AI matching, instant local payments, and zero commission to start.</p>
    <div class="hero-btns">
      <a href="{{ route('register') }}" class="btn-dark">Start as a freelancer</a>
      <a href="{{ route('register') }}" class="btn-outline">Hire talent →</a>
    </div>
    <div class="hero-stats">
      <div><span class="stat-val">54+</span><span class="stat-lbl">Countries</span></div>
      <div><span class="stat-val">0%</span><span class="stat-lbl">Commission</span></div>
      <div><span class="stat-val">AI</span><span class="stat-lbl">Matching</span></div>
    </div>
  </div>
  <div class="hero-right">
    <div class="hcard c1">
      <div class="hcard-lbl">Match found</div>
      <div class="hcard-name">Amara Osei</div>
      <div class="hcard-role">Full-stack Dev · Ghana</div>
      <div class="match-row"><div class="match-bar"><div class="match-fill" style="width:94%"></div></div><span class="match-pct">94%</span></div>
    </div>
    <div class="hcard c2">
      <div class="hcard-lbl">Payment sent</div>
      <div class="hcard-amount">KSh 84,000</div>
      <div class="hcard-sub">M-Pesa · Instant</div>
      <div class="hcard-pill">Completed ✓</div>
    </div>
    <div class="hcard c3">
      <div class="hcard-lbl">Top rated</div>
      <div class="hcard-name">Fatima Al-Rashid</div>
      <div class="hcard-role">Brand Designer · Morocco</div>
      <div class="hcard-pill">5.0 ★ · 142 jobs</div>
    </div>
  </div>
</section>

<div class="marquee-section">
  <div class="marquee-track">
    <span class="marquee-item"><b>✦</b>AI-powered matching</span>
    <span class="marquee-item"><b>✦</b>M-Pesa payments</span>
    <span class="marquee-item"><b>✦</b>Zero commission</span>
    <span class="marquee-item"><b>✦</b>Verified talent</span>
    <span class="marquee-item"><b>✦</b>Global clients</span>
    <span class="marquee-item"><b>✦</b>Instant escrow</span>
    <span class="marquee-item"><b>✦</b>54 countries</span>
    <span class="marquee-item"><b>✦</b>AI-powered matching</span>
    <span class="marquee-item"><b>✦</b>M-Pesa payments</span>
    <span class="marquee-item"><b>✦</b>Zero commission</span>
    <span class="marquee-item"><b>✦</b>Verified talent</span>
    <span class="marquee-item"><b>✦</b>Global clients</span>
    <span class="marquee-item"><b>✦</b>Instant escrow</span>
    <span class="marquee-item"><b>✦</b>54 countries</span>
  </div>
</div>

<section class="how section" id="how">
  <span class="section-tag">How it works</span>
  <h2>Four steps to your <em>first job.</em></h2>
  <div class="steps">
    <div class="step">
      <div class="step-n">01</div>
      <div class="step-icon">◆</div>
      <h3>Build your profile</h3>
      <p>Showcase your skills, portfolio, and experience. Our AI reads your profile and prepares you for the right clients automatically.</p>
    </div>
    <div class="step">
      <div class="step-n">02</div>
      <div class="step-icon">◆</div>
      <h3>Get matched by AI</h3>
      <p>We match you beyond keywords — timezone, communication style, cultural fit, and past work all factor into every match we make.</p>
    </div>
    <div class="step">
      <div class="step-n">03</div>
      <div class="step-icon">◆</div>
      <h3>Deliver great work</h3>
      <p>Built-in contracts, milestones, messaging, and file sharing. Everything in one place so you can focus on doing your best work.</p>
    </div>
    <div class="step">
      <div class="step-n">04</div>
      <div class="step-icon">◆</div>
      <h3>Get paid instantly</h3>
      <p>M-Pesa, Flutterwave, Payoneer, or bank transfer. Your money arrives the moment a milestone is approved. No waiting, no drama.</p>
    </div>
  </div>
</section>

<section class="section" id="features">
  <span class="section-tag">Why AfriLance</span>
  <h2>Not another <em>copy</em> of Upwork.</h2>
  <div class="features-grid">
    <div class="fcard wide">
      <div>
        <div class="ftag">AI engine</div>
        <h3>Matching that actually understands Africa</h3>
        <p>Global platforms treat Nairobi like New York. Our AI was built differently — it understands local market rates, African timezones, language nuance, and work culture. The result is matches that feel like they were made by someone who actually knows the continent.</p>
        <div class="pill-wrap">
          <span class="pill">Skills scoring</span>
          <span class="pill">Cultural fit</span>
          <span class="pill">Rate benchmarking</span>
          <span class="pill">Timezone matching</span>
        </div>
      </div>
      <div class="ai-box">
        <div class="ai-lbl">Live match breakdown</div>
        <div class="ai-row">
          <div class="ai-dot"></div>
          <div style="flex:1"><div class="ai-label">Technical skills</div><div class="ai-bar"><div class="ai-fill" style="width:93%"></div></div></div>
        </div>
        <div class="ai-row">
          <div class="ai-dot" style="background:var(--gold)"></div>
          <div style="flex:1"><div class="ai-label">Communication style</div><div class="ai-bar"><div class="ai-fill" style="width:88%;background:var(--gold)"></div></div></div>
        </div>
        <div class="ai-row">
          <div class="ai-dot" style="background:var(--red)"></div>
          <div style="flex:1"><div class="ai-label">Project history</div><div class="ai-bar"><div class="ai-fill" style="width:79%;background:var(--red)"></div></div></div>
        </div>
        <div class="ai-row" style="margin-bottom:0">
          <div class="ai-dot" style="background:#7c6ff7"></div>
          <div style="flex:1"><div class="ai-label">Timezone fit</div><div class="ai-bar"><div class="ai-fill" style="width:96%;background:#7c6ff7"></div></div></div>
        </div>
        <div class="ai-total"><span>Overall match</span><span>94%</span></div>
      </div>
    </div>

    <div class="fcard">
      <div class="ftag gold">Payments</div>
      <h3>Every African payment method, finally</h3>
      <p>Stop waiting 10 days for a SWIFT transfer that costs you 7%. Withdraw via M-Pesa, Flutterwave, Chipper Cash, Payoneer, or straight to your bank — in your currency, today.</p>
      <div class="pill-wrap">
        <span class="pill">M-Pesa</span><span class="pill">Flutterwave</span><span class="pill">Payoneer</span><span class="pill">Chipper Cash</span><span class="pill">Crypto</span>
      </div>
    </div>

    <div class="fcard">
      <div class="ftag red">Commission</div>
      <h3>We start at zero. You keep everything.</h3>
      <p>Upwork charges 15%. Fiverr charges 20%. We charge nothing to start — zero commission for all early members while you build your reputation here.</p>
      <div class="zero-box">
        <div class="zero-tag">Launch offer</div>
        <div class="zero-val">0%</div>
        <div class="zero-sub">Commission for all founding members</div>
      </div>
    </div>

    <div class="fcard">
      <div class="ftag">Trust</div>
      <h3>Escrow, contracts, and dispute resolution</h3>
      <p>Client funds are locked in escrow before work starts. Milestones release payments automatically. If something goes wrong, our team steps in — not an algorithm.</p>
    </div>

    <div class="fcard">
      <div class="ftag gold">Growth</div>
      <h3>A platform that grows with you</h3>
      <p>Free skills courses, peer mentorship, and a community of African professionals. AfriLance isn't just a place to find work — it's where careers are built.</p>
    </div>
  </div>
</section>

<section class="testimonials section" id="testimonials">
  <span class="section-tag">Real people</span>
  <h2>What our early <em>members</em> say.</h2>
  <div class="testi-grid">
    <div class="tcard">
      <div class="stars">★★★★★</div>
      <p class="tcard-text">"For the first time a platform actually knew I was in Nairobi. Matched me with a German client who respected my timezone and my rates. M-Pesa payment landed in 8 minutes."</p>
      <div class="tcard-author">
        <div class="avatar">AO</div>
        <div><div class="author-name">Amara Osei</div><div class="author-role">UI/UX Designer · Accra, Ghana</div></div>
      </div>
    </div>
    <div class="tcard">
      <div class="stars">★★★★★</div>
      <p class="tcard-text">"Upwork was taking 20% of everything I made. AfriLance started me at zero. First month I kept an extra KSh 32,000 I would have lost. That pays my rent."</p>
      <div class="tcard-author">
        <div class="avatar" style="background:var(--red)">FK</div>
        <div><div class="author-name">Fatima Kone</div><div class="author-role">Developer · Lagos, Nigeria</div></div>
      </div>
    </div>
    <div class="tcard">
      <div class="stars">★★★★★</div>
      <p class="tcard-text">"I run a startup in London. AfriLance found me a Nairobi dev team in 48 hours. Six months later they're still with us. Best hiring decision I've made."</p>
      <div class="tcard-author">
        <div class="avatar" style="background:#534AB7">JM</div>
        <div><div class="author-name">James Mitchell</div><div class="author-role">Founder · London, UK</div></div>
      </div>
    </div>
  </div>
</section>

<section class="cta-section" id="signup">
  <span class="section-tag">Join AfriLance</span>
  <h2>Your work. Your <em>terms.</em></h2>
  <p>Early members get zero commission, priority AI matching, and founding member status. No credit card needed.</p>
  <div class="tabs">
    <button class="tab active" onclick="switchTab(this,'freelancer')">I'm a freelancer</button>
    <button class="tab" onclick="switchTab(this,'client')">I want to hire</button>
  </div>
  <div class="signup-form">
    <input type="email" id="email" placeholder="Enter your email address">
    <button class="btn-gold" onclick="handleJoin()">Join the waitlist</button>
  </div>
  <p class="form-msg" id="msg"></p>
</section>

<footer>
  <a href="#" class="logo">Afri<span>Lance</span></a>
  <ul class="footer-links">
    <li><a href="#">About</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Privacy</a></li>
    <li><a href="#">Terms</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
  <span class="footer-copy">© 2025 AfriLance Ltd. Work without borders.</span>
</footer>

<script>
function switchTab(el,type){
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('active'));
  el.classList.add('active');
  document.getElementById('email').placeholder = type==='freelancer' ? 'Enter your email address' : 'Enter your business email';
}
function handleJoin(){
  const email=document.getElementById('email').value.trim();
  const msg=document.getElementById('msg');
  if(!email||!email.includes('@')){msg.style.color='#c94a2a';msg.textContent='Please enter a valid email address.';return;}
  msg.style.color='#1d9e75';
  msg.textContent='You are on the list. We will reach out soon!';
  document.getElementById('email').value='';
}
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    e.preventDefault();
    const t=document.querySelector(a.getAttribute('href'));
    if(t)t.scrollIntoView({behavior:'smooth'});
  });
});
</script>
</body>
</html>