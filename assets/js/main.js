/**
 * Pastel Interior front-end behaviour, without jQuery.
 *
 * The plugin calls keep the options they always had; ColorlibUI provides
 * drop-in versions of Owl Carousel, Magnific Popup, AjaxChimp and the
 * parallax background that build the same markup, so the theme's
 * stylesheets apply unchanged.
 */
(function () {
  'use strict';

  var UI = window.ColorlibUI;
  if (!UI) return;

  // An element's content height, as jQuery's .height() measured it.
  function contentHeight(el) {
    var style = window.getComputedStyle(el);
    return el.getBoundingClientRect().height -
      parseFloat(style.paddingTop) - parseFloat(style.paddingBottom) -
      parseFloat(style.borderTopWidth) - parseFloat(style.borderBottomWidth);
  }

  /*-------------------------------------------------------------------------------
    Navbar
  -------------------------------------------------------------------------------*/

  //* Navbar Fixed
  UI.ready(function () {
    var header = document.querySelector('header');
    var areas = UI.toElements('.header_area');
    if (!header || !areas.length) return;
    var navOffsetTop = contentHeight(header) + 50;
    window.addEventListener('scroll', function () {
      var fixed = window.pageYOffset >= navOffsetTop;
      areas.forEach(function (area) { area.classList.toggle('navbar_fixed', fixed); });
    }, { passive: true });
  });

  /*----------------------------------------------------*/
  /*  Parallax Effect js
  /*----------------------------------------------------*/
  // The jquery.parallax plugin appended to the theme's stellar.js: the banner
  // overlay moves at a third of the scroll distance.
  UI.parallax('.bg-parallax');

  UI.counter('.counter', { time: 1000 });

  //------- Owl Carusel  js --------//
  UI.owl('.banner-area', {
    items: 1,
    autoplay: 2500,
    autoplayTimeout: 5000,
    loop: true,
    nav: true,
    dots: false,
    navText: ['<i class="fa-solid fa-play"></i>', '<i class="fa-solid fa-play"></i>']
  });

  UI.owl('.testimonial', {
    items: 2,
    loop: true,
    margin: 30,
    autoplayHoverPause: true,
    smartSpeed: 500,
    dots: false,
    responsive: {
      768: { items: 2 },
      320: { items: 1 }
    }
  });

  UI.magnific('.play-video', {
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
  });

  //------- mailchimp --------//
  UI.ajaxChimp('#mc_embed_signup form');
}());
