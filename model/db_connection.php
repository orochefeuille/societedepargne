<?php
class DbConnection {
    
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