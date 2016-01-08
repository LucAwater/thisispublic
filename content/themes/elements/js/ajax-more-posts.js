jQuery(document).ready( function($) {

  var infiniteScroll = function() {
    var grid = $('.isotope');

    var waypoint = new Waypoint({
      element: grid,
      handler: function(direction) {
        if( direction == 'down' ){
          loadPosts();
          this.destroy();
        }
      },
      offset: 'bottom-in-view'
    });
  };

  if( $('.isotope').length > 0 ){
    infiniteScroll();
  }

  var loadPosts = function() {
    // Add spinner below the grid
    $('.isotope').after('<div class="loader"></div>');

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

        // If the response is not empty, recalculate waypoints
        if( response ){
          $('.loader').remove();
          infiniteScroll();
        } else {
          $('.loader').remove();
        }
      }
    }).then( function(){
      // Re-initialize isotope
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      $('main').imagesLoaded( function() {
        masonry.isotope( 'reloadItems' ).isotope({
          itemSelector: 'li',
          transitionDuration: 0
        });
      });
    });
  };

})