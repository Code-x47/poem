 document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slider .slide");
    const prevBtn = document.querySelector(".prev-btn");
    const nextBtn = document.querySelector(".next-btn");
    const indicators = document.querySelectorAll(".slide-icon");

    let currentIndex = 0;
    let autoSlideInterval;

    function activateSlide(index) {
      slides.forEach((slide, i) => {
        slide.classList.remove("active");
        indicators[i]?.classList.remove("active");
      });

      slides[index].classList.add("active");
      indicators[index]?.classList.add("active");
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      activateSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      activateSlide(currentIndex);
    }

    function autoPlay() {
      autoSlideInterval = setInterval(nextSlide, 7000);
    }

    function resetAutoPlay() {
      clearInterval(autoSlideInterval);
      autoPlay();
    }

    // Listeners
    nextBtn?.addEventListener("click", () => {
      nextSlide();
      resetAutoPlay();
    });

    prevBtn?.addEventListener("click", () => {
      prevSlide();
      resetAutoPlay();
    });

    indicators.forEach((dot, i) => {
      dot.addEventListener("click", () => {
        currentIndex = i;
        activateSlide(i);
        resetAutoPlay();
      });
    });

    // Init
    activateSlide(currentIndex);
    autoPlay();
  });