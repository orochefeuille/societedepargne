<?php
  $page_title ="Ouvrir un compte | La Société d'épargne";
  
  session_start ();
  if (isset($_SESSION['cred']) != 'allowed' ) {
    header('Location: http://localhost:8080/societedepargne/login.php');
  }

  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');

  // date in french format
  $account_date = get_now();
  

  // Get the account info
  function account_info(string $name) :string {
    $field = "";
    if(isset($_POST['submit'])) {
      $field = htmlspecialchars($_POST[$name]);
    }
    return $field;
  }

  $account_title =  account_info('new-account');
  $account_amount =  account_info('account-amount');
  $account_owner =  'Mr Gossart Thomas';
  $account_number =  "N:0132520024 fr 45";
?>

  <main class="container-fluid">
    <div class="row w-100">
      <div class="col-12 col-md-8">
        <section class="newaccount-wrapper">
          <h2 class="text-info mb-5 lead font-weight-bold text-center">Ouvrir un compte en un instant :</h2>
          <?php if($account_title && $account_amount) : ?>
            <p id="done" class="alert alert-success text-center" role="alert">Compte créé avec succès</p>
          <?php endif; ?>
          <form action="" id="account-creation-form" class="container-fluid text-left" method="POST">
            <div class="form-group">
              <label for="accounts-list">Choisissez un compte :</label>
              <select class="form-control" id="accounts-list" name="new-account" required>
                <option value="" disabled selected >-- Choisir --</option>
                <option>Compte courant</option>
                <option>Livret A</option>
                <option>Plan Epargne Logement (PEL)</option>
                <option>Livret de développement durable (LDD)</option>
                <option>Livret d’épargne populaire (LEP)</option>
              </select>
            </div>
            <div class="form-group">
              <label for="account-amount">Indiquez le montant du premier dépôt :</label>
              <input type="number" class="form-control" id="account-amount"  name="account-amount" aria-describedby="amountHelp" min="50" required>
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
      <?php if($account_title && $account_amount) : ?>
        <div class="col-12  col-md-4">
        <aside class="text-center">
          <h2 class="text-info mb-5 lead font-weight-bold text-center">Compte créé le <?= $account_date; ?></h2>
          <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
            <article class="card m-5" style="width: 18rem;">
              <header class="bg-dark text-white pt-2 pb-1 mb-4">
                <h3 class="card-title"> <?= $account_title; ?></h3>
              </header>
              <div class="card-body p-0">
                <p class="card-text">N° du compte :</p>
                <p class="text-info"><?= $account_number; ?></p>
                <p class="card-text">Gestionnaire :</p>
                <p class="text-info"><?= $account_owner; ?></p> 
                <p class="card-text">Solde :</p>
                <p class="text-info"><?= $account_amount; ?> €</p>
              </div>
              <!-- <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
              </footer> -->
            </article>
            </div>
        </aside>
      </div>
      <?php endif; ?>
      
    </div>
    
  </main>

  <script src="js/newaccount.js"></script>

<?php
  require('template/footer.php');
?>
