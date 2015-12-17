(function($) {

  function activateMenu() {
    var header = $('header');
    var body = $('body');
    var menu = $('div.menu');
    var menuOpen = $('a.menu-open');
    var menuClose = $('a.menu-close');

    menuOpen.click( function() {
      body.addClass('menu-active');
      header.addClass('menu-active');
      menu.addClass('is-active');

      body.append('<div class="overlay"></div>');

      $('.overlay').click( function() {
        body.removeClass('menu-active');
        header.removeClass('menu-active');
        menu.removeClass('is-active');
        $(this).remove();
      });
    });

    menuClose.click( function() {
      body.removeClass('menu-active');
      header.removeClass('menu-active');
      menu.removeClass('is-active');

      $('.overlay').remove();
    });
  };

  activateMenu();

}( jQuery ));