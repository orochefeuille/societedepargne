  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="index.php"><img src="img/brand.png" alt="Logo de la société"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active font-weight-bold p-2" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        <a class="nav-link font-weight-bold p-2" href="statistics.php">Actualités bancaires</a>
        <a class="nav-link font-weight-bold p-2" href="banktransfer.php">Effectuer un virement</a>
        <a class="nav-link font-weight-bold bg-orange rounded text-white p-2" href="newaccount.php">Ouvrir un compte</a>
        <a class="nav-link font-weight-bold p-2" href="blog.php">Blog</a>
        <a class="nav-link font-weight-bold p-2" href="#" tabindex="-1" aria-disabled="true"></a>
      </div>
      <?php if (isset($_SESSION['user'])) :?>
        <div class="connection">
          <a href="disconnection.php">Se déconnecter</a>
        </div>
      <?php endif;?>
    </div>
  </nav>