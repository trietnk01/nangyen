<?php
// -------------------------------------
// Add banner
// -------------------------------------
add_action('p_after_header','p_add_banner',1);
function p_add_banner( $show = false ){
if ( $show == false ) {
global $hidden_banner;
if( is_home() || $hidden_banner  ) return;
}
$acf_pr = t_df_lang();
$banner = p_acf_o("banner_post" .   $acf_pr , p_link_img_placeholder() );
if ( is_singular() ) {
if ( get_field("banner_post2") ) {
  $banner = get_field("banner_post2");
}
  } else if ( is_category()  ||  is_tag() || is_tax()  ) {
  global $wp_query;
  $term = get_queried_object();
if ( get_field("banner_post2", $term) ) {
  $banner = get_field("banner_post2", $term);
}
}
?>
<div class="sect-banner-page">
  <div class="banner-page-item" style="background:url(<?php echo $banner ?>) no-repeat center/cover;">
  </div>
  <div class="banner-page-caption">
   <!--  <div class="heading-sect bg-text hidden"> -->
      
      <?php
      // if (  is_singular() ) {
      // the_title();
      // }  else {
      // the_archive_title();
      // }
      ?>
   <!--  </div> -->
  </div>
</div>

<style>
  @media (min-width: 768px) {
    .banner-page-item {
       padding-top:calc( 100% / ( 1600 / 218 ) ) !important;
    }

  }

  @media (max-width: 768px) {
    .banner-page-item {
       padding-top:calc( 100% / ( 1600 / 218 ) ) !important;
    }

  }
</style>
  

<?php
}