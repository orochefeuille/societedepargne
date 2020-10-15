<?php
  require "model/entity/customerModel.php";
  require "model/customerDAO.php";
  $customerDAO = new CustomerDAO();

  $is_allowed_user = true;

  if(!empty($_POST) && isset($_POST["login"])) {
    $email = htmlspecialchars($_POST["email"]);
    if($customerDAO->getCustomer($email)) {
      $user = new Customer($customerDAO->getCustomer($email));
      if(password_verify($_POST["client-password"], $user->getPass())) {
        $_SESSION["user"] = $user;
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
