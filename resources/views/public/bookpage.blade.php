<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $book['title'] }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,600;1,9..144,500&family=Source+Serif+4:ital,wght@0,400;0,500;0,600;1,400&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root{
    --ink:        #14172B;
    --ink-soft:   #2A2E4A;
    --parchment:  #F3E9D6;
    --parchment-2:#EADFC7;
    --gold:       #C9A24B;
    --burgundy:   #7C2E2E;
    --slate:      #5B6072;
    --radius:     2px;
  }

  *{box-sizing:border-box;}
  html,body{margin:0;padding:0;}
  body{
    background:
      radial-gradient(ellipse at top left, rgba(201,162,75,0.10), transparent 55%),
      radial-gradient(ellipse at bottom right, rgba(124,46,46,0.12), transparent 55%),
      var(--ink);
    color:var(--parchment);
    font-family:'Source Serif 4', serif;
    min-height:100vh;
    -webkit-font-smoothing:antialiased;
  }

  @media (prefers-reduced-motion: reduce){
    *{animation-duration:0.001ms !important; animation-iteration-count:1 !important; transition-duration:0.001ms !important;}
  }

  a,button{font-family:inherit;}

  .wrap{
    max-width:1120px;
    margin:0 auto;
    padding: clamp(20px, 5vw, 56px) clamp(18px, 5vw, 56px) clamp(40px, 8vw, 90px);
  }

  /* ---------- top bar ---------- */
  .topbar{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:16px;
    padding-bottom:clamp(28px, 6vw, 48px);
    border-bottom:1px solid rgba(243,233,214,0.12);
    margin-bottom:clamp(36px, 7vw, 64px);
  }
  .brand{
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:0.14em;
    text-transform:uppercase;
    color:var(--gold);
    opacity:0.9;
  }
  .home-btn{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:transparent;
    color:var(--parchment);
    border:1px solid rgba(243,233,214,0.35);
    padding:10px 18px;
    border-radius:999px;
    font-family:'IBM Plex Mono', monospace;
    font-size:12.5px;
    letter-spacing:0.04em;
    cursor:pointer;
    transition:border-color .2s ease, background .2s ease, transform .15s ease;
    text-decoration:none;
  }
  .home-btn:hover{ border-color:var(--gold); background:rgba(201,162,75,0.08); }
  .home-btn:active{ transform:scale(0.97); }
  .home-btn:focus-visible{ outline:2px solid var(--gold); outline-offset:3px; }
  .home-btn svg{ width:14px; height:14px; }

  /* ---------- hero grid ---------- */
  .hero{
    display:grid;
    grid-template-columns: minmax(240px, 340px) 1fr;
    gap: clamp(32px, 6vw, 72px);
    align-items:start;
  }
  @media (max-width: 760px){
    .hero{ grid-template-columns: 1fr; }
  }

  /* ---------- cover + stamp ---------- */
  .cover-stage{
    position:relative;
    justify-self:center;
    width:100%;
    max-width:320px;
  }
  @media (max-width:760px){ .cover-stage{ max-width:260px; margin:0 auto; } }

  .cover{
    display:block;
    width:100%;
    aspect-ratio: 2 / 3;
    object-fit:cover;
    border-radius: var(--radius);
    box-shadow: 0 30px 60px -20px rgba(0,0,0,0.55), 0 2px 0 rgba(243,233,214,0.06) inset;
    animation: rise 900ms cubic-bezier(.19,1,.22,1) both;
  }
  @keyframes rise{
    from{ opacity:0; transform: translateY(18px) scale(.98); }
    to{ opacity:1; transform: translateY(0) scale(1); }
  }

  .stamp{
    position:absolute;
    top:-18px;
    right:-22px;
    width:118px;
    height:118px;
    transform: rotate(9deg);
    animation: stampland 700ms cubic-bezier(.34,1.56,.64,1) 500ms both;
    filter: drop-shadow(0 6px 10px rgba(0,0,0,0.4));
  }
  @keyframes stampland{
    from{ opacity:0; transform: rotate(9deg) scale(1.6); }
    to{ opacity:1; transform: rotate(9deg) scale(1); }
  }
  @media (max-width:420px){
    .stamp{ width:96px; height:96px; top:-14px; right:-10px; }
  }

  .catalog-card{
    margin-top:22px;
    border:1px solid rgba(243,233,214,0.18);
    border-radius:var(--radius);
    padding:16px 18px;
    background: rgba(243,233,214,0.03);
  }
  .catalog-row{
    display:flex;
    justify-content:space-between;
    gap:10px;
    font-family:'IBM Plex Mono', monospace;
    font-size:11.5px;
    letter-spacing:0.03em;
    color:var(--slate);
    padding:6px 0;
    border-bottom:1px dashed rgba(243,233,214,0.10);
  }
  .catalog-row:last-child{ border-bottom:none; }
  .catalog-row span:last-child{ color:var(--parchment); opacity:0.85; text-align:right; }

  /* ---------- text column ---------- */
  .eyebrow{
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:0.16em;
    text-transform:uppercase;
    color:var(--burgundy);
    background: rgba(124,46,46,0.14);
    border:1px solid rgba(124,46,46,0.35);
    display:inline-block;
    padding:6px 12px;
    border-radius:999px;
    margin-bottom:18px;
  }
  .eyebrow b{ color:#E7B9B9; font-weight:500; }

  h1{
    font-family:'Fraunces', serif;
    font-weight:500;
    font-size: clamp(2.1rem, 5.4vw, 3.6rem);
    line-height:1.04;
    margin:0 0 8px;
    letter-spacing:-0.01em;
  }
  .subtitle-line{
    font-family:'Fraunces', serif;
    font-style:italic;
    font-weight:400;
    color:var(--gold);
    font-size: clamp(1rem, 2.2vw, 1.25rem);
    margin:0 0 22px;
  }
  .by-line{
    font-family:'IBM Plex Mono', monospace;
    font-size:13px;
    color:var(--slate);
    letter-spacing:0.04em;
    margin-bottom:28px;
  }
  .by-line em{ color:var(--parchment); font-style:normal; }

  .summary{
    font-size: clamp(1.02rem, 1.6vw, 1.14rem);
    line-height:1.75;
    color: #EADFC7;
    max-width:60ch;
  }
  .summary p{ margin:0 0 1.1em; }
  .summary p:last-child{ margin-bottom:0; }

  .divider{
    width:56px;
    height:1px;
    background:linear-gradient(90deg, var(--gold), transparent);
    margin:30px 0;
  }

  /* ---------- notice panel (unavailability) ---------- */
  .notice{
    display:flex;
    gap:16px;
    align-items:flex-start;
    background: linear-gradient(180deg, rgba(201,162,75,0.09), rgba(201,162,75,0.03));
    border:1px solid rgba(201,162,75,0.35);
    border-radius: var(--radius);
    padding: 18px 20px;
    margin-top:8px;
  }
  .notice svg{
    flex-shrink:0;
    width:22px; height:22px;
    color:var(--gold);
    margin-top:2px;
  }
  .notice-title{
    font-family:'IBM Plex Mono', monospace;
    font-size:12.5px;
    letter-spacing:0.08em;
    text-transform:uppercase;
    color:var(--gold);
    margin:0 0 6px;
  }
  .notice p{
    margin:0;
    font-size:14.5px;
    line-height:1.6;
    color:#DCCFAE;
  }
  .notice p + p{ margin-top:8px; }

  /* ---------- CTA panel (buy on amazon) ---------- */
  .cta-panel{
    margin-top:26px;
    text-align:center;
    padding: clamp(26px, 5vw, 40px) clamp(20px, 5vw, 36px);
    border-radius: var(--radius);
    background: linear-gradient(160deg, rgba(124,46,46,0.16), rgba(201,162,75,0.06));
    border:1px solid rgba(201,162,75,0.4);
    position:relative;
    overflow:hidden;
  }
  .cta-panel::before{
    content:"";
    position:absolute;
    inset:0;
    background: radial-gradient(circle at 50% 0%, rgba(201,162,75,0.18), transparent 60%);
    pointer-events:none;
  }
  .cta-heading{
    font-family:'Fraunces', serif;
    font-weight:500;
    font-style:italic;
    font-size: clamp(1.25rem, 2.6vw, 1.6rem);
    color: var(--parchment);
    margin:0 0 10px;
    position:relative;
  }
  .cta-copy{
    font-size:14.5px;
    line-height:1.65;
    color:#DCCFAE;
    max-width:48ch;
    margin:0 auto 22px;
    position:relative;
  }

  .btn-amazon{
    position:relative;
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-family:'IBM Plex Mono', monospace;
    font-size:13.5px;
    letter-spacing:0.05em;
    background:var(--gold);
    color:var(--ink);
    border:none;
    padding:15px 30px;
    border-radius:999px;
    cursor:pointer;
    text-decoration:none;
    box-shadow:0 10px 24px -10px rgba(201,162,75,0.65);
    transition:transform .15s ease, box-shadow .2s ease, background .2s ease;
  }
  .btn-amazon:hover{ transform:translateY(-1px); box-shadow:0 14px 28px -10px rgba(201,162,75,0.8); background:#D9B45E; }
  .btn-amazon:active{ transform:translateY(0) scale(0.98); }
  .btn-amazon:focus-visible{ outline:2px solid var(--parchment); outline-offset:3px; }
  .btn-amazon svg{ width:17px; height:17px; }

  .actions{
    margin-top:24px;
    display:flex;
    flex-wrap:wrap;
    gap:14px;
    align-items:center;
    justify-content:center;
  }
  .meta-note{
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    color:var(--slate);
    letter-spacing:0.03em;
  }

  footer{
    margin-top:clamp(50px, 8vw, 90px);
    padding-top:22px;
    border-top:1px solid rgba(243,233,214,0.10);
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:10px;
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    letter-spacing:0.04em;
    color:var(--slate);
  }
</style>
</head>
<body>
  <div class="wrap">

    <div class="topbar">
      <div class="brand">People of Exploits Ministry International — Editions</div>
      <button class="home-btn" onclick="goHome()" aria-label="Return to homepage">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg>
        Back to home
      </button>
    </div>

    <div class="hero">

      <!-- cover -->
      <div>
        <div class="cover-stage">
          <img class="cover" src="{{asset('books/' .$book->file)}}" alt="Cover of {{ $book['title'] }}">
          <svg class="stamp" viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Not yet released stamp">
            <circle cx="60" cy="60" r="54" fill="none" stroke="#7C2E2E" stroke-width="2.5"/>
            <circle cx="60" cy="60" r="46" fill="none" stroke="#7C2E2E" stroke-width="1"/>
            <path id="stampCircle" d="M 60 14 A 46 46 0 1 1 59.9 14" fill="none"/>
            <text font-family="IBM Plex Mono, monospace" font-size="9.2" letter-spacing="2" fill="#7C2E2E">
              <textPath href="#stampCircle" startOffset="2%">NOT YET RELEASED · NOT YET RELEASED ·</textPath>
            </text>
            <text x="60" y="57" text-anchor="middle" fill="#7C2E2E" font-family="Fraunces, serif" font-style="italic" font-size="15">Pre&#8211;</text>
            <text x="60" y="75" text-anchor="middle" fill="#7C2E2E" font-family="Fraunces, serif" font-style="italic" font-size="15">Release</text>
          </svg>
        </div>

        <div class="catalog-card">
          <div class="catalog-row"><span>Format</span><span>Paperback &amp; Kindle</span></div>
          <div class="catalog-row"><span>Genre</span><span>Christian Living / Spiritual Growth</span></div>
          <div class="catalog-row"><span>Language</span><span>English</span></div>
          <div class="catalog-row"><span>Amazon listing</span><span>Pending</span></div>
        </div>
      </div>

      <!-- text -->
      <div>
        <span class="eyebrow">Status: <b>{{$book['status']}}</b></span>

        <h1>{{ $book['title'] }}</h1>
        <p class="by-line">by <em>{{ $book['author'] }}</em></p>

        <div class="summary">
          <p>{{ $book['summary'] }}</p>
        </div>

        <div class="divider"></div>
        @if($book['status'] == "Not yet available on Amazon")
        <div class="notice">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v5"/><path d="M12 16h.01"/></svg>
          <div>
            <p class="notice-title">{{ $book['title'] }}</p>
            <p>"{{ $book['title'] }}" is still on its way to press. The Amazon listing hasn't gone live, so there's nothing to buy there just yet — this page will be the first to update once that changes.</p>
          </div>
        </div>
        @endif
        @if($book['status'] != "Not yet available on Amazon")
        <!-- Call to action: replaces the duplicate "return home" button -->
        <div class="cta-panel">
          <p class="cta-heading">Ready to deepen your walk with God?</p>
          <p class="cta-copy">Click the button below to get your copy and begin a life-changing journey through this powerful teaching.</p>
          <a class="btn-amazon" href="{{ $book['amazon_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            Buy on Amazon
          </a>
        </div>

        <div class="actions">
          <span class="meta-note">Opens Amazon in a new tab · <button class="home-btn" onclick="goHome()" style="padding:6px 14px; font-size:11px; display:inline-flex; vertical-align:middle;">Back to home</button></span>
        </div>
        @endif
      </div>
    </div>

    <footer>
      <span>People of Exploits Ministry International — Editions</span>
      <span>Christian Resources</span>
    </footer>
  </div>

  <script>
    function goHome(){
      // Adjust this to your site's real homepage route if it differs.
      window.location.href = '/';
    }
  </script>
</body>
</html>