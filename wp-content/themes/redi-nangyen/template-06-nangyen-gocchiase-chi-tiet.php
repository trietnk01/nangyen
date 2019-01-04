<?php
/*
Template name: Template góc chia sẻ chi tiết
Template Post Type: post, page
*/
// global $hidden_breadcrum;
// $hidden_breadcrum = true;
// global $acf_pr;
?>
<?php get_header() ?>
<article class="wrap-article-content p-ptb-85 p991-ptb-40">
  <div class="container">
    
    <div class="row">
      <div class="col-12 col-lg-9">
        
        <div class="article-content">
          <h1>
          <?php the_title() ?>
          </h1>
          <div class="article-date">
            <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> 30.12.2018
          </div>
          <div>
            <?php the_content() ?>
          </div>
          <div>
            <h3>
            Bình Luận
            </h3>
            <div class="line1">
              
            </div>
            <?php
            p_fb_cmt( get_the_permalink() );
            ?>
          </div>
          
        </div>
      </div>
      <div class="col-12 col-lg-3">
        <h2 class="sidebar-heading p991-mt-20">
          BÀI VIẾT GẦN ĐÂY
        </h2>
        <div class="row">
          <?php for ($i=1; $i <=6 ; $i++) { ?>
          <div class="col-12">

            <div class="sidebar-list-news">
              <a href="#" class="-photo box-link-hover" style="background: url('<?php echo P_IMG_NY ?>/hinh-bai-viet-<?php echo $i ?>.jpg')no-repeat center/cover; padding-top: 35%;">
              </a>
              <div class="-content">
                
               
                  <h4 class="-title">
                    <a href="#" class="-link f2-df">
                      Lý do Yến Đảo có giá thành cao 
                    </a>
                  </h4>
                  <div class="-date">
                    <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> 30.12.2018
                  </div>
                  
              
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    
  </div>
  
  
</article>
<!-- sect about -->
<?php get_footer() ?>