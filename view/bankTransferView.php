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
                <form class="container mt-2" action="" method="post" id="single-form">
                    <div class="form-group">
                        <label for="accounts-list">Compte à débiter (obligatoire) :</label>
                        <select class="form-control" id="accounts-list" name="label" required>
                            <option value="" disabled selected >-- Choisir --</option>
                            <?php foreach($customer_accounts_labels as $customer_account_label): ?>
                                    <option><?= $customer_account_label ?> </option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accounts-list">Compte à créditer (obligatoire) :</label>
                        <select class="form-control" id="accounts-list" name="label" required>
                            <option value="" disabled selected >-- Choisir --</option>
                            <?php foreach($customer_accounts_labels as $customer_account_label): ?>
                                    <option><?= $customer_account_label ?> </option>
                            <?php  endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount">Montant (obligatoire) :</label>
                        <input class="w-100" type="number" value="valider" name="amount" min="0" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <button type="button" id="cancel-transaction" class="btn bg-info text-white" >Annuler</button>
                        <button type="submit" value="" name="is_credit" id="validate-transaction" class="btn bg-success text-white">Valider</button>
                    </div>
                </form>
            </section> 
        </div>
    </div>
</main>
<?php
    $script=null;
    require('template/footer.php');
?>