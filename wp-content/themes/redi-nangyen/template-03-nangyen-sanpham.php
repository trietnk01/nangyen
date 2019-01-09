<?php

/*

Template name: Template sản phẩm

Template Post Type: post, page

*/

get_header();

global $zController;

$productModel=$zController->getModel("/frontend","ProductModel");

/* start set the_query */

$the_query=null;

$args_tax_query=array();

$source_weight=array();

$args_meta_query=array();

$trongluong_filter="";

$price_min=0;

$price_max=0;

if(isset($_POST['trongluong'])){

  $source_weight=$_POST['trongluong'];

  if(count(@$source_weight) > 0){

    $args_tax_query=array(

      'taxonomy' => 'za_weight',

      'field'    => 'id',

      'terms'    => $source_weight,                  

    ); 

    $trongluong_filter=json_encode(@$source_weight);   

  }   

} 

if(isset($_POST["trongluong_filter"])){

  $source_weight=json_decode( @$_POST["trongluong_filter"]);

  if(!empty(@$source_weight) > 0){

    $args_tax_query=array(

      'taxonomy' => 'za_weight',

      'field'    => 'id',

      'terms'    => $source_weight,                  

    ); 

    $trongluong_filter=json_encode(@$source_weight);   

  }   

}

if(isset($_POST["price_min"])){

  $price_min=$_POST["price_min"];

}

if(isset($_POST["price_max"])){

  $price_max=$_POST["price_max"];

}

if((int)@$price_max > 0){

  $args_meta_query=array(

      'key'     => 'price',

      'value'   => array( $price_min, $price_max ),

      'type'    => 'numeric',

      'compare' => 'BETWEEN',

    );

}

if(is_page()){

  $args = array(

    'post_type' => 'zaproduct',  

    'orderby' => 'id',

    'order'   => 'DESC',             

  );  

  if(count(@$args_tax_query) > 0){

    $args['tax_query']=array($args_tax_query);

  }

  if(count(@$args_meta_query) > 0){

    $args['meta_query']=array($args_meta_query);

  }

  $the_query = new WP_Query( $args );     

}else{

  $args = $wp_query->query;

  $args['orderby']='id';

  $args['order']='DESC'; 

  if(count(@$args_tax_query) > 0){

    $args['tax_query']=array($args_tax_query);

  }  

  if(count(@$args_meta_query) > 0){

    $args['meta_query']=array($args_meta_query);

  }

  $wp_query->query($args);

  $the_query=$wp_query; 

}

/* end set the_query */



/* start setup pagination */

