<?php $catename['cate'] = [0,

"Tổ yến sơ chế",
"Tổ yến thô",
"Tổ yến tinh chế",
"Tổ yến tinh chế vuông",
"Tổ yến chưng cách thủy"
];
?>
<div class="cate-product-list">
  <h3 class="-heading">
  Danh mục sản phẩm
  </h3>
  <ul class="cate-list">
    <?php for ($i2=1; $i2 <=2 ; $i2++) { ?>
    <li class="list-parent">
      <a href="#">
        Tổ yến các loại
        <button class="fa fa-angle-up btn-click-toggle">
        
        </button>
      </a>
      <ul class="sub-toggle">
        <?php for ($i=1; $i <=4 ; $i++) { ?>
        <li>
          <a href="#">
            <?php echo $catename['cate'][$i] ?>
          </a>
        </li>
        <?php } ?>
        
      </ul>
    </li>
    <?php } ?>
  </ul>
</div>