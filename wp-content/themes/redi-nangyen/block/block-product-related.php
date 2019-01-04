<!-- product related -->
    <div class="product-related">
      <h2 class="-heading f2-df p-up">
        Sản phẩm liên quan
      </h2>
      <div class="wrap-owl-carousel">
        <div class="owl-carousel owl-product-related">
          <?php for ($i=1; $i <=4 ; $i++) { ?>
          
          <div class="box-product box-item text-center">
            <div class="-photo" style="background: url('<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg')no-repeat center/cover; padding-top: calc(100% / (555 / 555));">
              <!-- <img src="<?php echo P_IMG_NY ?>/hinhsp-<?php echo $i ?>.jpg" class="img-responsive" alt="img"> -->
            </div>
            <!-- <div class="line-bg-gradient" style="height: 10px;"></div> -->
            <div class="-content">
              <div>
                <h4 class="-title p-up f2-df">
                <a href="#" class="-link">
                  TỔ YẾN TINH CHẾ 50 Gr
                </a>
                </h4>
                <div class="-price">
                  <span class="sp-label">
                    Giá:
                  </span>
                  <span class="sp-number">
                    2.250.000đ
                  </span>
                </div>
                <div class="-des">
                  Tổ yến thô được rửa sơ bằng nước lọc, sau đó dùng phương pháp thẩm thấu ngược để hạn chế tổ yến ngâm lâu trong nước...
                </div>
                <div class="text-center wrap-btn-viewall">
                  <a href="#" class="btn-viewall f2-df p-up">Xem chi tiết</a>
                </div>
              </div>
              
            </div>
            
          </div>
          
          <?php } ?>
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