<?php
/*
Template name: Template trang chủ
Template Post Type: post, page
*/


	global $acf_pr;
?>
<?php get_header() ?>
<!-- content -->
<div class="sect-banner">
	<div class="slider-banner owl-carousel owl-theme">
		<?php 		
		$source_banner=get_field('op_hp_banner_rpt'.$acf_pr,'option');			
		?>
		<?php foreach ($source_banner as $key => $value) { ?>
			<div class="slider-banner-item">
				<img src="<?php echo $value["op_hp_banner_img".$acf_pr]; ?>" class="img-full" alt="banner">
				<div class="wrap-container-banner d-none d-md-block">

				</div>			
			</div>
		<?php } ?>
	</div>
	<div class="slideshow">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="slider-banner-v2">
						<form class="slider-banner-box-inner slider-banner-caption_v2 -center-left">
							<?php 
							$p_checkin_date="";
							$p_checkout_date="";
							$p_checkin_day="";
							$p_checkout_day="";
							$weekday_checkin_date="";
							$weekday_checkout_date="";

							$arr_checkin_date    = date_parse_from_format('Y-m-d',date("Y-m-d")) ;														
							$ts_checkin_date		= mktime($arr_checkin_date['hour'], $arr_checkin_date['minute'], $arr_checkin_date['second'], $arr_checkin_date['month'], $arr_checkin_date['day'], $arr_checkin_date['year']);		

							$ts_checkout_date		= mktime($arr_checkin_date['hour'], $arr_checkin_date['minute'], $arr_checkin_date['second'], $arr_checkin_date['month'], $arr_checkin_date['day']+1, $arr_checkin_date['year']);	

							$weekday_checkin_date=date('l', $ts_checkin_date);
							$weekday_checkout_date=date('l', $ts_checkout_date);

							$arr_en	= array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
							$arr_vi	= array('Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy', 'Chủ nhật');

							if(strcmp($acf_pr, "_en") != 0){
								$weekday_checkin_date	= str_replace($arr_en, $arr_vi, $weekday_checkin_date);
								$weekday_checkout_date	= str_replace($arr_en, $arr_vi, $weekday_checkout_date);
							}
							

							$arr_checkout_date=array();
							
							if(strcmp($acf_pr, "_en")==0){
								$p_checkin_date=date("m/d/Y", $ts_checkin_date);
								$p_checkout_date=date("m/d/Y", $ts_checkout_date);
								$arr_checkout_date    = date_parse_from_format("m/d/Y",$p_checkout_date) ;
							}else{
								$p_checkin_date=date("d/m/Y", $ts_checkin_date);
								$p_checkout_date=date("d/m/Y", $ts_checkout_date);								
								$arr_checkout_date    = date_parse_from_format("d/m/Y",$p_checkout_date) ;
							}
							?>
							<input type="hidden" name="p_checkin_date" value="<?php echo $p_checkin_date; ?>">							
							<input type="hidden" name="p_checkout_date" value="<?php echo $p_checkout_date; ?>">	
							<?php
							$p_link=""; 
							if(strcmp($acf_pr,"_en")==0){								
								$p_link=site_url( 'booking', null );
							}else{
								$p_link=site_url( 'dat-phong',null );
							}
							?>
							<input type="hidden" name="p_link" value="<?php echo $p_link; ?>">							
							<div class="ribbon">
								<div class="text"><?php echo t_pll('Đặt phòng','Booking'); ?></div>
							</div>
							<div>
								<div class="slider-banner-box-date">
									<div class="-title">
										<?php echo t_pll('Ngày đặt','Checkin date'); ?>
									</div>
									<div class="-number">
										<span class="checkin_date_txt"><?php echo $arr_checkin_date["day"]; ?></span>
										<input type="text" name="checkin_date" class="date-picker" >
										<i class="fa fa-angle-down"></i>
									</div>
									<div class="full-date">
										<?php echo t_pll('Tháng','Month'); ?> <?php echo $arr_checkin_date["month"] ?>, <?php echo $arr_checkin_date["year"] ?>
									</div>
									<div class="-thu">
										<?php echo $weekday_checkin_date; ?>
									</div>
								</div>
								<div class="line_booking"></div>
								<div class="slider-banner-box-date">
									<div class="-title">
										<?php echo t_pll('Ngày trả','Checkout date'); ?>
									</div>
									<div class="-number">
										<span class="checkout_date_txt"><?php echo $arr_checkout_date["day"]; ?></span>
										<input type="text" name="checkout_date" class="date-picker">
										<i class="fa fa-angle-down"></i>
									</div>
									<div class="full-date">
										<?php echo t_pll('Tháng','Month'); ?> <?php echo $arr_checkout_date["month"] ?>, <?php echo $arr_checkout_date["year"] ?>
									</div>
									<div class="-thu">
										<?php echo $weekday_checkout_date; ?>
									</div>
								</div>
								<div class="line_booking"></div>
								<div class="slider-banner-box-date slboxdate">
									<div class="title_number_of_person">
										<?php echo t_pll('Số người','Number of person'); ?>
									</div>
									<div class="number_of_person">
										<?php 
										$term_booking_number_customer = get_terms( array(
											'taxonomy' => 'za_booking_number_customer',
											'hide_empty' => false, 
											'parent' => 0 ) );                              
											?>									
											<select name="number_person_id" class="hp_number_person_id" onchange="setNumberPerson(this);" >											
												<?php 
												foreach ($term_booking_number_customer as $key => $value) {
													?>
													<option value="<?php echo $value->term_id; ?>"><?php echo $value->name; ?></option>
													<?php
												}
												?>                
											</select>
											<div class="bao_person"></div>
											<i class="fa fa-angle-down"></i>
										</div>
										<div class="full-date raperson">
											<?php echo t_pll('Người','Person'); ?>
										</div>
										<div class="-thu">
											<span class="number_of_person_txt">1</span>
											<?php echo t_pll('người','person'); ?>
										</div>
									</div>			
									<div class="clearfix"></div>
								</div>											
								<div class="text-center">								
									<a href="javascript:void(0);" onclick="bookNowHomepage();" class="btn-gra-tr slider-banner-btn p-up"><?php echo t_pll('Đặt ngay','Book now'); ?></a>
								</div>							
							</form>
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" language="javascript">
	jQuery(document).ready(function($){ 
		<?php 
		if(strcmp($acf_pr, "_en")==0){
			?>
			$( "input[name='checkin_date']" ).datepicker({
				dateFormat: "mm/dd/yy",
				changeYear: true,
				changeMonth: true,
				yearRange: "2000:2050",
				onClose:function(){
					var selected_date= $("input[name='checkin_date']").val();					
					var arr_date=selected_date.split('/');										
					$('.checkin_date_txt').text(arr_date[1]);
					$("input[name='p_checkin_date']").val(selected_date);
				}
			});
			$( "input[name='checkout_date']" ).datepicker({
				dateFormat: "mm/dd/yy",
				changeYear: true,
				changeMonth: true,
				yearRange: "2000:2050",
				onClose:function(){
					var selected_date= $("input[name='checkout_date']").val();					
					var arr_date=selected_date.split('/');										
					$('.checkout_date_txt').text(arr_date[1]);
					$("input[name='p_checkout_date']").val(selected_date);
				}
			});
			<?php
		}else{
			?>
			$( "input[name='checkin_date']" ).datepicker({
				dateFormat: "dd/mm/yy", 
				changeYear: true,
				changeMonth: true,
				yearRange: "2000:2050",
				onClose:function(){
					var selected_date= $("input[name='checkin_date']").val();					
					var arr_date=selected_date.split('/');										
					$('.checkin_date_txt').text(arr_date[0]);
					$("input[name='p_checkin_date']").val(selected_date);
				}
			});
			$( "input[name='checkout_date']" ).datepicker({
				dateFormat: "dd/mm/yy", 
				changeYear: true,
				changeMonth: true,
				yearRange: "2000:2050",
				onClose:function(){
					var selected_date= $("input[name='checkout_date']").val();					
					var arr_date=selected_date.split('/');										
					$('.checkout_date_txt').text(arr_date[0]);
					$("input[name='p_checkout_date']").val(selected_date);
				}
			});
			<?php
		}
		?>  				
	});
