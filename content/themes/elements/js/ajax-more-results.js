jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-results', function() {
    // Start loading animation on button
    $(this).addClass('is-loading');

    var button = document.getElementById('more-results');
    var buttonText = button.childNodes[0];
    buttonText.nodeValue = 'loading...';

    // Count already loaded products
    var product_count = $('.product').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmoreresults.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more_results',
        offset: product_count,
        key: 'blue'
      },
      success : function( response ) {
        jQuery('ul.products').append(response);

        $('#more-results').removeClass('is-loading');
        var button = document.getElementById('more-results');
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