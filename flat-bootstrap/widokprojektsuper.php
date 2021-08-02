

<div class="col-md-12">

  <?php while ( have_posts() ) : the_post(); ?>

    <div class="schowanedodruku" style="margin-left: -1px;">

       <button class="btn-info" onclick="glowna()">< Wróć na główną</button>

      <? if (get_user_role() == 'konsultant') { ?>
       <button type="button" class="btn-info" data-toggle="modal" data-target="#myModal">Edytuj projekt</button>
       <button type="button" class="btn-info" data-toggle="collapse" data-target="#demo" title="Sesje i ich zawartość rozwiną się na dole ekranu. Wtedy cała strona będzie idealnie gotowa do druku.">Rozwiń wszystkie sesje</button>
      <?php } ?>

       <button onclick="drukuj()" class="btn-info">Drukuj</button>

       <? if (get_user_role() == 'konsultant') { ?>
        <button type="button" class="btn-info" data-toggle="modal" data-target="#myModal2" style="background-color: #1abc9c !important;">Zapytaj o dostępność sali</button>
       <?php } ?>

    </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
   <div class="modal-dialog">

     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Zapytaj o dostępność sali</h4>
       </div>
       <div class="modal-body">
         <p>Sala mieści się pod adresem XXXX. Dostępna jest od X do X. Skorzystaj z formularza, aby zapytać o dostępność w wybranym terminie lub zadzwoń do nas XXXXX.</p>
         <?php echo do_shortcode( '[contact-form-7 id="191" title="Formularz 1"]' ); ?>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij okno</button>
       </div>
     </div>

   </div>
  </div>
  <!-- END Modal -->

    <script>
    function goBack() {
        window.history.back();
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

    <!-- Modal -->

       <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog modal-lg">

           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Edycja projektu</h4>
             </div>
             <div class="modal-body">

                  <?php

                     $args = array(
                          'field_groups' => array('projekt'), // Field Group name
                          'post_id' => 'new_post',
                          'new_post' => array(
                              'post_type' => 'projekt',
                              'post_status' => 'publish'
                           ),
                          'submit_value' => 'Edytuj sesje'
                      );
                      acf_form();

                  ?>

             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij okno</button>
             </div>
           </div>

         </div>
       </div>

      <!-- END Modal -->


  <div class="row" style="margin-top: 50px;">

    <style>
    p {
      margin-bottom: 0px;
    }
    </style>

    <div class="col-md-6">

      <div class="row">

        <div class="col-md-12">

          <?php

            if (get_user_role() == 'konsultant') {
           ?>

           <style>
           @media print {
             #main > div.row > div:nth-child(2) > div > div {
               display: none;
              }
            }
           </style>



              <?php if ( get_field( 'koniec_projektu' ) ): ?>



              <?php else: // field_name returned false ?>

                <a href="http://scriptcoach.storylab.pro/dodaj-sesje/#projekt=<?php the_field('oznakowanie_projektu'); ?>">
                  <button type="button" class="btn btn-primary btn-lg">Dodaj nową sesję</button>
                </a>

              <?php endif; // end of if field_name logic ?>



              <?php
                }
              ?>

              <?php if ( get_field( 'koniec_projektu' ) ): ?>

              <h4>Projekt został zakończony.</h4>

              <?php else: // field_name returned false ?>

              <?php endif; // end of if field_name logic ?>


          <h3 style="margin-top: 36px;">Sesje z tego projektu</h3>

          <!-- wszystkie dane potrzebne do dzialania petli -->

          <?php $user = wp_get_current_user(); ?>
          <?php $wlasneoznakowanieprojektu = get_field('oznakowanie_projektu'); ?>
          <?php // $nickusera = $current_user->user_login; ?>

          <!-- koniec potrzebnych danych -->

          <!-- do sumowania czasu trwania projektu -->
          <?php
          $godziny = (int)0;
          $minuty = (int)0;
          ?>
          <!-- END sumowanie czasu trwania projektu -->

          <?php
          // WP_Query arguments
          $args = array(
            'post_type'              => array( 'sesja' ),
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
                $wartoscpola = get_field( 'wlasne_oznakowanie_projektu', $post_id );

                if(	$wartoscpola == $wlasneoznakowanieprojektu) {
                  echo '<li>';
                  echo '<a href="'.get_permalink().'">';
                  $dateformatstring = "l d F, Y";
                  $unixtimestamp = strtotime(get_field('data_sesji'));
                  echo the_title() .' | '. date_i18n($dateformatstring, $unixtimestamp);;
                  echo '</a>';
                  echo '</li>';

                  //suma czasu trwania sesji
                  $czas_do_sumy = get_field('czas_trwania_sesji');
                  $czasy = explode(":", $czas_do_sumy);
                  $godziny = $godziny + $czasy[0];
                  $minuty = $minuty + $czasy[1];

                  //zamiana minut na godziny
                  if ($minuty > 60) {
                    $minuty = $minuty - 60;
                    $godziny = $godziny + 1;
                  }

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

            <hr>

            <p>
              <strong>Sesje trwały łącznie:</strong> <?php echo $godziny; ?> godz. i <?php echo $minuty; ?> min.
            </p>
            <!-- wyswietlanie czasu trwania sesji -->
            <?php if ( get_field( 'koniec_projektu' ) ): ?>


            <?php else: // field_name returned false ?>

            <?php endif; // end of if field_name logic ?>

            <!-- END wyswietlanie czasu trwania sesji -->

        </div>

  </div> <!-- zamkniecie boksu prawego col-md-6 -->


    </div>

    <?php
    $post_id = get_the_ID();
    $nazwaprojektu = get_field( 'nazwa_robocza_projektu', $post_id );
    $person = get_field('wybierz_autora_projektu');
    $person_id = $person['ID'];
    $user_info = get_userdata($person_id);
    ?>


    <!-- panel opcji -->

    <div class="col-md-6">

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Autor:</span> <br /><?php  echo $user_info->first_name .' '. $user_info->last_name; ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Konsultant:</span> <br /><?php the_author(); ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Gatunek:</span><br /><?php the_field('gatunek_projektu'); ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Logline:</span> <br /><?php the_field('logline_projektu'); ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Temat:</span> <br /><?php the_field('temat_projektu'); ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Przesłanie:</span> <br /><?php the_field('przesłanie_projektu'); ?></p>

      <p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Postacie:</span> <br /><?php the_field('postacie_projektu'); ?></p>

    </div>

  </div>

  <?php endwhile; // end of the loop. ?>





  <!-- wszystkie dane potrzebne do dzialania petli -->
  <div class="row">
  <div class="col-md-12">

  <div id="demo" class="collapse">

  <h2 class="text-center" style="margin-top: 60px; page-break-before: always;">Sesje z projektu: <?php echo get_the_title(); ?></h2>

  <?php $user = wp_get_current_user(); ?>
  <?php $wlasneoznakowanieprojektu = get_field('oznakowanie_projektu'); ?>
  <?php $nickusera = $current_user->user_login; ?>

  <!-- koniec potrzebnych danych -->

  <?php
  // WP_Query arguments
  $args = array(
  'post_type'              => array( 'sesja' ),
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
  $wartoscpola = get_field( 'wlasne_oznakowanie_projektu', $post_id );

  if(	$wartoscpola == $wlasneoznakowanieprojektu) {

    echo '<hr>';

    $dateformatstring = "l d F, Y";
    $unixtimestamp = strtotime(get_field('data_sesji'));
    echo the_title() .' | '. date_i18n($dateformatstring, $unixtimestamp);


    echo '<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Mój cel na sesję:</span> <br />';
    echo get_field( 'cel_na_sesję' );
    echo '</p>';

    echo '<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Plan sesji:</span> <br />';
    echo get_field( 'temat_sesji' );
    echo '</p>';

    echo '<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Co było ok:</span> <br />';
    echo get_field( 'co_było_ok' );
    echo '</p>';

    echo '<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Co mogło pójść lepiej:</span> <br />';
    echo get_field( 'co_mogło_pojść_lepiej' );
    echo '</p>';

    echo '<hr>';

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
  </div>
  </div>
  </div>
  <!-- end jezeli to konsultant niech sobie wydrukuje wszystkie sesje -->




  <style>
  #acf-oznakowanie_projektu {
    display: none;
  }
  </style>

</div>
