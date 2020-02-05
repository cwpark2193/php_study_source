$(function(){
  let main_slide = $('.main_slide'),
      main_slide_imgs = main_slide.find('main_slide_imgs'),
      slides = main_slide_imgs.find('a'),
      nav = main_slide.find('main_slide_nav'),
      slideCount = slides.length,
      previous = nav.find('.previous'),
      next = nav.find('next'),
      currentIndex = 0,
      indicator = main_slide.find('main_slide_indicator'),
      indiPage = indicator.find('a');

      interval = 1000,
      timer = null,
      incrementValue = 1;
  slides.each(function(index){
  var newLeft = (index*100)+'%';
  $(this).css({left : newLeft});
  });
  function changeSlide(index){
    main_slide_imgs.animate({left : (-100*index)+'%'},interval,'easeInOutExpo');
    currentIndex = index;
    if(currentIndex ===0){
      previous.addClass('disabled');
    }else{
      previous.removeClass('disabled');
    }

    if(currentIndex ===(slideCount-1)){
      next.addClass('disabled');
    }else{
      next.removeClass('disabled');
    }
    indiPage.removeClass('activePage');
    indiPage.eq(currentIndex).addClass('activePage');
  }
  previous.click(function(event){
    event.preventDefault();
    if(currentIndex !==0){
      currentIndex -= 1;
    }
    changeSlide(currentIndex);
  });
  next.click(function(event){
    event.preventDefault();
    if(currentIndex !== (slideCount-1)){
      currentIndex += 1;
    }
    changeSlide(currentIndex);
  });
  indiPage.click(function(event){
    event.preventDefault();
    var point = $(this).index();
    changeSlide(currentIndex);
  });
  function autoDisplayStart(){
    timer = setInterval(function(){
      if(currentIndex === 2){
        incrementValue = -1;
      }else if (currentIndex ===0) {
        incrementValue = 1;
      }
      var nextIndex = (currentIndex+incrementValue) % slideCount;
      changeSlide(nextIndex);
    },interval);
  }
  function autoDisplayStop(){
    clearInterval(timer);
  }
  main_slide.mouseenter(function(){
    autoDisplayStop();
  });
  main_slide.mouseleave(function(){
    autoDisplayStart();
  });
  autoDisplayStart();
  changeSlide(currentIndex);
});
