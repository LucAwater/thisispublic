!function($){function e(){var e=$("header"),a=$("body"),s=$("div.menu"),i=$("a.menu-open"),v=$("a.menu-close");i.click(function(){a.addClass("menu-active"),e.addClass("menu-active"),s.addClass("is-active"),a.append('<div class="overlay"></div>'),$(".overlay").click(function(){a.removeClass("menu-active"),e.removeClass("menu-active"),s.removeClass("is-active"),$(this).remove()})}),v.click(function(){a.removeClass("menu-active"),e.removeClass("menu-active"),s.removeClass("is-active"),$(".overlay").remove()})}e()}(jQuery);