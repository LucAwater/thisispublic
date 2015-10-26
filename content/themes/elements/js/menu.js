(function($) {

  function activateMenu() {
    var header = $('header');
    var main = $('main');
    var menu = $('div.menu');
    var menuOpen = $('a.menu-open');
    var menuClose = $('a.menu-close');

    menuOpen.click( function() {
      header.addClass('menu-active');
      menu.addClass('is-active');

      main.append('<div class="overlay"></div>');

      $('.overlay').click( function() {
        header.removeClass('menu-active');
        menu.removeClass('is-active');
        $(this).remove();
      });
    });

    menuClose.click( function() {
      header.removeClass('menu-active');
      menu.removeClass('is-active');
    });
  };

  activateMenu();

}( jQuery ));