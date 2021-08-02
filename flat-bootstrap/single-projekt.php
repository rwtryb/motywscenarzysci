<?php
/**
 * Theme: Flat Bootstrap
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package flat-bootstrap
 */
acf_form_head();
get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<?php get_sidebar( 'home' ); ?>

<div class="container">

<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

		<style>
		@media print {
			#main > div.row > div:nth-child(2) > div > div {
				display: none;
			 }
		 #main > div.row > div:nth-child(3) {
			 width: 100%;
		 }
	 }
		</style>

				<!-- jezeli user jest superwizorem -->
				  <?php

						if (get_user_role() == 'superwizor') {
						 get_template_part( 'widokprojektsuper' );
						}

					?>
				<!-- END jezeli user jest superwizorem -->

			<!-- jezeli konsultant lub autor otwiera sobie -->

				<?php

					//dla przesiewu autora
					$person = get_field('wybierz_autora_projektu');
					$person_id = $person['ID'];
					$user_info = get_userdata($person_id);

					/* 9 pozostalych autor */
					/* sprawdzam czy pole istnieje | pobieram dane */

					if( get_field('wybierz_autora_projektu_2') ):
						$person2 = get_field('wybierz_autora_projektu_2');
						$person_id2 = $person2['ID'];
						$user_info2 = get_userdata($person_id2);
					else:
						$person_id2 = 'nictuniema7u7u7u';
						$user_info2 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_3') ):
						$person3 = get_field('wybierz_autora_projektu_3');
						$person_id3 = $person3['ID'];
						$user_info3 = get_userdata($person_id3);
					else:
						$person_id3 = 'nictuniema7u7u7u';
						$user_info3 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_4') ):
						$person4 = get_field('wybierz_autora_projektu_4');
						$person_id4 = $person4['ID'];
						$user_info4 = get_userdata($person_id4);
					else:
						$person_id4 = 'nictuniema7u7u7u';
						$user_info4 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_5') ):
						$person5 = get_field('wybierz_autora_projektu_5');
						$person_id5 = $person5['ID'];
						$user_info5 = get_userdata($person_id5);
					else:
						$person_id5 = 'nictuniema7u7u7u';
						$user_info5 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_6') ):
						$person6 = get_field('wybierz_autora_projektu_6');
						$person_id6 = $person6['ID'];
						$user_info6 = get_userdata($person_id6);
					else:
						$person_id6 = 'nictuniema7u7u7u';
						$user_info6 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_7') ):
						$person7 = get_field('wybierz_autora_projektu_7');
						$person_id7 = $person7['ID'];
						$user_info7 = get_userdata($person_id7);
					else:
						$person_id7 = 'nictuniema7u7u7u';
						$user_info7 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_8') ):
						$person8 = get_field('wybierz_autora_projektu_8');
						$person_id8 = $person8['ID'];
						$user_info8 = get_userdata($person_id8);
					else:
						$person_id8 = 'nictuniema7u7u7u';
						$user_info8 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_9') ):
						$person9 = get_field('wybierz_autora_projektu_9');
						$person_id9 = $person9['ID'];
						$user_info9 = get_userdata($person_id9);
					else:
						$person_id9 = 'nictuniema7u7u7u';
						$user_info9 = 'nictuniema7u7u7u';
					endif;

					if( get_field('wybierz_autora_projektu_10') ):
						$person10 = get_field('wybierz_autora_projektu_10');
						$person_id10 = $person10['ID'];
						$user_info10 = get_userdata($person_id10);
					else:
						$person_id10 = 'nictuniema7u7u7u';
						$user_info10 = 'nictuniema7u7u7u';
					endif;

					//dla przesiewu konsultanta
					$current_user = wp_get_current_user();
					if ((get_user_role() == 'konsultant' && is_user_logged_in() && $current_user->ID == $post->post_author ) or (get_user_role() == 'autor' && $current_user->ID == $person_id)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id2)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id3)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id4)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id5)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id6)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id7)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id8)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id9)
					or (get_user_role() == 'autor' && $current_user->ID == $person_id10)
				) {

				?>

			<!-- projektu nie moze zobaczyc inny konsultant -->
			<!-- projektu nie moze zobaczyc inny autor -->
			<!-- end jezeli konsultant lub autor otwiera sobie -->

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="schowanedodruku" style="margin-left: -1px;">

					 <button class="btn-info" onclick="glowna()">< Wróć na główną</button>

					<? if (get_user_role() == 'konsultant') { ?>
					 <button type="button" class="btn-info" data-toggle="modal" data-target="#myModal"  data-backdrop="static" data-keyboard="false">Edytuj projekt</button>
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
				           <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
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

						 <style>
							#poststuff > div.field > input[type="submit"] {
								padding: 20px;
								min-width: 300px;
								font-size: 23px;
							}
							#myModal > div > div > div.modal-footer > button {
								font-size: 16px;
							}
						 </style>

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
							<?php $nickusera = $current_user->user_login; ?>



							<!-- koniec potrzebnych danych -->

							<!-- do sumowania czasu trwania projektu -->
							<?php
							$godziny = (int)0;
							$minuty = (int)0;
						  ?>
							<!-- END sumowanie czasu trwania projektu -->

							<?php                        
                            $iloscsesji = 0;
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
                                            $iloscsesji++;
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

								<!-- wyswietlanie czasu trwania sesji -->
                            
                                <br>
                                <br>
                            
                                <h6>
									<strong>Sesje trwały łącznie:</strong> <?php echo $godziny; ?> godz. i <?php echo $minuty; ?> min.
                                    
                                    <?php
                        
                                        $czastrwaniasesji = '<strong>Sesje trwały łącznie:</strong>'. $godziny .'godz.' . $minuty .'min.';
                                        $czastrwaniasesjinapotrzebyprojektu = $godziny .' godz. ' . $minuty .' min. ';
                                        update_field('czaspracynadprojektem', $czastrwaniasesjinapotrzebyprojektu);
                        
                                        update_field('ilość_odbytych_sesji', $iloscsesji);
                                        //$czaspracynadprojektem
                        
                                    ?>
                                    
                                    
								</h6>
                            
                                <!-- czy projekt został zakończony -->
								<?php if ( get_field( 'koniec_projektu' ) ): ?>

								<hr>
                            
                                <p> Projekt został zakończony</p>
                                

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
					<h3>Opis projektu</h3>
					<!-- <p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Autor:</span> <br />--><?php  //echo $user_info->first_name .' '. $user_info->last_name; ?><!-- </p> -->
                    
                    <span style="display: none;">                    
                        <?php $konsultantid = the_author_meta( 'ID' );?>
                    </span>
                    
					<p class="opis2" style="font-size: 16px !important; margin-bottom: 4px;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400; ">
                        
                        <?php echo get_wp_user_avatar( $konsultantid, 42 ); ?>
                        Konsultant:</span> <br /><?php the_author(); ?></p>

					<p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Gatunek / format:</span><br /><?php the_field('gatunek_projektu'); ?></p>

					<p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Logline:</span> <br /><?php the_field('logline_projektu'); ?></p>

					<p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Temat:</span> <br /><?php the_field('temat_projektu'); ?></p>

					<p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Przesłanie:</span> <br /><?php the_field('przesłanie_projektu'); ?></p>

					<p class="opis2" style="font-size: 16px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Postacie:</span> <br /><?php the_field('postacie_projektu'); ?></p>

				</div>

			</div>

			<?php endwhile; // end of the loop. ?>


<!-- jezeli to konstulant niech sobie wydrukuje wszystkie sesje -->
<? if (get_user_role() == 'konsultant') { ?>


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

	<!-- komentarze i pliki -->

	 <?php  //get_template_part( 'komentarzeipliki' );?>

	<!-- END komentarze i pliki -->

	<!-- zamkniecie ifa od konsultanta czy autora -->
	<?php } ?>

<?php  get_template_part( 'komentarzeipliki' );?>

          <style>
            #main > div.row > div:nth-child(3) {
            border-left: 1px solid #dedede;
            }
            #main > div.container > div > div:nth-child(2) {
            border-left: 1px solid #dedede;
            margin-left: -15px;
            border-top: 1px solid #dedede;
            }
            #main > div.container > div > div:nth-child(1) {
            border-top: 1px solid #dedede;
            }
          </style>

<?php
	}
?>

		<style>
			#acf-oznakowanie_projektu {
				display: none;
			}
            #acf-czaspracynadprojektem {
				display: none;
			}
		</style>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
