!function(e){function t(){var t=e("a.tax-filter");t.click(function(){var t=e(this).attr("title");if("all"===t){var o=document.getElementsByClassName("product");e(o).show()}else for(var o=document.getElementsByClassName("product"),a=o.length,n=0;a>n;n++){console.log(o[n]),e(o[n]).hide();var i=o[n].getAttribute("data-gender");i===t?e(o[n]).show():e(o[n]).hide()}var r=e(".isotope-masonry");e("main").imagesLoaded(function(){r.isotope({layoutMode:"masonry"})})})}t()}(jQuery);