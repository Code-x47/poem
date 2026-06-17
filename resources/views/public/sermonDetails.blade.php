<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sermon – The Oil That Never Runs Dry</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    /* ─── TOKENS ─────────────────────────────────────────────── */
    :root {
      --gold:       #C9A84C;
      --gold-light: #EDD99A;
      --gold-dim:   #7a6228;
      --ink:        #111014;
      --smoke:      #1C1A22;
      --mist:       #2A2732;
      --ash:        #3E3A4A;
      --silver:     #A09CB0;
      --parchment:  #F4F0E8;
      --white:      #FFFFFF;

      --serif:  'Cormorant Garamond', Georgia, serif;
      --sans:   'Inter', system-ui, sans-serif;

      --radius: 18px;
      --transition: 0.35s cubic-bezier(0.22, 1, 0.36, 1);
    }

    /* ─── RESET ───────────────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      background: var(--ink);
      color: var(--white);
      font-family: var(--sans);
      font-size: 16px;
      line-height: 1.7;
      overflow-x: hidden;
    }

    /* ─── AMBIENT BACKGROUND ──────────────────────────────────── */
    .bg-canvas {
      position: fixed;
      inset: 0;
      z-index: 0;
      overflow: hidden;
      pointer-events: none;
    }
    .bg-canvas::before {
      content: '';
      position: absolute;
      top: -20%;
      left: -10%;
      width: 60vw;
      height: 60vw;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(201,168,76,0.12) 0%, transparent 70%);
      animation: drift1 18s ease-in-out infinite alternate;
    }
    .bg-canvas::after {
      content: '';
      position: absolute;
      bottom: -10%;
      right: -10%;
      width: 50vw;
      height: 50vw;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(90,60,180,0.1) 0%, transparent 70%);
      animation: drift2 22s ease-in-out infinite alternate;
    }
    @keyframes drift1 { from { transform: translate(0,0) scale(1); } to { transform: translate(5vw, 8vh) scale(1.1); } }
    @keyframes drift2 { from { transform: translate(0,0) scale(1); } to { transform: translate(-4vw,-6vh) scale(1.08); } }

    /* ─── PAGE WRAPPER ────────────────────────────────────────── */
    .page {
      position: relative;
      z-index: 1;
      max-width: 900px;
      margin: 0 auto;
      padding: 40px 20px 80px;
    }

    /* ─── SERIES BADGE ────────────────────────────────────────── */
    .series-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-family: var(--sans);
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.18em;
      text-transform: uppercase;
      color: var(--gold);
      background: rgba(201,168,76,0.10);
      border: 1px solid rgba(201,168,76,0.25);
      border-radius: 100px;
      padding: 6px 14px;
      margin-bottom: 36px;
    }
    .series-badge .dot {
      width: 6px; height: 6px;
      border-radius: 50%;
      background: var(--gold);
      animation: pulse 2s ease-in-out infinite;
    }
    @keyframes pulse {
      0%, 100% { opacity: 1; transform: scale(1); }
      50%       { opacity: 0.5; transform: scale(0.75); }
    }

    /* ─── HERO LAYOUT ─────────────────────────────────────────── */
    .hero {
      display: grid;
      grid-template-columns: 1fr 260px;
      gap: 48px;
      align-items: start;
      margin-bottom: 60px;
    }

    /* ─── TITLE BLOCK ─────────────────────────────────────────── */
    .title-block { }
    .sermon-title {
      font-family: var(--serif);
      font-size: clamp(2.2rem, 5.5vw, 3.6rem);
      font-weight: 700;
      line-height: 1.13;
      letter-spacing: -0.01em;
      color: var(--white);
      margin-bottom: 16px;
    }
    .sermon-title em {
      font-style: italic;
      color: var(--gold);
    }
    .sermon-subtitle {
      font-family: var(--serif);
      font-size: 1.15rem;
      font-weight: 400;
      font-style: italic;
      color: var(--silver);
      margin-bottom: 28px;
      line-height: 1.5;
    }

    /* ─── META PILLS ──────────────────────────────────────────── */
    .meta-row {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 36px;
    }
    .meta-pill {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 12px;
      font-weight: 500;
      color: var(--silver);
      background: var(--mist);
      border: 1px solid var(--ash);
      border-radius: 100px;
      padding: 5px 12px;
    }
    .meta-pill svg { opacity: 0.7; flex-shrink: 0; }

    /* ─── CTA BUTTONS ─────────────────────────────────────────── */
    .cta-row {
      display: flex;
      flex-wrap: wrap;
      gap: 14px;
    }
    .btn {
      display: inline-flex;
      align-items: center;
      gap: 9px;
      font-family: var(--sans);
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 0.02em;
      border: none;
      border-radius: 100px;
      padding: 14px 26px;
      cursor: pointer;
      transition: transform var(--transition), box-shadow var(--transition), background var(--transition);
      text-decoration: none;
    }
    .btn:active { transform: scale(0.97); }
    .btn-primary {
      background: linear-gradient(135deg, #C9A84C 0%, #EDD99A 60%, #C9A84C 100%);
      color: #1a1200;
    }
    .btn-primary:hover {
      box-shadow: 0 8px 32px rgba(201,168,76,0.4);
      transform: translateY(-2px);
    }
    .btn-secondary {
      background: transparent;
      color: var(--white);
      border: 1.5px solid var(--ash);
    }
    .btn-secondary:hover {
      background: var(--mist);
      border-color: var(--silver);
      transform: translateY(-2px);
    }
    .btn svg { flex-shrink: 0; }

    /* ─── PREACHER CARD ───────────────────────────────────────── */
    .preacher-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }
    .preacher-photo-wrap {
      position: relative;
      width: 220px;
      height: 280px;
      border-radius: 24px;
      overflow: hidden;
      margin-bottom: 20px;
      flex-shrink: 0;
    }
    .preacher-photo-wrap::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 24px;
      border: 1.5px solid rgba(201,168,76,0.35);
      z-index: 2;
      pointer-events: none;
    }
    .preacher-photo-wrap::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 45%;
      background: linear-gradient(to top, rgba(17,16,20,0.85), transparent);
      z-index: 1;
    }
    .preacher-photo-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: top center;
      display: block;
      transition: transform 0.8s cubic-bezier(0.22,1,0.36,1);
    }
    .preacher-photo-wrap:hover img { transform: scale(1.04); }

    /* Placeholder avatar when no image is set */
    .photo-placeholder {
      width: 100%;
      height: 100%;
      background: linear-gradient(160deg, var(--mist), var(--ash));
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
    }
    .photo-placeholder svg { opacity: 0.35; }
    .photo-placeholder span {
      font-size: 11px;
      font-weight: 500;
      letter-spacing: 0.08em;
      color: var(--silver);
      opacity: 0.7;
    }

    .preacher-name {
      font-family: var(--serif);
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--white);
      letter-spacing: 0.01em;
    }
    .preacher-role {
      font-size: 12px;
      font-weight: 500;
      letter-spacing: 0.1em;
      text-transform: uppercase;
      color: var(--gold);
      margin-top: 4px;
    }
    .preacher-church {
      font-size: 12px;
      color: var(--silver);
      margin-top: 4px;
    }

    /* ─── DIVIDER ─────────────────────────────────────────────── */
    .gold-divider {
      width: 100%;
      height: 1px;
      background: linear-gradient(to right, transparent, rgba(201,168,76,0.4) 40%, rgba(201,168,76,0.4) 60%, transparent);
      margin: 0 0 52px;
    }

    /* ─── SCRIPTURE BANNER ────────────────────────────────────── */
    .scripture-banner {
      background: linear-gradient(135deg, var(--smoke) 0%, var(--mist) 100%);
      border-left: 3px solid var(--gold);
      border-radius: 0 var(--radius) var(--radius) 0;
      padding: 24px 28px;
      margin-bottom: 52px;
    }
    .scripture-text {
      font-family: var(--serif);
      font-size: 1.25rem;
      font-style: italic;
      color: var(--gold-light);
      line-height: 1.6;
    }
    .scripture-ref {
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: var(--gold-dim);
      margin-top: 10px;
    }

    /* ─── BODY COPY ───────────────────────────────────────────── */
    .content-section { margin-bottom: 52px; }
    .section-eyebrow {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: 0.2em;
      text-transform: uppercase;
      color: var(--gold);
      margin-bottom: 16px;
    }
    .section-heading {
      font-family: var(--serif);
      font-size: clamp(1.5rem, 3.5vw, 2.2rem);
      font-weight: 700;
      color: var(--white);
      line-height: 1.2;
      margin-bottom: 18px;
    }
    .body-text {
      font-size: 1rem;
      line-height: 1.85;
      color: rgba(255,255,255,0.72);
    }
    .body-text p + p { margin-top: 16px; }
    .body-text strong { color: var(--white); font-weight: 600; }

    /* ─── KEY POINTS ──────────────────────────────────────────── */
    .key-points {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 16px;
      margin-top: 28px;
    }
    .key-point {
      background: var(--smoke);
      border: 1px solid var(--ash);
      border-radius: var(--radius);
      padding: 20px 22px;
      transition: border-color var(--transition), transform var(--transition);
    }
    .key-point:hover {
      border-color: rgba(201,168,76,0.4);
      transform: translateY(-3px);
    }
    .key-point-num {
      font-family: var(--serif);
      font-size: 2.2rem;
      font-weight: 700;
      color: rgba(201,168,76,0.20);
      line-height: 1;
      margin-bottom: 8px;
    }
    .key-point-text {
      font-size: 0.92rem;
      font-weight: 500;
      color: var(--white);
      line-height: 1.45;
    }

    /* ─── BOTTOM CTA STRIP ────────────────────────────────────── */
    .bottom-cta {
      background: linear-gradient(135deg, var(--smoke) 0%, var(--mist) 100%);
      border: 1px solid var(--ash);
      border-radius: var(--radius);
      padding: 36px 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
    }
    .bottom-cta-text h3 {
      font-family: var(--serif);
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--white);
      margin-bottom: 6px;
    }
    .bottom-cta-text p {
      font-size: 0.9rem;
      color: var(--silver);
    }
    .bottom-cta-actions { display: flex; gap: 12px; flex-wrap: wrap; }

    /* ─── TOAST ───────────────────────────────────────────────── */
    .toast {
      position: fixed;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%) translateY(20px);
      background: var(--smoke);
      border: 1px solid rgba(201,168,76,0.35);
      color: var(--white);
      font-size: 14px;
      font-weight: 500;
      padding: 12px 24px;
      border-radius: 100px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.5);
      opacity: 0;
      transition: opacity 0.3s, transform 0.3s;
      pointer-events: none;
      z-index: 999;
      white-space: nowrap;
    }
    .toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }

    /* ─── AUDIO PLAYER ────────────────────────────────────────── */
    .audio-player {
      display: none;
      background: var(--smoke);
      border: 1px solid rgba(201,168,76,0.3);
      border-radius: var(--radius);
      padding: 20px 24px;
      margin-top: 24px;
      align-items: center;
      gap: 18px;
      flex-wrap: wrap;
    }
    .audio-player.visible { display: flex; animation: slideDown 0.4s cubic-bezier(0.22,1,0.36,1); }
    @keyframes slideDown { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }
    .play-pause {
      width: 46px; height: 46px;
      border-radius: 50%;
      background: linear-gradient(135deg, #C9A84C, #EDD99A);
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      transition: transform var(--transition), box-shadow var(--transition);
    }
    .play-pause:hover { transform: scale(1.1); box-shadow: 0 4px 20px rgba(201,168,76,0.4); }
    .player-track { flex: 1; min-width: 160px; }
    .track-title { font-size: 13px; font-weight: 600; color: var(--white); margin-bottom: 6px; }
    .track-bar-wrap {
      position: relative;
      height: 4px;
      background: var(--ash);
      border-radius: 2px;
      cursor: pointer;
      margin-bottom: 6px;
    }
    .track-bar-fill {
      height: 100%;
      border-radius: 2px;
      background: linear-gradient(to right, var(--gold), var(--gold-light));
      width: 0%;
      transition: width 0.3s;
    }
    .track-time { font-size: 11px; color: var(--silver); }

    /* ─── RESPONSIVE ──────────────────────────────────────────── */
    @media (max-width: 680px) {
      .page { padding: 28px 16px 60px; }
      .hero {
        grid-template-columns: 1fr;
        gap: 40px;
      }
      /* Put preacher above on mobile */
      .hero { display: flex; flex-direction: column; }
      .preacher-card { order: -1; }
      .preacher-photo-wrap { width: 160px; height: 200px; }

      .bottom-cta { padding: 24px 22px; }
      .bottom-cta-text h3 { font-size: 1.2rem; }
    }

    @media (max-width: 400px) {
      .sermon-title { font-size: 1.9rem; }
      .cta-row { flex-direction: column; }
      .btn { justify-content: center; }
    }
  </style>
</head>
<body>

<!-- ambient glow -->
<div class="bg-canvas" aria-hidden="true"></div>

<main class="page">

  <!-- series badge -->
  <div class="series-badge">
    <span class="dot"></span>
    Sunday Message &nbsp;·&nbsp; Revival Series 2025
  </div>

  <!-- HERO: title + preacher -->
  <div class="hero">

    <!-- LEFT: title block -->
    <div class="title-block">
      <h1 class="sermon-title">The Oil That<br/><em>Never Runs Dry</em></h1>
      <p class="sermon-subtitle">Walking in an unending supply of divine grace<br/>when life demands more than you have.</p>

      <div class="meta-row">
        <span class="meta-pill">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          June 15, 2025
        </span>
        <span class="meta-pill">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          48 min
        </span>
        <span class="meta-pill">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
          2 Kings 4:1–7
        </span>
        <span class="meta-pill">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          Faith &amp; Provision
        </span>
      </div>

      <div class="cta-row">
        <button class="btn btn-primary" id="listenBtn" onclick="togglePlayer()">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
          Listen Online
        </button>
        <button class="btn btn-secondary" onclick="handleDownload()">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
          Download MP3
        </button>
      </div>

      <!-- inline audio player -->
      <div class="audio-player" id="audioPlayer">
        <button class="play-pause" id="playPauseBtn" onclick="togglePlayback()" aria-label="Play / Pause">
          <svg id="playIcon" width="18" height="18" viewBox="0 0 24 24" fill="#1a1200"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        </button>
        <div class="player-track">
          <div class="track-title">The Oil That Never Runs Dry</div>
          <div class="track-bar-wrap" onclick="seek(event)" id="trackWrap">
            <div class="track-bar-fill" id="trackFill"></div>
          </div>
          <div class="track-time" id="trackTime">0:00 / 48:00</div>
        </div>
      </div>
    </div>

    <!-- RIGHT: preacher card -->
    <div class="preacher-card">
      <div class="preacher-photo-wrap">
        <!--
          REPLACE the src below with the actual image path of your preacher.
          e.g. src="images/pastor-john.jpg"
          The placeholder below shows until you add a real photo.
        -->
        <img
          id="preacherImg"
          src=""
          alt="Pastor Emmanuel Okafor"
          onerror="this.style.display='none'; document.getElementById('photoFallback').style.display='flex';"
        />
        <div class="photo-placeholder" id="photoFallback" style="display:flex;">
          <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.2">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
          </svg>
          <span>Preacher Photo</span>
        </div>
      </div>
      <div class="preacher-name">Pastor Emmanuel Okafor</div>
      <div class="preacher-role">Lead Pastor</div>
      <div class="preacher-church">Grace Covenant Church</div>
    </div>

  </div><!-- /hero -->

  <div class="gold-divider"></div>

  <!-- SCRIPTURE -->
  <div class="scripture-banner">
    <p class="scripture-text">"She went and told the man of God, and he said, 'Go, sell the oil and pay your debt, and you and your sons can live on the rest.'"</p>
    <p class="scripture-ref">2 Kings 4:7 &nbsp;·&nbsp; ESV</p>
  </div>

  <!-- SUMMARY -->
  <section class="content-section">
    <p class="section-eyebrow">Message Summary</p>
    <h2 class="section-heading">When empty vessels become a miracle</h2>
    <div class="body-text">
      <p>There are moments in life when every resource runs out — when the account is empty, the strength is gone, the door has closed, and the creditors are at the gate. The widow in 2 Kings 4 knew that place better than most of us ever will. And yet, it was precisely in that place of total emptiness that God's miraculous oil began to flow.</p>
      <p>In this powerful message, <strong>Pastor Emmanuel Okafor</strong> unpacks one of the most intimate miracles in the Old Testament and draws timeless wisdom for 21st-century believers who are facing seasons of severe lack. The sermon walks through the widow's obedience, her borrowed vessels, and the divine economy of multiplication — showing that God's supply is never limited by your shortage.</p>
      <p>You will discover that <strong>your emptiness is not your end</strong> — it is the very precondition for God's overflow. The oil stopped only when there were no more vessels to fill. The limiting factor was never God's supply; it was the capacity she brought to Him. Come to this message ready to expand your expectation.</p>
    </div>
  </section>

  <!-- KEY POINTS -->
  <section class="content-section">
    <p class="section-eyebrow">What You Will Learn</p>
    <h2 class="section-heading">Four anchors from the miracle</h2>
    <div class="key-points">
      <div class="key-point">
        <div class="key-point-num">01</div>
        <div class="key-point-text">Why God often waits until your last drop before He shows up in fullness</div>
      </div>
      <div class="key-point">
        <div class="key-point-num">02</div>
        <div class="key-point-text">The spiritual principle behind gathering empty vessels — making room for the miraculous</div>
      </div>
      <div class="key-point">
        <div class="key-point-num">03</div>
        <div class="key-point-text">How obedience in obscurity — done behind a closed door — activates God's open hand</div>
      </div>
      <div class="key-point">
        <div class="key-point-num">04</div>
        <div class="key-point-text">The only thing that can limit your supply: the number of expectant vessels you bring</div>
      </div>
    </div>
  </section>

  <!-- BOTTOM CTA -->
  <div class="bottom-cta">
    <div class="bottom-cta-text">
      <h3>Ready to receive this word?</h3>
      <p>Download to your device or stream it right here — free, always.</p>
    </div>
    <div class="bottom-cta-actions">
      <button class="btn btn-primary" onclick="togglePlayer()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        Listen Now
      </button>
      <button class="btn btn-secondary" onclick="handleDownload()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
        Download
      </button>
    </div>
  </div>

</main>

<!-- Toast notification -->
<div class="toast" id="toast"></div>

<script>
  /* ── TOAST ── */
  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }

  /* ── LISTEN BUTTON / PLAYER ── */
  let playerVisible = false;
  function togglePlayer() {
    playerVisible = !playerVisible;
    const player = document.getElementById('audioPlayer');
    player.classList.toggle('visible', playerVisible);
    if (playerVisible) {
      player.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
      showToast('🎧 Audio player ready — press play!');
    }
  }

  /* ── SIMULATED PLAYBACK ── */
  let playing = false;
  let progress = 0;
  let timer = null;
  const totalSecs = 48 * 60;

  function fmtTime(s) {
    const m = Math.floor(s / 60);
    const sec = Math.floor(s % 60);
    return `${m}:${sec.toString().padStart(2,'0')}`;
  }

  function togglePlayback() {
    playing = !playing;
    const icon = document.getElementById('playIcon');
    if (playing) {
      icon.innerHTML = '<rect x="6" y="4" width="4" height="16" fill="#1a1200"/><rect x="14" y="4" width="4" height="16" fill="#1a1200"/>';
      timer = setInterval(() => {
        progress = Math.min(progress + 1, totalSecs);
        updateTrack();
        if (progress >= totalSecs) { playing = false; clearInterval(timer); }
      }, 1000);
    } else {
      icon.innerHTML = '<polygon points="5 3 19 12 5 21 5 3" fill="#1a1200"/>';
      clearInterval(timer);
    }
  }

  function updateTrack() {
    document.getElementById('trackFill').style.width = (progress / totalSecs * 100) + '%';
    document.getElementById('trackTime').textContent = fmtTime(progress) + ' / ' + fmtTime(totalSecs);
  }

  function seek(e) {
    const wrap = document.getElementById('trackWrap');
    const rect = wrap.getBoundingClientRect();
    const ratio = Math.max(0, Math.min(1, (e.clientX - rect.left) / rect.width));
    progress = Math.round(ratio * totalSecs);
    updateTrack();
  }

  /* ── DOWNLOAD ── */
  function handleDownload() {
    showToast('⬇ Your download has started!');
    /*
      Replace the href below with your actual audio file URL:
      window.location.href = 'audio/sermon-oil-never-runs-dry.mp3';
    */
  }
</script>
</body>
</html>