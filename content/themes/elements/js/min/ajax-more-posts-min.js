jQuery(document).ready(function($){var o=function(){var o=$(".isotope"),t=new Waypoint({element:o,handler:function(o){"down"==o&&(e(),this.destroy())},offset:"bottom-in-view"})};$(".isotope").length>0&&o();var e=function(){$(".isotope").after('<div class="loader"></div>');var e=$(".posts li").length;jQuery.ajax({url:ajaxmoreposts.ajax_url,type:"post",data:{action:"ajax_more_posts",offset:e},success:function(e){jQuery("ul.posts").append(e),e?($(".loader").remove(),o()):$(".loader").remove()}}).then(function(){var o=$(".isotope-masonry"),e=$(".product");$("main").imagesLoaded(function(){o.isotope("reloadItems").isotope({itemSelector:"li",transitionDuration:0})})})}});