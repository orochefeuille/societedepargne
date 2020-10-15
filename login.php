<?php
  $page_title ="Se connecter | La Société d'épargne";
 
 // Close the security alert and this won't display again while the user session
  if(isset($_POST["close"])) {
    $_SESSION["close"] = 'seen';
  } 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
  include "view/loginView.php";