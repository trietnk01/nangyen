<?php
add_filter('display_post_states', 'ptheme_wpsites_custom_post_states', 10, 2);

function ptheme_wpsites_custom_post_states($states) { 
    global $post; 

  	if (  'page' == get_post_type( $post->ID ) || 'post' ==  get_post_type( $post->ID ) )  {

  		switch (get_page_template_slug( $post->ID )) {

  	   case "home.php";
        $states[] = "Trang chủ";
        break;

        case "template-login.php";
        $states[] = "Login";
        break;

        case "template-02-nangyen-gioi-thieu.php";
        $states[] = "Giới thiệu";
        break;

         case "template-04-nangyen-sanpham-chi-tiet.php";
        $states[] = "Sản phẩm chi tiết";
        break;

         case "template-03-nangyen-sanpham.php";
        $states[] = "Sản phẩm";
        break;
        
         case "template-05-nangyen-gocchiase.php";
        $states[] = "Góc chia sẻ";
        break;

         case "template-06-nangyen-gocchiase-chi-tiet.php";
        $states[] = "Góc chia sẻ chi tiết";
        break;
    
         case "template-07-nangyen-lienhe.php";
        $states[] = "Liên hệ";
        break;

        case "template-register.php";
        $states[] = "Register";
        break;


        case "template-forgot-password.php";
        $states[] = "Forgot Password";
        break;


  		}

    } 

    // if (  'booking' == get_post_type( $post->ID )  )  {

    //     global $wp_query;

    //     $categories = get_the_terms( $post->ID, 'cate_booking' );

    //     if (   $categories  ) {
          
    //       foreach ( $categories as $categorie ){
    //         $cat_name = $categorie->name;
    //         $cat_id = $categorie->term_id;

    //         $cat_obj = $wp_query->get_queried_object();

    //         $cat_id_col =  get_field( 'cat_col' , $cat_obj->taxonomy.'_'.  $cat_id  );

    //         $states[] = "<span style='color:".$cat_id_col."'>" . $cat_name   . "</span>" ;


    //       } 

    //     }
    // } 



    return $states;
    
} 

