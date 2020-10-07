<?php
  session_start ();
  if (isset($_SESSION['cred']) != 'allowed' ) {
    header('Location: http://localhost:8080/societedepargne/login.php');
  }

  require('data/accounts.php');
  $accounts = get_accounts();

  require('src/ls_functions.php');
  $account_index = intval(sanitize_entries($_GET['account']));
  $account_name = $accounts[$account_index]['name'];
  $account_number = $accounts[$account_index]['number'];
  $account_owner = $accounts[$account_index]['owner'];
  $account_amount = $accounts[$account_index]['amount'];
  $account_last_operation = $accounts[$account_index]['last_operation'];
  $page_title ="Votre $account_name | La Société d'épargne";

  require('template/navbar.php');
  require('template/header.php');
?>
  <!-- Main -->
  <main>
    <div class="jumbotron w-75 mx-auto pt-2 ">
      <div class="container">
        <h2 class="text-white bg-orange mt-3 mb-5 p-2  text-center"><?= $account_name ?> </h2>
        <p class="lead">N° du compte : <span class="ml-3 text-info"><?= $account_number ?></span> </p>
        <p class="lead">Gestionnaire : <span class="ml-3 text-info"><?= $account_owner ?></span> </p>
        <p class="lead">Solde : <span class="ml-3 <?= balance_color(floatval($account_amount)); ?>"><?= $account_amount ?> €</span></p>
        <p class="lead">Dernière opération : <span class="ml-3 text-info"><?= $account_last_operation ?></span> </p>
      </div>
  </main>
<?php
  require('template/footer.php');
?>
