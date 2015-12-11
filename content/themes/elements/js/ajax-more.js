jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-posts', function() {
    var current = $('a[title="brand-current"]').find('span').text().toLowerCase();

    // Start loading animation on button
    $(this).addClass('is-loading');

    var your_div = document.getElementById('more-posts');
    var text_to_change = your_div.childNodes[0];
    text_to_change.nodeValue = 'loading...';

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
        var your_div = document.getElementById('more-posts');
        var text_to_change = your_div.childNodes[0];
        text_to_change.nodeValue = 'load 30 more';
      }
    }).then( function(){
      console.log("masonry");
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      masonry.isotope( 'reloadItems' ).isotope();
    });
  });

})