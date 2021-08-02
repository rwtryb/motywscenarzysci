<?php
/**
 * Template Name: Wyślij test
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

	<div id="primary" class="content-area col-md-8">
		<main id="main" class="site-main" role="main">

	<?php acf_form(array(
					'post_id'		=> 'new_post',
					'new_post'		=> array(
						'post_type'		=> 'projekt',
						'post_status'		=> 'publish'
					),
					'submit_value'		=> 'Create a new event'
				)); ?>


		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
		
</div><!-- .row -->
</div><!-- .container -->

<?php get_footer(); ?>
