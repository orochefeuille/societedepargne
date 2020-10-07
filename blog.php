<?php
  $page_title ="Votre blog | La Société d'épargne";

  session_start ();
  if (isset($_SESSION['cred']) != 'allowed' ) {
    header('Location: http://localhost:8080/societedepargne/login.php');
  }
  
  require('template/navbar.php');
  require('template/header.php');
?>
  <!-- Main -->
  <main class="container-fluid w-75 text-center">
      <section class="blog-wrapper">
        <h2 class="text-info mb-5 lead font-weight-bold">Des articles spécialisés qui peuvent vous intéresser :</h2>
      </section> 
  </main>
<?php
   $script = "<script src='js/blog.js'></script>";
   require('template/footer.php');
?>
