(function($) {

  // Giving filter-current updated data
  var filterUpdateCurrent = function() {
    var filterOption = $('ul.filter-options li a');

    filterOption.click( function() {
      var optionVal = $(this).attr('title');
      var optionParentVal = $(this).attr('data-parent');
      var optionParent = $('.filter').find("[data-target='" + optionParentVal + "']");

      optionParent.attr('data-current', optionVal);
      optionParent.data('current', optionVal);
    });
  };

  filterUpdateCurrent();

}( jQuery ));