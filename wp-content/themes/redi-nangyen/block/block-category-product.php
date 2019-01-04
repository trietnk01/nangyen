
  <?php $catename['cate'] = [0,

    "Tổ yến sơ chế",
    "Tổ yến thô",
    "Tổ yến tinh chế",
    "Tổ yến tinh chế vuông",
    "Tổ yến chưng cách thủy"
  ];
  ?>
  <h3 class="filter-heading-mobile f2-df d-block d-lg-none">
   Danh mục sản phẩm
   <button class="fa fa-bars" data-toggle="collapse" data-target="#product-cate-toggle" aria-expanded="false" aria-controls="collapseExample">

   </button>
 </h3>
 <div id="product-cate-toggle" class="cate-product-list toggle-collapse">
   <h3 class="-heading d-none d-lg-block">
    Danh mục sản phẩm
  </h3>
  <?php     
  $args = array( 
    'menu'              => '', 
    'container'         => '', 
    'container_class'   => '', 
    'container_id'      => '', 
    'menu_class'        => 'dmpd',                             
    'echo'              => true, 
    'fallback_cb'       => 'wp_page_menu', 
    'before'            => '', 
    'after'             => '<button class="toggle_r"><i class="fa fa-angle-up" aria-hidden="true"></i></button>',
    'link_before'       => '', 
    'link_after'        => '', 
    'items_wrap'        => '<ul  class="%2$s">%3$s</ul>',  
    'depth'             => 3, 
    'walker'            => '', 
    'theme_location'    => 'dmsp_menu' ,
    'menu_li_actived'       => 'current-menu-item',
    'menu_item_has_children'=> 'menu-item-has-children',
  );
  wp_nav_menu($args);
  ?>        
</div>


