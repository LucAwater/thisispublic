(function($) {

  $('img.lazy').lazyload({
    threshold: 10,
    effect: "fadeIn"
  });

  function productFilter(){
    var brandCurrent = $('#select-brand li.current a');
    var genderCurrent = $('#select-gender li.current a');

    // Get filter values
    var brandVal = brandCurrent.attr('title');
    var genderVal = genderCurrent.attr('title');

    // Get products
    var products = document.getElementsByClassName('product');
    var productsLength = products.length;

    // Loop through products
    for(var i = 0; i < productsLength; i++){
      $(products[i]).addClass('hidden');

      // Get product brand and gender
      var productGender = products[i].getAttribute('data-gender');
      var productBrand = products[i].getAttribute('data-brand');

      if(brandVal === 'all' && genderVal === 'all'){
        $(products[i]).removeClass('hidden');
      } else if(brandVal === 'all'){
        if(productGender === genderVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      } else if(genderVal === 'all'){
        if(productBrand === brandVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      } else {
        if(productGender === genderVal && productBrand === brandVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      }
    };

    // Re-initialize lazyload
    $('.product:not(hidden)').lazyload({
      threshold: 10,
      effect: "fadeIn"
    });

    // Recalculate isotope
    var masonry = $('.isotope-masonry');

    masonry.isotope({
      filter: '.product:not(.hidden)',
      layoutMode: 'masonry',
      transitionDuration: '0.2s'
    });
  };

  if( $('body').hasClass('tax-product_brand') ){
    productFilter();
  };


  // Click function uses $(this), so needs a tweaked version of the function
  var trigger = $('a.tax-filter');

  trigger.click( function() {
    var brandCurrent = $('#select-brand li.current a');
    var genderCurrent = $('#select-gender li.current a');

    // Check which filter is clicked
    var clickedParent = $(this).closest('ul');

    clickedParent.children().removeClass('current');

    if( clickedParent.attr('id') === 'select-brand'){
      $('#select-brand li').removeClass('current');
      $(this).closest('li').addClass('current');
      var brandCurrent = $(this);
    } else {
      $('#select-gender li').removeClass('current');
      $(this).closest('li').addClass('current');
      var genderCurrent = $(this);
    }

    // Get filter values
    var brandVal = brandCurrent.attr('title');
    var genderVal = genderCurrent.attr('title');

    // Get products
    var products = document.getElementsByClassName('product');
    var productsLength = products.length;

    // Loop through products
    for(var i = 0; i < productsLength; i++){
      $(products[i]).addClass('hidden');

      // Get product brand and gender
      var productGender = products[i].getAttribute('data-gender');
      var productBrand = products[i].getAttribute('data-brand');

      if(brandVal === 'all' && genderVal === 'all'){
        $(products[i]).removeClass('hidden');
      } else if(brandVal === 'all'){
        if(productGender === genderVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      } else if(genderVal === 'all'){
        if(productBrand === brandVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      } else {
        if(productGender === genderVal && productBrand === brandVal){
          $(products[i]).removeClass('hidden');
        } else {
          // stay hidden
        }
      }
    };

    // Re-initialize lazyload
    $('.product:not(hidden)').lazyload({
      threshold: 10,
      effect: "fadeIn"
    });

    // Recalculate isotope
    var masonry = $('.isotope-masonry');

    masonry.isotope({
      filter: '.product:not(.hidden)',
      layoutMode: 'masonry',
      transitionDuration: '0.2s'
    });
  });

  // Showing/hiding dropdown
  var filterCurrent = $('.filter-current');

  filterCurrent.click( function() {
    $('.filter-current').removeClass('is-active');
    $('.filter-options').removeClass('is-active');

    if( $('.overlay').length < 1 ) {
      $('main').append('<div class="overlay"></div>');
    }

    var target = $(this).attr('data-target');
    var targetOptions = $('#select-' + target);

    $(this).toggleClass('is-active');
    targetOptions.toggleClass('is-active');

    $('.overlay').click( function() {
      $('.filter-current').removeClass('is-active');
      $('.filter-options').removeClass('is-active');
      $(this).remove();
    });
  });

  trigger.click( function() {
    $('.filter-current').removeClass('is-active');
    $('.filter-options').removeClass('is-active');
    $('.overlay').remove();
  });

  // Giving filter-current updated data
  var filterOption = $('ul.filter-options li a');

  filterOption.click( function() {
    var optionVal = $(this).attr('title');
    var optionParentVal = $(this).attr('data-parent');
    var optionParent = $('.filter').find("[data-target='" + optionParentVal + "']");

    optionParent.attr('data-current', optionVal);
    optionParentContent = optionParent.find('span');
    optionParentContent.text(optionVal[0].toUpperCase() + optionVal.substr(1));
  });

  // Positioning filter options
  function filterOptionsPos(){
    var filterCurrent = $('.filter-current');

    for(var i = 0; i < filterCurrent.length; i++){
      var filterCurrentVal = $(filterCurrent[i]).children('span');
      var targetVal = $(filterCurrent[i]).attr('data-target');
      var target = $('#select-' + targetVal);
      target.css("padding-left", filterCurrentVal.offset().left);
    };
  };

  filterOptionsPos();

}( jQuery ));