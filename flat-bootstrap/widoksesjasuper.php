<!-- jezeli user jest superwizorem -->

<?php
  if (get_user_role() == 'superwizor') {
  ?>

  <div class="schowanedodruku">

    <!-- link do projektu seseji -->

    <!-- pobieramy informacje o projekcie do ktorego dolaczona jest sesja -->
    <?php $wlasneoznakowaniesesji = get_field('wlasne_oznakowanie_projektu'); ?>
    <?php
    // WP_Query arguments
    $args = array(
      'post_type'              => array( 'projekt' ),
    );

    // The Query
    $query = new WP_Query( $args );

    // Variable to call WP_Query.
    $the_query = new WP_Query( $args );

    if ( $the_query->have_posts() ) :
      // Start the Loop
      while ( $the_query->have_posts() ) : $the_query->the_post();

      ?>


        <?php
          $post_id = get_the_ID();
          $wartoscpola = get_field( 'oznakowanie_projektu', $post_id );

          if(	$wartoscpola == $wlasneoznakowaniesesji) {
            $linkdoprojektukonsultant = get_permalink();
          }
        ?>


      <?php
        // End the Loop
        endwhile;
      else:
        // If no posts match this query, output this text.
        _e( 'Jeszcze nie dodałeś żadnej sesji', 'textdomain' );
      endif;
      wp_reset_postdata();
      ?>
    <!-- END pobieramy informacje o projekcie do ktorego dolaczona jest sesja -->

    <!-- END link do projektu sesji -->


        <button class="btn-info">
          <a href="<?php echo $linkdoprojektukonsultant; ?>" style="color: #fff;">
            < Cofnij do projektu
          </a>
        </button>
        <button onclick="glowna()" class="btn-info">Wróć na główną</button>
        <button onclick="drukuj()" class="btn-info">Drukuj</button>

  </div>

        <script>
          function goBack() {
              history.go(-1);
          }
        </script>

        <script>
         function drukuj() {
             window.print();
         }
       </script>

       <script>
        function glowna() {
          location.href='http://scriptcoach.storylab.pro/';
        }
        </script>


  <p style="margin-top: 20px;">

    <strong>Numer sesji: </strong>

    <?php the_field('numer_sesji'); ?>

    |

    <strong>Czas trwania sesji: </strong>
      <?php echo get_field('czas_trwania_sesji'); ?>

  |

  <strong>Data sesji: </strong>

  <?php
    $dateformatstring = "l d F, Y";
    $unixtimestamp = strtotime(get_field('data_sesji_autor'));
    echo date_i18n($dateformatstring, $unixtimestamp);
  ?>

</p>




<!--<h4><strong>Temat sesji:</strong> </br> -->
  <?php //the_field('temat_sesji_autor'); ?>
 <!-- </h4> -->

<div class="row">

  <div class="col-md-6">

    <h2>Sesja uzupelniona przez autora</h2>

    <h4><strong>Cel na sesję:</strong> </br>
      <?php the_field('cel_na_sesje_autor'); ?>
    </h4>

    <h4><strong>Co było ok:</strong> <br />
      <?php the_field('co_bylo_ok_autor'); ?>
    </h4>

    <h4><strong>Co mogło pójść lepiej:</strong> <br />
      <?php the_field('co_moglo_pojsc_lepiej_autor'); ?>
    </h4>

  </div>

  <div class="col-md-6">
    <h2>Sesja uzupelniona przez konsultanta</h2>

    <h4><strong>Cel na sesję:</strong> </br>
      <?php the_field('cel_na_sesję'); ?>
    </h4>

    <h4><strong>Plan sesji:</strong> <br />
      <?php the_field('temat_sesji'); ?>
    </h4>

    <h4><strong>Co było ok:</strong> <br />
      <?php the_field('co_było_ok'); ?>
    </h4>

    <h4><strong>Co mogło pójść lepiej:</strong> <br />
      <?php the_field('co_mogło_pojść_lepiej'); ?>
    </h4>

    <h4><strong>Raport ze spotkania:</strong> <br />
      <?php the_field('raport_ze_spotkania'); ?>
    </h4>

    <h4><strong>Praca domowa:</strong> <br />
      <?php the_field('praca_domowa_autor'); ?>
    </h4>

  </div>

</div>


  <?php
  }
   ?>

<!-- END jezeli user jest superwizorem -->
