<?php
    $page_title ="Se connecter | La Société d'épargne";

    require('template/navbar.php');
    include('template/header.php');
    include('data/security.php');
    $security = get_security();

    session_start ();

?>

<main class="mx-auto my-0">
  <div class="row">
      <div class="col-12 mb-2">
        <?php if($is_allowed_user == false) {
            echo '<div class="danger-div alert alert-danger w-75 mx-auto my-0 text-center">Les identifiants ne sont pas corrects</div>';
          }
        ?>
      </div>
      <div class="col-12">
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
      </div>
    </div>
  </main>

  <?php 
    // Close the security alert and this won't display again while the user session
    if(isset($_POST["close"])) {
      $_SESSION["close"] = 'seen';
    } 
    if (!isset($_SESSION['close'])):?>
    <!-- Security layer -->
    <section id="layer" class="container bg-orange text-white">
      <form action="" method="post">
        <input class="close-layer text-white" type="submit" value="X" name="close">
      </form>
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
  <?php  endif;
    
  ?>
<?php
  $script = "<script src='public/js/login.js'></script>";
  include('template/footer.php');
?>