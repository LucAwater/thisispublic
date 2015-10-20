(function($) {

  function productFilter(){
    var trigger = $('a.tax-filter');

    trigger.click( function() {
      var triggerVal = $(this).attr('title');

      if(triggerVal === 'all'){
        var products = document.getElementsByClassName('product');

        $(products).removeClass('hidden');
      } else {
        var products = document.getElementsByClassName('product');
        var productsLength = products.length;

        for(var i = 0; i < productsLength; i++){
          $(products[i]).addClass('hidden');
          var productGender = products[i].getAttribute('data-gender');

          if(productGender === triggerVal){
            $(products[i]).removeClass('hidden');
          } else {
            // stay hidden
          }
        };
      }

      var masonry = $('.isotope-masonry');

      masonry.isotope({
        filter: '.product:not(.hidden)',
        layoutMode: 'masonry',
        transitionDuration: '0.2s'
      });
    });
  };

  productFilter();

}( jQuery ));