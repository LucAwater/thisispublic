jQuery(document).ready(function($){$("body").on("click","#more-products",function(){$(this).addClass("is-loading");var e=document.getElementById("more-products"),t=e.childNodes[0];t.nodeValue="loading...";var o=$('a[title="brand-current"]').find("span").text().toLowerCase(),a=$('a[title="gender-current"]').find("span").text().toLowerCase(),r=$('a[title="tag-current"]').find("span").text().toLowerCase(),d=$(".product").length;jQuery.ajax({url:ajaxmoreproducts.ajax_url,type:"post",data:{action:"ajax_more_products",brand:o,gender:a,tag:r,offset:d},success:function(e){jQuery("ul.products").append(e),$("#more-products").removeClass("is-loading");var t=document.getElementById("more-products"),o=t.childNodes[0];o.nodeValue="load more"}}).then(function(){var e=$(".isotope-masonry"),t=$(".product");$("main").imagesLoaded(function(){e.isotope("reloadItems").isotope({itemSelector:"li"})})})})});