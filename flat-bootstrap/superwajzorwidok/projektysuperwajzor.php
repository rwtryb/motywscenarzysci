<h2>Projekty</h2>

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