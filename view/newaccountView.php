<?php
  $page_title = "Ouvrir un compte | La Société d'épargne";
  
  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');
  
?>

   <!-- Main -->
   <main class="container-fluid">
    <div class="row w-100">
      <div class="col-12">
        <section class="newaccount-wrapper">
          <h2 class="text-info mb-5 lead font-weight-bold text-center">Ouvrir un compte en un instant :</h2>
          <?php if($is_created) : ?>
            <p id="done" class="alert alert-success text-center" role="alert">Compte créé avec succès</p>
          <?php endif; ?>
          <form action="" id="account-creation-form" class="container-fluid text-left" method="POST">
            <div class="form-group">
              <label for="accounts-list">Choisissez un compte :</label>
              <select class="form-control" id="accounts-list" name="label" required>
                <option value="" disabled selected >-- Choisir --</option>
                <option >Compte courant</option>
                <?php foreach($available_accounts as $available_account): 
                        if(!in_array($available_account, $customer_accounts_label)):?>
                          <option><?= $available_account ?> </option>
                <?php 
                        endif;
                      endforeach; ?>
              </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="iban" value="<?= generate_iban(); ?>">
                <input type="hidden" name="customer_id" value="<?= $_SESSION['id']; ?>">
                <label for="balance">Indiquez le montant du premier dépôt :</label>
                <input type="number" class="form-control" id="balance"  name="balance" aria-describedby="amountHelp" min="50" required>
                <small id="amountHelp" class="form-text text-orange">Le dépôt minimum pour ouvrir un compte est de 50 €.</small>
            </div>
            <div class="form-group">
            <button type="button" id="create-account" class="btn bg-orange text-white">Créer le compte</button>
            <div id="confirm-card" class="card border-dark my-3">
                <div class="card-body bg-dark text-white">
                    <p class="card-text"> </p>
                    <button type="submit" name="submit" id="confirm-account" class="btn bg-orange text-white font-weight-bold float-right">Confirmer</button>
                    <button type="button" id="cancel-account" class="btn bg-dark text-info border-info float-right mx-2">Annuler</button>
                </div>
            </div>
          </div> 
          </form>
           
        </section> 
      </div>
      <!-- <?php if($account_title && $account_amount) : ?> -->
        <div class="col-12  col-md-4">
        <aside class="text-center">
            <h2 class="text-info mb-5 lead font-weight-bold text-center">Compte créé le <?= $now; ?></h2>
            <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
                <article class="card m-5" style="width: 18rem;">
                <!-- <header class="bg-dark text-white pt-2 pb-1 mb-4">
                    <h3 class="card-title"> <?= $account_title; ?></h3>
                </header>
                <div class="card-body p-0">
                    <p class="card-text">N° du compte :</p>
                    <p class="text-info"><?= $account_iban; ?></p>
                    <p class="card-text">Gestionnaire :</p>
                    <p class="text-info"><?= $account_owner; ?></p> 
                    <p class="card-text">Solde :</p>
                    <p class="text-info"><?= $account_amount; ?> €</p>
                </div> -->
                <!-- <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                </footer> -->
                </article>
            </div>
        </aside>
      </div>
      <!-- <?php endif; ?> -->
      
    </div>
   </main>

   <?php
    $script="<script src='public/js/newaccount.js'></script>";
    require('template/footer.php');
  ?>