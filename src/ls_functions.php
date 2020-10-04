<?php
    // date in french format
    function get_now() {
        $date = date('Y-m-d');
        setlocale(LC_TIME, "fr_FR", "French");
        return $date = strftime("%d %B %G", strtotime($date));
    }

  // Change the balance color 
  function balance_color(float $balance) :string {
    return $balance > 0 ? 'text-success' : 'text-danger';
  }

  // Check $_GET value
  function sanitize_entries(string $input, string $input_name = null) :string {
    if($input_name) {
        if(isset($input))
        $input = htmlspecialchars($input_name);
    }
    else {
        if(isset($input) && !empty($input)) {
            $input = htmlspecialchars($input);
        }
    }
    return $input;
  }

?>