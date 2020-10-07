<?php
  $page_title ="Se connecter | La Société d'épargne";

  require('template/navbar.php');
  require('template/header.php');

  // Get the credentials info
  function credentials_info(string $name) :string {
    $field = "";
    if(isset($_POST['login'])) {
      $field = htmlspecialchars($_POST[$name]);
    }
    return $field;
  }
  $email = credentials_info("email");
  $mdp = credentials_info("client-password");

  // Go to index.php if credentials are OK
  function checkCredentials(string $p, string $m) :bool {
      return ($p == "pseudo" && $m == "mdp") ? true : false;
  }
  
  if (checkCredentials($email, $mdp)):
    session_start();
    $_SESSION['cred'] = "allowed";
    header('Location: http://localhost/societedepargne/index.php');
  elseif((checkCredentials($email, $mdp) == false) && $email && $mdp):?>
    <div class="alert alert-danger w-75 mx-auto my-0 text-center">Les identifiants ne sont pas corrects</div>
  <?php endif; ?>
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

<?php
  $script = null;
  require('template/footer.php');
?>