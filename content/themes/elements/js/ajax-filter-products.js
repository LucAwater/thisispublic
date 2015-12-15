jQuery(document).ready( function($) {

  var option = $('ul.filter-options li a');

  option.click( function() {
    var clicked = $(this);
    var clickedParent = clicked.data('parent');

    if(clickedParent == 'brand'){
      var brand_current = $(this).attr('title');
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();
    } else if(clickedParent == 'gender'){
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var gender_current = $(this).attr('title');
      var tag_current = $('a[title="tag-current"]').find('span').text().toLowerCase();
    } else {
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
      var tag_current = $(this).attr('title');
    }

    console.log(brand_current);
    console.log(gender_current);
    console.log(tag_current);

    $.ajax({
      url : ajaxfilterproducts.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_filter_products',
        brand: brand_current,
        gender: gender_current,
        tag: tag_current
      },
      success : function( response ) {
        $('ul.products').html(response);
      }
    }).then( function(){
      var masonry = $('.isotope-masonry');
      var items = $('.product');

      masonry.isotope( 'reloadItems' ).isotope();
    });
  });

})