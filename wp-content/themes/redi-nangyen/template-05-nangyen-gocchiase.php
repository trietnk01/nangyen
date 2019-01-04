<?php
/*
Template name: Template góc chia sẻ
Template Post Type: post, page
*/
// global $hidden_breadcrum;
// $hidden_breadcrum = true;
// global $acf_pr;
?>
<?php get_header() ?>

<article class="wrap-article-content p-ptb-85 p991-ptb-40">
  <div class="container">
    
    <div class="cate-list-tab d-f-center">
      
      <a href="#" class="active">
        Tất cả
      </a>
      <a href="#">
        Câu chuyện về Yến
      </a>
      <a href="#">
        Sức khỏe
      </a>
      <a href="#">
        Làm đẹp
      </a>
      
    </div>
    
    <div class="row row-xs p-mt-40 p991-mt-20 wow slideInUp">
      <?php for ($i=1; $i <=6 ; $i++) { ?>
      <div class="col-6 col-sm-6 col-lg-4 col-375-100 box-xs">
        <div class="box-chia-se p-mb-30 p991-mb-20">
          <a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-photo order-lg-2" style="background: url('<?php echo P_IMG_NY ?>/hinh-bai-viet-<?php echo $i ?>.jpg')no-repeat center/cover; padding-top: 125%;">
          </a>
          <div class="-content order-lg-1">
            <a href="#" class="type-cate">Làm đẹp</a>
            <div class="-content-inner">
              <h4 class="-title">
              <a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="-link">
                Thực hư việc người tiểu đường
                không nên dùng yến sào
              </a>
              </h4>
              <div class="-date">
                <img src="<?php echo P_IMG_NY ?>/icon-lich.png" class="img-responsive" alt="img"> 30.12.2018
              </div>
              <div class="-des">
                Tổ yến đảo có giá thành cao gấp nhiều lần tổ yến nhà, 1 lý do lớn nhất đó là vì quá nguy hiểm khi thu hoạch, và tính...
              </div>
              <a href="<?php echo site_url( 'goc-chia-se-chi-tiet',null ); ?>" class="btn-viewmore v-btn p-up p-mt-20">Xem chi tiết</a>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <div class="v-pagination text-center">
      <ul class="page-numbers">
        <li><a class="page-numbers" href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
        <li><a class="prev page-numbers" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
        <li><a class="page-numbers" href="#">1</a></li>
        <li><span aria-current="page" class="page-numbers current">2</span></li>
        <li><a class="page-numbers" href="#">3</a></li>
        <li><a class="next page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        <li><a class="page-numbers" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
  
  
</article>
<!-- sect about -->
<?php get_footer() ?>