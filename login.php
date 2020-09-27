<?php
  require('navbar.php');

  $page_title ="Se connecter | La Société d'épargne";
  require('header.php');
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
?>
 <main class="w75 mx-auto">
    <?php if (checkCredentials($pseudo, $mdp)): ?>
        <form action="index.php" method="post">
    <?php else : ?>
        <form action="login.php" method="post">
    <?php endif; ?>
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
  require('footer.php');
?>