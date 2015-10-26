<?php
function dutchMonths ($text) {
  $text = str_replace('January', 'Januari', $text);
  $text = str_replace('February', 'Februari', $text);
  $text = str_replace('March', 'Maart', $text);
  $text = str_replace('April', 'April', $text);
  $text = str_replace('May', 'Mei', $text);
  $text = str_replace('June', 'Juni', $text);
  $text = str_replace('July', 'Juli', $text);
  $text = str_replace('August', 'Augustus', $text);
  $text = str_replace('September', 'September', $text);
  $text = str_replace('October', 'Oktober', $text);
  $text = str_replace('November', 'November', $text);
  $text = str_replace('December', 'December', $text);

  return $text;
}

add_filter('get_date', 'dutchMonths');
add_filter('get_the_date', 'dutchMonths');
add_filter('get_the_time', 'dutchMonths');
?>