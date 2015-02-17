/*SLICK-MASTER CAROUSEL */
$(document).ready(function(){
	$('.slick-master-carousel').slick({
	  autoplay: false,
          dots:true,
		  autoplaySpeed: 2000,
          speed: 600,
          arrows: true,
          draggable: true,
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 4,
          responsive: [
            {
              breakpoint: 991,
              settings: {
                arrows: false,
                slidesToShow: 3,
		slidesToScroll: 3
              }
            },
            {
              breakpoint: 720,
              settings: {
                arrows: false,
                slidesToShow: 2,
		slidesToScroll: 2
              }
            },
            {
              breakpoint: 539,
              settings: {
                arrows: false,
                slidesToShow: 1,
		slidesToScroll: 1
              }
            }
        ]
	});
	$(".next").click(function(){
	    $('.slick-master-carousel').slickNext();
	})
	$(".prev").click(function(){
	    $('.slick-master-carousel').slickPrev();
	})
});

