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

				<!-- jezeli user jest superwizorem -->
					<?php

						if (get_user_role() == 'superwizor') {
						 get_template_part( 'widoksesjasuper' );
						}

					?>
				<!-- END jezeli user jest superwizorem -->


	<!-- jezeli wpis chce ogladac konsultant-->

				<?php
				$person = get_field('wybierz_autora_projektu');
				$person_id = $person['ID'];
				$user_info = get_userdata($person_id);

				//dla przesiewu konsultanta
				$current_user = wp_get_current_user();
	      	if (get_user_role() == 'konsultant' && $current_user->ID == $post->post_author ) {
	      ?>

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

				<div class="schowanedodruku">

	        	<a href="<?php echo $linkdoprojektukonsultant; ?>" style="color: #fff;">
							<button class="btn-info">
									< Cofnij do projektu
							</button>
	          </a>
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

							<div class="row" style="margin-bottom: 20px;">

							</div>
				<!-- wylaczenie wyswietlania pol autora do edycji konsultantowi -->

				<style>

				#acf-czas_trwania_sesji_autor, #acf-data_sesji_autor, #acf-cel_na_sesje_autor, #acf-temat_sesji_autor, #acf-co_bylo_ok_autor, #acf-co_moglo_pojsc_lepiej_autor {
					display: none;
				}

				</style>

				<!-- END wylaczenie wyswietlania pol autora do edycji konsultantowi -->

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
								$tytuldoprojektu = get_the_title();
								$autorprojektu = get_the_author();

								// dodane zeby wziac autora projektu do ktorego jest sesja
								$post_id = get_the_ID();
								$nazwaprojektu = get_field( 'nazwa_robocza_projektu', $post_id );
								$person = get_field('wybierz_autora_projektu');
								$person_id = $person['ID'];
								$user_info = get_userdata($person_id);
								// END dodane
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

				<!-- pobieranie autora projektu do sesji -->



				<!-- END pobieranie autora projektu do sesji -->


				<!-- panel opcji -->

				<div id="exTab2" class="container">
					<div class="col-md-12">

				<ul class="nav nav-tabs">
							<li class="active">
								<a  href="#1" data-toggle="tab">Twoja sesja</a>
							</li>
							<li>
								<a href="#2" data-toggle="tab">Sesja Autor</a>
							</li>
						</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="1">


						<?php

					   	 $args = array(
					    	    'field_groups' => array('sesja'), // Field Group name
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

					<script>
					window.onbeforeunload = function(){
						return 'Czy były wprowadzane zmiany? Zaktualizowany sesję?';
					};
					</script>

					<div class="tab-pane" id="2">


						<?php while ( have_posts() ) : the_post(); ?>

							<p style="margin-top: 20px;">

								<strong>Projekt: </strong>
									<?php echo $tytuldoprojektu; ?>

							|

								<strong>Autor:</strong>
									<?php  echo $user_info->first_name .' '. $user_info->last_name; ?>

							|

								<strong>Konsultant projektu: </strong>
									<?php echo $autorprojektu; ?>

							|

							<strong>Data sesji: </strong>
									<?php
										$dateformatstring = "l d F, Y";
										$unixtimestamp = strtotime(get_field('data_sesji'));
										echo date_i18n($dateformatstring, $unixtimestamp);
									?>

						</p>


						<h4 style="margin-top: 20px;">Podsumowanie sesji</h4>
							<?php the_field('co_moglo_pojsc_lepiej_autor'); ?>




						<?php endwhile; // end of the loop. ?>

						<!-- wysylanie wiadomosci -->
						<hr>
						<p>Jeżeli chcesz możesz zwrócić się z prośbą do autora o uzupełnienie podsumowania sesji, aby to zrobić naciśnij poniższy przycisk, wyślesz wtedy przypomnienie dotyczące tej sesji</p>
            
            <form name='form' action="" method='post'>
              <input type="text" name="name" value='Twoja wiadomość dla konsultanta' style="width: 400px;">

								<input type="submit" onclick="myFunction()" value="Wyślij wiadomość z przypomnieniem" />
								<input type="hidden" name="button_pressed" value="1" />
						</form>
            
            

 <script>
            function myFunction() {
                alert("Wiadomość została wysłana.");
            }
            </script>



							<?php if(isset($_POST['button_pressed']))
							{
								$multiple_recipients = array();
								?>
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

											$person = get_field('wybierz_autora_projektu');
											$person_id = $person['ID'];
											$user_info = get_userdata($person_id);
											$email = $user_info->user_email;
											array_push($multiple_recipients, $email);


											if( get_field('wybierz_autora_projektu_2') ):
												$person2 = get_field('wybierz_autora_projektu_2');
												$person_id2 = $person2['ID'];
												$user_info2 = get_userdata($person_id2);
												$email2 = $user_info2->user_email;
												array_push($multiple_recipients, $email2);
											else:
												$person_id2 = '';
												$user_info2 = '';
											endif;

											if( get_field('wybierz_autora_projektu_3') ):
												$person3 = get_field('wybierz_autora_projektu_3');
												$person_id3 = $person3['ID'];
												$user_info3 = get_userdata($person_id3);
												$email3 = $user_info3->user_email;
												array_push($multiple_recipients, $email3);
											else:
												$person_id3 = '';
												$user_info3 = '';
											endif;

											if( get_field('wybierz_autora_projektu_4') ):
												$person4 = get_field('wybierz_autora_projektu_4');
												$person_id4 = $person4['ID'];
												$user_info4 = get_userdata($person_id4);
												$email4 = $user_info4->user_email;
												array_push($multiple_recipients, $email4);
											else:
												$person_id4 = '';
												$user_info4 = '';
											endif;

											if( get_field('wybierz_autora_projektu_5') ):
												$person5 = get_field('wybierz_autora_projektu_5');
												$person_id5 = $person5['ID'];
												$user_info5 = get_userdata($person_id5);
												$email5 = $user_info5->user_email;
												array_push($multiple_recipients, $email5);
											else:
												$person_id5 = '';
												$user_info5 = '';
											endif;

											if( get_field('wybierz_autora_projektu_6') ):
												$person6 = get_field('wybierz_autora_projektu_6');
												$person_id6 = $person6['ID'];
												$user_info6 = get_userdata($person_id6);
												$email6 = $user_info6->user_email;
												array_push($multiple_recipients, $email6);
											else:
												$person_id6 = '';
												$user_info6 = '';
											endif;

											if( get_field('wybierz_autora_projektu_7') ):
												$person7 = get_field('wybierz_autora_projektu_7');
												$person_id7 = $person7['ID'];
												$user_info7 = get_userdata($person_id7);
												$email7 = $user_info7->user_email;
												array_push($multiple_recipients, $email7);
											else:
												$person_id7 = '';
												$user_info7 = '';
											endif;

											if( get_field('wybierz_autora_projektu_8') ):
												$person8 = get_field('wybierz_autora_projektu_8');
												$person_id8 = $person8['ID'];
												$user_info8 = get_userdata($person_id8);
												$email8 = $user_info8->user_email;
												array_push($multiple_recipients, $email8);
											else:
												$person_id8 = '';
												$user_info8 = '';
											endif;

											if( get_field('wybierz_autora_projektu_9') ):
												$person9 = get_field('wybierz_autora_projektu_9');
												$person_id9 = $person9['ID'];
												$user_info9 = get_userdata($person_id9);
												$email9 = $user_info9->user_email;
												array_push($multiple_recipients, $email9);
											else:
												$person_id9 = '';
												$user_info9 = '';
											endif;

											if( get_field('wybierz_autora_projektu_10') ):
												$person10 = get_field('wybierz_autora_projektu_10');
												$person_id10 = $person10['ID'];
												$user_info10 = get_userdata($person_id10);
												$email10 = $user_info10->user_email;
												array_push($multiple_recipients, $email10);
											else:
												$person_id10 = '';
												$user_info10 = '';
											endif;
											
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

            <?php 
                  $wiadomosc = htmlspecialchars($_POST['name']);
             ?>
            
           

								<?php
							$subj = 'Prośba o uzupełnienie podsumowania sesji';
							$body = 'Proszę uzupełnij podsumowanie sesji dotyczące projektu'. $tytuldoprojektu .'. Dziękuję! Dodatkowa wiadomość od konsultanta:'. $wiadomosc .' ';
							wp_mail( $multiple_recipients, $subj, $body );

						}
						?>
						<!-- end wysylanie wiadomosci -->

					</div>

				</div>

			</div>
		</div>

				<?
					}
				?>


	<!-- END jezeli wpis chce ogladac konsultant lub superwizor -->














				<!-- Pobieranie opcji -->
				<?php $author_id=$post->post_author; ?>
				<?php $current_user_id = get_current_user_id(); ?>

				<!-- autor wchodzi w sesję -->
				<!--

				Jeżeli to jest autor który ma takie samo ID jak autor przypisany projektowi do ktorego nalezy sesja

				Pobieram znak specjalny sesji, sprawdzam który projekt ma taki znak, a potem biorę ID projektu i sprawdzam
				Czy ID obecnego autora zgadza się z ID autora przypisanego do sesji



				-->
	      <?php
					$current_user = wp_get_current_user(); 	// pobieram obecnego uzytkownika
					$ID_tegousera = $current_user->ID; 			// pobieram ID zalogowanego usera

					$ID_tworcywpisu = $post->post_author;		//pobieram ID tworcy wpisu

					$znakspecjalnysesji = get_field('wlasne_oznakowanie_projektu'); //znak specjalny sesji

					//Sprawdzam, który projekt ma taki znak i biorę jego ID
					?>
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

				<?php


	      	if ( (get_user_role() == 'autor' && $person_id == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id2 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id3 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id4 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id5 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id6 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id7 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id8 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id9 == $ID_tegousera)
					or (get_user_role() == 'autor' && $person_id10 == $ID_tegousera)
				) {
	      ?>

				<!-- wyswietlanie sesji do edycji pol przez autora -->

				<!-- wylaczenie widocznosci pol -->

				<style>
					#acf-praca_domowa_autor, #acf-raport_ze_spotkania, #acf-numer_sesji, #acf-czas_trwania_sesji, #acf-data_sesji, #acf-cel_na_sesję, #acf-temat_sesji, #acf-praca_domowa, #acf-co_było_ok, #acf-co_mogło_pojść_lepiej {
						display: none;
					}
					#acf-praca_domowa_autor:after{
						  /*position : absolute;
						  left     : 0;
					    top      : 0;
					    width    : 100%;
					    height   : 100%;
					    content  :' '; */
						}
					#wp-wysiwyg-acf-field-praca_domowa_autor-587f3dfb3a0e9-editor-tools {
						display: none;
					}
				</style>

				<!-- koniec wylaczenie widocznosci pol -->

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
								$linkdoprojektu = get_permalink();
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

	<div class="schowanedodruku">
	  <a href="<?php echo $linkdoprojektu; ?>" style="color: #fff;">
				<button class="btn-info">
					< Cofnij do projektu
				</button>
	  </a>
				<button class="btn-info" onclick="drukuj()">Drukuj</button>
				<button class="btn-info" onclick="glowna()">Wróc na główną</button>
	</div>
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

				<!-- css druk -->
					<style>
					@media print
	   				{
							#mceu_203 {
								display: none;
							}
							#wp-wysiwyg-acf-field-co_moglo_pojsc_lepiej_autor-58da45b1ef6c7-editor-tools {
								display: none;
							}
						}
					</style>
				<!-- END css druk -->

				<ul class="nav nav-tabs" style="margin-top: 30px;">
							<li class="active">
								<a  href="#1" data-toggle="tab">Sesja edycja</a>
							</li>
								<!--<li><a href="#2" data-toggle="tab">Sesja druk</a>
							</li> -->
						</ul>

							<div class="tab-content">
								<div class="tab-pane active" id="1">


				<div class="row">
					<div class="col-md-12">
				<?php

					 $args = array(
								'field_groups' => array('sesjaautor'), // Field Group name
								'post_id' => 'new_post',
								'new_post' => array(
										'post_type' => 'projekt',
										'post_status' => 'publish'
								 ),
								'submit_value' => 'Edytuj sesje'
						);
						acf_form();
				?>
				<!-- koniec wyswietlanie sesji do edycji pol przez autora -->
			  <!-- koniec panel opcji -->

			</div>

			<div class="col-md-12">

				<div class="ramkasesja" style="margin-top: 20px;">
					<h4 class="ladnaczcionka">Praca domowa</h4>

				<?php

				$value = get_field( "praca_domowa_autor" );

				if( $value ) {

					echo $value;

				} else {

					echo 'Wygląda na to, że nie ma pracy domowej.';

				}

				?>

			</div>


			<div class="ramkasesja" style="margin-top: 20px;">
				<h4 class="ladnaczcionka">Raport ze spotkania</h4>

			<?php

			$value2 = get_field( "raport_ze_spotkania" );

			if( $value2 ) {

				echo $value2;

			} else {

				echo 'Wygląda na to, że nie ma jeszcze raport ze spotkania.';

			}

			?>

		</div>

			</div>


				<!-- praca domowa tylko dla autora -->



				<!-- END praca domowa tlyko dla autora -->

	      <!-- koniec sprawdzania uzytkownika wpisu i autora -->
	       <?php
	      } else {
	      //echo 'Nie masz uprawnie do tego materiału. Czynność została zarejestrowana przez nasz system.';
	      }
	      ?>
	     <!-- koniec sprawdzania uzytkownika wpisu i autora -->

	</div>
		 </div>

		 <?php
		 	if ( !get_user_role() == 'konsultant') {
		 ?>

	 		<div class="tab-pane" id="2">

				<div class="row">

					<div class="col-md-12">
	<?php
if ( is_user_logged_in() ) { ?>
						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Numer sesji:</span> <br /><?php the_field('numer_sesji'); ?></p>

						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Przygotowanie:</span> <br /><?php the_field('cel_na_sesje_autor'); ?></p>

						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Przebieg sesji:</span> <br /><?php the_field('temat_sesji_autor'); ?> </p>

						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Satysfakcja:</span> <br /><?php the_field('co_bylo_ok_autor'); ?></p>

						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Udoskonalanie:</span> <br /><?php the_field('co_moglo_pojsc_lepiej_autor'); ?></p>

						<p class="opis2" style="font-size: 18px !important;"> <span class="opisy1" style="font-size: 16px !important; color: #1abc9c; font-weight: 400;">Praca domowa:</span> <br />
						
			<?php

			$value = get_field( "praca_domowa_autor" );

			if( $value ) {

				echo $value;

			} else {

				echo 'Wygląda na to, że nie ma pracy domowej.';

			}
                           }
		} // koniec if autor
			?>
	</p>


	 		</div>
		</div>

			</main><!-- #main -->
		</div><!-- #primary -->


	</div><!-- .row -->
	</div><!-- .container -->

	<?php get_footer(); ?>
