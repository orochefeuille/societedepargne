<?php
  $page_title ="Vos comptes | La Société d'épargne";
  
  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');
  var_dump($customer_accounts);
?>

   <!-- Main -->
   <?php?> 
    <p class="text-info ml-4 mb-0">Bienvenue <span class="font-weight-bolder"><?= $_SESSION["firstname"];?>  <?= $_SESSION["lastname"];?></span></p>
    <main class="container-fluid w-100 text-center">
        <section class="accounts-vue-wrapper">
          <h2 class="text-info mt-0 mb-5">Tous vos comptes en un coup d'oeil :</h2>
          <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
            <?php
              foreach ($customer_accounts as $accounts): 
            ?>
              <article class="card m-5" style="width: 18rem;">
                <header class="bg-dark text-white pt-2 pb-1 mb-4">
                  <h3 class="card-title"> <?=  $accounts["label"];  ?></h3>
                </header>
                <div class="card-body p-0">
                  <p class="card-text">Solde au  <?=  date('d-m-Y');  ?> :</p> 
                    <p class="card-text <?=  balance_color($accounts["balance"]); ?>"><?= $accounts["balance"]; ?> €</p>
                  <p class="card-text">Dernière opération :</p>
                  <p class="card-text">le <?=  date('d-m-Y');  ?> - </p>
                </div>
                <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                    <a href="singleaccount.php?&account-index=<?= $accounts['id']; ?>" class="card-link text-white">Gérer ce compte</a>
                  </footer>
              </article>
            <?php 
              endforeach;
            ?>
          </div>
        </section>
    </main>

 <?php
    $script="<script src='public/js/main.js'></script>";
    require('template/footer.php');
  ?>
