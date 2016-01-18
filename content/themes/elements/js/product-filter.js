(function($) {

  // Showing/hiding dropdown
  var filterDropdown = function() {
    var filterCurrent = $('.filter-current');
    var filterOption = $('a.tax-filter');

    filterCurrent.click( function() {
      // Get matching filter menu/options
      var target = $(this).attr('data-target');
      var targetOptions = $('#select-' + target);

      // Remove any is-active classes that do not belong to the clicked one
      $('.filter-current').not(this).removeClass('is-active');
      $('.filter-options').not(targetOptions).removeClass('is-active');

      // If no overlay exists, create one
      if( $('.overlay').length < 1 ) {
        $('main').append('<div class="overlay"></div>');
      }

      // Activate the clicked filter title and matching filter menu/options
      $(this).toggleClass('is-active');
      targetOptions.toggleClass('is-active');

      // Hiding the filter menu/options
      var dropdownHide = function() {
        $('.filter-current').removeClass('is-active');
        $('.filter-options').removeClass('is-active');
        $('.overlay').remove();
      }

      $('.overlay').click( function() {
        dropdownHide();
      });

      filterOption.click( function() {
        dropdownHide();
      });
    });
  };

  // Giving filter-current updated data
  var filterUpdateCurrent = function() {
    var filterOption = $('ul.filter-options li a');

    filterOption.click( function() {
      var optionVal = $(this).attr('title');
      var optionParentVal = $(this).attr('data-parent');
      var optionParent = $('.filter').find("[data-target='" + optionParentVal + "']");

      optionParent.attr('data-current', optionVal);
      optionParentContent = optionParent.find('span');
      optionParentContent.text(optionVal[0].toUpperCase() + optionVal.substr(1));
    });
  };

  // Positioning filter options
  var filterOptionsPos = function (){
    var filterCurrent = $('.filter-current');

    for(var i = 0; i < filterCurrent.length; i++){
      var filterCurrentVal = $(filterCurrent[i]).children('span');
      var targetVal = $(filterCurrent[i]).attr('data-target');
      var target = $('#select-' + targetVal);
      target.css("padding-left", filterCurrentVal.offset().left);
    };

    $(window).on('resize', function() {
      for(var i = 0; i < filterCurrent.length; i++){
        var filterCurrentVal = $(filterCurrent[i]).children('span');
        var targetVal = $(filterCurrent[i]).attr('data-target');
        var target = $('#select-' + targetVal);
        target.css("padding-left", filterCurrentVal.offset().left);
      };
    });
  };

  filterUpdateCurrent();
  filterDropdown();
  // filterOptionsPos();

}( jQuery ));