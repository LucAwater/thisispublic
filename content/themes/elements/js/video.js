(function($) {
  var video = $('video');
  var button = $('.video-button');

  function videoPlay() {
    if( video.get(0).paused ){
      video.get(0).play();
      button.addClass('is-active');
    } else {
      video.get(0).pause();
      button.removeClass('is-active');
    }
  };

  video.click( function() {
    videoPlay();
  });

  button.click( function() {
    videoPlay();
  });

}( jQuery ));