$totalItemsPerPage=6;

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

  <section class="article-product p-ptb-85 p991-ptb-40">

    <div class="container">

      <div class="row">

        <div class="col-12 col-lg-3">

          <div class="row">

            <div class="col-12 col-sm-6 col-lg-12">

              <?php include get_template_directory() . "/block/block-category-product.php"; ?>

            </div>

            <div class="col-12 col-sm-6 col-lg-12">

              

                <div class="region-filter p-mt-30 p991-mt-0">

                 <h3 class="filter-heading-mobile f2-df d-block d-lg-none">

                   Lọc sản phẩm

                   <button class="fa fa-bars" data-toggle="collapse" data-target="#product-filter-toggle" aria-expanded="false" aria-controls="collapseExample">



                   </button>

                 </h3>

                 <div id="product-filter-toggle" class="filter-product toggle-collapse">

                  <form name="frm_filter" method="POST">

                    <input type="hidden" name="price_min" value="2000000" />

                    <input type="hidden" name="price_max" value="5000000" />

                    <h3 class="cate-heading p-up">

                      Giá tiền

                    </h3>

                    <div id="filter-price">

                    </div>

                    <div class="sidebar-content-inner">

                      <label for="amount">Từ:</label>

                      <input type="text" id="amount" readonly style="border:0;background: transparent;color: #fff">

                    </div>

                    <div class="line2"></div>

                    <h3 class="cate-heading p-up">

                      Trọng lượng

                    </h3>

                    <?php 

                    $source_weight=array();

                    if(isset($_POST['trongluong'])){

                      $source_weight=$_POST['trongluong'];

                    }                    

                    $terms = get_terms( 

                      array(

                        'taxonomy' => 'za_weight',

                        'hide_empty' => false, 

                        'parent' => 0 

                      ) 

                    );

                    ?>

                    <div id="filter-weight" class="sidebar-content-inner">

                    <?php 

                    $i=1;

                    foreach($terms as $key => $value){

                      $term_link=get_term_link( $value, 'za_weight' );

                      if(in_array($value->term_id, $source_weight)){                        

                        ?>

                        <div class="custom-control custom-checkbox mb-1">

                          <input type="checkbox" class="custom-control-input" checked value="<?php echo $value->term_id; ?>" id="gram_<?php echo @$value->term_id; ?>"  name="trongluong[]">

                          <label class="custom-control-label" for="gram_<?php echo @$value->term_id; ?>"><?php echo @$value->name; ?></label>

                        </div>

                        <?php

                      }else{

                        ?>

                        <div class="custom-control custom-checkbox mb-1">

                          <input type="checkbox" class="custom-control-input" value="<?php echo $value->term_id; ?>" id="gram_<?php echo @$value->term_id; ?>" name="trongluong[]">

                          <label class="custom-control-label" for="gram_<?php echo @$value->term_id; ?>"><?php echo @$value->name; ?></label>

                        </div>

                        <?php

                        $i++;

                      }



                    }

                    ?>

                      <button type="submit" class="btn-filter f2-df p-up">Tìm kiếm</button>

                    </div>

                  </form>                  

                  

                  </div>

                </div>

              

            </div>

          </div>                

        </div>          

      <div class="col-12 col-lg-9 p991-mt-20">

        <div class="row">

          <div class="col">

            <h1 class="single_cat_name">

              <?php 

            if(is_page()){

              if(have_posts()){

                  while (have_posts()) {

                    the_post();                            

                    the_title();

                  }

                  wp_reset_postdata();  

                }

            }else{

              single_cat_title();

            }

            ?>

            </h1>            

          </div>

        </div>

        <div class="row">

           <div class="col">

            <form method="POST" action="">

              <input type="hidden" name="filter_page" value="1" />

              <input type="hidden" name="trongluong_filter" value='<?php echo @$trongluong_filter; ?>' />

              <input type="hidden" name="price_min" value="<?php echo @$_POST["price_min"]; ?>" />

              <input type="hidden" name="price_max" value="<?php echo @$_POST["price_max"]; ?>" />

              <div class="row">

                <?php 

                if($the_query->have_posts()){

                  while ($the_query->have_posts()) {

                    $the_query->the_post();

                    $post_id=$the_query->post->ID;    

                    $title=get_the_title($post_id);                               

                    $permalink=get_the_permalink($post_id);

                    $featured_img=get_the_post_thumbnail_url($post_id, 'full');

                    $excerpt=wp_trim_words( get_the_excerpt( $post_id ),20, '...' ) ;

                    $price=get_field('price',$post_id);

                    ?>

                    <div class="col-12 col-sm-6">

                      <div class="box-product box-item text-center">

                        <div class="-photo" style="background: url('<?php echo @$featured_img; ?>')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">                          

                        </div>                        

                        <div class="-content">

                          <div>

                            <h4 class="-title p-up f2-df">

                              <a href="<?php echo @$permalink; ?>" class="-link">

                                <?php echo @$title; ?>

                              </a>

                            </h4>

                            <div class="-price">

                              <span class="sp-label">

                                Giá:

                              </span>

                              <span class="sp-number">

                                <?php echo p_wc_price_format_html2(@$price) ; ?>

                              </span>

                            </div>

                            <div class="-des">

                              <?php echo @$excerpt; ?>

                            </div>

                            <div class="text-center wrap-btn-viewall">

                              <a href="<?php echo @$permalink; ?>" class="btn-viewall f2-df p-up">Xem chi tiết</a>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <?php 

                  }

                  wp_reset_postdata();

                }

                ?>                

              </div>

              <div class="row">

                <div class="col">

                  <?php 

                  echo @$pagination->showPagination();   

                  ?>    

                </div>

              </div>

            </form>

           </div>          

        </div>        

      </div>    

    </div>    

  </div>    

</section>

<!-- sect about -->

<?php get_footer() ?>