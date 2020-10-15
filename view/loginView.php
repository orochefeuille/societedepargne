<?php
    $page_title ="Se connecter | La Société d'épargne";

    // session_start ();

    require('template/navbar.php');
    require('template/header.php');
    require('data/security.php');
    $security = get_security();

   
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
  $script = "<script src='public/js/login.js'></script>";
  require('template/footer.php');
?>