jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-posts', function() {
    // Start loading animation on button
    $(this).addClass('is-loading');

    var button = document.getElementById('more-posts');
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
      url : ajaxmore.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more',
        brand: brand_current,
        gender: gender_current,
        tag: tag_current,
        product_count: product_count
      },
      success : function( response ) {
        jQuery('ul.products').append(response);

        $('#more-posts').removeClass('is-loading');
        var button = document.getElementById('more-posts');
        var buttonText = button.childNodes[0];
        buttonText.nodeValue = 'load more';
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      masonry.isotope( 'reloadItems' ).isotope();
    });
  });

})