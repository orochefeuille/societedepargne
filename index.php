<?php
  require('navbar.php');

  $page_title ="Vos comptes | La Société d'épargne";
  require('header.php');
  require('accounts.php');

  $accounts = get_accounts();

  // date in french format
  $date = date('Y-m-d');
  setlocale(LC_TIME, "fr_FR", "French");
  $date = strftime("%d %B %G", strtotime($date));

  // Change the balance color 
  function balance_color(float $balance) :string {
    return $balance > 0 ? 'text-success' : 'text-danger';
  }
?>

  <!-- Main -->
  <main class="container-fluid w-75 text-center">
      <section class="accounts-vue-wrapper">
        <h2 class="text-info mb-5">Tous vos comptes en un coup d'oeil :</h2>
        <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
          <?php
            foreach($accounts as $account): ?>
              <article class="card mb-5" style="width: 18rem;">
                <header class="bg-dark text-white pt-2 pb-1 mb-4">
                  <h3 class="card-title"> <?=  $account['name'];  ?></h3>
                </header>
                <div class="card-body p-0">
                  <p class="card-text">Solde au  <?=  $date  ?> :</p>
                  <p class="card-text <?=  balance_color($account['amount']); ?>"><?=  $account['amount']; ?> €</p>
                </div>
                <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                  <a href="singleaccount.php?account=<?= $account['name']; ?>" class="card-link text-white">Consulter ce compte</a>
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
    <div class="close-layer text-white" onclick="this.parentElement.style.display='none'">
        <i class="fas fa-times"></i>
    </div>
  </section>

  <?php
  require('footer.php');
?>
  
