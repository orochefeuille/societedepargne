<?php
    if($is_account_deleted) {
        $page_title = " Gérer votre compte| La Société d'épargne";
    }
    else {
        $page_title = $account->getLabel() . " | La Société d'épargne";
    }
  
  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');
  
?>

   <!-- Main -->
<main>
    <?php if($is_account_deleted) : ?>
    <div>
        <p class="alert alert-success text-center" role="alert">Compte supprimer avec succès</p>
        <a href="index.php" class="btn bg-orange text-white p-2 rounded">Retour à l'accueil</a>
    </div>
    <?php else : ?>
    <div class="jumbotron w-75 mx-auto pt-2 ">
        <div class="container">
        <?php if($is_credited) : ?>
            <div>
                <p class="alert alert-success text-center" role="alert">Compte crédité avec succès</p>
            </div>
        <?php elseif($is_debited) : ?>
            <div>
                <p class="alert alert-success text-center" role="alert">Compte débité avec succès</p>
            </div>
        <?php endif; ?>
            <h2 class="text-white bg-orange mt-3 mb-5 p-2  text-center"><?= $account->getLabel(); ?> </h2>
            <p class="lead">N° du compte : <span class="ml-3 text-info"><?= $account->getIban(); ?></span> </p>
            <p class="lead">Date de création : <span class="ml-3 text-info"><?= date('d-m-Y', strtotime($account->getDate_creation())); ?></span> </p>
            <p class="lead">Gestionnaire : <span class="ml-3 text-info"><?= $_SESSION["firstname"]; ?> <?= $_SESSION["lastname"]; ?></span> <p>
            <p class="lead">Solde : 
            <!-- <?php if($query1['total']): ?>
            <span class="ml-3 <?= balance_color(floatval($query1['total'])); ?>"><?= $query1['total'] ?> €</span></p>
            <?php else: ?> -->
            <span class="ml-3 <?= balance_color(floatval($account->getBalance())); ?>"><?= $account->getBalance() ?> €</span></p>
            <!-- <?php endif; ?> -->
            <div class="lead">Dernières opérations : 
            <?php foreach($account_operations as $operation):
                if(!$operation->getIs_credit()):
                $operation->setAmount($operation->getAmount() * -1);
                endif; ?>
                <p class="ml-2">
                    <span>le </span><span class="text-info"> <?= date('d-m-Y', strtotime($operation->getDate_transaction())); ?> : </span>
                    <span class="ml-2 <?= balance_color(floatval($operation->getAmount())); ?>"><?= $operation->getAmount(); ?> €</span>
                    <?php if($operation->getComments()): ?>
                        <span class="ml-2">motif : </span><span class="text-info"> <?= $operation->getComments(); ?></span> 
                    <?php endif; ?>
                </p>
            <?php endforeach; ?>
        </div>
        <div class="container mt-5">
            <button type="button" class="btn bg-orange text-white" id="credit-btn">Créditer ce compte</button>
            <button type="button" class="btn bg-orange text-white" id="dedit-btn">Déditer ce compte</button>
            <button type="button" class="btn bg-danger text-white" id="delete-btn" >Supprimer</button>
            <form class="container mt-2 d-none" action="" method="post" id="single-form">
                <div class="form-group">
                    <label for="amount">Montant (obligatoire) :</label>
                    <input class="w-100" type="number" value="valider" name="amount" min="0" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="comments">Motif (non obligatoire):</label>
                    <textarea  class="w-100" name="comments" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <button type="button" id="cancel-transaction" class="btn bg-info text-white" >Annuler</button>
                    <button type="submit" value="" name="is_credit" id="validate-transaction" class="btn bg-success text-white">Valider</button>
                </div>
            </form>
            <form class="container mt-2 d-none" action="" method="post" id="delete-form"> 
                <div class="alert bg-danger text-white">
                    <p>Attention ! Confirmez la suppression définitive de ce compte.</p>
                    <button type="button" id="cancel-delete" class="btn bg-info text-white" >Annuler</button>
                    <button type="submit" id="confirm-delete" name="confirm-delete" class="btn bg-white text-danger font-weight-bolder">Supprimer ce compte</button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>
</main>
   
 <?php
    $script="<script src='public/js/singleaccount.js'></script>";
    require('template/footer.php');
  ?>
