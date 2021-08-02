<?php
/**
 * Template Name: Wyślij sesję
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

<div class="schowanedodruku">

			<button class="btn-info" onclick="goBack()" style="margin-left: 15px;">< Cofnij do poprzedniej strony</button>
			<button class="btn-info" onclick="glowna()">Wróc na główną</button>
			<button type="button" class="btn-info" data-toggle="modal" data-target="#myModal" style="background-color: #1abc9c !important;">Zapytaj o dostępność sali</button>
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

			<!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
     <div class="modal-dialog">

       <!-- Modal content-->
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Zapytaj o dostępność sali</h4>
         </div>
         <div class="modal-body">
           <p>Sala mieści się pod adresem XXXX. Dostępna jest od X do X. Skorzystaj z formularza, aby zapytać o dostępność w wybranym terminie lub zadzwoń do nas XXXXX.</p>
					 <?php echo do_shortcode( '[contact-form-7 id="191" title="Formularz 1"]' ); ?>
				 </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij okno</button>
         </div>
       </div>

     </div>
   </div>



		<?php acf_form(array(
					'post_id'	=> 'sesja',
					'field_groups'	=> array( 11 ),
					'return' => 'http://scriptcoach.storylab.pro/',
					'submit_value'	=> 'Dodaj nową sesję'
				)); ?>

				<!-- podstawienie oznakowania projektu -->
				<script>

				var url      = window.location.href;     // Returns full URL
				//alert (url);
				var projekt = url.split('#projekt=');
				//alert (projekt);
				var pozycja = projekt.indexOf(',');
				//alert (pozycja);
				var nazwaprojektu = projekt.slice(pozycja);
				//alert (nazwaprojektu);
				var wartosc = document.getElementsByName("fields[field_586ad242c5ae2]")[0].value;
				//alert (wartosc);
				document.getElementsByName("fields[field_586ad242c5ae2]")[0].value = nazwaprojektu;

				</script>
				<!-- koniec podstawienie oznakowania projektu -->


		</main><!-- #main -->
	</div><!-- #primary -->

	<?php //get_sidebar(); ?>

</div><!-- .row -->
</div><!-- .container -->
    
    <?php
}

else {

echo "Aj, nie powinno Ciebie tutaj być, nasz system zarejestrował to wejście."; 

};

?>

<?php get_footer(); ?>
