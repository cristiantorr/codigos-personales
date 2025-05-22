jQuery(document).ready(function ($) {
  //SWIPER BANNER

  if (jQuery(".swiper-banner-home").length > 0) {
    var swiper = new Swiper(".swiper-banner-home", {
      spaceBetween: 0,
      effect: "fade",
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".pagination-home",
        clickable: true,
      },
      navigation: {
        nextEl: ".next-home",
        prevEl: ".prev-home",
      },
    });
  }
  // MENÚ HAMBURGUESA
  if (jQuery("#nav-toogle").length > 0) {
    jQuery("#nav-toogle").click(function () {
      jQuery(this).toggleClass("open");
      jQuery("body").toggleClass("open-nav-xs");
    });
  }

  if (jQuery("header nav li a").length > 0) {
    jQuery("header nav li a").click(function () {
      jQuery("body").removeClass("open-nav-xs");
      jQuery("#nav-toogle").removeClass("open");
    });
  }
}); /* end of as page load scripts */
