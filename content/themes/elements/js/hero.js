(function($) {

  function initHero(){
    // Get main hero elements
    var hero = $('.hero');
    var hero_banner = $('.hero-banner');

    // Determine hero height
    var header = $('header');
    var header_height = header.height();
    var hero_height = hero.height();

    // Apply heights
    hero_banner.css("height", hero_height);

    // Shape the stretched object
    var wrapper = $('.is-stretched-wrapper');
    var wrapper_w = wrapper.width();
    var wrapper_h = wrapper.height();

    var object = $('.is-stretched-object');
    var ratio = object.width() / object.height();

    object.css("min-height", wrapper_h);

    if (wrapper_w < (wrapper_h * ratio)) {
      object.removeClass("is-stretched-wide");
      object.addClass("is-stretched-high");
    } else {
      object.removeClass("is-stretched-high");
      object.addClass("is-stretched-wide");
    }

    // Scroll animation
    var trigger = $('.arrow-scroll');

    trigger.css("top", (hero_height - 30));

    trigger.click( function() {
      $("html, body").animate({
        scrollTop: hero_height + 20
      }, 500);
    });

    // Fade Content on scroll
    var hero_content = $('.hero .section-body');
    hero_content.addClass('is-visible-0.7s');

    waypoint = new Waypoint({
      element: $('.hero .section-body'),
      offset: '10%',
      handler: function() {
        hero_content.toggleClass('is-visible-0.7s');
        hero_content.toggleClass('is-hidden-0.7s');
      }
    });
  };

  if($('section.hero').length > 0) {
    initHero();

    $(window).on("resize", function() {
      initHero();
    });
  }

}( jQuery ));