<?php
  $page_title ="Vos comptes | La Société d'épargne";

  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }

  require('template/navbar.php');
  require('template/header.php');
  require('data/accounts.php');
  require('src/ls_functions.php');

  $accounts = get_accounts();
?>

  <!-- Main -->
 <?php?> 
    <main class="container-fluid w-100 text-center">
        <section class="accounts-vue-wrapper">
          <h2 class="text-info mb-5">Tous vos comptes en un coup d'oeil :</h2>
          <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
            <?php
              foreach($accounts as $key => $account): ?>
                <article class="card m-5" style="width: 18rem;">
                  <header class="bg-dark text-white pt-2 pb-1 mb-4">
                    <h3 class="card-title"> <?=  $account['name'];  ?></h3>
                  </header>
                  <div class="card-body p-0">
                    <p class="card-text">Solde au  <?=  get_now();  ?> :</p>
                    <p class="card-text <?=  balance_color($account['amount']); ?>"><?=  $account['amount']; ?> €</p>
                  </div>
                  <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                    <a href="singleaccount.php?account=<?= $key ?>" class="card-link text-white">Consulter ce compte</a>
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

  
