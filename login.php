<?php
  $page_title ="Se connecter | La Société d'épargne";

  require('template/navbar.php');
  require('template/header.php');

  // Get the credentials info
  function credentials_info(string $name) :string {
    $field = "";
    if(isset($_POST['submit'])) {
      $field = htmlspecialchars($_POST[$name]);
    }
    return $field;
  }
  $pseudo = credentials_info("pseudo");
  $mdp = credentials_info("client-password");

  // Go to index.php if credentials are OK
  function checkCredentials(string $p, string $m) :bool {
      return ($p == "pseudo" && $m == "mdp") ? true : false;
  }
  
  if (checkCredentials($pseudo, $mdp)):
    session_start();
    $_SESSION['cred'] = "allowed";
    header('Location: http://localhost/societedepargne/index.php');
  elseif((checkCredentials($pseudo, $mdp) == false) && $pseudo && $mdp):?>
    <div class="alert alert-danger w-75 mx-auto my-0 text-center">Les identifiants ne sont pas corrects</div>
  <?php endif; ?>
    <main class="mx-auto my-0">
      <form action="" method="post">
      <div class="form-group">
          <label for="pseudo">Votre identifiant</label>
          <input type="text" class="form-control" id="pseudo" name="pseudo" aria-describedby="pseudoHelp">
      </div>
      <div class="form-group">
          <label for="client-password">Mot de passe</label>
          <input type="password" class="form-control" id="client-password" name="client-password">
      </div>
      <button type="submit" name="submit" class="btn bg-orange text-white">Se connecter</button>
      </form>
  </main>

<?php
  $script = null;
  require('template/footer.php');
?>