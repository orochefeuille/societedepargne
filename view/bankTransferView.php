<?php
$page_title ="Tranférer vers un autre compte | La Société d'épargne";

require('template/navbar.php');
require('template/header.php');
?>

<main>
    <div class="row w-100">
        <div class="col-12">
            <section class="newaccount-wrapper">
                <h2 class="text-info mb-5 lead font-weight-bold text-center">Effectuer un virement sécurisé :</h2>
                <?php if($message) : ?>
                    <div>
                        <p class="alert bg-orange text-white text-center" role="alert"><?= $message ?></p>
                    </div>
                <?php endif; ?>
                <form class="container mt-2" action="" method="post" id="single-form">
                    <div class="form-group">
                        <label for="accounts-list-debit">Compte à débiter (obligatoire) :</label>
                        <select class="form-control" id="accounts-list-debit" name="accounts-list-debit" required>
                            <option value="" disabled selected >-- Choisir --</option>
                            <?php foreach($customer_accounts_labels as $customer_account_label): ?>
                                    <option><?= $customer_account_label ?> </option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accounts-list-credit">Compte à créditer (obligatoire) :</label>
                        <select class="form-control" id="accounts-list-credit" name="accounts-list-credit" required>
                            <option value="" disabled selected >-- Choisir --</option>
                            <?php foreach($customer_accounts_labels as $customer_account_label): ?>
                                    <option><?= $customer_account_label ?> </option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Montant (obligatoire) :</label>
                        <input class="w-100" type="number" value="valider" name="amount" id="transfer-amount" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <button type="button" name="transfer_button" id="transfer_button" class="btn bg-orange text-white">Valider</button>
                    </div>
                    <div id="transfer-card" class="card border-dark my-3 opacity-0">
                        <div class="card-body bg-dark text-white">
                            <p class="card-text"> texte </p>
                            <button type="submit" name="confirm-transfer" id="confirm-transfer" class="btn bg-orange text-white font-weight-bold float-right">Confirmer</button>
                            <button type="button" id="cancel-transfer" class="btn bg-dark text-info border-info float-right mx-2">Annuler</button>
                        </div>
                    </div>
                </form>
            </section> 
        </div>
    </div>
</main>
<?php
    $script="<script src='public/js/bankTransfer.js'></script>";
    require('template/footer.php');
?>