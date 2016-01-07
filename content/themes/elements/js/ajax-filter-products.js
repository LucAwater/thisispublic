jQuery(document).ready( function($) {

  var option = $('ul.filter-options li a');

  option.click( function() {
    var clicked = $(this);
    var clickedParent = clicked.data('parent');

    // Show more products button again
    $('#more-products').removeClass('is-disabled');

    // Get current filter values
    if(clickedParent == 'brand'){
      var brand_current = $(this).attr('title');
      var category_current = $('a[title="category-current"]').find('span').text().toLowerCase();
      var season_current = $('a[title="season-current"]').find('span').text().toLowerCase();
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

    } else if(clickedParent == 'category') {
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var category_current = $(this).attr('title');
      var season_current = $('a[title="season-current"]').find('span').text().toLowerCase();
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

    } else if(clickedParent == 'season') {
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var category_current = $('a[title="category-current"]').find('span').text().toLowerCase();
      var season_current = $(this).attr('title');
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

    } else if(clickedParent == 'gender'){
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var category_current = $('a[title="category-current"]').find('span').text().toLowerCase();
      var season_current = $('a[title="season-current"]').find('span').text().toLowerCase();
      var gender_current = $(this).attr('title');
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();

    } else {
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var category_current = $('a[title="category-current"]').find('span').text().toLowerCase();
      var season_current = $('a[title="season-current"]').find('span').text().toLowerCase();
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $(this).attr('title');
    }

    // Switch current classes
    $(this).parents('ul').children('li').removeClass('current');
    $(this).parent().addClass('current');

    // The AJAX call
    $.ajax({
      url : ajaxfilterproducts.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_filter_products',
        brand: brand_current,
        category: category_current,
        season: season_current,
        gender: gender_current,
        tag: tag_current
      },
      success : function( response ) {
        $('ul.products').html(response);
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