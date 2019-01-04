<!-- two lang -->
<div class="wrap-form-contact">
  <form action="" method="POST" name="frm_contact">
    <input type="hidden" name="acf_pr" value="<?php echo $acf_pr; ?>">
    <div class="form-contact">
      <h3 class="form-contact-heading">
      <?php echo t_pll('Nhập thông tin liên hệ','Fill contact information'); ?>
      </h3>
      <div class="row">
        <div class="col-12">
          
          <input type="text" name="fullname" class="form-control" placeholder="<?php echo t_pll("Họ tên","Full name") ?>" required>
        </div>
        <div class="col-12 col-lg-6">
          <input type="text" name="phone" class="form-control" placeholder="<?php echo t_pll("Số điện thoại","Phone number") ?>" required>
        </div>
        <div class="col-12 col-lg-6">
          
          <input type="email" name="email" class="form-control" placeholder="<?php echo t_pll("Email","Email") ?>">
        </div>
        <div class="col-12">
          
          <input type="text" name="title" class="form-control" placeholder="<?php echo t_pll("Tiêu đề","Title") ?>" required>
        </div>
        <div class="col-12">
          
          <textarea name="message" class="form-control" cols="30" rows="10" placeholder="<?php echo t_pll("Viết nội dung liên hệ","Write contact content") ?>"></textarea>
          
        </div>
        <div class="col-12 p-mt-20">
          <div>
            <div class="contact_btn">
              <a href="javascript:void(0);" onclick="contactNow();"><?php echo t_pll('Gửi liên hệ','Send contact'); ?>        </a>
            </div>
            <div class="ajax_loader_contact"></div>
            <div class="clearfix"></div>
          </div>
          <div class="note">Cảm ơn đã đặt phòng tại khách sạn của chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.</div>
        </div>
        
      </div>
    </div>
    
  </form>
</div>
<!-- /two lang -->