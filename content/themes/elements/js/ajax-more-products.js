jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-products', function() {
    // Start loading animation on button
    $(this).addClass('is-loading');

    var button = document.getElementById('more-products');
    var buttonText = button.childNodes[0];
    buttonText.nodeValue = 'loading...';

    // Get all current filter values
    var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
    var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
    var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

    // Count already loaded products
    var product_count = $('.product').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmoreproducts.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more_products',
        brand: brand_current,
        gender: gender_current,
        tag: tag_current,
        offset: product_count
      },
      success : function( response ) {
        jQuery('ul.products').append(response);

        $('#more-products').removeClass('is-loading');
        var button = document.getElementById('more-products');
        var buttonText = button.childNodes[0];
        buttonText.nodeValue = 'load more';
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      $('main').imagesLoaded( function() {
        masonry.isotope( 'reloadItems' ).isotope({itemSelector: 'li'});
      });
    });
  });

})