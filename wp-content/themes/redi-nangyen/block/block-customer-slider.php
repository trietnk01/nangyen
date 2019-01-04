<!-- 1 line -->
<div class="sect-customer-sldier customer-sldier-1 p-pt-85 p991-pt-35 p-pb-50 p991-pb-20">
	<div class="container">
		<h2 class="heading-sect bg-text wow slideInUp">
		<!-- <img src="<?php echo P_IMG_NY ?>/text-camnhancuakhachhang.png" alt="img"> -->
			Cảm nhận của khách hàng
		</h2>
		<div class="wrap-owl-carousel wow slideInLeft" data-wow-delay="0.5s">
			<div class="owl-customer-slider-1 owl-carousel owl-theme">
				<?php 
				$source_customer=get_field('hp_customer_rpt','option');
				?>
				<?php foreach ($source_customer as $key => $value) { ?>
				<div class="box-customer">
					<div class="row">
						<div class="col-12 col-lg-5 col-xl-4">
							<div class="col-left">
								<div class="-photo">
									<img src="<?php echo $value['hp_cam_nhan_customer_avatar']; ?>" class="img-responsive" alt="img">
								</div>
								<div class="col-title">
									<h4 class="-title f2-df">
									
									<?php echo $value['hp_cam_nhan_customer_name']; ?>
									
									</h4>
									<p class="position">
										<?php echo $value['hp_cam_nhan_customer_position']; ?>
									</p>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-7 col-xl-8">
							<div class="-content">
								
								
								<div class="-des">
									<?php echo $value['hp_cam_nhan_customer_message']; ?>									
								</div>
								
							</div>
						</div>
					</div>															
				</div>
				
				<?php } ?>
			</div>
			<!-- <div class="owl-control left-right-fa">
						<div class="btn-left">
									<i class="fa fa-angle-left" aria-hidden="true"></i>
						</div>
						<div class="btn-right">
									<i class="fa fa-angle-right" aria-hidden="true"></i>
						</div>
			</div> -->
		</div>
	</div>
	
</div>
<!-- /1 line -->