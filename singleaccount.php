<?php
  function get_url_account_name() :string {
    $name = "";
    if(isset($_GET["account"]) && !empty($_GET["account"])) {
      $name = htmlspecialchars(($_GET["account"]));
    }
    return $name;
  }
  $account_name = get_url_account_name();

  require('template/navbar.php');
  $page_title ="Votre $account_name | La Société d'épargne";
  require('template/header.php');
  require('data/accounts.php');
  $accounts = get_accounts();
  
  function get_account_info(array $accounts, string $account_name, string $item) :string {
    $account_info = "";
    foreach($accounts as $account){
      if($account['name'] == $account_name) {
        $account_info = $account[$item];
      }
    }
    return $account_info;
  }

?>
  <!-- Main -->
  <main>
    <div class="jumbotron w-75 mx-auto pt-2 ">
      <div class="container">
        <h2 class="text-white bg-orange m-3 p-2 text-center"><?= $account_name ?> </h2>
        <p class="lead">N° du compte : <span class="text-info"><?= get_account_info($accounts, $account_name, 'number') ?></span> </p>
        <p class="lead">Gestionnaire : <span class="text-info"><?= get_account_info($accounts, $account_name, 'owner') ?></span> </p>
        <p class="lead">Solde : <span class="text-info"><?= get_account_info($accounts, $account_name, 'amount') ?> €</span></p>
        <p class="lead">Dernière opération : <span class="text-info"><?= get_account_info($accounts, $account_name, 'last_operation') ?></span> </p>
      </div>
  </main>


  <?php
  require('template/footer.php');
?>
