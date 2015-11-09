(function($) {

  function activateSearch() {
    trigger = $('.search-trigger');
    searchForm = $('form.search-form');

    trigger.click( function() {
      searchForm.addClass("is-active");

      if( $('.overlay').length < 1 ) {
        $('main').append('<div class="overlay"></div>');
      }

      $('.overlay').click( function() {
        searchForm.removeClass("is-active");
        $(this).remove();
      });
    });
  };

  activateSearch();

}( jQuery ));