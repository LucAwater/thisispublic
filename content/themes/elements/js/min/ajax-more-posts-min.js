jQuery(document).ready(function($){$("body").on("click","#more-posts",function(){$(this).addClass("is-loading");var o=document.getElementById("more-posts"),e=o.childNodes[0];e.nodeValue="loading...";var t=$(".posts li").length;jQuery.ajax({url:ajaxmoreposts.ajax_url,type:"post",data:{action:"ajax_more_posts",offset:t},success:function(o){jQuery("ul.posts").append(o),$("#more-posts").removeClass("is-loading");var e=document.getElementById("more-posts"),t=e.childNodes[0];t.nodeValue="load more"}}).then(function(){var o=$(".isotope-masonry"),e=$(".product");$("main").imagesLoaded(function(){o.isotope("reloadItems").isotope({itemSelector:"li",transitionDuration:0})})})})});