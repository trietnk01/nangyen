jQuery(function($){
  // e.preventDefault();
  // e.stopPropagation();

	// Show ...
	var is_IE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent); // IE
	var is_FF=navigator.userAgent.toLowerCase().indexOf('firefox') > -1; // FIrefox

	// Fixed IE: 
	// if(is_IE){
	// 	alert('Bạn nên dùng trình duyệt Google Chrome để trải nghiệm tốt nhất !');

	// }

  // Is mobile
  // if ( ptheme.is_mobile ){
    
  // }

// ----------------------------
// Demo ajax
// <div class="" data-ajax-hello>click</div>
// ----------------------------
$('[data-ajax-hello]').on('click', function(e){
  e.preventDefault();
  var tag = $(this);

  $.ajax({
      type: 'POST',
      dataType: 'json',
      url: ptheme.admin_ajax,
      data: { 
          action: 'demo1',

      },
      context: this,
      beforeSend: function(){
         
      },
      success: function(result){
          if ( result.data ){
              tag.html( result.data );
          }
      },
      error: function( jqXHR, textStatus, errorThrown ){
          alert('Error! Đã có lỗi xảy ra');
      }

  });
  
});


// ----------------------------
// menu mobile
// ----------------------------

// click icon bar - on/off
$('.fa-bars-fixed').click(function(e){
  e.preventDefault();

  if ( !$(this).hasClass('fa-close') ){

    $(this).removeClass('fa-bars').addClass('fa-close');

    $('body').css('overflow-y','hidden');

    $('.sumon-overlay').addClass('active');

    $('.sc-menu-sumon-fixed').addClass('active');

  } else {

    $(this).removeClass('fa-close').addClass('fa-bars');

    $('body').css('overflow-y','auto');

     $('.sumon-overlay').removeClass('active');

     $('.sc-menu-sumon-fixed').removeClass('active');

  }

})

// click show child menu
$('.fa-click-child-menu-mobile').click(function(e){
  e.preventDefault();

  if (  !$(this).siblings('ul').hasClass('active') ){
      $(this).siblings('ul').addClass('active');

      $(this).addClass('active');
  } else {
     $(this).siblings('ul').removeClass('active');

    $(this).removeClass('active');
  }
});

// click sumon overlay remove
$('.sumon-overlay').click(function(){
   $(this).removeClass('active'); 
  $('.fa-bars-fixed').removeClass('fa-close').addClass('fa-bars');

  
    $('body').css('overflow-y','auto');
  $('.sc-menu-sumon-fixed').removeClass('active');

})


$(window).on('resize',function() {
   if( $('body').width() > 991  ){ 
      $('.sumon-overlay').click();
   }
});



$('.sc-menu-fixed-maxheight').matchHeight(false);


});