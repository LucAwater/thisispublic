jQuery(document).ready(function($){$("body").on("click","#more-results",function(){$(this).addClass("is-loading");var e=document.getElementById("more-results"),o=e.childNodes[0];o.nodeValue="loading...";var t=$(".product").length;jQuery.ajax({url:ajaxmoreresults.ajax_url,type:"post",data:{action:"ajax_more_results",offset:t,key:"blue"},success:function(e){jQuery("ul.products").append(e),$("#more-results").removeClass("is-loading");var o=document.getElementById("more-results"),t=o.childNodes[0];t.nodeValue="load more"}}).then(function(){var e=$(".isotope-masonry"),o=$(".product");$("main").imagesLoaded(function(){e.isotope("reloadItems").isotope({itemSelector:"li"})})})})});