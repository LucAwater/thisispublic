(function($) {

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

    // Recalculate isotope
    var masonry = $('.isotope-masonry');

    masonry.isotope({
      filter: '.product:not(.hidden)',
      layoutMode: 'masonry',
      transitionDuration: '0.2s'
    });
  });

}( jQuery ));