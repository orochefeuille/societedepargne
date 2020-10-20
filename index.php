<?php
  require "model/accountDAO.php";
  require "model/entity/accountModel.php";   
  // require "model/operationDAO.php";
  // require "model/entity/operationModel.php";
  $accountDAO = new accountDAO();

  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }
  $customer_accounts = $accountDAO->getCustomerAccounts($_SESSION["id"]);

require "view/indexView.php";

  
