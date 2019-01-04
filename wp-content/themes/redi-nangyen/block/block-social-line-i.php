
<?php 
$source_social=get_field('op_inf_sn_repeat','option');
?>
<ul class="footer_social">
	<?php 
	foreach ($source_social as $key => $value) {
		?>
		<li><a href="<?php echo $value['op_inf_sn_repeat_link']; ?>" title="Logo social" target="_blank" rel="nofollow"><i class="fa <?php echo $value['op_inf_sn_repeat_icon']; ?>" aria-hidden="true"></i></a></li>
		<?php
	}
	?>						
</ul>	