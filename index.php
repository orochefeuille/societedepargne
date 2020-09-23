<?php
  require('navbar.php');
  require('header.php');
?>

  <!-- Main -->
  <main class="container-fluid w-75 text-center">
      <section class="accounts-vue-wrapper">
        <h2 class="text-info mb-5">Tous vos comptes en un coup d'oeil :</h2>
        <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
          <!-- <article class="card m-2 col-12 col-md-4 col-lg-3">
            <div class="card-body">
              <h3 class="card-title h-25">Compte courant</h3>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p><small>Solde : </small>256.39 €</p>
              <a href="#" class="btn btn-info w-100 bg-orange border-0 font-weight-bold">Gérer</a>
            </div>
          </article>

          <article class="card m-2 col-12  col-md-4 col-lg-3">
            <div class="card-body">
              <h3 class="card-title h-25">Livret A</h3>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p><small>Solde : </small>1280.96 €</p>
              <a href="#" class="btn btn-info w-100 bg-orange border-0 font-weight-bold">Gérer</a>
            </div>
          </article>

          <article class="card m-2 col-12  col-md-4 col-lg-3">
            <div class="card-body">
              <h3 class="card-title h-25">Plan épargne logement</h3>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <p><small>Solde : </small>5160.58 €</p>
              <a href="#" class="btn btn-info w-100 bg-orange border-0 font-weight-bold">Gérer</a>
            </div>
          </article> -->
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
  
