<?php
require "model/accountDAO.php";
require "model/entity/account.php"; 

session_start();
if (!isset($_SESSION['id'])) {
  header('Location: http://localhost/societedepargne/login.php');
}
$account_index = htmlspecialchars($_GET['account-index']);

$accountDAO = new accountDAO();
$account = $accountDAO->getCustomerAccount($_SESSION["id"], $account_index);

require "view/singleaccountView.php"; 