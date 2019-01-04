<?php 
get_header();
$post_id=0;
$title="";
$excerpt="";
$content="";
$featured_img="";
$source_term_id=array();
$permalink="";
$date_post="";
$term_slug="";
if(have_posts()){
	while (have_posts()) {
		the_post();                            
        $post_id=get_the_ID(); 
        $title=get_the_title($post_id);    
        $excerpt=get_the_excerpt( $post_id );
        $content=get_the_content( $post_id);
        $permalink=get_the_permalink( $post_id );
        $date_post=get_the_date('d.m.Y',@$post_id);    
        $source_term = wp_get_object_terms( $post_id,  'category' );          
        $term_slug=$source_term[0]->slug;
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');                   
        if(count($source_term) > 0){
            foreach ($source_term as $key => $value) {
                $source_term_id[]=$value->term_id;
            }
        }    
	}
	wp_reset_postdata();  
}
?>
<article class="wrap-article-content p-ptb-85 p991-ptb-40">
  <div class="container">
    
    <div class="row">
      <div class="col-12 col-lg-9">
        
        <div class="article-content">
          <h1>
          <?php echo @$title; ?>
          </h1>
          <div class="article-date">
            <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> <?php echo @$date_post; ?>
          </div>
          <div>
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
          <div>
            <h3>
            Bình Luận
            </h3>
            <div class="line1">
              
            </div>
            <?php 
if(have_posts()){
                while (have_posts()) {
                  the_post();                            
                  ?>
                  <div class="fb-comments" data-href="<?php get_the_permalink(); ?>" data-numposts="5"></div>
                  <?php
                }
                wp_reset_postdata();  
              }
            ?>
            
          </div>
          
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <h2 class="sidebar-heading p991-mt-20">
          BÀI VIẾT GẦN ĐÂY
        </h2>
        <div class="row">
        	<?php 
        	$args = array(
        		'post_type' => 'post',  
        		'orderby' => 'id',
        		'order'   => 'DESC',  
        		'posts_per_page' => 3,        
        		'post__not_in'=>array($post_id),
        		'tax_query' => array(
        			array(
        				'taxonomy' => 'category',
        				'field'    => 'term_id',
        				'terms'    => @$source_term_id,                   
        			),
        		),
        	);
        	$the_query=new WP_Query($args);  
        	if($the_query->have_posts()){
        		while ($the_query->have_posts()) {
        			$the_query->the_post();
								$post_id=$the_query->post->ID;
								$permalink=get_the_permalink($post_id);
								$title=wp_trim_words( get_the_title($post_id), 9999, '...') ;	
								$date_post=get_the_date('d.m.Y',@$post_id);    						
								$featured_img=get_the_post_thumbnail_url($post_id, 'full'); 								
        			?>
        			<div class="col-12">

            <div class="sidebar-list-news">
              <a href="<?php echo $permalink; ?>" class="-photo box-link-hover" style="background: url('<?php echo $featured_img; ?>')no-repeat center/cover; padding-top: 35%;">
              </a>
              <div class="-content">
                
               
                  <h4 class="-title">
                    <a href="<?php echo $permalink; ?>" class="-link f2-df">
                      <?php echo $title; ?>
                    </a>
                  </h4>
                  <div class="-date">
                    <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> <?php echo @$date_post; ?>
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
      </div>
    </div>
    
  </div>
  
  
</article>
<?php
get_footer(); 
?>