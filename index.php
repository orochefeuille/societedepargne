<?php
  $page_title ="Vos comptes | La Société d'épargne";

  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }

  require('template/navbar.php');
  require('template/header.php');
  require('src/ls_functions.php');
  $db = db_connection();

  // Calculate Balance after transactions
  $query = $db->prepare(' SELECT a.balance, 
                                 o.amount, o.is_credit,
                                 a.balance + SUM(IF(o.amount AND o.is_credit, o.amount, o.amount * -1)) AS total     
                          FROM account AS a
                          INNER JOIN customer AS c
                            ON a.customer_id = c.id
                          LEFT JOIN operation AS o
                            ON a.id = o.account_id
                          WHERE a.customer_id= :id
                          GROUP BY a.id
                        ' );
  $query->execute(
      [
          "id" => $_SESSION['user']['id']
      ]
  );
  $balances = $query->fetchAll(PDO::FETCH_ASSOC);
  // Calculate Balance after transactions
  $query = $db->prepare(' SELECT a.label, o.amount, MAX(o.date_transaction) AS last_operation 
                          FROM account AS a
                          INNER JOIN customer AS c
                            ON a.customer_id = c.id
                          LEFT JOIN operation AS o
                            ON a.id = o.account_id
                          WHERE a.customer_id= :id 
                          GROUP BY a.label
                          ORDER BY MAX(o.date_transaction) DESC
                        ' );
  $query->execute(
      [
          "id" => $_SESSION['user']['id']
      ]
  );
  $operation = $query->fetchAll(PDO::FETCH_ASSOC);
  print_r($operation);
  // Get all customer's accounts from database
  $db = db_connection();
  $query = $db->prepare('SELECT id, label, balance 
                       FROM account
                       WHERE customer_id= :id');
  $result = $query->execute(
      [
          "id" => $_SESSION["user"]["id"]
      ]
  );
  $accounts = $query->fetchAll(PDO::FETCH_ASSOC);
?>

  <!-- Main -->
 <?php?> 
    <p class="text-info ml-4 mb-0">Bienvenue <span class="font-weight-bolder"><?= $_SESSION["user"]["firstname"];?>  <?= $_SESSION["user"]["lastname"];?></span></p>
    <main class="container-fluid w-100 text-center">
        <section class="accounts-vue-wrapper">
          <h2 class="text-info mt-0 mb-5">Tous vos comptes en un coup d'oeil :</h2>
          <div id="articless-wrapper" class="row mx-auto d-flex justify-content-around">
            <?php
              foreach($accounts as $key => $account): ?>
                <article class="card m-5" style="width: 18rem;">
                  <header class="bg-dark text-white pt-2 pb-1 mb-4">
                    <h3 class="card-title"> <?=  $account['label'];  ?></h3>
                  </header>
                  <div class="card-body p-0">
                    <p class="card-text">Solde au  <?=  date('d-m-Y');  ?> :</p>
                    <?php if($balances[$key]['total']): ?>
                      <p class="card-text <?=  balance_color($balances[$key]['total']); ?>"><?=  $balances[$key]['total']; ?> €</p>
                    <?php else: ?>
                      <p class="card-text <?=  balance_color($account['balance']); ?>"><?=  $account['balance']; ?> €</p>
                    <?php endif; ?>
                    <p class="card-text">Dernière opération :</p>
                    <p class="card-text"><?=  date('d-m-Y');  ?> :</p>
                  </div>
                  <footer class="bg-orange my-3 p-2 w-75 rounded mx-auto">
                    <a href="singleaccount.php?account-label=<?= $account['label']; ?>&account-index=<?= $account['id']; ?>" class="card-link text-white">Gérer ce compte</a>
                  </footer>
                </article>               
            <?php endforeach; ?>
          </div>
        </section>
    </main>
    
  <?php
    $script="<script src='js/main.js'></script>";
    require('template/footer.php');
  ?>

  
