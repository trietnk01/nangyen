<?php 
$source_banner=get_field('op_banner_repeat','option');		
?>
<div class="sect-banner">
	<div class="slider-banner owl-carousel owl-theme">
		<?php 
		foreach ($source_banner as $key => $value){
			?>
			<div class="slider-banner-item">
				<img src="<?php echo @$value["op_banner_repeat_img"]; ?>" alt="img">
			</div>
			<?php	
		}
		?>		
	</div>
</div>	