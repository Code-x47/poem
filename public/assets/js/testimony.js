

// let testi_slide = document.querySelectorAll('.testi-slide-container');
// let index = 0;

// function next(){
// 	testi_slide[index].classList.remove('active');
// 	index = (index + 1) % testi_slide.length;
// 	testi_slide[index].classList.add('active')
// }

// function prev(){
// 	testi_slide[index].classList.remove('active');
// 	index = (index - 1 + testi_slide.length) % testi_slide.length;
// 	testi_slide[index].classList.add('active')
// }



document.addEventListener('DOMContentLoaded', () => {

    const testi_slide = document.querySelectorAll('.testi-slide-container');
    if (!testi_slide.length) return;

    let index = 0;

    function showSlide(i) {
        testi_slide.forEach(slide => slide.classList.remove('active'));
        testi_slide[i].classList.add('active');
    }

    document.getElementById('next').addEventListener('click', () => {
        index = (index + 1) % testi_slide.length;
        showSlide(index);
    });

    document.getElementById('prev').addEventListener('click', () => {
        index = (index - 1 + testi_slide.length) % testi_slide.length;
        showSlide(index);
    });

});

