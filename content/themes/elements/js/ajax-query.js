jQuery(document).ready( function($) {

  var option = $('ul.filter-options li a');

  option.click( function() {
    var clicked = $(this);
    var clickedParent = clicked.data('parent');

    if(clickedParent == 'brand'){
      var brand_current = $(this).attr('title');
      var gender_current = $('a[title="gender-current"]').find('span').text().toLowerCase();
    } else if(clickedParent == 'gender'){
      var brand_current = $('a[title="brand-current"]').find('span').text().toLowerCase();
      var gender_current = $(this).attr('title');
    }

    $.ajax({
      url : ajaxfilter.ajax_url,
      type : 'post',
      data : {
        action : 'ajax_filter',
        brand: brand_current,
        gender: gender_current
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

  // $('#select-brand li').on( 'click', 'a', function() {
  //   var cat_id = $(this).attr('title');
  //
  //   $.ajax({
  //     url : ajaxfilter.ajax_url,
  //     type : 'post',
  //     data : {
  //       action : 'ajax_filter',
  //       category: cat_id
  //     },
  //     success : function( response ) {
  //       $('ul.products').html(response);
  //     }
  //   }).then( function(){
  //     var masonry = $('.isotope-masonry');
  //     var items = $('.product');
  //
  //     masonry.isotope( 'reloadItems' ).isotope();
  //   });
  // });

})