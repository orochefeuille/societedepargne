<?php
  $page_title ="Se connecter | La Société d'épargne";

  session_start ();

  require('template/navbar.php');
  require('template/header.php');
  require('data/security.php');
  $security = get_security();

  if(isset($_POST["close"])) {
    $_SESSION["close"] = 'seen';
  }

  if(!empty($_POST) && isset($_POST["login"])) {
    try {
        $db = new PDO('mysql:host=localhost;dbname=ls_bank','root', '');
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

    $query = $db->prepare(
        "SELECT * 
         FROM customer 
         WHERE email = :email
        "              
    );
    $result = $query->execute(
        [
            "email" => htmlspecialchars($_POST["email"])
        ]
    );

    $user = $query->fetch(PDO::FETCH_ASSOC);

    $danger_div = '<div class="danger-div alert alert-danger w-75 mx-auto my-0 text-center">Les identifiants ne sont pas corrects</div>';
    if($user) {
      // if(password_verify($_POST["client-password"], $user["pass"])) {
      if($_POST["client-password"] == $user["pass"]) {
        $_SESSION["user"] = $user;
        header('Location: http://localhost/societedepargne/index.php');
      }
      else {
        echo $danger_div;
      }
    }
    else {
      echo $danger_div;
    }
  }
?>
  
  <main class="mx-auto my-0">
    <form action="" method="post">
    <div class="form-group">
        <label for="email">Votre adresse mail</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="pseudoHelp">
    </div>
    <div class="form-group">
        <label for="client-password">Mot de passe</label>
        <input type="password" class="form-control" id="client-password" name="client-password">
    </div>
    <button type="submit" name="login" class="btn bg-orange text-white">Se connecter</button>
    </form>
  </main>

  <?php if (!isset($_SESSION['close'])):?>
      <!-- Security layer -->
    <section id="layer" class="container bg-orange text-white">
      <form action="" method="post">
        <input class="close-layer text-white" type="submit" value="X" name="close">
      </form>
      <!-- <div >
          <i class="fas fa-times"></i>
      </div> -->
      <div>
        <h2 class="text-center font-weight-bolder m-5"><?=  $security["title"]; ?></h2>
        <p class="font-weight-bolder m-3"><?=  $security["preamble"]; ?></p>
        <ul class="list-unstyled mx-auto w-75 bg-info">
        <?php 
          foreach($security["advices"] as $advice) :?>
            <li class="font-weight-bolder p-3 pl-5"><?= $advice;?></li>
          <?php endforeach;?>
        </ul>
        <p class="font-weight-bolder text-danger bg-white p-2"><?=  $security["conclusion"]; ?></p>
      </div>
    </section>
  <?php  endif;?>

<?php
  $script = "<script src='js/login.js'></script>";
  require('template/footer.php');
?>