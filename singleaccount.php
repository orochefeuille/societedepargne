<?php
  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }
  $account_label = htmlspecialchars($_GET['account']);

  $page_title = $account_label . " | La Société d'épargne";

  require('src/ls_functions.php');
  require('template/navbar.php');
  require('template/header.php');

  // Get single account information from database
  $db = db_connection();
  
  $query = $db->prepare(' SELECT a.label, a.iban, a.date_creation, a.balance, 
                                 c.firstname, c.lastname,
                                 o.amount, o.is_credit,
                                 a.balance + SUM(IF(o.amount AND o.is_credit, o.amount, o.amount * -1)) AS total     
                          FROM account AS a
                          INNER JOIN customer AS c
                            ON a.customer_id = c.id
                          LEFT JOIN operation AS o
                            ON a.id = o.account_id
                          WHERE a.label = :label AND a.customer_id= :id
                          GROUP BY a.id
                        ' );
  $query->execute(
      [
          "label" => $account_label,
          "id" => $_SESSION['user']['id']
      ]
  );
  $query1 = $query->fetch(PDO::FETCH_ASSOC);

  // Get last transactions
  $query2 = $db->prepare(' SELECT o.date_transaction, o.amount, o.comments, o.is_credit
                          FROM account AS a
                          INNER JOIN customer AS c
                            ON a.customer_id = c.id
                          LEFT JOIN operation AS o
                            ON a.id = o.account_id
                          WHERE a.label = :label AND a.customer_id= :id
                        ' );
  $query2->execute(
      [
          "label" => $account_label,
          "id" => $_SESSION['user']['id']
      ]
  );
  $query2 = $query2->fetchAll(PDO::FETCH_ASSOC);
?>
  <!-- Main -->
  <main>
    <div class="jumbotron w-75 mx-auto pt-2 ">
      <div class="container">
        <h2 class="text-white bg-orange mt-3 mb-5 p-2  text-center"><?= $query1["label"] ?> </h2>
        <p class="lead">N° du compte : <span class="ml-3 text-info"><?= $query1["iban"] ?></span> </p>
        <p class="lead">Date de création : <span class="ml-3 text-info"><?= date('d-m-Y', strtotime($query1["date_creation"])); ?></span> </p>
        <p class="lead">Gestionnaire : <span class="ml-3 text-info"><?= $query1["firstname"] ?> <?= $query1["lastname"] ?></span> <p>
        <p class="lead">Solde : 
          <?php if($query1['total']): ?>
            <span class="ml-3 <?= balance_color(floatval($query1['total'])); ?>"><?= $query1['total'] ?> €</span></p>
          <?php else: ?>
            <span class="ml-3 <?= balance_color(floatval($query1['balance'])); ?>"><?= $query1['balance'] ?> €</span></p>
          <?php endif; ?>
          <div class="lead">Dernières opérations : 
          <?php foreach($query2 as $query):
            if($query["date_transaction"]):?>
              <p>
                <?php if(!$query["is_credit"]):
                  $query["amount"] = $query["amount"] * -1;
                endif; ?>
                <span class="ml-2 <?= balance_color(floatval($query["amount"])); ?>"><?= $query["amount"]; ?> €</span>
                le <span class="text-info"> <?= date('d-m-Y', strtotime($query["date_transaction"])); ?></span> 
                <?php if($query["comments"]): ?>
                motif :  <span class="text-info"> <?= $query["comments"] ?></span> 
                <?php endif; ?>
              </p>
            <?php endif;
          endforeach; ?>
        </div>
      </div>
  </main>
<?php
  require('template/footer.php');
?>
