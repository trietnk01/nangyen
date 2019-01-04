<?php
/*
Template name: Template giới thiệu
Template Post Type: post, page
*/
// global $hidden_breadcrum;
// $hidden_breadcrum = true;
// global $acf_pr;
?>
<?php get_header() ?>

	<article class="wrap-article-content p-ptb-85 p991-ptb-40">
		<div class="container">
			<h1 class="heading-page-center reset-pseudo">
			
			<?php echo get_field('p_gioi_thieu_title','option'); ?>
			</h1>
			<div>
				<?php the_content() ?>
				
				
			</div>
			<?php 
			$source_img=get_field('p_gioi_thieu_hinh_anh_rpt','option');
			?>
			<div class="about-line-img d-f-center">
				<?php foreach ($source_img as $key => $value) { ?>
				<div class="box-line-img">
					<img src="<?php echo @$value['p_gioi_thieu_img']; ?>" class="img-responsive" alt="img">
				</div>
				<?php } ?>
				
			</div>
			<div class="about-wrap-list">
				<?php 
				$source_p_tn_sm_rpt=get_field('p_tn_sm_rpt','option');
				foreach ($source_p_tn_sm_rpt as $key => $value) {
					?>
					<div class="row">
						<div class="col-12 col-lg-2 p-pr-0">
							<h4 class="f2-df p-fs-28 p991-fs-20">
								<?php echo @$value['p_gioi_thieu_tn_sm_title']; ?>
							</h4>

						</div>
						<div class="col-12 col-lg-10">
							<?php echo @$value['p_gioi_thieu_tn_sm_excerpt']; ?>
						</div>
					</div>
					<?php
				}
				?>								
			</div>
		</div>
		
		
	</article>
	<!-- sect about -->
	<?php get_footer() ?>