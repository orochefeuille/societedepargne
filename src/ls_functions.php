<?php
// date in french format
  $date = date('Y-m-d');
  setlocale(LC_TIME, "fr_FR", "French");
  $date = strftime("%d %B %G", strtotime($date));

  // Change the balance color 
  function balance_color(float $balance) :string {
    return $balance > 0 ? 'text-success' : 'text-danger';
  }
?>