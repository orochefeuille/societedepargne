<?php
  // Change the balance color 
  function balance_color(float $balance) :string {
    return $balance > 0 ? 'text-success' : 'text-danger';
  }

  // Connection to database
  function generate_iban() :string {
    $iban = rand(1000, 9999) . ' '. rand(1000, 9999) . ' '. rand(1000, 9999) . ' '. rand(1000, 9999);
    return $iban;
  }

  // Connection to database
  function db_connection() {
    try {
      $db = new PDO('mysql:host=localhost;dbname=ls_bank','root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
    return $db;
  }
?>