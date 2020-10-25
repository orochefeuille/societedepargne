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
$message = "";
if(!empty($_POST) && isset($_POST["confirm-transfer"])) {
  $debit_account_label = htmlspecialchars($_POST["accounts-list-debit"]);
  $debit_account_id = getAccountIdFromAccountLabel($customer_accounts, $debit_account_label);
  $credit_account_label =  htmlspecialchars($_POST["accounts-list-credit"]);
  $credit_account_id = getAccountIdFromAccountLabel($customer_accounts, $credit_account_label);
  $transfer_amount = htmlspecialchars($_POST["amount"]);
  $debited_account_balance = getAccountBalanceFromAccountLabel($customer_accounts,  htmlspecialchars($_POST["accounts-list-debit"]));
  $credited_account_balance = getAccountBalanceFromAccountLabel($customer_accounts,  htmlspecialchars($_POST["accounts-list-credit"]));

  //credit operation object
  $credit_operation = new Operation();
  $credit_operation->setAmount($transfer_amount);
  $credit_operation->setIs_credit("1");
  $credit_operation->setComments("Virement depuis $debit_account_label");
  $credit_operation->setAccount_id($credit_account_id);
  //debit operation object
  $debit_operation = new Operation();
  $debit_operation->setAmount($transfer_amount);
  $debit_operation->setIs_credit("0");
  $debit_operation->setComments("Virement vers $credit_account_label");
  $debit_operation->setAccount_id($debit_account_id);

  // Make transaction effective
  try {
    $dbConnexion->beginTransaction();
    if($debited_account_balance - $transfer_amount > 0) {
      // write debit operation 
      $operationDAO->addOperation($debit_operation);
      // write credit operation 
      $operationDAO->addOperation($credit_operation);
      // update debited account 
      $debited_account_balance = $debited_account_balance - $transfer_amount;
      $accountDAO->updateBalance($debited_account_balance, $debit_account_id);
      // update credited account
      $credited_account_balance = $credited_account_balance + $transfer_amount;
      $accountDAO->updateBalance($credited_account_balance, $credit_account_id);

      $dbConnexion->commit();
      $message = "Virement effectué";
    }
    else {
      $message = "Le compte à débiter n'est pas suffisament approvisionné";
    }
  } catch (PDOException $e) {
      $dbConnexion->rollBack();
      $message = "Erreur !: " . $e->getMessage() . "<br/>";
      die();
  }
}


require "view/bankTransferView.php"; 
