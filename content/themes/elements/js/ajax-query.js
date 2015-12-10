jQuery(document).ready( function($) {

  $('#select-brand li').on( 'click', 'a', function() {
    var cat_id = jQuery(this).attr('title');

    jQuery.ajax({
      url : ajaxfilter.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_filter',
        category: cat_id
      },
      success : function( response ) {
        jQuery('ul.products').html(response);
      }
    });

    // Re-initialize lazyload
    $('.product').lazyload({
      threshold: 10,
      effect: "fadeIn"
    });

    // Recalculate isotope
    var masonry = $('.isotope-masonry');

    masonry.isotope({
      filter: '.product',
      layoutMode: 'masonry',
      transitionDuration: '0.2s'
    });
  })

})