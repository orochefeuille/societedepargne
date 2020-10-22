<?php
  $page_title = "Ouvrir un compte | La Société d'épargne";
  
  require('template/navbar.php');
  require('template/header.php');
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
</div>
</main>

<?php
    $script="<script src='public/js/newaccount.js'></script>";
    require('template/footer.php');
?>