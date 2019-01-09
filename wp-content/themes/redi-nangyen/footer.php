<?php

/*

Footer template

*/

global $acf_pr;

?>

<div class="clearfix"></div>

<?php do_action('p_before_footer') ?>

<?php get_sidebar('footer') ?>

<?php

	global $hidden_block_partner;

$source_social=get_field('op_inf_sn_repeat','option'); ?>

<footer>

	

	

	<div class="line-content">

		<div class="container">

			<div class="row">



				<div class="col-12 col-lg-3 text-center p-plr-60 p991-plr-15">

					<a href="<?php echo home_url('', null ); ?>" class="footer-logo">

					

						<img src="<?php echo get_field('logo_footer','option'); ?>" alt="img">



					</a>

					<p class="p-mt-15 bloginfo_name">

						<?php echo get_bloginfo( 'name','raw' ); ?>

					</p>

					<div class="p-mt--10 d-block d-lg-none">

			

						<div class="social-line-syn1 footer-social">

							<a href="<?php echo @$source_social[0]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

								<i class="fa fa-facebook"></i>

							</a>

							<a href="<?php echo @$source_social[3]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

								<i class="fa fa-google-plus" aria-hidden="true"></i>

							</a>

							<a href="<?php echo @$source_social[2]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

								<i class="fa fa-youtube-play" aria-hidden="true"></i>

							</a>

							<a href="<?php echo @$source_social[5]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

								<i class="fa fa-instagram" aria-hidden="true"></i>

							</a>

						</div>

					</div>

				</div>



				<div class="col-12 col-lg-2">					

					<?php			

					$args = array( 

						'menu'              => '', 

						'container'         => '', 

						'container_class'   => '', 

						'container_id'      => '', 

						'menu_class'        => 'memu-footer menu-footer-mobile',                             

						'echo'              => true, 

						'fallback_cb'       => 'wp_page_menu', 

						'before'            => '', 

						'after'             => '', 

						'link_before'       => '', 

						'link_after'        => '', 

						'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  

						'depth'             => 3, 

						'walker'            => '', 

						'theme_location'    => 'menu_footer' ,

						'menu_li_actived'       => 'current-menu-item',

						'menu_item_has_children'=> 'menu-item-has-children',

					);

					wp_nav_menu($args);

					?>       

				</div>



				<div class="col-12 col-lg-3">

					<address>

						<ul class="memu-footer">

						

						<li>

							<span>

								ĐC:

							</span>

							<a href="javascript:void(0);" class="">								

								<?php echo get_field('dia_chi','option'); ?>

							</a>

						</li>

						<li>

							<span>

								Web:

							</span>

							<a href="<?php echo home_url() ?>" class="">

								NangYen.vn

							</a>

						</li>

						<li>

							<span>

								Mail:

							</span>

							<a href="mailto:<?php echo get_field('email_info','option'); ?>" class="">

								<?php echo get_field('email_info','option'); ?>

							</a>

						</li>

						<li>

							<span>

								Phone:

							</span>

							<a href="tel:<?php echo get_field('tel_alo','option'); ?>" class="kara-tel-alo">

								<?php echo get_field('sdt','option'); ?>

							</a>
							-
							<a href="tel:<?php echo get_field('tel_alo_2','option'); ?>" class="kara-tel-alo">

								<?php echo get_field('sdt_2','option'); ?>

							</a>

						</li>

					

					</ul>

					</address>

				</div>

				<div class="col-12 col-lg-4">					

					<h3 class="ket-noi-voi-nang-yen">Kết nối với Nàng Yến</h3>
					<div class="ket-noi-fanpage">
						<div class="fb-page" data-href="https://www.facebook.com/Yensaonangyen" data-tabs="timeline" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Yensaonangyen" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Yensaonangyen">Nàng Yến</a></blockquote></div>
					</div>

				</div>

			

		</div>

		<div class="footer-wrap-social-line d-none d-lg-block">

			

			<div class="social-line-syn1 footer-social">

				<a href="<?php echo @$source_social[0]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

					<i class="fa fa-facebook"></i>

				</a>

				<a href="<?php echo @$source_social[3]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

					<i class="fa fa-google-plus" aria-hidden="true"></i>

				</a>

				<a href="<?php echo @$source_social[2]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

					<i class="fa fa-youtube-play" aria-hidden="true"></i>

				</a>

				<a href="<?php echo @$source_social[5]['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow">

					<i class="fa fa-instagram" aria-hidden="true"></i>

				</a>

			</div>

		</div>

	</div>

	<div class="copy-right text-center p767-mt-20">

		<a href="<?php echo home_url() ?>">© 2018 Nang Yen</a> | Design by

		<a href="https://redi.vn/" rel="nofollow" class="" target="_blank" title="Thiết kế website chuẩn Marketing">redi.vn</a>

	</div>

</footer>

<div class="clearfix"></div>

<?php wp_footer() ?>

<?php include get_template_directory() . '/popup.php'; ?>

<?php do_action("p_add_code_end_body") ?>

<?php include get_template_directory() . '/af_body.php'; ?>
<div class="dienthoaipan">
	<div class="ksa">
		<a href="tel:<?php echo get_field('tel_alo_2','option'); ?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
	</div>	
	<div class="amk">
		<a href="tel:<?php echo get_field('tel_alo_2','option'); ?>"><?php echo get_field('sdt_2','option'); ?></a>
	</div>
	<div class="clr"></div>
</div>
</body>

</html>