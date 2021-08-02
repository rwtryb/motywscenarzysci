<h3>Łącznie godzin</h3>

<!-- godziny z projektow -->

<?php $minutypracy = 0; ?>

 <?php
								// WP_Query arguments
                                 $current_user = wp_get_current_user();
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


										
											<?php
          							$post_id = get_the_ID();
          							$nazwaprojektu = get_field( 'nazwa_robocza_projektu', $post_id );
												$person = get_field('wybierz_autora_projektu');
												$person_id = $person['ID'];

												//if person id is null
												//if($person_id = null) {
												//	$person_id = $person[1];
												//}

												$user_info = get_userdata($person_id);
                                                $first_name = $user_info->first_name;
                                                $last_name = $user_info->last_name;

                                                    //echo '<br> |';
                                                    //echo get_field("czaspracynadprojektem");
                                                    $czasprojekt = get_field('czaspracynadprojektem');
                                                    //echo substr($czasprojekt, 0, 2);
                                                    //echo 'minutki<br> |';

                                                    $minutki = get_field('czaspracynadprojektem');
                                                    $minutypracymoje = strstr($minutki, ".");
                                                    //echo $minutypracymoje;

                                                    //czas ogolny projekty minuty
                                                    //echo '<br>'.substr($minutypracymoje, 1, 3);
                                                    $minutypracy +=(substr($minutypracymoje, 1, 3));  
                                                    //END czas ogolny projekty minuty

                                                    //czas ogolny projekty godzina
                                                    $minutypracy += 60*(substr($czasprojekt, 0, 2));
                                                    //END czas ogolny projekty godzina

                                                    //echo '<br> |';
            

												?>

                                               


									


									<?php
										// End the Loop
										endwhile;
									else:
										// If no posts match this query, output this text.
										_e( 'Jeszcze nie dodałeś żadnego projektu', 'textdomain' );
									endif;
									wp_reset_postdata();
									?>

<!-- END godziny z projektow -->


<!-- godziny dyzurow -->

    <?php
								// WP_Query arguments
                                $current_user = wp_get_current_user();
								$loginusera = $current_user->user_login;
								$args = array(
									'post_type'              => array( 'dyzur' ),
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

                                    <p>
										      
                                                            
                                            <?php
                                                //echo get_field('liczbagodzin');
                                                $czas = get_field('liczbagodzin');
                                                $minutypracy += substr($czas, 3, 4);
                                                $minutypracy += 60*(substr($czas, 0, 2));
                                                //echo '<br>|';
                                                //echo substr($czas, 0, 2);
                                            ?>

                                     </p>

									<?php
										// End the Loop
										endwhile;
									else:
										// If no posts match this query, output this text.
										_e( 'Jeszcze nie dodałeś żadnego dyżuru', 'textdomain' );
									endif;
									wp_reset_postdata();
				                ?>

                                <p>
                                    
                                    <?php 
                                     //echo $minutypracy; 
                                    
                                     $godzin = floor($minutypracy/60);  // liczba pełnych godzin
                                     $rmin = $minutypracy - $godzin*60;  // reszta minut
                                    
                                     echo '<h4>'. $godzin .' godzin '. $rmin .' minut</h4>';
                                    
                                    ?>
                                </p>

<!-- END godziyn dyzurow -->