</script>

<!-- calendar on mobile -->

<?php include get_template_directory() . "/block/block-form-booking-banner.php" ?>

<!-- /calendar on mobile -->

<div class="sect-service p-pt-35 p991-pt-20 p-pb-40 p991-pb-0">
	<div class="container">
		<h2 class="heading-sect-small">
			<?php echo t_pll("CHÚNG TÔI LÀM GÌ?","WHAT ABOUT US?"); ?>		
		</h2>
		<div class="row">
			<div class="col-12 col-sm-12 col-lg-4">
				<h3 class="heading-sect">
				<?php 
				if(strcmp($acf_pr, '_en')==0){
					?>
					MAIN SERVICES<br />
					<strong>OF</strong>		
					<?php
				}else{
					?>
					CÁC DỊCH VỤ<br />
					<strong>CHÍNH CỦA</strong>													
					<?php
				}
				?>				
				<img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="img">
				</h3>
				<div class="p-mt-15 p767-mt-5 f2-df">
					<?php  
					$main_service=get_field('op_hp_main_service'.$acf_pr,'option');
					echo mb_substr( $main_service, 0, 200,'UTF-8' )."..." ;
					?>
				</div>
				<a href="<?php echo site_url( 'dich-vu', null ); ?>" class="btn-gra-tr p-mt-25 p991-mtb-15 p-up">
					<?php echo t_pll("Chi tiết","Detail"); ?>
					<img src="<?php echo P_IMG_DILA ?>/svg/icon-arrow-right.svg" alt="img">
				</a>
			</div>
			<?php 
			$source_service_img_repeater=get_field('op_hp_service_rpt'.$acf_pr,'option');	
			foreach ($source_service_img_repeater as $key => $value) {							
				?>
				<div class="col-12 col-sm-6 col-lg-4">				
					<div class="box-dv box-item">
						<div class="-photo" style="background: url('<?php echo $value['op_hp_service_img'.$acf_pr]; ?>') no-repeat center/cover; padding-top: calc(100% / (360 / 360));">

						</div>
						<h4 class="-title">
							<a href="<?php echo $value['op_hp_service_link'.$acf_pr]; ?>" class="-link">
								<?php echo $value['op_hp_service_name'.$acf_pr]; ?>
							</a>
						</h4>
					</div>
				</div>
				<?php
			}			
			?>						
		</div>
		
	</div>
