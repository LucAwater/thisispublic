(function($) {

  function productFilter(){
    var trigger = $('a.tax-filter');

    trigger.click( function() {
      var triggerVal = $(this).attr('title');

      if(triggerVal === 'all'){
        var products = document.getElementsByClassName('product');

        $(products).show();
      } else {
        var products = document.getElementsByClassName('product');
        var productsLength = products.length;

        for(var i = 0; i < productsLength; i++){
          console.log(products[i]);
          $(products[i]).hide();
          var productGender = products[i].getAttribute('data-gender');

          if(productGender === triggerVal){
            $(products[i]).show();
          } else {
            $(products[i]).hide();
          }
        };
      }

      var masonry = $('.isotope-masonry');

      $('main').imagesLoaded( function() {
        masonry.isotope({
          layoutMode: 'masonry'
        });
      });
    });
  };

  productFilter();

}( jQuery ));