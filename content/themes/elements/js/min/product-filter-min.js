!function($){var t=function(){var t=$(".filter-current"),e=$("a.tax-filter");t.click(function(){$(".filter-current").removeClass("is-active"),$(".filter-options").removeClass("is-active"),$(".overlay").length<1&&$("main").append('<div class="overlay"></div>');var t=$(this).attr("data-target"),i=$("#select-"+t);$(this).toggleClass("is-active"),i.toggleClass("is-active"),$(".overlay").click(function(){$(".filter-current").removeClass("is-active"),$(".filter-options").removeClass("is-active"),$(this).remove()}),e.click(function(){$(".filter-current").removeClass("is-active"),$(".filter-options").removeClass("is-active"),$(".overlay").remove()})})},e=function(){var t=$("ul.filter-options li a");t.click(function(){var t=$(this).attr("title"),e=$(this).attr("data-parent"),i=$(".filter").find("[data-target='"+e+"']");i.attr("data-current",t),optionParentContent=i.find("span"),optionParentContent.text(t[0].toUpperCase()+t.substr(1))})},i=function(){for(var t=$(".filter-current"),e=0;e<t.length;e++){var i=$(t[e]).children("span"),a=$(t[e]).attr("data-target"),r=$("#select-"+a);r.css("padding-left",i.offset().left)}};e(),t(),i()}(jQuery);