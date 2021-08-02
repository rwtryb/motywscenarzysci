<div class="container">
  <div class="row">

    <div class="col-md-6">

      <h3>Dyskusja dotycząca projektu</h3>
      <?php comments_template( '/comments.php' ); ?>

    </div>

    <div class="col-md-6">

      <h3>Pliki dotyczące projektu</h3>

      <!-- jeżeli projekt oglada konsultant lub autor -->
        <? if (get_user_role() == 'konsultant' || get_user_role() == 'autor') { ?>

          <?php echo get_field( 'plik_projekt_1' ); ?>

        <?php } ?>

      <!-- END jeżeli projekt oglada konsultant lub autor -->



    </div>

  </div>
</div>
