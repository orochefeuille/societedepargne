<?php
  require "model/entity/customer.php";
  require "model/customerDAO.php";
  $customerDAO = new CustomerDAO();
  $is_allowed_user = true;

  if(!empty($_POST) && isset($_POST["login"])) {
    $email = htmlspecialchars($_POST["email"]);
    $pass = htmlspecialchars($_POST["client-password"]);
    if($customerDAO->getCustomer($email)) {
      $user = new Customer($customerDAO->getCustomer($email)); 
      if(password_verify($pass, $user->getPass())) {
        session_start ();

        $_SESSION["id"] = $user->getID();
        $_SESSION["firstname"] = $user->getFirstname();
        $_SESSION["lastname"] = $user->getLastname();
        $_SESSION["email"] = $user->getEmail();
        header('Location: http://localhost/societedepargne/index.php');
      }
      else {
        $is_allowed_user = false;
      }
    }
    else {
      $is_allowed_user = false;
    }
  }
 
  require "view/loginView.php";
