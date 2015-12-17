jQuery(document).ready( function($) {

  $('body').on( 'click', '#more-posts', function() {
    // Start loading animation on button
    $(this).addClass('is-loading');

    var button = document.getElementById('more-posts');
    var buttonText = button.childNodes[0];
    buttonText.nodeValue = 'loading...';

    // Count already loaded products
    var post_count = $('.posts li').length;

    // The ajax call
    jQuery.ajax({
      url : ajaxmoreposts.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_more_posts',
        offset: post_count
      },
      success : function( response ) {
        jQuery('ul.posts').append(response);

        $('#more-posts').removeClass('is-loading');
        var button = document.getElementById('more-posts');
        var buttonText = button.childNodes[0];
        buttonText.nodeValue = 'load more';
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      $('main').imagesLoaded( function() {
        masonry.isotope( 'reloadItems' ).isotope({
          itemSelector: 'li',
          transitionDuration: 0
        });
      });
    });
  });

})