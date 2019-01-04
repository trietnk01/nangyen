<?php 
/*

archive

*/

$current_term = get_queried_object();
//print_r22( $current_term  );

$current_term_id = $current_term->term_id;
$current_term_taxonomy = $current_term->taxonomy;


// if (  in_array( $current_term_taxonomy , ['cate_booking','catE_contact_us']  )  ) {
// 	header("location:" . home_url() );
// 	exit;
// } 




$is_kq = true;

?>
<?php get_header() ?>

<div class="p-ptb-30 p767-ptb-20">
	<div class="container">

		<h1 class='archive-title p-mb-20'>
			<?php echo p_show_title_archive2(); ?>
		 </h1>
		
		<?php if ( p_show_des_archive2() ) { ?> 
			
			<div class='archive-description'>
				<?php echo p_show_des_archive2();  ?>
			</div>

		<?php } ?>
	</div>
</div>
<?php 
echo "<pre>".print_r(__FILE__,true)."</pre>";
?>


<div class="p-ptb-30 p767-ptb-10">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 p767-mb-20">
		
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

				  <?php if ( have_posts() ) :
							$i = 1;
							while (have_posts()) : the_post();

								echo "<div class='p-mb-30 p767-mb-20'>";
									include get_template_directory() . '/loop/loop-archive.php';
								echo "</div>";

								
								$i++;

							endwhile;

						else:

							$is_kq = false;
							include get_template_directory() . '/content/content-none.php';
							

						endif;
						?>
						
					</main><!-- #main -->

				</div><!-- #primary -->

				
				<?php global $wp_query; if ( $wp_query->max_num_pages > 1 ) {  ?>

					<div class="p-mt-50 p991-mt-30 p767-mt-20 p-empty">

						<?php include get_template_directory() . "/pagination.php" ?>
							
					</div>
					
				<?php } ?>
				
					

			</div><!-- end col -->
	

			<div class="col-12 col-md-4">
				<?php get_sidebar() ?>
			</div><!-- end col -->

		</div>
	</div>
</div>


<?php get_footer() ?>