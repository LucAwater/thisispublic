!function($,e,t,i){var o=$(e);$.fn.lazyload=function(n){function r(){var e=0;f.each(function(){var t=$(this);if(!l.skip_invisible||t.is(":visible"))if($.abovethetop(this,l)||$.leftofbegin(this,l));else if($.belowthefold(this,l)||$.rightoffold(this,l)){if(++e>l.failure_limit)return!1}else t.trigger("appear"),e=0})}var f=this,a,l={threshold:0,failure_limit:0,event:"scroll",effect:"show",container:e,data_attribute:"original",skip_invisible:!1,appear:null,load:null,placeholder:"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"};return n&&(i!==n.failurelimit&&(n.failure_limit=n.failurelimit,delete n.failurelimit),i!==n.effectspeed&&(n.effect_speed=n.effectspeed,delete n.effectspeed),$.extend(l,n)),a=l.container===i||l.container===e?o:$(l.container),0===l.event.indexOf("scroll")&&a.bind(l.event,function(){return r()}),this.each(function(){var e=this,t=$(e);e.loaded=!1,(t.attr("src")===i||t.attr("src")===!1)&&t.is("img")&&t.attr("src",l.placeholder),t.one("appear",function(){if(!this.loaded){if(l.appear){var i=f.length;l.appear.call(e,i,l)}$("<img />").bind("load",function(){var i=t.attr("data-"+l.data_attribute);t.hide(),t.is("img")?t.attr("src",i):t.css("background-image","url('"+i+"')"),t[l.effect](l.effect_speed),e.loaded=!0;var o=$.grep(f,function(e){return!e.loaded});if(f=$(o),l.load){var n=f.length;l.load.call(e,n,l)}}).attr("src",t.attr("data-"+l.data_attribute))}}),0!==l.event.indexOf("scroll")&&t.bind(l.event,function(){e.loaded||t.trigger("appear")})}),o.bind("resize",function(){r()}),/(?:iphone|ipod|ipad).*os 5/gi.test(navigator.appVersion)&&o.bind("pageshow",function(e){e.originalEvent&&e.originalEvent.persisted&&f.each(function(){$(this).trigger("appear")})}),$(t).ready(function(){r()}),this},$.belowthefold=function(t,n){var r;return r=n.container===i||n.container===e?(e.innerHeight?e.innerHeight:o.height())+o.scrollTop():$(n.container).offset().top+$(n.container).height(),r<=$(t).offset().top-n.threshold},$.rightoffold=function(t,n){var r;return r=n.container===i||n.container===e?o.width()+o.scrollLeft():$(n.container).offset().left+$(n.container).width(),r<=$(t).offset().left-n.threshold},$.abovethetop=function(t,n){var r;return r=n.container===i||n.container===e?o.scrollTop():$(n.container).offset().top,r>=$(t).offset().top+n.threshold+$(t).height()},$.leftofbegin=function(t,n){var r;return r=n.container===i||n.container===e?o.scrollLeft():$(n.container).offset().left,r>=$(t).offset().left+n.threshold+$(t).width()},$.inviewport=function(e,t){return!($.rightoffold(e,t)||$.leftofbegin(e,t)||$.belowthefold(e,t)||$.abovethetop(e,t))},$.extend($.expr[":"],{"below-the-fold":function(e){return $.belowthefold(e,{threshold:0})},"above-the-top":function(e){return!$.belowthefold(e,{threshold:0})},"right-of-screen":function(e){return $.rightoffold(e,{threshold:0})},"left-of-screen":function(e){return!$.rightoffold(e,{threshold:0})},"in-viewport":function(e){return $.inviewport(e,{threshold:0})},"above-the-fold":function(e){return!$.belowthefold(e,{threshold:0})},"right-of-fold":function(e){return $.rightoffold(e,{threshold:0})},"left-of-fold":function(e){return!$.rightoffold(e,{threshold:0})}})}(jQuery,window,document);