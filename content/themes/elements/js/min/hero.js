!function(e){function s(){var s=e(".hero"),i=e(".hero-banner");console.log("Testi");var t=e("header"),h=t.height(),o=window.innerHeight-h;s.css("height",o),i.css("height",o);var n=e(".is-stretched-wrapper"),r=n.width(),d=n.height(),a=e(".is-stretched-object"),c=a.width()/a.height();a.css("min-height",d),d*c>r?(a.removeClass("is-stretched-wide"),a.addClass("is-stretched-high")):(a.removeClass("is-stretched-high"),a.addClass("is-stretched-wide"));var l=e(".arrow-scroll");l.css("top",o-30),l.click(function(){e("html, body").animate({scrollTop:o+20},500)});var g=e(".hero .section-body");g.addClass("is-visible-0.7s"),waypoint=new Waypoint({element:e(".hero .section-body"),offset:"10%",handler:function(){g.toggleClass("is-visible-0.7s"),g.toggleClass("is-hidden-0.7s")}})}e("section.hero").length>0&&(s(),e(window).on("resize",function(){s()}))}(jQuery);