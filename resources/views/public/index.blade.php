<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="POEM, poem People of exploits ministry, Church Website, Gospel Sermon, Pastor Nkechi, Nkechi Tony, pastor Nkechi Esther Tony">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/fontawesome/css/all.css')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="assets/image/images/newLogo.png">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/slider.css')}}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>People of Exploits Ministry International | Poem International |Sermons, Songs & Messages</title>


		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Belgrano:400" rel="stylesheet" type="text/css">
		<link href="assets/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Loading main css file -->
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/book.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/footer.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('assets/css/testimonial.css')}}">
		<!-- AOS CSS -->
       <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

		
		<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->


		<style>

         .myhero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        .hero-slide {
            position: absolute;
            inset: 0;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        .hero-slide.active {
            opacity: 1;
        }

        .hero-background {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #1a2332 0%, #2a3f52 50%, #1a2332 100%);
        }

        .hero-pattern {
            position: absolute;
            inset: 0;
            opacity: 0.1;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' xmlns='http://www.w3.org/2000/svg'%3E%3Cdefs%3E%3Cpattern id='grid' width='60' height='60' patternUnits='userSpaceOnUse'%3E%3Cpath d='M 10 0 L 0 0 0 10' fill='none' stroke='white' stroke-width='1'/%3E%3C/pattern%3E%3C/defs%3E%3Crect width='100%25' height='100%25' fill='url(%23grid)'/%3E%3C/svg%3E");
         
        }

        .hero-content {
            position: relative;
            height: 100%;
            display: flex;
            align-items: center;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .hero-text {
            max-width: 56rem;
        }

        .hero-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            background: #ec9c40;
			
            color: white;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 9999px;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            color: white;
            line-height: 1.2;
            margin-bottom: 1.5rem;
            animation: fadeInLeft 1s ease-out 0.2s both;
        }

        /* .hero-subtitle {
            font-size: 1.5rem;
            color: #d1d5db;
            margin-bottom: 2rem;
            animation: fadeInLeft 1s ease-out 0.4s both;
        } */

		.hero-subtitle {
			color: #fff;
			background: rgba(0,0,0,0.35);
			backdrop-filter: blur(4px);
			padding: 8px 12px;
			border-radius: 8px;
			animation: fadeInLeft 1s ease-out 0.4s both;
			display: inline-block;
			}


        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
			
            animation: fadeInUp 1s ease-out 0.6s both;
        }

		.btn-primary {
			background: #ec9c40;
		}

        .btn-secondary {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            color: white;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.3);
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background: rgba(255,255,255,0.2);
        }

        .hero-controls {
            position: absolute;
            bottom: 3rem;
			
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 1rem;
            z-index: 10;
        }

        .hero-nav-btn {
            width: 3rem;
            height: 3rem;
            background: rgba(255,255,255,0.1);
			
            backdrop-filter: blur(10px);
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .hero-nav-btn:hover {
            background: rgba(255,255,255,0.2);
        }

        .hero-dots {
            display: flex;
            gap: 0.75rem;
        }

        .hero-dot {
            width: 0.75rem;
            height: 0.75rem;
            /* background: rgba(255,255,255,0.5); */
			background: #ec9c40;
            border: none;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .hero-dot.active {
            width: 3rem;
            background: #ec9c40;
        }



        .hero-slide[data-slide="0"] .hero-background {
            background-image: url('assets/image/pix/bg2.jpg');
            background-size: cover;
            background-position: center;
        }

        .hero-slide[data-slide="1"] .hero-background {
            background-image: url('assets/image/pix/bg1.jpg');
            background-size: cover;
            background-position: center;
        }

        .hero-slide[data-slide="2"] .hero-background {
            background-image: url('assets/image/pix/bg2.jpg');
            background-size: cover;
            background-position: center;
        }



		  /* Responsive */
        @media (max-width: 1024px) {
          
            .mobile-menu-btn {
                display: block;
            }

            .hero-title {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.25rem;
            }

            .section-title {
                font-size: 2rem;
            }

          
        }

        @media (max-width: 640px) {
            .hero-buttons {
                flex-direction: column;
            }

            .hero-buttons button {
                width: 100%;
                justify-content: center;
            }

		}


		</style>

	</head>


	<body>


	<div class="site-content">
			 
	<div class="site-header header-collapsed">
				<div class="container">
					<div class="header-bar">
						<a href="index.html" class="branding">
							<img src="{{asset('assets/image/images/rotationalLogo.gif')}}" alt="" class="logo" width="70" height="70">
							<h1 class="site-title">People Of Exploits Ministry International</h1>
						</a>

						<!-- Default snippet for navigation -->
						<div class="main-navigation">
							<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
							<ul class="menu">
								<li class="menu-item current-menu-item"><a href="#about">About us</a></li>
								<li class="menu-item"><a href="#pastors">Pastors</a></li>
								<li class="menu-item"><a href="#testimony">Testimonies</a></li>
								<li class="menu-item"><a href="#seremons">Sermons</a></li>
								<li class="menu-item"><a href="#families">Gallery</a></li>
								<li class="menu-item"><a href="#contact">Contact</a></li>
							</ul> <!-- .menu -->
						</div> <!-- .main-navigation -->

						<div class="mobile-navigation"></div>
						
					</div>
				</div>
			</div> <!-- .site-header -->



		<!-- Hero Section -->
    <section id="myhome" class="myhero">
		<div class="hero-slide active" data-slide="0">
			<div class="hero-background"></div>
			<div class="hero-pattern"></div>
			<div class="hero-content">
				<div class="hero-text">
					<span class="hero-badge">Raising People of Exploit</span>
					<h1 class="hero-title">Transforming Lives Through the Word of God</h1>
					<p class="hero-subtitle">
						A place of worship, love, and spiritual growth where destinies are shaped in Christ
					</p>
					<div class="hero-buttons">
						<button class="btn-primary" style="padding: 1rem 2rem; display: flex; align-items: center; gap: 0.5rem;">
							<span>Join Us This Thursday</span>
							<i class="fas fa-arrow-right"></i>
						</button>
						<button class="btn-secondary">Watch Sermons</button>
					</div>
				</div>
			</div>
       </div>




        <div class="hero-slide" data-slide="1">
			<div class="hero-background"></div>
			<div class="hero-pattern"></div>
			<div class="hero-content">
				<div class="hero-text">
					<span class="hero-badge">Empowered by the Spirit</span>
					<h1 class="hero-title"><span style="color: darkred;">Emp</span>owering Believers for Kingdom Impact</h1>
					<p class="hero-subtitle">
						Teaching sound doctrine, building faith, and equipping saints to walk in purpose
					</p>
					<div class="hero-buttons">
						<button class="btn-primary" style="padding: 1rem 2rem; display: flex; align-items: center; gap: 0.5rem;">
							<span>What we do</span>
							<i class="fas fa-arrow-right"></i>
						</button>
						<button class="btn-secondary">About POEM</button>
					</div>
				</div>
			</div>
       </div>

<div class="hero-slide" data-slide="2">
    <div class="hero-background"></div>
    <div class="hero-pattern"></div>
    <div class="hero-content">
        <div class="hero-text">
            <span class="hero-badge">Building Kingdom Lives</span>
            <h1 class="hero-title">Building Strong Believers and Godly Families</h1>
            <p class="hero-subtitle">
                A vibrant community committed to prayer, the Word, and kingdom advancement
            </p>
            <div class="hero-buttons">
                <button class="btn-primary" style="padding: 1rem 2rem; display: flex; align-items: center; gap: 0.5rem;">
                    <span>Plan a Visit</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
                <button class="btn-secondary">Contact Us</button>
            </div>
        </div>
    </div>
</div>



        <div class="hero-controls">
            <button class="hero-nav-btn" onclick="previousSlide()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <div class="hero-dots">
                <button class="hero-dot active" onclick="goToSlide(0)"></button>
                <button class="hero-dot" onclick="goToSlide(1)"></button>
                <button class="hero-dot" onclick="goToSlide(2)"></button>
            </div>
            <button class="hero-nav-btn" onclick="nextSlide()">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
    </section>




</div>





     
     <!-- About Mummy-->


	 <div class="second-section" style="margin-top: 20px;">
		<div class="second-section-content">
		  
		  <div class="second-section-image" data-aos="zoom-in" data-aos-duration="1000">
			<img src="assets/image/images/mum2.jfif" alt="Pastor Mrs. Nkechi Tony" class="ss-img" />
		  </div>
	  
		  <div class="second-section-text" data-aos="zoom-in" data-aos-duration="1000">
			<div class="badge">LIVE</div>
	  
	        
                <div class="icon-group">
                    <i class="fab fa-youtube"></i>
                    <i class="fas fa-headset"></i>
                    <a href="#" class="pdf-link"><i class="fas fa-file-pdf"></i></a>
                    <i class="fas fa-church"></i>
                </div>  
			


			<div class="section-writeup">
			  <h1>Meet: Pastor Mrs. Nkechi Tony</h1>
			  <h3><i class="fas fa-clock"></i> Every Thursday, 4:00 PM - 7:00 PM</h3>
			  <p>
				Nkechi Tony was trained as an accountant but is called as an evangelist.
				She pastors People of Exploits Ministry International and is a renowned conference speaker.
				She lives in Enugu with her husband, Surv. Tony Aguguesi, and they are blessed with wonderful children.
			  </p>
			</div>
		  </div>
	  
		</div>
	  </div>


	  
<!-- End Of About Mummy -->	  


			<main class="main-content">
				<div id="about" class="fullwidth-block utilities" style="margin-top: 20px;">
					<div class="container">
						<div class="row">
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="feature">
									<div class="feature-icon"><img src="assets/image/images/icon-church.png" alt="" class="icon" height="90" width="150"></div>
									<h2 class="feature-title">Who we are?</h2>
									<p style="color: #ffffff;">We are People Of Exploit Ministry International.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="feature">
									<div class="feature-icon"><img src="assets/image/images/believe.png" alt="" class="icon"></div>
									<h2 class="feature-title">Belief</h2>
									<p style="color: #ffffff;">At POEM, we believe in the one true God — God the Father, God the Son,
    and God the Holy Spirit — working together in perfect unity for our salvation and growth.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="feature">
									<div class="feature-icon"><img src="assets/image/images/icon-cross.png" alt="" class="icon"></div>
									<h2 class="feature-title">Our creed</h2>
									<p style="color: #ffffff;"> Our creed remains unwavering: <strong>Operation Take Over the Territory for Christ</strong> —
    advancing God’s kingdom by raising believers to influence lives, cities, and nations.</p>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="feature">
									<div class="feature-icon"><img src="assets/image/images/love.png" alt="" class="icon"></div>
									<h2 class="feature-title">Love &amp; Peace</h2>
									<p style="color: #ffffff;"> At POEM, love is at the center of all we do. We see one another as family, united in Christ,
                                       living in peace, care, and genuine fellowship.
									</p>
								</div>
							</div>
						</div> <!-- row -->
					</div> <!-- .container -->
				</div> <!-- #about -->

				<div id="pastors" class="fullwidth-block utilities" style="margin-top: 20px;">
					<div class="container">
						<h2 class="section-title">Meet our Pastors</h2>
						<p class="section-intro">At POEM, we are blessed with dedicated, Spirit-filled pastors who are called and equipped
                         by the Holy Spirit to shepherd, teach, and care for God’s people with love and wisdom.
						</p>

						<div class="roww">
						
								<div class="pastor" data-aos="zoom-in" data-aos-duration="1000">
									<img src="assets/image/images/mum5.jfif" alt="" class="pastor-image" height="800px" width="500px">
									<h3 class="pastor-name">Pastor Mrs Nkechi Tony</h3>
									<small class="date">General Overseer</small>
								</div>
						
						
								<div class="pastor" data-aos="zoom-in" data-aos-duration="1000">
									<img src="assets/image/images/Pst.Francis.jpg" alt="" class="pastor-image">
									<h3 class="pastor-name">Pastor Francis Ugwoke</h3>
									<small class="date">Nsukka Regional Pastor</small>
								</div>
							
						
								<div class="pastor" data-aos="zoom-in" data-aos-duration="1000">
									<img src="assets/image/images/obi.jfif" alt="" class="pastor-image">
									<h3 class="pastor-name">Pastor Obinna Ezigbo</h3>
									<small class="date">Youth Pastor</small>
								</div>
							
							
								<div class="pastor" data-aos="zoom-in" data-aos-duration="1000">
									<img src="assets/image/images/dr_okwu.jpg" alt="" class="pastor-image">
									<h3 class="pastor-name">Pastor(Dr) Okwu</h3>
									<small class="date">Assistant Pastor</small>
								</div>
							
							
						</div> 

						<div class="text-center">
							<a href="#" class="button">View all our pastors</a>
						</div>
					</div> <!-- .container -->
				</div> <!-- #pastors -->


<!---BOOKKS-->

<section class="products utilities">
	<div class="hTx"><h1>Kingdom Books</h1></div>
  
	<div class="slider-nav">
	  <a href="#" class="prev-events"><img src="assets/image/images/arrow-left.png" alt="Previous"></a>
	  <a href="#" class="next-events"><img src="assets/image/images/arrow-right.png" alt="Next"></a>
	</div>
  
	<div class="box-slider">
	  <div class="box-container" id="sliderContainer">
		<!-- Book 1 -->
		<div class="box" data-aos="zoom-in" data-aos-duration="1000">
		  <div class="icons">
			<a href="#" class="fas fa-shopping-cart"></a>
			<a href="#" class="fas fa-heart"></a>
			<a href="#" class="fas fa-eye"></a>
		  </div>
		  <div class="image">
			<img src="assets/image/images2/stranded.jpeg" alt="Gifted But Stranded">
		  </div>
		  <div class="content">
			<h3>Gifted But Stranded</h3>
			<div class="stars">
			  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
			  <i class="fas fa-star"></i><i class="fas fa-star"></i>
			</div>
			<div class="price">N1000.00 <span>N3500.00</span></div>
			<div class="btn"><button><a href="#">Add to Cart</a></button></div>
		  </div>
		</div>
  
		<!-- Book 2 -->
		<div class="box" data-aos="zoom-in" data-aos-duration="1000">
		  <div class="icons">
			<a href="#" class="fas fa-shopping-cart"></a>
			<a href="#" class="fas fa-heart"></a>
			<a href="#" class="fas fa-eye"></a>
		  </div>
		  <div class="image">
			<img src="assets/image/images2/beware.jpg" alt="Beware">
		  </div>
		  <div class="content">
			<h3>Beware Of Old Prophets</h3>
			<div class="stars">
			  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
			  <i class="fas fa-star"></i><i class="fas fa-star"></i>
			</div>
			<div class="price">N1000.00 <span>N3500.00</span></div>
			<div class="btn"><button><a href="#">Add to Cart</a></button></div>
		  </div>
		</div>
  
		<!-- Book 3 -->
		<div class="box" data-aos="zoom-in" data-aos-duration="1000">
		  <div class="icons">
			<a href="#" class="fas fa-shopping-cart"></a>
			<a href="#" class="fas fa-heart"></a>
			<a href="#" class="fas fa-eye"></a>
		  </div>
		  <div class="image">
			<img src="assets/image/images2/voice2.jpeg" alt="Voice of God">
		  </div>
		  <div class="content">
			<h3>Voice of God</h3>
			<div class="stars">
			  <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
			  <i class="fas fa-star"></i><i class="fas fa-star"></i>
			</div>
			<div class="price">N1000.00 <span>N3500.00</span></div>
			<div class="btn"><button><a href="#">Add to Cart</a></button></div>
		  </div>
		</div>
  
	  </div>
	</div>
  </section>
  
  
  



<div id="testimony" class="utilities">
  <div class="container">
       <h2 class="section-title">Testimonies</h2>
  </div>
</div>
<!-- <div class="body">
	<div class="main-slide-container" data-aos="zoom-in" data-aos-duration="1000">
	  <div class="testi-slide-container active">
	  	 <div class="testi-slide">
	  	 	<i class="fas fa-quote-right icon"></i>
	  		<div class="user">
	  			<img src="">
	  			<div class="user-info">
	  				<h3>First Testifier</h3>
	  				 <div class="testi-stars">
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 </div>
	  			</div>
	  		</div>
	  		<p class="testi-test">
	  			Lorem ipsum dolor sit amet, consectetur adipisicing elit.
	  		</p>
	  	 </div>
	  </div>


	  <div class="testi-slide-container">
	  	 <div class="testi-slide">
	  	 	<i class="fas fa-quote-right icon"></i>
	  		<div class="user">
	  			<img src="">
	  			<div class="user-info">
	  				<h3>Second Testifier</h3>
	  				 <div class="testi-stars">
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 </div>
	  			</div>
	  		</div>
	  		<p class="testi-test">
	  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  			tempor incididunt ut labore et dolore magna aliqua.
	  		</p>
	  	 </div>
	  </div>


<div class="testi-slide-container">
	  	 <div class="testi-slide">
	  	 	<i class="fas fa-quote-right icon"></i>
	  		<div class="user">
	  			<img src="">
	  			<div class="user-info">
	  				<h3>Third Testifier</h3>
	  				 <div class="testi-stars">
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 </div>
	  			</div>
	  		</div>
	  		<p class="testi-test">
	  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  			tempor incididunt ut labore et dolore magna aliqua. 
	  		</p>
	  	 </div>
	  </div>


<div class="testi-slide-container">
	  	 <div class="testi-slide">
	  	 	<i class="fas fa-quote-right icon"></i>
	  		<div class="user">
	  			<img src="">
	  			<div class="user-info">
	  				<h3>Fourth Testifier</h3>
	  				 <div class="testi-stars">
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 	<i class="fas fa-star"></i>
	  				 </div>
	  			</div>
	  		</div>
	  		<p class="testi-test">
	  			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  			tempor incididunt ut labore et dolore magna aliqua. 
	  		</p>
	  	 </div>
	  </div>

<div id="next" class="fas fa-chevron-right" onclick="next()"></div>
<div id="prev" class="fas fa-chevron-left" onclick="prev()"></div>

</div>
</div> -->

<div class="body">
    <div class="main-slide-container" data-aos="zoom-in" data-aos-duration="1000">

        @foreach ($testimonies as $index => $testimonial)
            <div class="testi-slide-container {{ $index === 0 ? 'active' : '' }}">
                <div class="testi-slide">
                    <i class="fas fa-quote-right icon"></i>

                    <div class="user">
                        <img src="{{ $testimonial->image ?? asset('assets/image/images/newLogo.png') }}" alt="">
                        <div class="user-info">
                            <h3>{{ $testimonial->testifier }}</h3>

                            <div class="testi-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $testimonial->rating ? 'filled' : '' }}"></i>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <p class="testi-test">
                      {{ Str::words($testimonial->testimony, 50) }} 
					   @if(str_word_count($testimonial->testimony) >= 100)
							<a href="#">
								Read more
							</a>
    					@endif
                    </p>
                </div>
            </div>
        @endforeach

        <div id="next" class="fas fa-chevron-right"></div>
        <div id="prev" class="fas fa-chevron-left"></div>

    </div>
</div>


				<div id="events" class="fullwidth-block" style="margin-top: 20px;">
					<div class="container">
						<h2 class="section-title">Upcoming events</h2>
						<div class="text-center">
							<a href="#" class="prev-events"><img src="assets/image/images/arrow-left.png" alt=""></a>
							<a href="#" class="next-events"><img src="assets/image/images/arrow-right.png" alt=""></a>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="event">
									<img src="assets/image/images/mercy4.jpg" alt="" class="event-image">
									<h3 class="event-title"><a href="#">Something Big Is About to happen. Stay Tuned</a></h3>
									<div class="event-meta"><span class="date"><i class="fa fa-calendar"></i> 02/11/2023</span><span class="location"><i class="fa fa-map-marker"></i>Enugu State</span></div>
									<a href="#" class="button">Get more information</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="event">
									<img src="assets/image/images/mercy2.jpg" alt="" class="event-image" >
									<h3 class="event-title"><a href="#">Something Big Is About to happen. Stay Tuned</a></h3>
									<div class="event-meta"><span class="date"><i class="fa fa-calendar"></i> 02/11/2023</span><span class="location"><i class="fa fa-map-marker"></i>Enugu State</span></div>
									<a href="#" class="button">Get more information</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="event">
									<img src="assets/image/images/mercy3.jpg" alt="" class="event-image">
									<h3 class="event-title"><a href="#">Something Big Is About to happen. Stay Tuned</a></h3>
									<div class="event-meta"><span class="date"><i class="fa fa-calendar"></i> 02/11/2023</span><span class="location"><i class="fa fa-map-marker"></i>Enugu State</span></div>
									<a href="#" class="button">Get more information</a>
								</div>
							</div>
							<div class="col-md-3 col-sm-6" data-aos="zoom-in" data-aos-duration="1000">
								<div class="event">
									<img src="assets/image/images/mercy1.jpg" alt="" class="event-image">
									<h3 class="event-title"><a href="#">And Its Finally Out...Stream On our Music Platforms</a></h3>
									<div class="event-meta"><span class="date"><i class="fa fa-calendar"></i> 02/11/2023</span><span class="location"><i class="fa fa-map-marker"></i>Enugu State</span></div>
									<a href="#" class="button">Get more information</a>
								</div>
							</div>
						</div> <!-- .row -->
					</div> <!-- .container -->
				</div> <!-- #events -->
				
<!-- #sermons -->

                <div id="seremons" class="seremon-section utilities">
					<div class="container">
					  <div class="seremon-wrapper">
						<!-- Column: Recent Songs -->
						<div class="seremon-column" data-aos="zoom-in" data-aos-duration="1000">
						  <h3 class="section-title">Recent Songs</h3>
						  <ul class="seremon-list">
							<li>
							  <h3 class="seremon-title"><a href="#">Mercy Found Me</a></h3>
							  <div class="seremon-meta">
								<span><i class="fa fa-calendar"></i> <strong>Date:</strong> 2/11/2023</span>
								<span><i class="fa fa-user"></i> <strong>POEM:</strong> Choir ft Pastor Nkechi</span>
							  </div>
							  <div class="seremon-buttons">
								<a href="#" class="button"><img src="assets/image/images/icon-headset.png" alt="" class="icon">Listen</a>
								<a href="#" class="button"><i class="fa fa-download"></i> Download</a>
							  </div>
							</li>
							<!-- More songs... -->
						  </ul>
						  <a href="#" class="button view-all">See all songs</a>
						</div>
				  
						<!-- Column: Latest Sermons -->
						<div class="seremon-column" data-aos="zoom-in" data-aos-duration="1000">
						  <h3 class="section-title">Latest Sermons</h3>
						  <ul class="seremon-list">
							<li>
							@foreach ($sermons as $sermon)
									
								
							  <h3 class="seremon-title"><a href="#">{{$sermon->title}}</a></h3>
							  <div class="seremon-meta">
								<span><i class="fa fa-calendar"></i> <strong>Date:</strong> {{$sermon->sermon_date}}</span>
								<span><i class="fa fa-user"></i> <strong>Pastor:</strong>{{$sermon->minister}}</span>
							  </div>
							  <div class="seremon-buttons">
								<a href="{{route('public.message')}}" class="button"><img src="assets/image/images/icon-headset.png" alt="" class="icon">Stream</a>
								<a href="{{route('public.message')}}" class="button"><i class="fa fa-download"></i> Download</a>
							  </div>
							 </li>
							@endforeach
							<!-- More sermons... -->
						  </ul>
						  <a href="{{route('public.message')}}" class="button view-all">See all latest sermons</a>
						</div>
					  </div>
					</div>
				  </div>
				  

<!--sermon ends-->
                 
<!--Gallery-->
<section id="families" class="gallery-section fullwidth-block utilities">
  <div class="container">
    <h2 class="section">Our Gallery</h2>
    <p class="section-intro" style="margin: 0 auto 20px;">
      Enjoy amazing pictures from our prayer meetings. It is indeed a thing of joy to fellowship with God's people.
    </p>
   
    <div class="slider" data-aos="zoom-in" data-aos-duration="1000">
      @foreach($pics as $pic)  
	<!-- Visible Slides -->
      <div class="slide active">
		<img src="{{ asset('storage/' . $pic->image_path) }}" alt="Slide 1">
        <div class="info">
          <h2>POEM Gallery</h2>
          <p>{{$pic['title']}}</p>
        </div>
      </div>
      @endforeach
      <!-- <div class="slide">
        <img src="assets/image/photos/img2.jpg" alt="Slide 2" />
        <div class="info">
          <h2>Choir Worship</h2>
          <p>Praising with joyful hearts in harmony.</p>
        </div>
      </div>

      <div class="slide">
        <img src="assets/image/photos/img3.jpg" alt="Slide 3" />
        <div class="info">
          <h2>Beautiful People of God</h2>
          <p>A family united in love and grace.</p>
        </div>
      </div> -->

      <!-- Hidden Slides (More Images) -->
      <!-- <div class="slide hidden">
        <img src="assets/image/photos/img4.jpg" alt="Slide 4" />
        <div class="info">
          <h2>Powerful Ministration</h2>
          <p>God moving in mighty ways during worship.</p>
        </div>
      </div>

      <div class="slide hidden">
        <img src="assets/image/photos/img5.jpg" alt="Slide 5" />
        <div class="info">
          <h2>Joyful Assembly</h2>
          <p>Happy faces and lifted hands glorifying God.</p>
        </div>
      </div> -->

      <!-- Navigation (optional) -->
      <div class="navigation">
        <span class="prev-btn">&#10094;</span>
        <span class="next-btn">&#10095;</span>
      </div>

      <div class="navigation-visibility">
        <div class="slide-icon active"></div>
        <div class="slide-icon"></div>
        <div class="slide-icon"></div>
      </div>
    </div>

    <!-- SEE MORE Button (Now outside the slider and steady) -->
    <div class="see-more-wrapper">
      <a id="seeMoreBtn" href="{{route('public.gallery')}}">See More</a>
    </div>
  </div>
</section>






				<div id="contact" class="fullwidth-block form-contact utilities" data-bg-color="#4a3173">
					<div class="container form-data" data-aos="zoom-in" data-aos-duration="1000">
						<h2 class="section-title">Contact us</h2>
						<p class="section-intro" style="margin: 0 auto 20px;">We would love to hear from you!
                   At People of Exploits Ministry, we believe in connecting, supporting, and walking alongside you in your spiritual journey. Whether you have a prayer request, testimony, inquiry about our programs, or you simply want to reach out, our team is ready to respond with love and care.</p>

						<div class="contact-detail">
							<span style="color: #ffffff;"><img src="assets/image/images/icon-marker.png" alt="" class="icon"> ECCIMA Buiding Opp. All Saints Church G.R.A Enugu</span>
							<span style="color: #ffffff;"><img src="assets/image/images/icon-phone.png" alt="" class="icon"> 
							07060786227</span>
							<span style="color: #ffffff;"><img src="assets/image/images/icon-envelope.png" alt="" class="icon"> contact@poemInternational.com</span>
						</div>

						<form class="contact-form">
							<div class="row">
								<div class="col-md-6">
									<div class="control"><input type="text" placeholder="Your name..."><img src="assets/image/images/icon-user.png" alt="" class="icon"></div>
									<div class="control"><input type="text" placeholder="Email..."><img src="assets/image/images/icon-email.png" alt="" class="icon"></div>
									<div class="control"><input type="text" placeholder="Phone/Website..."><img src="assets/image/images/icon-globe.png" alt="" class="icon"></div>
								</div>
								<div class="col-md-6">
									<div class="control">
										<textarea name="" placeholder="Your message..."></textarea>
										<img src="assets/image/images/icon-pen.png" alt="" class="icon">
									</div>
									<p class="text-right">
										<input type="submit" value="Send message" disabled>
									</p>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- <div class="map" data-latitude="-6.897789" data-longitude="107.621735"></div>-->

				<div class="gMap">
					<iframe class="mapFrame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2885.4754399857243!2d7.493356911461902!3d6.456937484242981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1044a3c71eed3315%3A0x61cbfd5f997c2bfa!2sEnugu%20Chamber%20Of%20Commerce%2C%20Industry%2C%20Mines%20and%20Agriculture%20(ECCIMA)!5e0!3m2!1sen!2sng!4v1698694984342!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
				</div>
			
			</main>
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
    © 2026 People Of Exploits Ministry International - All Rights Reserved
	
  </p>
</footer>





		
         <script type="text/javascript" src="assets/js/slider.js"></script>
		<script src="assets/js/js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
		<script src="assets/js/js/plugins.js"></script>
		<script src="assets/js/js/app.js"></script>
		<script type="text/javascript" src="assets/js/testimony.js"></script>



		  <!-- AOS JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
         <script>
           AOS.init();
         </script>

		 
        <!---Gallery View More JS-->
<script>
  document.getElementById("seeMoreBtn").addEventListener("click", function () {
    const hiddenSlides = document.querySelectorAll(".slide.hidden");
    hiddenSlides.forEach(slide => {
      slide.classList.remove("hidden");
    });
    this.style.display = "none"; // hide the button after it's clicked
  });
</script>


<script>

 // Hero Slider
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');
        const dots = document.querySelectorAll('.hero-dot');

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            if (n >= slides.length) currentSlide = 0;
            if (n < 0) currentSlide = slides.length - 1;
            
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function nextSlide() {
            currentSlide++;
            showSlide(currentSlide);
        }

        function previousSlide() {
            currentSlide--;
            showSlide(currentSlide);
        }

        function goToSlide(n) {
            currentSlide = n;
            showSlide(currentSlide);
        }

        // Auto-advance slides
        setInterval(nextSlide, 6000);


</script>
		  
		
</body>

</html>