<?php 
get_header();
global $zController;
$productModel=$zController->getModel("/frontend","ProductModel");
$args = $wp_query->query; 
$args['orderby']='id';
$args['order']='DESC';    
$s="";
if(isset($_POST["s"])){
  $s=trim($_POST["s"]);
}
if(!empty(@$s)){    
  $args["s"] =@$s;
}  
$wp_query->query($args);
$the_query=$wp_query; 
/* start setup pagination */
$totalItemsPerPage=get_option( 'posts_per_page' );
$pageRange=3;
$currentPage=1; 
if(!empty(@$_POST["filter_page"]))          {
    $currentPage=@$_POST["filter_page"];  
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
    "totalItems"=>$totalItems,
    "totalItemsPerPage"=>$totalItemsPerPage,
    "pageRange"=>$pageRange,
    "currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
/* end setup pagination */
?>
<form method="POST">
  <input type="hidden" name="s" value="<?php echo @$s; ?>" />
  <input type="hidden" name="filter_page" value="1" />
  <article class="wrap-article-content p-ptb-85 p991-ptb-40">

  <div class="container">

    <?php 

    $have_menu=0;

    if(is_category( 'goc-chia-se' )){

      $have_menu=1;

    }

    if(is_category( 'cau-chuyen-ve-yen' )){

      $have_menu=1; 

    }

    if(is_category( 'lam-dep' )){

      $have_menu=1;

    }

    if(is_category( 'suc-khoe' )){

      $have_menu=1;

    }

    if((int)@$have_menu == 1){

      ?>

      <div class="cate-list-tab d-f-center">

          <?php     

          $args = array( 

            'menu'              => '', 

            'container'         => '', 

            'container_class'   => '', 

            'container_id'      => '', 

            'menu_class'        => 'goc_chia_se_cs',                             

            'echo'              => true, 

            'fallback_cb'       => 'wp_page_menu', 

            'before'            => '', 

            'after'             => '', 

            'link_before'       => '', 

            'link_after'        => '', 

            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',  

            'depth'             => 3, 

            'walker'            => '', 

            'theme_location'    => 'goc_chia_se_menu' ,

            'menu_li_actived'       => 'current-menu-item',

            'menu_item_has_children'=> 'menu-item-has-children',

          );

          wp_nav_menu($args);

          ?>                  

        </div>

      <?php

    }    

    if($the_query->have_posts()){

      ?>

      <div class="row row-xs p-mt-40 p991-mt-20 wow slideInUp">    

      <?php 

      while ($the_query->have_posts()) {

        $the_query->the_post();

        $post_id=$the_query->post->ID;                                                                      

        $permalink=get_the_permalink($post_id);         

        $title=get_the_title($post_id);

        $excerpt=wp_trim_words( get_the_excerpt($post_id), 20, '...' ) ;

        $featured_img=get_the_post_thumbnail_url($post_id, 'full'); 

        $date_post='';

        $date_post=get_the_date('d.m.Y',@$post_id);   

        $source_term=wp_get_object_terms( $post_id, 'category' );  
        if(count(@$source_term) > 0){
          $term_link=get_term_link( $source_term[0], 'category' );        
        }
        

        ?>

        <div class="col-6 col-sm-6 col-lg-4 col-375-100 box-xs">

          <div class="box-chia-se p-mb-30 p991-mb-20">

            <a href="<?php echo @$permalink; ?>" class="-photo order-lg-2" style="background: url('<?php echo @$featured_img; ?>')no-repeat center/cover; padding-top: 125%;">

            </a>

            <div class="-content order-lg-1">

              <a href="<?php echo @$term_link; ?>" class="type-cate"><?php echo @$source_term[0]->name; ?></a>

              <div class="-content-inner">

                <h4 class="-title">

                  <a href="<?php echo @$permalink; ?>" class="-link">

                    <?php echo @$title; ?>

                  </a>

                </h4>

                <div class="-date">

                  <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="<?php echo @$title; ?>"> <?php echo @$date_post; ?>

                </div>

                <div class="-des">

                  <?php echo @$excerpt; ?>

                </div>

                <a href="<?php echo @$permalink; ?>" class="btn-viewmore v-btn p-up p-mt-20">Xem chi tiết</a>

              </div>

            </div>

          </div>

        </div>      

        <?php           

      }

      ?>          

      </div>

      <?php      

      wp_reset_postdata();  

    }

    ?>        

    

    <div class="v-pagination text-center">

      <?php 

      echo @$pagination->showPagination();   

      ?>      

    </div>

    <div class="clr"></div>    

  </div>

  

  

</article>
</form>

<!-- sect about -->

<?php get_footer() ?>