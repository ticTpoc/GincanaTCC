const track = document.querySelector('.carousel__track');
const slides = Array.from(track.children);
const nextButton= document.querySelector('.carousel__button--right');
const prevButton= document.querySelector('.carousel__button--left');
const dotsNav = document.querySelector('.carousel__nav');
const dots = Array.from(dotsNav.children);
const slideSize = slides[0].getBoundingClientRect();
const slideWidth = slideSize.width;
const setSlidePosition = (slide, index) =>{
    slide.style.left = slideWidth * index + 'px';
}
/* as bolinhas mostrarem a posição */
const updateDots = (currentDot, targetDot) =>{
    currentDot.classList.remove('current-slide');
targetDot.classList.add('current-slide');
}
/* apagar as setas dos cantos */

const hideShowArrows = (slides, prevButton, nextButton, targetIndex) =>{
    if(targetIndex === 0){
        prevButton.classList.add('is-hidden');
        nextButton.classList.remove('is-hidden');
    
    }else if (targetIndex === slides.length-1 ){
        prevButton.classList.remove('id-hidden');
        nextButton.classList.add('is-hidden');
    } else{
        prevButton.classList.remove('is-hidden');
        nextButton.classList.remove('is-hidden')
    }
}
/* posição dos slides */
slides.forEach(setSlidePosition);
/* mover os slides*/
const moveToSlide = (track, currentSlide, targetSlide) =>{
    track.style.transform = 'translateX(-' + targetSlide.style.left + ')';
    currentSlide.classList.remove('current-slide');
    targetSlide.classList.add('current-slide');
}



/* mexer pra frente */
nextButton.addEventListener('click', e =>{
   const currentSlide= track.querySelector('.current-slide');
   const nextSlide= currentSlide.nextElementSibling;
  const currentDot = dotsNav.querySelector('.current-slide');
  const nextDot= currentDot.nextElementSibling;
  const nextIndex = slides.findIndex(slide=>slide === nextSlide);

  moveToSlide(track, currentSlide, nextSlide);
   updateDots(currentDot, nextDot);
   hideShowArrows(slides, prevButton, nextButton, nextIndex);

})
/* mexer pra trás */
prevButton.addEventListener('click', e =>{
    const currentSlide= track.querySelector('.current-slide');
   const prevSlide= currentSlide.previousElementSibling;
   const currentDot = dotsNav.querySelector('.current-slide');
   const prevDot= currentDot.previousElementSibling;
   const prevIndex = slides.findIndex(slide=>slide === prevSlide);

   moveToSlide(track, currentSlide, prevSlide);
   updateDots(currentDot, prevDot);
   hideShowArrows(slides, prevButton, nextButton, prevIndex);
})



/* mexer através das bolinhas */
/* não usarei no modelo GOD */

/*
dotsNav.addEventListener('click', e =>{
const targetDot = e.target.closest('button');
if (!targetDot) return;
const currentSlide = track.querySelector('.current-slide');
const currentDot = dotsNav.querySelector('.current-slide');
const targetIndex = dots.findIndex(dot => dot === targetDot);
const targetSlide = slides[targetIndex];

moveToSlide(track, currentSlide, targetSlide);


})
*/
