<?php
  require('navbar.php');
  require('header.php');
?>

  <main class="container-fluid w-75">
    <section class="newaccount-wrapper">
      <h2 class="text-info mb-5 lead font-weight-bold text-center">Ouvrir un compte en un instant :</h2>
      <p id="done" class="bg-success text-white text-center opacity-0">Compte créer avec succès</p>
      <form class="container-fluid text-left">
        <div class="form-group">
          <label for="accounts-list">Choisissez un compte :</label>
          <select class="form-control" id="accounts-list">
            <option>-- Choisir --</option>
            <option>Compte courant</option>
            <option>Livret A</option>
            <option>Plan Epargne Logement (PEL)</option>
            <option>Livret de développement durable (LDD)</option>
            <option>Livret d’épargne populaire (LEP)</option>
          </select>
        </div>
          <div class="form-group">
          <label for="account-amount">Indiquez le montant du premier dépôt :</label>
          <input type="number" class="form-control" id="account-amount" aria-describedby="amountHelp">
          <small id="amountHelp" class="form-text text-orange">Le dépôt minimum pour ouvrir un compte est de 50 €.</small>
        </div>
      </form>
      <div class="container">
        <button type="button" id="create-account" class="btn bg-orange text-white">Créer le compte</button>
        <div id="confirm-card" class="card border-dark my-3 opacity-0">
          <div class="card-body bg-dark text-white">
            <p class="card-text"></p>
            <button type="button" id="confirm-account" class="btn bg-orange text-white font-weight-bold float-right">Confirmer</button>
            <button type="button" id="cancel-account" class="btn bg-dark text-info border-info float-right mx-2">Annuler</button>
          </div>
        </div>
      </div>
    </section> 
  </main>



<?php
  require('footer.php');
?>
