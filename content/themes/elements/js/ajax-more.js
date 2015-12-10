jQuery(document).ready( function($) {
  var current;
  $('body').on( 'click', '#more-posts', function() {
    current = $('a[title="brand-current"]').find('span').text().toLowerCase();

    // The ajax call
    jQuery.ajax({
      url : ajaxmore.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more',
        category: current
      },
      success : function( response ) {
        jQuery('ul.products').append(response);
      }
    });

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

})