<?php

/*

	Home template default

	*/

	global $acf_pr;

?>

<?php get_header() ?>

<?php include get_template_directory() . "/block/block-banner.php" ?>

<div class="sect-about text-center p-pt-85 p991-pt-35 p-pb-40 p991-pb-20">

	<div class="container">

		<h2 class="heading-sect bg-text">		

		<?php echo get_field('hp_about_us_title','option'); ?>

		</h2>

		<div class="c-white f-light">
			<?php echo get_field('hp_about_us_excerpt','option'); ?>			
		</div>
		<?php $slogan_link_detail=get_field('hp_link_slogan_detail','option'); ?>
		<div class="slogan-readmore">
			<a href="<?php echo @$slogan_link_detail; ?>">Xem chi tiết</a>
		</div>
	</div>

	

</div>


<?php 
$source_slogan=get_field('hp_slogan','option');
if(count($source_slogan) > 0){
	?>
	<div class="sect-trans wow slideInLeft">

		<div class="container">



			<div class="row row-line-trans">

				<?php 
				$m=1;
				foreach ($source_slogan as $key => $value) {
					?>
					<div class="box-trans">



						<div class="-content">



							<div class="-photo">

								<img src="<?php echo P_IMG_NY ?>/img-tran<?php echo @$m ?>.png" class="img-df" alt="img">

								<img src="<?php echo P_IMG_NY ?>/img-tran<?php echo @$m ?>-h.png" class="img-h" alt="img">

							</div>



							<h4 class="-title p-up f2-df">

								<?php echo @$value['hp_main_title']; ?>

							</h4>

							<div class="-des">

								<?php echo @$value['hp_main_excerpt']; ?>

							</div>

						</div>



					</div>
					<?php
					$m++;
				}
				?>



				



			</div>

		</div>



	</div>
	<?php
} 
$source_id=get_field('hp_product_home','option');
$args = array(
	'post_type' => 'zaproduct',  
	'orderby' => 'id',
	'order'   => 'DESC',  
	'posts_per_page' => 8,    
	'post__in'=>$source_id,       	
);
$the_query=new WP_Query($args); 
$source_product=array();
if($the_query->have_posts()){
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$post_id=$the_query->post->ID;
		$title=get_the_title($post_id);    
		$excerpt=get_the_excerpt( $post_id );
		$content=get_the_content( $post_id);
		$permalink=get_the_permalink( $post_id );
		$price=get_field('price',$post_id);
		$source_term = wp_get_object_terms( $post_id,  'za_category' );                 
		$featured_img=get_the_post_thumbnail_url($post_id, 'full');   
		$date_post='';
		$date_post=get_the_date('d/m/Y',@$post_id);      
		$row_product["title"]=$title;
		$row_product["permalink"]=$permalink;
		$row_product["featured_img"]=$featured_img;
		$row_product["date_post"]=$date_post;
		$row_product["excerpt"]=wp_trim_words($excerpt, 30,'...' ) ;
		$row_product["price"]=p_wc_price_format_html2($price);
		$source_product[]=$row_product;    
	}
	wp_reset_postdata();
}
if(count($source_product)){
	?>
	<div class="sect-product text-center p-pt-85 p991-pt-35 p-pb-40 p991-pb-20">

		<div class="container">

			<h2 class="heading-sect bg-text wow slideInUp">

				<!-- <img src="<?php echo P_IMG_NY ?>/text-sanpham.png" alt="img"> -->

				Sản phẩm

			</h2>

			<div class="row">

				<?php for ($i=0; $i <2 ; $i++) { ?>

					<div class="col-12 col-sm-6">



						<div class="box-product box-item text-center">

							<div class="-photo" style="background: url('<?php echo @$source_product[$i]["featured_img"]; ?>')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">
								

							</div>
							<div class="-content">

								<div>

									<h4 class="-title p-up f2-df">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="-link">

											<?php echo @$source_product[$i]["title"]; ?>

										</a>

									</h4>

									<div class="-price">

										<span class="sp-label">

											Giá:

										</span>

										<span class="sp-number">

											<?php echo @$source_product[$i]["price"]; ?>

										</span>

									</div>

									<div class="-des">

										<?php echo @$source_product[$i]["excerpt"]; ?>

									</div>

									<div class="text-center wrap-btn-viewall">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

									</div>

								</div>



							</div>



						</div>

					</div>

				<?php } ?>

				<?php for ($i=2; $i <6 ; $i++) { ?>

					<div class="col-12 col-lg-12">



						<div class="box-product box-item text-center">

							<div class="-photo" style="background: url('<?php echo @$source_product[$i]["featured_img"]; ?>') no-repeat center/cover; padding-top: calc(100% / (1140 / 555));">
								

							</div>
							

							<div class="-content">

								<div>

									<h4 class="-title p-up f2-df">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="-link">

											<?php echo @$source_product[$i]["title"]; ?>

										</a>

									</h4>

									<div class="-price">

										<span class="sp-label">

											Giá:

										</span>

										<span class="sp-number">

											<?php echo @$source_product[$i]["price"]; ?>

										</span>

									</div>

									<div class="-des">

										<?php echo @$source_product[$i]["excerpt"]; ?>

									</div>
									<div class="text-center wrap-btn-viewall">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

									</div>

								</div>



							</div>



						</div>

					</div>

				<?php } ?>

				<?php for ($i=6; $i < ($the_query->post_count) ; $i++) { ?>

					<div class="col-12 col-sm-6">



						<div class="box-product box-item text-center">

							<div class="-photo" style="background: url('<?php echo @$source_product[$i]["featured_img"]; ?>')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">

								<!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->

							</div>

							<!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->

							<div class="-content">

								<div>

									<h4 class="-title p-up f2-df">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="-link">

											<?php echo @$source_product[$i]["title"]; ?>

										</a>

									</h4>

									<div class="-price">

										<span class="sp-label">

											Giá:

										</span>

										<span class="sp-number">

											<?php echo @$source_product[$i]["price"]; ?>

										</span>

									</div>

									<div class="-des">

										<?php echo @$source_product[$i]["excerpt"]; ?>

									</div>
									<div class="text-center wrap-btn-viewall">

										<a href="<?php echo @$source_product[$i]["permalink"]; ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

									</div>

								</div>



							</div>



						</div>

					</div>

				<?php } ?>

			</div>

			<div class="text-center wow slideInUp">

				<a href="<?php echo site_url( 'san-pham',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

			</div>

		</div>



	</div>
	<?php	
	wp_reset_postdata();
}
include get_template_directory() . "/block/block-customer-slider.php"
?>
<div class="line-bg-gradient" style="height: 6px;"></div>

