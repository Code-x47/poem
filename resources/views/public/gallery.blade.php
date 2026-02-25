<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="assets/css/gallery.css">
  <title>Poem Gallery</title>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">
  <link href="http://fonts.googleapis.com/css?family=Belgrano:400" rel="stylesheet" type="text/css">
	<link href="assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

 
</head>
<body>

  <!-- You can insert your header here -->
    <a href="{{route('home.index')}}" class="home-button">
    🏠 Home
    </a> 

  <div class="gallery-container">
    <div class="gallery-header">
       <h1 class="gallery-title">POEM Gallery</h1>
       <p class="gallery-subtitle">A beautiful collection of moments captured in time</p>
   </div>

    <div class="gallery-grid" id="gallery">
      @foreach($pics as $pic)
      <div class="gallery-item"><img src="{{ asset('storage/' . $pic->image_path) }}" alt="Church Image 1"></div>
      @endforeach    
    </div>
  </div>


  <!-- Lightbox modal -->
<div class="lightbox" id="lightbox">
  <a href="#" class="lightbox-close">&times;</a>
  <img id="lightbox-img" src="" alt="Enlarged view">
  <a class="lightbox-prev">&#10094;</a>
  <a class="lightbox-next">&#10095;</a>
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


  <!-- You can insert your footer here -->

  <script>
    const galleryItems = document.querySelectorAll('.gallery-item img');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');

    galleryItems.forEach(img => {
      img.addEventListener('click', () => {
        lightbox.style.display = 'flex';
        lightboxImg.src = img.src;
      });
    });

    lightbox.addEventListener('click', (e) => {
      if (e.target !== lightboxImg) {
        lightbox.style.display = 'none';
      }
    });


  const prevBtn = document.querySelector('.lightbox-prev');
  const nextBtn = document.querySelector('.lightbox-next');

  let currentIndex = 0;

  function showImage(index) {
    lightboxImg.src = galleryItems[index].src;
    currentIndex = index;
    lightbox.style.display = 'flex';
  }

  galleryItems.forEach((img, index) => {
    img.addEventListener('click', () => showImage(index));
  });

  prevBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
    showImage(currentIndex);
  });

  nextBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    currentIndex = (currentIndex + 1) % galleryItems.length;
    showImage(currentIndex);
  });

  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox || e.target.classList.contains('lightbox-close')) {
      lightbox.style.display = 'none';
    }
  });

  // Optional: Allow arrow keys to slide images
  document.addEventListener('keydown', (e) => {
    if (lightbox.style.display === 'flex') {
      if (e.key === 'ArrowRight') {
        currentIndex = (currentIndex + 1) % galleryItems.length;
        showImage(currentIndex);
      } else if (e.key === 'ArrowLeft') {
        currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
        showImage(currentIndex);
      } else if (e.key === 'Escape') {
        lightbox.style.display = 'none';
      }
    }
  });
  </script>

</body>
</html>
