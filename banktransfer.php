<?php
$page_title ="Tranférer vers un autre compte | La Société d'épargne";

session_start ();
if (!isset($_SESSION['user'])) {
  header('Location: http://localhost/societedepargne/login.php');
}

require('template/navbar.php');
require('template/header.php');

?>
  <main>
      <p>Virements</p>
  </main>
 
<?php
  require('template/footer.php');
?>
