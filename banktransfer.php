<?php
require "model/db_connection.php";
$dbConnexion = new DbConnection();
$dbConnexion = $dbConnexion->getDb();
require "model/accountDAO.php";
require "model/entity/account.php";   
require "model/operationDAO.php";
require "model/entity/operation.php";

$accountDAO = new accountDAO($dbConnexion);
$operationDAO = new operationDAO($dbConnexion);

session_start ();
if (!isset($_SESSION['id'])) {
  header('Location: http://localhost/societedepargne/login.php');
}

// Get all customer's accounts label
$customer_accounts = $accountDAO->getCustomerAccounts($_SESSION["id"]);
$customer_accounts_labels = [];
foreach ($customer_accounts as $customer_account) {
  array_push($customer_accounts_labels, $customer_account->getLabel());
}

// utilities
function getAccountIdFromAccountLabel($customer_accounts, $account_label) {
  foreach ($customer_accounts as $customer_account) {
    if($customer_account->getLabel()  == $account_label) {
      return $customer_account->getId();
    }
  }
}

function getAccountBalanceFromAccountLabel($customer_accounts, $account_label) {
  foreach ($customer_accounts as $customer_account) {
    if($customer_account->getLabel()  == $account_label) {
      return $customer_account->getBalance();
    }
  }
}
 
/*** Transaction ***/
// get involved accounts id
$debit_account_id;
$credit_account_id;
$transfer_amount;
$debited_account_amount;
if(!empty($_POST) && isset($_POST["confirm-transfer"])) {
  $debit_account_id = getAccountIdFromAccountLabel($customer_accounts,  htmlspecialchars($_POST["accounts-list-debit"]));
  $credit_account_id = getAccountIdFromAccountLabel($customer_accounts, htmlspecialchars($_POST["accounts-list-credit"]));
  $transfer_amount = htmlspecialchars($_POST["amount"]);
  $debited_account_amount = getAccountBalanceFromAccountLabel($customer_accounts,  htmlspecialchars($_POST["accounts-list-debit"]));
}
var_dump($debited_account_amount);

// try {
//   $dbConnexion->beginTransaction();
//   // write debit operation 

//   $dbConnexion->commit();
// } catch (PDOException $e) {
//   $dbConnexion->rollBack();
//   print "Erreur !: " . $e->getMessage() . "<br/>";
//   die();
// }


require "view/bankTransferView.php"; 
