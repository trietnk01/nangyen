<?php
// start insert contact
add_action( 'wp_ajax_insert_contact', 'func_ajax_insert_contact' );
add_action( 'wp_ajax_nopriv_insert_contact', 'func_ajax_insert_contact' );
function func_ajax_insert_contact(){	

	$checked=1;
	$msg=array();        
	$data=array();   
	$k=0;    

	$fullname = trim( $_POST['fullname'] );	
	$phone = trim( $_POST['phone'] );
	$email = trim( $_POST['email'] );	
	$title = trim( $_POST['title'] );
	$message = trim( $_POST['message'] );	
	$acf_pr = trim( $_POST['acf_pr'] );	

	if(mb_strlen($fullname) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Fullname must have at least 5 characters';  
		}else{
			$msg[$k] = 'Họ tên phải từ 5 ký tự trở lên'; 
		}	   
		$data["fullname"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($phone) < 10){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Phone must have at least 10 characters';  
		}else{
			$msg[$k] = 'Điện thoại phải từ 10 ký tự trở lên'; 
		}		  
		$data["phone"]='';        
		$checked = 0;
		$k++;
	}
	
	if(!preg_match("#^[a-z][a-z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#", mb_strtolower($email,'UTF-8')   )){
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Email is invalid';  
		}else{
			$msg[$k] = 'Email không hợp lệ'; 
		}			
		$data["email"]='';           
		$checked = 0;
		$k++;
	}

	if(mb_strlen($title) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Title must have at least 5 characters';  
		}else{
			$msg[$k] = 'Tiêu đề phải từ 5 ký tự trở lên'; 
		}	   
		$data["title"]='';        
		$checked = 0;
		$k++;
	}

	if(mb_strlen($message) < 5){		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Message must have at least 5 characters';  
		}else{
			$msg[$k] = 'Nội dung liên hệ phải từ 5 ký tự trở lên'; 
		}	   
		$data["message"]='';        
		$checked = 0;
		$k++;
	}


	if($checked==1){
		$date_submit=datetimeConverterVn(date("Y-m-d"),"d/m/Y");	
		$post_title = "Thông tin liên hệ từ ".$fullname." ngày ".$date_submit;
		$post_name = p_clear_slug( $post_title );
		
		
		$insert = array(
			'post_type' => 'zacontact',
			'post_title' => $post_title ,
			'post_name' =>  $post_name  ,
			'post_status' => 'publish',
			'post_author' => 1,
			'post_content' => '',
		);
		$post_id = wp_insert_post($insert);
		update_post_meta( $post_id, 'op_contacted_name', $fullname);
		update_post_meta( $post_id, 'op_contacted_phone', $phone );
		update_post_meta( $post_id, 'op_contacted_email', $email );
		update_post_meta( $post_id, 'op_contacted_title', $title );
		update_post_meta( $post_id, 'op_contacted_message', $message );    
		
		if(strcmp($acf_pr, '_en') == 0){
			$msg[$k]='Save successfully';  
		}else{
			$msg[$k]='Gửi thông tin thành công';  
		}		
	}
	$result=array(
		"checked"       => 	$checked,       
		"msg"			=>	$msg,
		"dulieu"		=>	$data,		
	);
	echo json_encode($result);	
	die();
}
// end insert contact
// start load_price_min_max
add_action( 'wp_ajax_load_price_min_max', 'func_ajax_load_price_min_max' );
add_action( 'wp_ajax_nopriv_load_price_min_max', 'func_ajax_load_price_min_max' );
function func_ajax_load_price_min_max(){	
	$price_min=200000;
	$price_max=6000000;
	$args = array(
		'post_type' => 'zaproduct',
		'posts_per_page' => 1,
		'orderby'  => array( 'meta_value_num' => 'ASC'),
		'meta_key' => 'price',
	);
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		while ($the_query->have_posts()) {
			$the_query->the_post();
        	$post_id=$the_query->post->ID;           
        	$price_min=get_field('price',$post_id);        	
		}
		wp_reset_postdata();
	}
	$args = array(
		'post_type' => 'zaproduct',
		'posts_per_page' => 1,
		'orderby'  => array( 'meta_value_num' => 'DESC'),
		'meta_key' => 'price',
	);
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		while ($the_query->have_posts()) {
			$the_query->the_post();
        	$post_id=$the_query->post->ID;           
        	$price_max=get_field('price',$post_id);        	
		}
		wp_reset_postdata();
	}
	$result=array(
		"price_min"     =>	$price_min,       
		"price_max"		=>	$price_max,		
	);
	echo json_encode($result);	
	die();
}
// end load_price_min_max