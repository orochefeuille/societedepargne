<?php
  session_start ();
  if (!isset($_SESSION['user'])) {
    header('Location: http://localhost/societedepargne/login.php');
  }
  $account_label = htmlspecialchars($_GET['account-label']);
  $account_index = htmlspecialchars($_GET['account-index']);

  $page_title = $account_label . " | La Société d'épargne";

  require('src/ls_functions.php');
  require('template/navbar.php');
  require('template/header.php');

  $db = db_connection();
  // write operation in database
  if(!empty($_POST) && (isset($_POST["validate-transaction"]))) {
    $is_credit = $_POST["validate-transaction"];
    $amount = floatval(htmlspecialchars($_POST["single-operation"]));

    $query3 = $db->prepare(
      'INSERT INTO operation(amount, is_credit, comments, account_id) 
       VALUES(:amount, :is_credit, :comments, :account_id)'              
    );
    $result = $query3->execute(
        [
            "amount" =>  $amount, 
            "is_credit" => $is_credit, 
            "comments" => htmlspecialchars($_POST["comments"]),
            "account_id" => $account_index
        ]
    );
  }
  // Get single account information from database
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
            le <span class="text-info"> <?= date('d-m-Y', strtotime($query["date_transaction"])); ?> : </span>
              <span class="ml-2 <?= balance_color(floatval($query["amount"])); ?>"><?= $query["amount"]; ?> €</span>
              <?php if($query["comments"]): ?>
              motif :  <span class="text-info"> <?= $query["comments"] ?></span> 
              <?php endif; ?>
            </p>
          <?php endif;
        endforeach; ?>
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

  <script src="js/singleaccount.js"></script>
<?php
  require('template/footer.php');
?>