<div class="clearfix"></div>

<?php 
$args = array(
	'post_type' => 'post',  
	'orderby' => 'id',
	'order'   => 'DESC',  
	'posts_per_page' => 3,    		
);
$the_query=new WP_Query($args); 
$source_article=array();
if($the_query->have_posts()){
	while ($the_query->have_posts()) {
		$the_query->the_post();
		$post_id=$the_query->post->ID;
		$title=get_the_title($post_id);    
		$excerpt=get_the_excerpt( $post_id );
		$content=get_the_content( $post_id);
		$permalink=get_the_permalink( $post_id );				           
		$featured_img=get_the_post_thumbnail_url($post_id, 'full');   
		$date_post='';
		$date_post=get_the_date('d.m.Y',@$post_id);      
		$row_article["title"]=$title;
		$row_article["permalink"]=$permalink;
		$row_article["featured_img"]=$featured_img;
		$row_article["date_post"]=$date_post;
		$row_article["excerpt"]=wp_trim_words($excerpt, 30,'...' ) ;		
		$source_article[]=$row_article;    
	}
	wp_reset_postdata();
}
if(count(@$source_article) > 0){
	?>
	<!-- sect news -->
	<div class="sect-news p-pt-85 p991-pt-35 p-pb-40 p991-pb-20 wow slideInUp">
		<div class="container">
			<h2 class="heading-sect text-center bg-text p-mb-50-i p991-mb-20-i">				
				Góc chia sẻ	
			</h2>
			<div class="owl-carousel owl-theme slider-banner slider-news">
				<div class="wrap-sect-news-line">
						<div class="col col-left">
							<div class="box-news box-news-larger xs-box-list">
								<a href="<?php echo @$source_article[0]['permalink']; ?>" class="-photo" style="background: url('<?php echo @$source_article[0]['featured_img']; ?>')no-repeat center/cover; padding-top: calc(100% / (586 / 550));">
								</a>
								<div class="-content">
									<h4 class="-title">
										<a href="<?php echo @$source_article[0]['permalink']; ?>" class="-link">
											<?php echo @$source_article[0]['title']; ?>
										</a>
									</h4>
									<div class="-date d-none d-sm-block">
										<img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> <?php echo @$source_article[0]['date_post']; ?>
									</div>
									<div class="-date d-block d-sm-none" style="color:#7f7f7f;">
										<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> <?php echo @$source_article[0]['date_post']; ?>
									</div>
									<div class="-des">
										<p class="d-none d-sm-block">
											<?php echo @$source_article[0]['excerpt']; ?>
											<a href="<?php echo @$source_article[0]['permalink']; ?>" class="btn-viewmore">Xem chi tiết</a>
										</p>
										<a href="<?php echo @$source_article[0]['permalink']; ?>" class="btn-viewmore d-block d-sm-none">Xem chi tiết</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col col-right">
							<div class="box-news box-news-list">
								<a href="<?php echo @$source_article[1]['permalink']; ?>" class="-photo order-lg-2 box-link-hover" style="background: url('<?php echo @$source_article[1]['featured_img']; ?>')no-repeat center/cover; padding-top: 47%;">
								</a>
								<div class="-content order-lg-1">
									<h4 class="-title">
										<a href="<?php echo @$source_article[1]['permalink']; ?>" class="-link">
											<?php echo @$source_article[1]['title']; ?>
										</a>
									</h4>
									<div class="-date">
										<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> <?php echo @$source_article[1]['date_post']; ?>
									</div>
									<a href="<?php echo @$source_article[1]['permalink']; ?>" class="btn-viewmore">Xem chi tiết</a>
								</div>
							</div>
							<div class="box-news box-news-list">
								<a href="<?php echo @$source_article[2]['permalink']; ?>" class="-photo box-link-hover" style="background: url('<?php echo @$source_article[2]['featured_img']; ?>')no-repeat center/cover; padding-top:47%;">
								</a>
								<div class="-content">
									<h4 class="-title">
										<a href="<?php echo @$source_article[2]['permalink']; ?>" class="-link">
											<?php echo @$source_article[2]['title']; ?>
										</a>
									</h4>
									<div class="-date">
										<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> <?php echo @$source_article[2]['date_post']; ?>
									</div>
									<a href="<?php echo @$source_article[2]['permalink']; ?>" class="btn-viewmore">Xem chi tiết</a>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="text-center">
				<a href="<?php echo site_url( 'goc-chia-se',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>
			</div>
		</div>
	</div>
	<!-- /sect news -->
	<?php
}
get_footer() ;
?>