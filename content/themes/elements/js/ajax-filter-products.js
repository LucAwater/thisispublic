var option = $('ul.filter-options li a');

option.click( function() {
  var clicked = $(this);
  var clickedParent = clicked.data('parent');

  // Get current filter values
  if(clickedParent == 'brand'){
    var brand_current = $(this).attr('title');
    var category_current = $('a[title="category-current"]').data('current');
    var season_current = $('a[title="season-current"]').data('current');
    var gender_current = $('a[title="gender-current"]').data('current');
    var tag_current = $('a[title="tag-current"]').data('current');

  } else if(clickedParent == 'category') {
    var brand_current = $('a[title="brand-current"]').data('current');
    var category_current = $(this).attr('title');
    var season_current = $('a[title="season-current"]').data('current');
    var gender_current = $('a[title="gender-current"]').data('current');
    var tag_current = $('a[title="tag-current"]').data('current');

  } else if(clickedParent == 'season') {
    var brand_current = $('a[title="brand-current"]').data('current');
    var category_current = $('a[title="category-current"]').data('current');
    var season_current = $(this).attr('title');
    var gender_current = $('a[title="gender-current"]').data('current');
    var tag_current = $('a[title="tag-current"]').data('current');

  } else if(clickedParent == 'gender'){
    var brand_current = $('a[title="brand-current"]').data('current');
    var category_current = $('a[title="category-current"]').data('current');
    var season_current = $('a[title="season-current"]').data('current');
    var gender_current = $(this).attr('title');
    var tag_current = $('a[title="tag-current"]').data('current');

  } else if(clickedParent == 'tag') {
    var brand_current = $('a[title="brand-current"]').data('current');
    var category_current = $('a[title="category-current"]').data('current');
    var season_current = $('a[title="season-current"]').data('current');
    var gender_current = $('a[title="gender-current"]').data('current');
    var tag_current = $(this).attr('title');

  } else {
    var brand_current = $('a[title="brand-current"]').data('current');
    var category_current = $('a[title="category-current"]').data('current');
    var season_current = $('a[title="season-current"]').data('current');
    var gender_current = $('a[title="gender-current"]').data('current');
    var tag_current = $('a[title="tag-current"]').data('current');
  }

  // Switch current classes
  $(this).parents('ul.filter-options').find('.current').removeClass('current');
  $(this).addClass('current');

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

      if( response ){
        $('.loader').remove();
        infiniteScrollProducts();
      } else {
        $('.loader').remove();
      }
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