</div>

<div class="sect-about">
	<div class="row">
		<div class="col-12 col-sm-12 col-lg-8">
			<div class="box-about-photo">
				<?php 
				$img_about_us=get_field('about_us_img','option');
				?>
				<img src="<?php echo $img_about_us; ?>" class="img-full" alt="Về chúng tôi">
			</div>
		</div>
		<div class="col-12 col-sm-12 col-lg-4 p991-mt-20">
			<div class="box-about-content">
				<h2 class="heading-sect-small">
				<?php echo t_pll("Chúng tôi là ai?","Who we are?"); ?>
				</h2>
				<h3 class="heading-sect">
				<strong><?php echo t_pll("Về","About"); ?></strong>
				<img src="<?php echo P_IMG_DILA ?>/logo_text_dilavi.png" alt="Chúng tôi là ai?">
				</h3>
				<div class="f2-df p-mt-20">
					<?php 
					$about_us=get_field( 'op_hp_about_us'.$acf_pr, 'option');
					echo mb_substr( $about_us, 0, 1000,'UTF-8' )."..." ;					
					?>					
				</div>
			</div>
		</div>
	</div>
	
	
</div>

<div class="sect-gallery p-pt-35 p991-pt-20 p-pb-40 p991-pb-0">
	<div class="container">
		
		<div class="row">
			<div class="col-12 col-lg-2">
				<h3 class="heading-sect">
				<?php echo t_pll("Hình ảnh","Sliders"); ?>
				<strong>
				& Videos
				</strong>
				
			</div>
			
			<div class="col-12 col-lg-10 p991-mt-20">
				<div class="row">
					<?php 
						$source_video=get_field('op_hp_video'.$acf_pr,'option'); 		
									
					?>
					<?php foreach ($source_video as $key => $value) { ?>
					<div class="col-12 col-sm-6">
						<div class="box-video">
							<div href="#" class="-photo" style="background: url('<?php echo $value['op_hp_video_img'.$acf_pr]; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">
								 <a href="javascript:void(0);" class="full-box js-modal-btn js-video-button" data-video-id='<?php echo p_id_youtube($value['op_hp_video_link'.$acf_pr]); ?>'>   
									<span class="wrap-icon">
										<img src="<?php echo P_IMG_DILA ?>/icon_play.png" alt="img">
										<span class="text-play">
											Play video
										</span>
									</span>
									
								</a>
							</div>
							
						</div>
					</div>
					<?php } ?>
				</div>
				
			</div>
			
		</div>
		<!-- gallery -->
		<?php 
		$source_homepage_img_rpt=get_field('op_hp_slider'.$acf_pr,'option');

		?>
		<div class="row gallery-list">
			<?php foreach ($source_homepage_img_rpt as $key => $value) { ?>
			<div class="col-12 col-lg-4" data-src="<?php echo $value['op_hp_slider_img'.$acf_pr]; ?>">
				<div class="box-img box-item">
					<div class="-photo" style="background: url('<?php echo $value['op_hp_slider_img'.$acf_pr]; ?>') no-repeat center/cover; padding-top: calc(100% / (455 / 330));">

						<a href="#" class="full-box">
							<img src="<?php echo $value['op_hp_slider_img'.$acf_pr]; ?>" class="img-hidden" alt="img">
							
						</a>

					</div>
					
				</div>
			</div>
			<?php } ?>
		</div>
		<!--/ gallery -->
	</div>
