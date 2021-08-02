<h2>Widok superwajzora</h2>
<span>edycja czwartek 05.10.2017</span>

            <div class="row">

					<div class="col-md-6">
                        
                        <!-- projekty -->
                        
                        <?php get_template_part( 'superwajzorwidok/projektysuperwajzor' );  ?> 
                        
                        <!-- END projekty -->

					</div>

					<div class="col-md-6">


                        <!-- godziny pracy -->
                            <?php get_template_part( 'superwajzorwidok/godzinypracysuperwajzor' );  ?>  
                        <!-- END godziny pracy -->
                        

					</div>

            </div>


            <div class="row">

					<div class="col-md-6">
                        
                        <!-- dyzury -->
                        
                        <?php get_template_part( 'superwajzorwidok/dyzurysuperwajzor' );  ?> 
                        
                        <!-- END dyzury -->

					</div>

					<div class="col-md-6">

                        <!-- lista uzytkownikow -->
                        
                        <?php get_template_part( 'superwajzorwidok/uzytkownicylistasuperwajzor' );  ?>
                        
                        <!-- END lista uzytkownikow -->

                        

					</div>

            </div>