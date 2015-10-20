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
          // $(products[i]).hide();
          $(products[i]).addClass('hidden');
          var productGender = products[i].getAttribute('data-gender');

          if(productGender === triggerVal){
            // $(products[i]).show();
            $(products[i]).removeClass('hidden');
          } else {
            // $(products[i]).hide();
          }
        };
      }

      var masonry = $('.isotope-masonry');

      masonry.isotope({
        filter: '.product:not(.hidden)',
        layoutMode: 'masonry'
      });
    });
  };

  productFilter();

}( jQuery ));