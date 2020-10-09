<?php
  $page_title ="Vos comptes | La Société d'épargne";

  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }

  require('template/navbar.php');
  require('template/header.php');
  require('data/accounts.php');
  require('data/security.php');
  require('src/ls_functions.php');

  $accounts = get_accounts();
  $security = get_security();
?>

  <!-- Main -->
 <?php //if(checkCredentials($pseudo, $mdp)) :?> 
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
     <!-- Security layer -->
    <section id="layer" class="container bg-orange text-white">
      <div class="close-layer text-white">
          <i class="fas fa-times"></i>
      </div>
      <div>
        <h2 class="text-center font-weight-bolder m-5"><?=  $security["title"]; ?></h2>
        <p class="font-weight-bolder m-3"><?=  $security["preamble"]; ?></p>
        <ul class="list-unstyled mx-auto w-75 bg-info">
        <?php 
          foreach($security["advices"] as $advice) :?>
            <li class="font-weight-bolder p-3 pl-5"><?= $advice;?></li>
          <?php endforeach;?>
        </ul>
        <p class="font-weight-bolder text-danger bg-white p-2"><?=  $security["conclusion"]; ?></p>
      </div>
    </section>
  <?php //else:?> 
    <!-- <h2>Bienvenue, merci de vous identifier</h2> -->
  <?php //endif?> 
 
  <?php
    $script="<script src='js/main.js'></script>";
    require('template/footer.php');
  ?>

  
