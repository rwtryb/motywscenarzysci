<?php
/**
 * Template Name: START
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

get_header(); ?>

<?php get_template_part( 'content', 'header' ); ?>

<?php //get_sidebar( 'home' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main" role="main">

			<!-- uzytkownik zalogowany jako autor -->
			<?php
				if (get_user_role() == 'autor') {
				?>
			<div class="container spacer">
					<div class="row">
						<div class="col-md-12">

							<div class="text-left">
								<?php
									$current_user = wp_get_current_user();
									echo '<strong>Twój nick:</strong> ' . $current_user->user_login . ' ';
									echo '<strong>Twój e-mail:</strong> ' . $current_user->user_email . ' ';
									echo '<strong>Twoja rola:</strong> '. get_user_role(). ' ';
									//echo 'User first name: ' . $current_user->user_firstname . '<br />';
									//echo 'User last name: ' . $current_user->user_lastname . '<br />';
									//echo 'User display name: ' . $current_user->display_name . '<br />';
									//echo 'User ID: ' . $current_user->ID . '<br />';
								?>
							</div>

							<h4>Jak działa platforma</h4>

							<p style="font-size: 14px !important;">Witaj. Ta strona pomaga nam w ciągłym doskonaleniu pracy naszych Konsultantów Scenariuszowych. Wejdź do projektu, następnie do sesji i wypełnij proszę pole PODSUMOWANIE SESJI po każdym odbytym spotkaniu z Konsultantem.</p>
							<p style="font-size: 14px !important;">Nowe sesje zakłada Twój Konsultant i on także wpisuje pracę domową jaką ustalacie w trakcie pracy oraz przekazuje ewentualne pliki pomoc. Tutaj możesz także zadawać pytania Konsultantowi w formie komentarzy pomiędzy spotkaniami.
							</p>

							<p style="font-size: 14px !important;">Powodzenia i dziękujemy za Twoje komentarze. Jeśli masz jakieś uwagi do działania tej aplikacji lub masz pytania napisz do mnie - na dole strony jest mój mail. </p>
							<p style="font-size: 14px !important;">Pozdrawiam, Andrzej Gorgoń, StoryLab.pro</p>
						</div>
					</div>
			</div>

			<div class="container spacer">
					<div class="row">

						<div class="col-md-12">
							<h4>Projekty w których bierzesz udział</h4>

							<!-- petla wyswietlajaca projekty uzytkownika -->

								<?php $user = wp_get_current_user(); ?>

									<!--petla od wyswietlenia projektu -->

								<?php
								// WP_Query arguments
								$nickusera = $current_user->user_login;
								$args = array(
									'post_type'              => array( 'projekt' ),
									'meta_query' => array(
										array(
											'relation' => 'OR',
                  		array(
													'key' => 'wybierz_autora_projektu',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_2',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_3',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_4',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_5',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_6',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_7',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_8',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_9',
													'value' => get_current_user_id(),
													'compare' => '='
											),
											array(
													'key' => 'wybierz_autora_projektu_10',
													'value' => get_current_user_id(),
													'compare' => '='
											),
										)
									)
								);



								// The Query
								$query = new WP_Query( $args );

								// Variable to call WP_Query.
								$the_query = new WP_Query( $args );

								if ( $the_query->have_posts() ) :
									// Start the Loop
									while ( $the_query->have_posts() ) : $the_query->the_post();

												echo '<blockquote><p>';
												echo '<a href="'.get_permalink().'">';
												echo get_field("tytuł_projektu");
												echo '</a>';
												echo '</p></blockquote>';

										// End the Loop
										endwhile;
									else:
										// If no posts match this query, output this text.
										_e( 'Jeszcze nie dodałeś żadnej sesji', 'textdomain' );
									endif;
									wp_reset_postdata();
									?>

									<!--koniec petli wyswietlajacej projekt -->
						</div>

					</div>
			</div>

			<div class="container spacer">
					<div class="row">

						<div class="col-md-4">

							<!-- <p>informacje dodatkowe</p> -->

						</div>

						<div class="col-md-8">

							<!-- <p>informacje dodatkowe</p> -->

						</div>
			<!-- koniec petli czy to autor -->
			<?php
				}
			?>
			<!-- koniec uzytkownika zalogowanego jako autor -->





			<!-- uzytkownik zalogowany jako konsultant -->

			<?php
				if (get_user_role() == 'konsultant') {
				?>

				<div class="container spacer">
					<div class="row">
						<div class="col-md-12">
                            
                            

							<div class="text-left" style="width: 100%;min-height: 80px;">
								<?php
                                    //echo '<span style="margin-top: -20px;"';
									$current_user = wp_get_current_user();
                                    echo get_wp_user_avatar( $current_user->ID, 64 );
                                    //echo '</span>';
									echo '<h3>' . $current_user->user_login . '</h3><br> ';
                                    echo '<strong>'. get_user_role(). '</strong><br> ';
									echo '<span>' . $current_user->user_email . '</span> ';
									
									//echo 'User first name: ' . $current_user->user_firstname . '<br />';
									//echo 'User last name: ' . $current_user->user_lastname . '<br />';
									//echo 'User display name: ' . $current_user->display_name . '<br />';
									//echo 'User ID: ' . $current_user->ID . '<br />';
								?>
							</div>                           
                            
                            <style>
                                #main > div:nth-child(1) > div > div > div.text-left > img {
                                    margin-top: -20px;
                                    padding-bottom: 40px;
                                }
                                #main > div:nth-child(1) > div > div > div.text-left > strong:first-letter {
                                    text-transform: uppercase;
                                }
                                #main > div:nth-child(1) > div > div > div.text-left > strong {
                                    margin-top: -33px;
                                    float: left;
                                }
                                #main > div:nth-child(1) > div > div > div.text-left > span {
                                    float: left;
                                    margin-top: -34px;
                                    font-family: "Raleway", Arial, "Helvetica Neue", sans-serif;
                                }
                                #main > div:nth-child(1) > div > div > div.text-right {
                                    margin-top: -36px;
                                }
                            </style>
                       
                           
                            
                            <div class="text-right">
                                <h4 data-toggle="collapse" data-target="#demo"><strong style="font-size: 14px;">Jak działa platforma</strong> <span class="glyphicon glyphicon-menu-down"></span></h4>
                                
                                <hr>
                                
                                 <div id="demo" class="collapse text-left">
                                        <p style="font-size: 14px !important;">Zakładasz tutaj projekty komercyjne jak i wolontariackie z Autorami lub Producentami z którymi podpisaliśmy umowę. <br>
                                             Aby rozpocząć projekt kliknij przycisk DODAJ PROJEKT.<br>
                                             Wybierz Autora lub kilku Autorów z którym pracujesz w projekcie. Dodaj tytuł projektu oraz informacje o nim. Dodawaj kolejne sesje. Sesje pojawiają się także automatycznie u Twojego Autora.
                                             Pola w sesji uzupełniasz przed i po sesji. Pola, które wypełniasz są widoczne tylko dla Ciebie oraz Twojego Superwizora. Wspólnym polem które Ty wypełniasz, a widzi je Autor - jest OPIS PROJEKTU, PRACA DOMOWA , RAPORT Z SESJI. Do projektu możesz dodać plik pomocy - funkcję znajdziesz w EDYTUJ PROJEKT > PLIKI PROJEKTU.
                                             <br>
                                         </p>
                                             <p style="font-size: 14px !important;">Ty widzisz treść którą wpisuje Autor. Zawsze możesz wrócić do swoich projektów i sesji oraz możesz je edytować. Po zakończeniu projektu możesz go zamknąć w zakładce edytuj projekt. </p>
                                             <p style="font-size: 14px !important;">Wpisuj dokładnie czas trwania sesji - zlicza się on do Twojego stażu. Pilnuj by Autorzy wypełniali swoje pole PODSUMOWANIE SESJI. By im o tym przypomnieć użyj ikony > WYŚLIJ WIADOMOŚĆ.</p>

                                                    <p style="font-size: 14px !important;">
                                                    Pozdrawiam, Andrzej Gorgoń
                                                    </p>
                                    </div>
                            </div>
                            
						</div>
					</div>
			</div>

			<div class="container spacer">
					<div class="row">

						<div class="col-md-4">

							<div class="row">

								<div class="col-md-12">
									<a href="http://scriptcoach.storylab.pro/dodaj-projekt/">
										<button type="button" class="btn btn-primary btn-lg" style="margin-top: 5px;">Dodaj projekt</button>
									</a>
                                    
                                    <br>
                                    <br>
                                    
                                    <a href="http://scriptcoach.storylab.pro/dodaj-dyzur/">
										<button type="button" class="btn" style="margin-top: 5px;min-width: 206.23px;height: 40px;font-size: 20px;">Dodaj dyżur</button>
									</a>
                                    
                                    
                                    <div class="dyzury" style="margin-top: 40px;">
                                        
                                        <strong data-toggle="collapse" data-target="#dyzury" style="font-size: 14px;">Archiwum dyżurów <span class="glyphicon glyphicon-menu-down"></span></strong>
                                        
                                        <div id="dyzury" class="collapse text-left">
                                            <?php get_template_part( 'dyzur' );  ?>
                                        </div>
                                        
                                    </div>
                            
								</div>

							</div>
                            
						</div>
                        

						<div class="col-md-4">

							<div class="row">


								<div class="col-md-12">
									<h3>Twoje projekty</h3>

							<?php
								// WP_Query arguments
								$loginusera = $current_user->user_login;
								$args = array(
									'post_type'              => array( 'projekt' ),
									'author_name'            => $loginusera,
								);

								// The Query
								$query = new WP_Query( $args );

								// Variable to call WP_Query.
								$the_query = new WP_Query( $args );

								if ( $the_query->have_posts() ) :
									// Start the Loop
									while ( $the_query->have_posts() ) : $the_query->the_post();

									?>


										<a href="<?php echo get_permalink(); ?>">
											<?php
          							$post_id = get_the_ID();
          							$nazwaprojektu = get_field( 'nazwa_robocza_projektu', $post_id );
												$person = get_field('wybierz_autora_projektu');
												$person_id = $person['ID'];
												$user_info = get_userdata($person_id);
                                                $first_name = $user_info->first_name;
                                                $last_name = $user_info->last_name;
                                                

												echo '<blockquote><p>';
												echo '<a href="'.get_permalink().'">';
												echo '<strong>'.get_field("tytuł_projektu").'</strong>';
												echo ' | <span style="color: #000;">autor: '.$first_name. ' '. $last_name  .' </span> ';
												echo '</a>';
												echo '<small style="font-size: 65%;"> Rozpoczęcie projektu: ';
													$dateformatstring = "l d F, Y";
													$unixtimestamp = strtotime(get_field('data_startu_projektu'));
												echo date_i18n($dateformatstring, $unixtimestamp);
												echo "</small>";
                    
                                                //czas pracy nad projektem
                                                if( get_field('czaspracynadprojektem') ): 
                                                    echo '<small style="font-size: 65%;">';
                                                    echo 'Czas pracy nad projektem: ' .get_field("czaspracynadprojektem").'';
                                                    echo '</small>';
                                                endif;
                                                //END czas pracy nad projektem   
                    
                                                // status projektu ilość_odbytych_sesji  
                                                if( get_field('status_projektu') ):
                                                    echo '<small style="font-size: 65%;">';
                                                    $field = get_field_object('status_projektu');
                                                    $value = $field['value'];
                                                    $label = $field['choices'][ $value ];
                                                    echo 'Postęp: ' . get_field('ilość_odbytych_sesji'). ' | ' .$value. ' ';
                                                    echo '</small>';
                                                endif;
                    
                                                
                                                // END status projektu
                    
                                                // status projektu  
                                                if( get_field('wolontariat') ):
                                                    echo '<small style="font-size: 65%;">';
                                                    $field = get_field_object('wolontariat');
                                                    $value = $field['value'];
                                                    $label = $field['choices'][ $value ];
                                                    echo 'Wolontariat: ' .$value. '';
                                                    echo '</small>';
                                                endif;
                                                // END status projektu
                    
												echo '</p></blockquote>';

												?>

                                               


										</a>


									<?php
										// End the Loop
										endwhile;
									else:
										// If no posts match this query, output this text.
										_e( 'Jeszcze nie dodałeś żadnego projektu', 'textdomain' );
									endif;
									wp_reset_postdata();
									?>


								</div>



								</div>


							</div>
                        
                            <div class="col-md-4">                          
                                   
                                <?php get_template_part( 'sumagodzin' );  ?>  
                            </div>


						</div>

					</div>
			</div>



			<?php
				}
			?>

			<!-- koniec uzytkownika zalogowanego jako konsultant -->
                
                
                
                
                

			<!--user jest superwizorem -->

			<?php
				if (get_user_role() == 'superwizor') {
				?>
                
                <!-- edycja pazdziernik 2017 -->
                <!-- wszystko przniesione do oddzielnego pliku -->
                
                    <?php get_template_part( 'superwizorwidok' );  ?>  
                
                <!-- END edycja pazdziernik 2017 -->

				
				<?php
                    }
				 ?>

            <!-- END user jest superwizorem -->
                
                
                
                
                



			<!-- Informacje o uzytkowniku -->
				<div class="container spacer">
					<div class="row">
						<div class="col-md-12">
						<?php
							if ( is_user_logged_in() ) {

						?>
				</div>
					</div>
						</div>

			<!-- koniec informacji o uzytkowniku -->

			<?php
			} else {
			?>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<a href="http://scriptcoach.storylab.pro/login/">
								<h2>Logowanie</h2>
							</a>
						</div>
					    <div class="col-md-6">

								<h2>Zaloguj się, aby rozpocząć pracę.</h2>

						</div>
					</div>
				</div>
			<?php
			}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
