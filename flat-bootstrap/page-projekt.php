<?php
/**
 * Template Name: Wyślij projekt
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

<!-- nie chcemy userow niezalogowanych -->
<?php  if (is_user_logged_in()){

?>


<?php get_sidebar( 'home' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">
            
        <button onclick="myFunction2a()">Kliknij, aby dodać nastepnego autora do projektu</button> 
            
            <script>
                
                var numerek = 1;
                
                function myFunction2a() {
                    document.getElementsByClassName("field_type-user")[numerek].className += ' widzimypola';
                    numerek++;
                }
                
            </script>
            
        <!-- wylaczamy okienka tyklo 1 prelegent zostawiamy -->
            <style>
                #acf-wybierz_autora_projektu_2, #acf-wybierz_autora_projektu_3, #acf-wybierz_autora_projektu_4, #acf-wybierz_autora_projektu_5, #acf-wybierz_autora_projektu_6, #acf-wybierz_autora_projektu_7, #acf-wybierz_autora_projektu_8, #acf-wybierz_autora_projektu_9, #acf-wybierz_autora_projektu_10 {
                    display: none;
                }
                .widzimypola {
                    display: block !important;
                }
            </style>
        <!-- END wylaczamy okienka tyklo 1 prelegent zostawiamy -->
            
            
		<?php acf_form(array(
					'post_id'	=> 'projekt',
					'field_groups'	=> array( 9 ),
					'return' => 'http://scriptcoach.storylab.pro/',
					'submit_value'	=> 'Dodaj nowy projekt'
				)); ?>

		</main><!-- #main -->
        
        
        

		<!-- randomowanie nazwy roboczej projektu -->

		<script>

			    var text = "";
			    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

			    for( var i=0; i < 8; i++ )
			        text += possible.charAt(Math.floor(Math.random() * possible.length));

					document.getElementsByName("fields[field_586c0209c273e]")[0].value = text;

	</script>
	<!-- koniec randomowanie nazwy roboczej projektu -->

	<style>
		#acf-oznakowanie_projektu {
			display: none;
		}
	</style>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->

<style>
    # acf-czaspracynadprojektem {
        display: none;
    }
</style>

<?php
}

else {

echo "Aj, nie powinno Ciebie tutaj być, nasz system zarejestrował to wejście."; 

};

?>

<!-- praca nad schowaniem userow -->
<?php 

    //get_current_user_id( ); 
    $useridpole = "user_".get_current_user_id(); 
    //echo "ttt";
    //echo $useridpole;
    $author_field2 = get_field('przypisani_do_konsultanta_autorzy', $useridpole );
    echo '<div id="userzylistadobra" style="display: none;">';
    echo $author_field2;
    echo '</div>';
?>



<style>
    #acf-field-wybierz_autora_projektu > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_2 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_3 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_4 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_5 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_6 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_7 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_8 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_9 > optgroup > option {
        display: none;
    }
    #acf-field-wybierz_autora_projektu_10 > optgroup > option {
        display: none;
    }
    
    .showelement {
        display: block !important;
    }
</style>

<script>
    var node22 = document.getElementById('userzylistadobra');
    //console.log(node22.textContent);
    var textnode = node22.textContent;
    var peoplefromhide = textnode.split(",");
    //console.log(peoplefromhide);

    //for(var i=0;i<peoplefromhide.length;i++){
    //console.log(peoplefromhide[i]); 
    //}
    
for(var i=0;i<peoplefromhide.length;i++){
    
    //petla dla autora1
    jQuery("#acf-field-wybierz_autora_projektu > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    });
    //petla dla autora 2
    jQuery("#acf-field-wybierz_autora_projektu_2 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    });   
    //petla dla autora 3
    jQuery("#acf-field-wybierz_autora_projektu_3 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 4
    jQuery("#acf-field-wybierz_autora_projektu_4 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 5
    jQuery("#acf-field-wybierz_autora_projektu_5 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 6
    jQuery("#acf-field-wybierz_autora_projektu_6 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 7
    jQuery("#acf-field-wybierz_autora_projektu_7 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 8
    jQuery("#acf-field-wybierz_autora_projektu_8 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 9
    jQuery("#acf-field-wybierz_autora_projektu_9 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    }); 
    //petla dla autora 10
    jQuery("#acf-field-wybierz_autora_projektu_10 > optgroup > option").each(function() {
        //console.log("dziala");

        if (this.text == peoplefromhide[i]) {
            //console.log("jestem w ifie");
            this.classList.add("showelement");
        }
    });     
    
        //koniec for
        }
        //koniec for
    </script>

<!-- END praca nad schowaniem userow -->

<?php get_footer(); ?>
