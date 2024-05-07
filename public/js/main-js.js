(function ($) {
  "use strict";

  /*============================================
                    testinomial
    ============================================*/
  jQuery("#expert-slider").slick({
    slidesToShow: 2,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: true,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  /*=====Video Popup=*/
  jQuery(".video-popup-btn").on("click", function () {
    jQuery(".video-banner").modal("show");
  });
  jQuery(".video-popup-btn1").on("click", function () {
    jQuery(".video-banner").modal("show");
  });
  jQuery(".video-popup-btn2").on("click", function () {
    jQuery(".video-banner").modal("show");
  });

  /*====COndition slider==*/
  jQuery(".conditions-slider").slick({
    slidesToShow: 6,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: false,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });


  
  /*====Find Your Expert slider==*/
  jQuery(".findexpert-slider").slick({
    slidesToShow: 5,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: false,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });

  
  jQuery(".conditions1-slider").slick({
    slidesToShow: 6,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: false,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });

  /*=====Testimonial Slider=======*/

  jQuery(".testimonial-slider").slick({
    slidesToShow: 2,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: true,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  /*=====Blogs Slider=======*/

  jQuery(".blogs-slider").slick({
    slidesToShow: 3,
    dots: true,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: false,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  /*=====Webinars Slider=======*/

  jQuery(".webinars-slider").slick({
    slidesToShow: 3,
    dots: true,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: false,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });

  /*=====Comment Slider=======*/

  jQuery(".comments-slider").slick({
    slidesToShow: 3,
    dots: false,
    centerMode: false,
    loop: true,
    autoplay: true,
    arrows: true,
    prevArrow:
      "<button type='button' class='slick-prev pull-left slick-nav-btn'><i class='fa-solid fa-angle-left'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next pull-right slick-nav-btn'><i class='fa-solid fa-angle-right'></i></button>",
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
})(jQuery);
