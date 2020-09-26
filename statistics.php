<?php
  require('navbar.php');
  require('header.php');

  require('doc/savingsrate.php');
  $rate = get_rate();
?>

  <main class="container-fluid w-75 text-center">
    <section class="statistics-wrapper">
      <h2 class="text-info mb-5">Restez informé :</h2>
      <table class="table table-striped table-dark text-left">
        <thead>
          <tr>
            <?php foreach($rate[0] as $key => $item): ?>
              <th scope="col"><?= $key; ?></th> 
            <?php endforeach; ?>
          </tr>
        </thead>
        <tbody>
          <tr>
          <?php foreach($rate as $products): ?>
            <tr scope="col">
            <?php foreach($products as $product): ?>
              <td><?= $product; ?></td>
            <?php endforeach; ?>
            </tr> 
          <?php endforeach; ?>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

<?php
  require('footer.php');
?>
