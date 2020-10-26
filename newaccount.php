<?php
  require "model/db_connection.php";
  $dbConnexion = new DbConnection();
  $dbConnexion = $dbConnexion->getDb();

  require "model/accountDAO.php";
  require "model/entity/account.php";   

  require "data/bank_accounts.php";
  require "src/ls_functions.php";
  
  session_start ();
  if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }

  // Get all available bank's accounts label
  $available_accounts = get_available_accounts();

  // Get existing customer accounts labels 
  $accountDAO = new AccountDAO($dbConnexion);
  $customer_accounts = $accountDAO->getCustomerAccounts($_SESSION["id"]);
  $customer_accounts_label = [];
  foreach($customer_accounts as $customer_account) {
    array_push($customer_accounts_label, $customer_account->getLabel());
  }
  
  // Create new account object 
  $is_created = false;
  if(!empty($_POST) && isset($_POST["submit"])) {
    $_POST["label"] = htmlspecialchars($_POST["label"]);
    $_POST["balance"] = htmlspecialchars($_POST["balance"]);
    $_POST["customer_id"] = $_SESSION["id"];
    $_POST["iban"] = generate_iban();
    $new_account = new Account($_POST);
    $is_created =$accountDAO->createCustomerAccount($new_account);
  }

  require "view/newaccountView.php";
