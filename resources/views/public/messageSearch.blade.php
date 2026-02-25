<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Search Results - Gospel Music Gallery</title>
  <link rel="stylesheet" href="{{asset('assets/css/messageSearch.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" />
  <style>
    
  </style>
</head>

<body>

  <a href="{{ route('public.message') }}" class="home-button">← Back</a>


<div class="container">
  <div class="header">
    <h1>🔍 Search Results</h1>
    <p>Search by Year or Title</p>
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


  @if ($groupedResults->isEmpty())
    <div class="no-songs">😔 No messages found for your search.</div>
  @else
    @foreach ($groupedResults as $month => $sermons)
      @php
        $monthName = \Carbon\Carbon::create()->month($month)->format('F');
        $year = $sermons->first()->year;
      @endphp

      <div class="music-section">
        <h2>{{ $monthName }} {{ $year }}</h2>
        <div class="grid">
          @foreach ($sermons as $sermon)
            <div class="song-card">
              <div class="song-title">{{ $sermon->title }}</div>
              <div class="song-artist">{{ $sermon->minister ?? 'Unknown Minister' }}</div>

              @if($sermon->audio_path)
                <audio id="song-{{ $sermon->id }}" controls src="{{ asset('sermons/' . $sermon->audio_path) }}"></audio>
                <div class="song-buttons">
                  <button onclick="document.getElementById('song-{{ $sermon->id }}').play()">▶ Play</button>
                  <a href="{{ route('download.sermon', $sermon->id) }}" download>⬇ Download</a>
                </div>
              @else
                <p style="color: #f87171;">❌ Audio not available</p>
              @endif
            </div>
          @endforeach
        </div>
      </div>
    @endforeach
  @endif
</div>







</body>
</html>
