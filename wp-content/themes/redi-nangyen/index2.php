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

		<div class="c-white f-light p-plr-180 p991-plr-0">

			<?php echo get_field('hp_about_us_excerpt','option'); ?>	

		</div>

	</div>

	

</div>



<div class="sect-trans wow slideInLeft">

	<div class="container">

		

		<div class="row row-line-trans">

			<?php for ($i=1; $i <=3 ; $i++) { ?>

			

			<div class="box-trans">

				

				<div class="-content">

					<!-- absolute -->

					<div class="-photo">

						<img src="<?php echo P_IMG_NY ?>/img-tran<?php echo $i ?>.png" class="img-df" alt="img">

						<img src="<?php echo P_IMG_NY ?>/img-tran<?php echo $i ?>-h.png" class="img-h" alt="img">

					</div>

					<!-- /absolute -->

					<h4 class="-title p-up f2-df">

					Giao hàng toàn quốc

					</h4>

					<div class="-des">

						Miễn phí vận chuyển(*)

					</div>

				</div>

				

			</div>

			

			<?php } ?>

		</div>

	</div>

	

</div>

<div class="sect-product text-center p-pt-85 p991-pt-35 p-pb-40 p991-pb-20">

	<div class="container">

		<h2 class="heading-sect bg-text wow slideInUp">

		<!-- <img src="<?php echo P_IMG_NY ?>/text-sanpham.png" alt="img"> -->

			Sản phẩm

		</h2>

		<div class="row">

			<?php for ($i=1; $i <=2 ; $i++) { ?>

			<div class="col-12 col-sm-6">

				

				<div class="box-product box-item text-center">

					<div class="-photo" style="background: url('<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">

						<!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->

					</div>

					<!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->

					<div class="-content">

						<div>

							<h4 class="-title p-up f2-df">

							<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="-link">

								TỔ YẾN TINH CHẾ 50 Gr

							</a>

							</h4>

							<div class="-price">

								<span class="sp-label">

									Giá:

								</span>

								<span class="sp-number">

									2.250.000đ

								</span>

							</div>

							<div class="-des">

								Tổ yến thô được rửa sơ bằng nước lọc, sau đó dùng phương pháp thẩm thấu ngược để hạn chế tổ yến ngâm lâu trong nước...

							</div>

							<div class="text-center wrap-btn-viewall">

								<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

							</div>

						</div>

						

					</div>

					

				</div>

			</div>

			<?php } ?>

			<?php for ($i=1; $i <=4 ; $i++) { ?>

			<div class="col-12 col-lg-12">

				

				<div class="box-product box-item text-center">

					<div class="-photo" style="background: url('<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg') no-repeat center/cover; padding-top: calc(100% / (1140 / 555));">

						<!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->

					</div>

					<!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->

					<div class="-content">

						<div>

							<h4 class="-title p-up f2-df">

							<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="-link">

								TỔ YẾN TINH CHẾ 50 Gr

							</a>

							</h4>

							<div class="-price">

								<span class="sp-label">

									Giá:

								</span>

								<span class="sp-number">

									2.250.000đ

								</span>

							</div>

							<div class="-des">

								Tổ yến thô được rửa sơ bằng nước lọc, sau đó dùng phương pháp thẩm thấu ngược để hạn chế tổ yến ngâm lâu trong nước...

							</div>
							<div class="text-center wrap-btn-viewall">

								<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

							</div>

						</div>

						

					</div>

					

				</div>

			</div>

			<?php } ?>

			<?php for ($i=1; $i <=2 ; $i++) { ?>

			<div class="col-12 col-sm-6">

				

				<div class="box-product box-item text-center">

					<div class="-photo" style="background: url('<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">

						<!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->

					</div>

					<!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->

					<div class="-content">

						<div>

							<h4 class="-title p-up f2-df">

							<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="-link">

								TỔ YẾN TINH CHẾ 50 Gr

							</a>

							</h4>

							<div class="-price">

								<span class="sp-label">

									Giá:

								</span>

								<span class="sp-number">

									2.250.000đ

								</span>

							</div>

							<div class="-des">

								Tổ yến thô được rửa sơ bằng nước lọc, sau đó dùng phương pháp thẩm thấu ngược để hạn chế tổ yến ngâm lâu trong nước...

							</div>
							<div class="text-center wrap-btn-viewall">

								<a href="<?php echo site_url( 'san-pham-chi-tiet',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

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

<?php include get_template_directory() . "/block/block-customer-slider.php" ?>

<div class="line-bg-gradient" style="height: 6px;"></div>

<div class="clearfix"></div>

<!-- sect news -->

<div class="sect-news p-pt-85 p991-pt-35 p-pb-40 p991-pb-20 wow slideInUp">

	<div class="container">

		

		

		<h2 class="heading-sect text-center bg-text p-mb-50-i p991-mb-20-i">

		<!-- <img src="<?php echo P_IMG_NY ?>/text-gochiase.png" alt="img"> -->

			Góc chia sẻ	

		</h2>

		<div class="owl-carousel owl-theme slider-banner slider-news">

			<?php for ($i=1; $i <=2 ; $i++) { ?>

			<div class="wrap-sect-news-line">

			<div class="col col-left">

				<div class="box-news box-news-larger xs-box-list">

					<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-photo" style="background: url('<?php echo P_IMG_NY ?>/hinh-tin-tuc-1.jpg')no-repeat center/cover; padding-top: calc(100% / (586 / 550));">

					</a>

					<div class="-content">

						<h4 class="-title">

						<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-link">

							Visiting paris on a budget how to make travel

						</a>

						</h4>

						<div class="-date d-none d-sm-block">

							<img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> 30.12.2018

						</div>

						<div class="-date d-block d-sm-none" style="color:#7f7f7f;">

							<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> 30.12.2018

						</div>

						<div class="-des">

							<p class="d-none d-sm-block">

								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer...	

								<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="btn-viewmore">Xem chi tiết</a>								

							</p>

							

							<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="btn-viewmore d-block d-sm-none">Xem chi tiết</a>

							

						</div>

						

					</div>

				</div>

			</div>

			<div class="col col-right">

				<div class="box-news box-news-list">

					<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-photo order-lg-2 box-link-hover" style="background: url('<?php echo P_IMG_NY ?>/hinh-tin-tuc-2.jpg')no-repeat center/cover; padding-top: 47%;">

					</a>

					<div class="-content order-lg-1">

						<h4 class="-title">

						<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-link">

							Visiting paris on a budget how to make travel videos paris on a budget

						</a>

						</h4>

						<div class="-date">

							<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> 30.12.2018

						</div>

						

						<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="btn-viewmore">Xem chi tiết</a>

						

					</div>

				</div>

				<div class="box-news box-news-list">

					<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-photo box-link-hover" style="background: url('<?php echo P_IMG_NY ?>/hinh-tin-tuc-3.jpg')no-repeat center/cover; padding-top:47%;">

					</a>

					<div class="-content">

						<h4 class="-title">

						<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-link">

							Visiting paris on a budget how to make travel videos paris on a budget

						</a>

						</h4>

						<div class="-date">

							<img src="<?php echo P_IMG_NY ?>/icon-lich2.png" class="img-responsive" alt="img"> 30.12.2018

						</div>

						

						<a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="btn-viewmore">Xem chi tiết</a>

						

					</div>

				</div>

			</div>

		</div>

		<?php } ?>

		</div>

		

		<div class="text-center">

			<a href="<?php echo site_url( 'goc-chia-se',null ); ?>" class="btn-viewall f2-df p-up">Xem tất cả</a>

		</div>

	</div>

</div>

<!-- /sect news -->



<?php get_footer() ?>