<?php
//date_default_timezone_set('Asia/Ho_Chi_Minh');
if ( ! defined( 'ABSPATH' ) ) { 
	exit; 
}
clearstatcache();
ob_start();

// global $content_width;
if ( ! isset( $content_width ) ) {
   $content_width = 1170; // px
}

// inc core
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';


// show admin bar
if ( is_localhost() ) {
	show_admin_bar( false );
}

//add_action("admin_head","func_sub_redirect", -100 );
function func_sub_redirect(){

	if ( p_var_ar("is_role") == "subscriber"  ){
		header("location:" . home_url()  );
		exit;
	} 
}

ob_get_clean();