</div>

<div class="sect-news p-ptb-70 p991-ptb-20">
	<div class="container">
		<h2 class="heading-sect heading-sect-news">
			<?php 
			$op_hp_news_title=get_field('op_hp_news_title'.$acf_pr,'option'); 
			echo $op_hp_news_title;
			$source_op_hp_news_cat=get_field('op_hp_news_cat'.$acf_pr,'option');			
			$args = array(
				'post_type' => 'post',
				'orderby' => 'id',
				'order'   => 'DESC',  	
				'posts_per_page' => 3,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'id',
						'terms'    => $source_op_hp_news_cat,
					)
				),
			);
			$the_query = new WP_Query( $args );			
			$source_hot_article=array();
			if($the_query->have_posts()){
				while ($the_query->have_posts()) {
					$the_query->the_post();
					$post_id=$the_query->post->ID;                                                                      
					$permalink=get_the_permalink($post_id);					
					$title=get_the_title($post_id);
					$excerpt=get_the_excerpt($post_id);
					$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
					$date_post='';
					if(strcmp($acf_pr, '_en') == 0){
						$date_post=get_the_date('m.d.Y',@$post_id);						
					}else{						
						$date_post=get_the_date('d.m.Y',@$post_id);
					}					
					$data_hot_article["title"]=$title;
					$data_hot_article["permalink"]=$permalink;
					$data_hot_article["featured_img"]=$featured_img;
					$data_hot_article["date_post"]=$date_post;
					$data_hot_article["excerpt"]=$excerpt;
					$source_hot_article[]=$data_hot_article;
				}
				wp_reset_postdata();
			}			
			?>
		</h2>			
		<?php 		
		if(count($source_hot_article) > 2){
			?>
			<div class="row">
			<div class="col-12 col-lg-6">				
					<?php for ($i=0; $i < 2 ; $i++) { ?>
				<div class="box-news-list box-col-50">

					<div class="-photo">
						<a href="<?php echo $source_hot_article[$i]['permalink'] ?>" style="background: url('<?php echo $source_hot_article[$i]['featured_img'] ?>') no-repeat center/cover; padding-top: calc(100% / (264 / 225));">
							
						</a>
					</div>
					<div class="-content">
						<div class="-date"><?php echo $source_hot_article[$i]['date_post']; ?></div>
						<h4 class="-title">
							<a href="<?php echo $source_hot_article[$i]['permalink'] ?>" class="-link">
								<?php echo $source_hot_article[$i]['title']; ?>
							</a>
						</h4>
						<div class="-des">
							<?php echo mb_substr( $source_hot_article[$i]['excerpt'], 0, 145, 'UTF-8').'...' ;?>				
						</div>

					</div>
				</div>
						<?php } 
						$j=2;
						?>
			</div>
			<div class="col-12 col-lg-6">
						<div class="box-news-list box-news box-item">

					<div class="-photo">
						<a href="<?php echo $source_hot_article[$j]['permalink'] ?>" style="background: url('<?php echo $source_hot_article[$j]['featured_img'] ?>') no-repeat center/cover; padding-top: calc(100% / (558 / 360));">
							
						</a>
					</div>
					<div class="box-news-content">
						<div class="-date"><?php echo $source_hot_article[$j]['date_post']; ?></div>
						<h4 class="-title">
							<a href="<?php echo $source_hot_article[$j]['permalink'] ?>" class="-link">
							<?php echo $source_hot_article[$j]['title']; ?>
							</a>
						</h4>
						<div class="-des">
							<?php 	echo mb_substr( $source_hot_article[$j]['excerpt'], 0, 145, 'UTF-8').'...' ;?>
						</div>

					</div>
				</div>
			</div>
		</div>
			<?php
		}
		?>		
	</div>
</div>
<?php include get_template_directory() . "/block/block-hotline.php" ?>


<?php get_footer() ?>