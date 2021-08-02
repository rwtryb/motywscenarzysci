<?php
/**
 * Template Name: Wyślij dyzur
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

<!-- nie chcemy userow niezalogowanych -->
<?php  if (is_user_logged_in()){

?>



<?php get_template_part( 'content', 'header' ); ?>

<?php get_sidebar( 'home' ); ?>

<div class="container">
<div id="main-grid" class="row">

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

		<?php acf_form(array(
					'post_id'	=> 'dyzur',
					'field_groups'	=> array( 412 ),
					'return' => 'http://scriptcoach.storylab.pro/',
					'submit_value'	=> 'Dodaj nowy dyzur'
				)); ?>

		</main><!-- #main -->


	<style>
		#acf-oznakowanie_projektu {
			display: none;
		}
	</style>

	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

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

<?php get_footer(); ?>
