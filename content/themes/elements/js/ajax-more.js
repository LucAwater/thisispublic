jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-posts', function() {
    var current = $('a[title="brand-current"]').find('span').text().toLowerCase();

    // Start loading animation on button
    $(this).addClass('is-loading');

    var button = document.getElementById('more-posts');
    var buttonText = button.childNodes[0];
    buttonText.nodeValue = 'loading...';

    // Count already loaded products
    var product_count = $('.product').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmore.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more',
        category: current,
        product_count: product_count
      },
      success : function( response ) {
        jQuery('ul.products').append(response);

        $('#more-posts').removeClass('is-loading');
        var button = document.getElementById('more-posts');
        var buttonText = button.childNodes[0];
        buttonText.nodeValue = 'load 30 more';
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      masonry.isotope( 'reloadItems' ).isotope();
    });
  });

})