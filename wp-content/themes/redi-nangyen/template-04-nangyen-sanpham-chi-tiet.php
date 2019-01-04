<?php
/*
Template name: Template sản phẩm chi tiết
Template Post Type: post, page
*/
// global $hidden_breadcrum;
// $hidden_breadcrum = true;
// global $acf_pr;
get_header();
$post_id=0;
$title="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
$permalink="";
$price=0;
if(have_posts()){
  while (have_posts()) {
    the_post();                            
        $post_id=get_the_ID(); 
        $title=get_the_title($post_id);    
        $excerpt=get_the_excerpt( $post_id );
        $content=get_the_content( $post_id);
        $permalink=get_the_permalink( $post_id );
        $price=get_field('price',$post_id);
        $source_term = wp_get_object_terms( $post_id,  'za_category' );                 
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');                   
        if(count($source_term) > 0){
            foreach ($source_term as $key => $value) {
                $source_term_id[]=$value->term_id;
            }
        }    
  }
  wp_reset_postdata();  
}
$source_thumbnail_rpt=get_field('p_product_thumbnail_rpt',$post_id);
$source_thumbnail_img=array();
$source_thumbnail_img[]=$featured_img;
if( !empty($source_thumbnail_rpt) ){
  foreach ($source_thumbnail_rpt as $key => $value) {
    $source_thumbnail_img[]=$value['p_product_thumbnail_img'];
  }
}
?>


  <section class="article-product p-ptb-85 p991-ptb-40">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-3 order-lg-1">
          
          <div class="row">
            <div class="col-12 col-sm-6 col-lg-12">
          <?php include get_template_directory() . "/block/block-category-product.php"; ?>
          </div>
          </div>
        </div>
        <div class="col-12 col-lg-9 order-lg-2">
          <!-- product information common -->
          <div class="row">
            <div class="col-12 col-lg-7">
              <!-- product image -->
              <div class="single-product-img">
                <div class="owl-carousel gallery_sync1">
                  <?php foreach($source_thumbnail_img as $key => $value){ ?>
                  <div class="box-img">
                    <div class="img-larger-item" style="background: url('<?php echo $value; ?>')no-repeat center/cover;padding-top: 75%;">
                      <a href="<?php echo @$value; ?>" class="full-box bg-h-o"></a>
                    </div>
                  </div>                  
                  <?php } ?>
                </div>
                <div class="wrap-gallery-list">
                  <div class="owl-carousel gallery_sync2">
                    <?php foreach ($source_thumbnail_img as $key => $value) { ?>
                    <div class="img-list-item" style="background: url('<?php echo $value; ?>')no-repeat center/cover;padding-top: 68%;">
                      
                    </div>
                    <?php } ?>
                  </div>
                  <!-- owl-control -->
                  <div class="owl-control left-right-fa owl-control-gallery-list">
                    <div class="btn-left btn-gallery">
                      <i class="fa fa-angle-left" aria-hidden="true"></i>
                    </div>
                    <div class="btn-right btn-gallery">
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                  </div>
                  <!-- /owl-control -->
                </div>
              </div>
              <!-- /product image -->
            </div>
            <div class="col-12 col-lg-5">
              <!-- product info -->
              <div class="single-product-info">
                <h1 class="heading-page reset-pseudo">
                <?php echo @$title; ?>
                </h1>
                <div class="-price">
                  <span class="sp-label">
                    Giá:
                  </span>
                  <span class="sp-number">
                    <?php echo  p_wc_price_format_html2($price); ?>
                  </span>
                </div>
                <div class="-des">
                  <?php echo wp_trim_words( @$excerpt, 30, '...' ) ; ?>
                </div>
                <a href="tel:<?php echo get_field('tel_alo','option'); ?>" class="btn-gra -hotline f2-df">
                  HOTLINE  <?php echo get_field('sdt_2','option'); ?>
                </a>
              </div>
              <!-- /product info -->
              <!-- add social here -->
              <div class="-social">
                
              </div>
              <!-- /add social here -->
            </div>
          </div>
          <!-- /product information common -->
          <!-- product information main -->
          <div class="product-main-info">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabcontent-info">Mô tả sản phẩm</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabcontent-review">Đánh giá</a>
              </li>
              
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <div id="tabcontent-info" class="tab-pane active">
                <?php 
                if(have_posts()){
                  while (have_posts()) {
                    the_post();                            
                    the_content();
                  }
                  wp_reset_postdata();  
                }
                ?>
              </div>
              <div id="tabcontent-review" class="tab-pane fade">
                <div>
                  <h3>
                  Bình Luận
                  </h3>
                  <div class="line1">
                    
                  </div>
                  <div class="fb-comments" data-href="<?php echo @$permalink; ?>" data-numposts="5"></div>                  
                </div>
              </div>
              
            </div>
          </div>
          <!-- /product information main -->
          
        </div>
        
      </div>
      
      
      
      
      <?php 
      $args = array(
        'post_type' => 'zaproduct',  
        'orderby' => 'id',
        'order'   => 'DESC',  
        'posts_per_page' => 3,        
        'post__not_in'=>array($post_id),
        'tax_query' => array(
          array(
            'taxonomy' => 'za_category',
            'field'    => 'term_id',
            'terms'    => @$source_term_id,                   
          ),
        ),
      );
      $the_query=new WP_Query($args); 
      if($the_query->have_posts()){
        ?>
        <!-- product related -->
        <div class="product-related">
          <h2 class="-heading f2-df p-up">
            Sản phẩm liên quan
          </h2>
          <div class="wrap-owl-carousel">
            <div class="owl-carousel owl-product-related">
              <?php 
              while($the_query->have_posts()){
                $the_query->the_post();
                $post_id=$the_query->post->ID;
                $title=get_the_title($post_id);    
                $excerpt=get_the_excerpt( $post_id );
                $content=get_the_content( $post_id);
                $permalink=get_the_permalink( $post_id );
                $price=get_field('price',$post_id);
                $source_term = wp_get_object_terms( $post_id,  'za_category' );                 
                $featured_img=get_the_post_thumbnail_url($post_id, 'full');               
                ?>
                <div class="box-product box-item text-center">
                  <div class="-photo" style="background: url('<?php echo @$featured_img; ?>')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">
                    <!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->
                  </div>
                  <!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->
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
                           <?php echo  p_wc_price_format_html2($price); ?>
                        </span>
                      </div>
                      <div class="-des">
                        <?php echo wp_trim_words( $excerpt, 20, '...' ); ?>
                      </div>
                      <div class="text-center wrap-btn-viewall">
                        <a href="<?php echo @$permalink; ?>" class="btn-viewall f2-df p-up">Xem chi tiết</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
              ?>                              
            </div>
            <div class="owl-control owl-group owl-control-related">
              <div class="btn-left">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
              </div>
              <div class="btn-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </div>
            </div>
          </div>                    
        </div>
        <!-- /product related -->
        <?php
        wp_reset_postdata();
      }
      ?>
      
    </div>
    
    
  </section>
  <!-- sect about -->
  <?php get_footer() ?>