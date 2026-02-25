<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/image/images/newLogo.png">
  <title>People of Exploits Ministry International | Poem International |Sermons, Songs & Messages</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap">
  <link rel="stylesheet" href="{{asset('assets/css/message.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">

  <link href="http://fonts.googleapis.com/css?family=Belgrano:400" rel="stylesheet" type="text/css">
	<link href="assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
  <a href="{{route('home.index')}}" class="home-button">
  🏠 Home
  </a>
  <div class="container">
    <div class="header">
      <h1>🎧 Message Gallery</h1>
      <p>Discover and enjoy our inspiring gospel message collection</p>
  </div>



  <form class="controls" action="{{Route('message.search')}}" method="GET">
  <select name="year" style="background-color: grey;">
    <option value="">🎯 All Years</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
  </select>

  <input type="text" name="query" placeholder="🔍 Search song or artist...">

  <button type="submit" style="
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 1rem;
    background: linear-gradient(to right, #a855f7, #ec4899);
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
  ">
    Search
  </button>
</form>


<div id="music-container">

   <div class="music-section">
    
      @foreach($sermons as $month => $monthSermons)

        <h2>{{ $month }}</h2>

        <div class="grid">
        @foreach($monthSermons as $sermon)
            <div class="song-card">
                <div class="song-title">{{ $sermon->title }}</div>
                <div class="song-artist">{{ $sermon->minister }}</div>

                <audio id="song-ctrl{{ $sermon->id }}" controls
                      src="{{ asset('sermons/' . $sermon->audio_path) }}"></audio>

                <div class="song-buttons">
                    <button onclick="document.getElementById('song-ctrl{{ $sermon->id }}').play()">▶ Play</button>
                    <a href="{{ route('download.sermon',$sermon->id) }}" download>⬇ Download</a>
                </div>
            </div>
        @endforeach
        </div>

        @endforeach

    </div>
    
  </div>
<!--End-->

</div>

</div>


<footer class="footer">
  <div class="footer-container">
    <div class="footer-col">
      <img src="assets/image/images/newLogo.png" alt="Logo" class="footer-logo" />
      <p>
        Follow People of Exploits Ministry International on YouTube and Facebook to watch us live. Press the bell icon to get notified of new sermons.
      </p>
    </div>

    <div class="footer-col">
      <h3>Address <div class="underline"><span></span></div></h3>
      <p>ECCIMA Building Opp. All Saints Church G.R.A Enugu</p>
      <p class="email">contact@poemInternational.com</p>
      <h4>07060786227</h4>
    </div>

  <div class="footer-col links">
      <h3>Links <div class="underline"><span></span></div></h3>
      <ul class="footer-links">
        <li><a href="{{route('home.index')}}">Home</a></li>
        <li><a href="{{route('home.index')}}/#about">About Us</a></li>
        <li><a href="{{route('public.message')}}">Sermons</a></li>
        <li><a href="{{route('home.index')}}/#testimony">Testimonies</a></li>
        <li><a href="{{route('public.gallery')}}">Gallery</a></li>
      </ul>
    </div>


    <div class="footer-col">
      <h3>Newsletter <div class="underline"><span></span></div></h3>
      <form class="newsletter-form">
        <input type="email" placeholder="Enter your email" required />
        <button type="submit"><i class="fa fa-arrow-right"></i></button>
      </form>
      <div class="social-icons">
        <i class="fa fa-facebook"></i>
        <i class="fa fa-instagram"></i>
        <i class="fa fa-youtube"></i>
        <i class="fa fa-twitter"></i>
      </div>
    </div>
  </div>

  <hr />
  <p class="copyright">
    © 2023 People Of Exploits Ministry International - All Rights Reserved
	
  </p>
</footer>




  <script>
 
   const yearFilter = document.getElementById('year-filter');
   const searchInput = document.getElementById('search-input');
   const musicContainer = document.getElementById('music-container');

    function groupByMonthYear(data) {
      return data.reduce((acc, song) => {
        const key = `${song.month} ${song.year}`;
        if (!acc[key]) acc[key] = [];
        acc[key].push(song);
        return acc;
      }, {});
    }

    function renderSongs() {
      const year = yearFilter.value;
      const search = searchInput.value.toLowerCase();

      let filtered = songs.filter(song => {
        return (year === 'all' || song.year === year) &&
               (song.title.toLowerCase().includes(search) || song.artist.toLowerCase().includes(search));
      });

      const grouped = groupByMonthYear(filtered);

      musicContainer.innerHTML = '';

      if (filtered.length === 0) {
        musicContainer.innerHTML = `<div class="no-songs">🎵 No songs found. Try adjusting your search or filter.</div>`;
        return;
      }

      for (const [group, songs] of Object.entries(grouped)) {
        const section = document.createElement('div');
        section.className = 'music-section';

        const heading = document.createElement('h2');
        heading.textContent = group;
        section.appendChild(heading);

        const grid = document.createElement('div');
        grid.className = 'grid';

        songs.forEach(song => {
          const card = document.createElement('div');
          card.className = 'song-card';

          const title = document.createElement('div');
          title.className = 'song-title';
          title.textContent = song.title;

          const artist = document.createElement('div');
          artist.className = 'song-artist';
          artist.textContent = `by ${song.artist}`;

          const audio = document.createElement('audio');
          audio.controls = true;
          audio.src = song.audioUrl;

          const buttons = document.createElement('div');
          buttons.className = 'song-buttons';
          buttons.style.display = 'flex';
          buttons.style.gap = '0.5rem';

          const playBtn = document.createElement('button');
          playBtn.textContent = '▶ Play';
          playBtn.onclick = () => audio.play();

          const downloadBtn = document.createElement('a');
          downloadBtn.href = song.downloadUrl;
          downloadBtn.download = '';
          downloadBtn.textContent = '⬇ Download';

          buttons.appendChild(playBtn);
          buttons.appendChild(downloadBtn);

          card.append(title, artist, audio, buttons);
          grid.appendChild(card);
        });

        section.appendChild(grid);
        musicContainer.appendChild(section);
      }
    }

    yearFilter.addEventListener('change', renderSongs);
    searchInput.addEventListener('input', renderSongs);

    renderSongs();
  </script>



  <script>
    document.addEventListener('play', function(e) {
        let audios = document.querySelectorAll('audio');
        audios.forEach((audio) => {
            if (audio !== e.target) {
                audio.pause();
            }
        });
    }, true);
  </script>


</body>
</html>
