<?php
  $page_title = $account->getLabel() . " | La Société d'épargne";
  
  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');
  
?>

   <!-- Main -->
   <main>
    <div class="jumbotron w-75 mx-auto pt-2 ">
      <div class="container">
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
        <!-- <?php foreach($query2 as $query):
          if($query["date_transaction"]):?>
            <p>
              <?php if(!$query["is_credit"]):
                $query["amount"] = $query["amount"] * -1;
              endif; ?>
            le <span class="text-info"> <?= date('d-m-Y', strtotime($query["date_transaction"])); ?> : </span>
              <span class="ml-2 <?= balance_color(floatval($query["amount"])); ?>"><?= $query["amount"]; ?> €</span>
              <?php if($query["comments"]): ?>
              motif :  <span class="text-info"> <?= $query["comments"] ?></span> 
              <?php endif; ?>
            </p>
          <?php endif;
        endforeach; ?> -->
      </div>
      <div class="container mt-5">
          <button type="button" class="btn bg-orange text-white" id="credit-btn">Créditer ce compte</button>
          <button type="button" class="btn bg-orange text-white" id="dedit-btn">Déditer ce compte</button>
          <button type="submit" name="delete_account" id="delete-btn" class="btn bg-danger text-white">Supprimer</button>
        <form class="container mt-2 d-none" action="" method="post" id="single-form">
          <div class="form-group">
            <label for="single-operation">Montant (obligatoire) :</label>
            <input class="w-100" type="number" value="valider" name="single-operation" min="0" step="0.01" required>
          </div>
          <div class="form-group">
            <label for="single-textarea">Motif (non obligatoire):</label>
            <textarea  class="w-100" name="comments" rows="1"></textarea>
          </div>
          <div class="form-group">
            <button type="button" id="cancel-transaction" class="btn bg-info text-white" >Annuler</button>
            <button type="submit" value="" name="validate-transaction" id="validate-transaction" class="btn bg-success text-white">Valider</button>
          </div>
        </form>
      </div>
    </div>
  </main>
   
 <?php
    $script="<script src='public/js/singleaccount.js'></script>";
    require('template/footer.php');
  ?>
