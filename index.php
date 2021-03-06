<?php
  require "model/db_connection.php";
  $dbConnexion = new DbConnection();
  $dbConnexion = $dbConnexion->getDb();
  require "model/accountDAO.php";
  require "model/entity/account.php";   
  require "model/operationDAO.php";
  require "model/entity/operation.php";
  $accountDAO = new AccountDAO($dbConnexion);
  $operationDAO = new OperationDAO($dbConnexion);

  session_start();
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
  }
  $customer_accounts = $accountDAO->getCustomerAccounts($_SESSION["id"]);
  
  require "view/indexView.php";

  
