/* Delete everything between <div class="site-page-content"> and </div><!-- .site-page-content --> to get rid of the latest posts on the home page. 
* Updates to the theme cause it to be overwritten of course
* Add a &nbsp; to let the footer breath
*/

<?php get_header(); ?>

<main id="site-main">

	<div class="site-section-wrapper site-section-page-welcome-wrapper">

	<?php if ( ( is_front_page() || is_home() ) && !is_paged() ) { ?>
	
		<?php if ( is_active_sidebar('homepage-welcome') ) { ?>
		<div class="page-intro-welcome">
			<?php dynamic_sidebar( 'homepage-welcome' ); ?>
		</div><!-- .page-intro-welcome -->
		<?php } // if Welcome sidebar has any widgets in it ?>

		<?php if ( 1 == get_theme_mod( 'endurance-display-pages', 1 ) ) {
			get_template_part( 'template-parts/content', 'home-featured' );
		} // if featured pages are activated

	}
	?>

	</div><!-- .site-section-wrapper .site-section-page-welcome-wrapper -->
		&nbsp;
	<div class="site-page-content">

	</div><!-- .site-page-content -->

</main><!-- #site-main -->

<?php get_footer(); ?>
