<h2> Dyżury </h2>

                            <?php
								// WP_Query arguments
								$args = array(
									'post_type'              => array( 'dyzur' ),
								);

								// The Query
								$query = new WP_Query( $args );

								// Variable to call WP_Query.
								$the_query = new WP_Query( $args );

								if ( $the_query->have_posts() ) :
									// Start the Loop
									while ( $the_query->have_posts() ) : $the_query->the_post();

									?>

                                    <blockquote><p>
										<small style="font-size: 65%;">
						
                                            <?php if( get_field('imię_nazwisko') ): ?>
                                                <?php the_field('imię_nazwisko'); ?>
                                            <?php endif; ?>
                                            |
                                            <?php if( get_field('email') ): ?>
                                                <?php the_field('email'); ?>
                                            <?php endif; ?>                                              
                                            |
                                            <?php if( get_field('liczbagodzin') ): ?>
                                                <?php the_field('liczbagodzin'); ?>
                                            <?php endif; ?>                                             

										
                                        </small>
                                        </p></blockquote>

									<?php
										// End the Loop
										endwhile;
									else:
										// If no posts match this query, output this text.
										_e( 'Jeszcze nie dodałeś żadnego dyżuru', 'textdomain' );
									endif;
									wp_reset_postdata();
				                ?>