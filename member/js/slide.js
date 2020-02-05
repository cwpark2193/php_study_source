$(function () {
  var slideshow = $('.slideshow'),
      slideshowSlides = slideshow.find('.slideshow_slides'),
      slides = slideshowSlides.find('a'),
      nav = slideshow.find('.slideshow_nav'),
      slidesCount = slides.length,
      previous=nav.find('.previous'),
      next=nav.find('.next'),
      currentIndex=0,
      indicator = slideshow.find('.slideshow_indicator');
      indiPage = indicator.find('a');

      interval = 3000,
      timer = null,
      incrementValue = 1;
  slides.each(function(i){
    var newLeft = (i*100)+'%';
    $(this).css({left : newLeft});
  });
  function goToSlide(index){
    slideshowSlides.animate({left : (-100*index)+'%'},1000,'easeInOutExpo');
    currentIndex=index;
    if(currentIndex ===0){
      previous.addClass('disabled');
    }else{
      previous.removeClass('disabled');
    }

    if(currentIndex ===(slidesCount-1)){
      next.addClass('disabled');
    }else{
      next.removeClass('disabled');
    }
    indiPage.removeClass('currentPage');
    indiPage.eq(currentIndex).addClass('currentPage');
  }

  previous.click(function(event){
    event.preventDefault();
    if(currentIndex !==0){
      currentIndex -= 1;
    }
    goToSlide(currentIndex);
  });
  next.click(function(event){
    event.preventDefault();
    if(currentIndex !== (slidesCount-1)){
      currentIndex += 1;
    }
    goToSlide(currentIndex);
  });
  indiPage.click(function(event){
    event.preventDefault();
    var point= $(this).index();
    goToSlide(point);
  });
  function autoDisplayStart(){
    timer = setInterval(function(){
      if(currentIndex === 2){
        incrementValue = -1;
      }else if (currentIndex ===0) {
        incrementValue=1;
      }
      var nextIndex = (currentIndex+incrementValue) % slidesCount;
      goToSlide(nextIndex);
    },interval);
  }
  function autoDisplayStop(){
    clearInterval(timer);
  }
  slideshow.mouseenter(function(){
    autoDisplayStop();
  });
  slideshow.mouseleave(function(){
    autoDisplayStart();
  });
  autoDisplayStart();
  goToSlide(currentIndex);
});
