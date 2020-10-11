<?php
  $page_title ="Vos comptes | La Société d'épargne";

  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }

  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');

  // Get all customer's accounts from database
  $db = db_connection();
  $query = $db->prepare('SELECT id, label, balance 
                       FROM account
                       WHERE customer_id= :id');
  $result = $query->execute(
      [
          "id" => $_SESSION["user"]["id"]
      ]
  );
  $accounts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

  <!-- Main -->
 <?php?> 
    <p class="text-info ml-4 mb-0">Bienvenue <span class="font-weight-bolder"><?= $_SESSION["user"]["firstname"];?>  <?= $_SESSION["user"]["lastname"];?></span></p>
    <main class="container-fluid w-100 text-center">
        <section class="accounts-vue-wrapper">
          <h2 class="text-info mt-0 mb-5">Tous vos comptes en un coup d'oeil :</h2>
          <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
            <?php
              foreach($accounts as $key => $account): ?>
                <article class="card m-5" style="width: 18rem;">
                  <header class="bg-dark text-white pt-2 pb-1 mb-4">
                    <h3 class="card-title"> <?=  $account['label'];  ?></h3>
                  </header>
                  <div class="card-body p-0">
                    <p class="card-text">Solde au  <?=  date('d-m-Y');  ?> :</p>
                    <p class="card-text <?=  balance_color($account['balance']); ?>"><?=  $account['balance']; ?> €</p>
                  </div>
                  <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                    <a href="singleaccount.php?account-label=<?= $account['label']; ?>&account-index=<?= $account['id']; ?>" class="card-link text-white">Gérer ce compte</a>
                  </footer>
                </article>               
            <?php 
              endforeach;
            ?>
          </div>
        </section>
    </main>
    
  <?php
    $script="<script src='js/main.js'></script>";
    require('template/footer.php');
  ?>

  
