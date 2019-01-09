<?php

/*

Template name: Template Liên hệ

Template Post Type: post, page

*/

global $hidden_block_partner;

$hidden_block_partner = true;

global $acf_pr;

?>

<?php get_header() ?>

<section class="p-ptb-85 p991-ptb-40">

  <div class="container">

    

    

    <div class="row">

      <div class="col-12 col-lg-6">

        <h2 class="heading-page reset-pseudo">

        VIẾT LỜI NHẮN CHO CHÚNG TÔI

        </h2>

        <div class="wrap-form-contact">

          <form action="" method="POST" name="frm_contact">

            <input type="hidden" name="acf_pr" value="<?php echo $acf_pr; ?>">

            <div class="form-contact">

              

              <div class="row">

                <div class="col-12">

                  

                  <input type="text" name="fullname" class="form-control" placeholder="<?php echo t_pll("Họ tên","Full name") ?>" required>

                </div>

                <div class="col-12">

                  

                  <input type="email" name="email" class="form-control" placeholder="<?php echo t_pll("Email","Email") ?>">

                </div>

                <div class="col-12">

                  <input type="text" name="phone" class="form-control" placeholder="<?php echo t_pll("Số điện thoại","Phone number") ?>" required>

                </div>

                

                <div class="col-12">

                  

                  <input type="text" name="title" class="form-control" placeholder="<?php echo t_pll("Tiêu đề","Title") ?>" required>

                </div>

                <div class="col-12">

                  

                  <textarea name="message" class="form-control" cols="30" rows="10" placeholder="<?php echo t_pll("Viết nội dung liên hệ","Write contact content") ?>"></textarea>

                  

                </div>

                <div class="col-12 p-mt-20">

                  <div>

                    <div class="guiwrapper">

                      <div class="btngui"><a href="javascript:void(0);" class="v-btn p-up -btn-submit" onclick="contactNow();">Gửi</a></div>

                      <div class="ajax_loader_1"></div>                        

                    </div>                    

                  </div>

                  <div class="note">Cảm ơn đã gửi thông điệp cho chúng tôi . Chúng tôi sẽ liên hệ lại bạn trong thời gian sớm nhất.

                  </div>   

                </div>

                

              </div>

            </div>

            

          </form>

        </div>

      </div>

      <div class="col-12 col-lg-6 p991-mt-30">

        <h2 class="heading-page reset-pseudo">

          CHÚNG TÔI Ở ĐÂY

        </h2>

        <div class="contact-map map">

          <?php echo get_field('google_map','option'); ?>

        </div>

        <address class="p-mt-25">



          <h1 class="form-contact-heading f2-df">

            <?php echo get_bloginfo( 'name','' ); ?>

          </h1>

          

          <p>

            ĐC: <?php echo get_field('dia_chi','option'); ?>

          </p>

          <p>

            Mail: <a href="mailto:<?php echo get_field('email_info','option'); ?>"><?php echo get_field('email_info','option'); ?></a>

          </p>

          <p>

            Phone: <a href="tel:<?php echo get_field('tel_alo','option'); ?>" class="">

                <?php echo get_field('sdt','option'); ?>

              </a>
              -
              <a href="tel:<?php echo get_field('tel_alo_2','option'); ?>" class="">

                <?php echo get_field('sdt_2','option'); ?>

              </a>

          </p>

        </address>

      </div>

    </div>

    

  </div>

</section>

<!-- sect about -->

<?php get_footer() ?>