<?php
// Content (variables)
$h_title = get_sub_field( 'maps_h_title' );
$h_text = get_sub_field( 'maps_h_text' );
$b_location = get_sub_field('maps_b_location');

// Output
echo '<section id="contact" class="maps has-no-pad-bottom">';

  // Grid header
  if( $h_title || $h_text ):
    echo
    '<div class="section-header row">
      <h2>' . $h_title . '</h2>
      ' . $h_text . '
    </div>';
  endif;

  // Grid content
  if( !empty($b_location) ):
    echo '<div id="map" class="section-body is-fullwidth">';
      echo '<div class="marker" data-lat="' . $location['lat'] . '" data-lng="' . $location['lng'] . '"></div>';
    echo '</div>';
  endif;

echo '</section>';
?>
<!-- Map functionality -->
<script type="text/javascript">
//<![CDATA[
function load() {
  var lat = <?php echo $b_location['lat']; ?>;
  var lng = <?php echo $b_location['lng']; ?>;

  // coordinates to latLng
  var latlng = new google.maps.LatLng(lat, lng);

  // Styling the map
  var styling = [{
    "stylers": [{
      "saturation": -100
    }]
  }];

  // map Options
  var myOptions = {
    scrollwheel: false,
    zoom: 15,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: styling,
    disableDefaultUI: false
  };

  //draw a map
  var map = new google.maps.Map(document.getElementById("map"), myOptions);
  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map
  });
}

// call the function
load();

//]]>
</script>