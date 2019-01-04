jQuery(function($){
	var price_min=0;
	var price_max=0;
	var source_price=null;
	var data_item={
		"action"    : "load_price_min_max"		
	}	
	$.ajax({
		url         : ajaxurl,
		type        : "POST",
		data 		: data_item,
		dataType 	: "json",
		async		: false,
		success     : function(data, status, jsXHR){				
			price_min=parseInt(data.price_min) ;
			price_max=parseInt(data.price_max);	
			source_price=[price_min,price_max];		
			console.log(price_min);
			console.log(price_max);
			console.log(source_price);
		}
	});	
	var layoutRender = {
		init:function(){
			layoutRender.limitChar();			
			layoutRender.maxheight();	
			layoutRender.searchModal();
			layoutRender.sliderBanner();	
			// layoutRender.sliderOwlMobile();
			// layoutRender.bannerContent();
			layoutRender.cateProductList();
			layoutRender.filterProduct();
			layoutRender.productRelated();
			layoutRender.sliderCustomerLine1();
			layoutRender.carouselGallerySyn();
			layoutRender.lightBoxgallery();
			layoutRender.iconToggleMenuMobile();
			layoutRender.btnToggleMobile();
			layoutRender.collapseToggleMobile();
			layoutRender.galleryList();
			layoutRender.sliderPartner();
			layoutRender.modalVideoPopup();
			//layoutRender.dateDataPicker();
			layoutRender.menuNav();	
			layoutRender.wowAnimation();
		},
		limitChar:function(){
			 if (!$('*[data-max-char]').length) {
		        return;
		      }

		      $('*[data-max-char]').each(function (i, el) {
		        var maxChar = $(el).data('maxChar') || 4000;

		        if ($(el).html().length > maxChar) {
		          $(el).attr('title', $(el).html());
		          $(el).html($(el).html().substring(0, maxChar - 4) + '...');
		        }
		      });
		},
		searchModal:function(){
			$('a[href="#search"]').on('click', function(event) {                    
				$('#search').addClass('open');
				$('#search > form > input[type="search"]').focus();
			});            
			$('#search, #search button.close').on('click keyup', function(event) {
				if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
					$(this).removeClass('open');
				}
			});        
		},
		cateProductList:function(){
			$('.btn-click-toggle').click(function(e) {
				e.preventDefault();
				$(this).toggleClass('fa-angle-down fa-angle-up');
				$(this).parent().parent().find('.sub-toggle').toggleClass('hidden-sub');
			});
		},
		collapseToggleMobile:function(){
			var width = jQuery(window).width();
	        jQuery(window).on('resize', function() {
	            width = jQuery(this).width();
	        });
	        if (width < 992) {
	        	$('.toggle-collapse').addClass('collapse');	            
	        }
	        else{
	        	$('.toggle-collapse').removeClass('collapse');	        	
	        }
		},
		filterProduct:function(){			
			$( "#filter-price" ).slider({
				range: true,
				min: price_min,
				max: price_max,
				values: source_price,
				slide: function( event, ui ) {
					$( "#amount" ).val( accounting.formatMoney(ui.values[0], "", 0, ".",",")  + " đ"  + " - " + accounting.formatMoney(ui.values[1], "", 0, ".",",")  + " đ" );
					var frm=$(this).closest('form');
					$(frm).find("input[name='price_min']").val(ui.values[0]);
					$(frm).find("input[name='price_max']").val(ui.values[1]);
				}
			});
			$( "#amount" ).val( accounting.formatMoney(price_min, "", 0, ".",",")   + " đ" +
				" - " + accounting.formatMoney(price_max, "", 0, ".",",")  + " đ" );
			
		},
		modalVideoPopup:function(){
			 //popup
	      $(".js-video-button").modalVideo({
	        youtube: {
	          controls: 1,
	          autoplay: 1,
	          list: null,
	          rel: 0,
	          start: 0,
	          nocookie: true
	        }
	      });
		},
		dateDataPicker:function(){
			$('.date-picker').datepicker();
		},
		liteBox:function(){
			$('.litebox').liteBox();
		},
		bannerContent:function(){

			$(window).on('load resize',function() {
				var x =  ($('body').width() - 1170 ) / 2;

				if ( x < 0 ){
					x = 0;
				}

				$('.slider-banner-box-inner').css( {'left':x +'px', 'display':'block' });

			});


		},
		addiconSubmit:function(){
			//alert('asdasd');
		//	$('.btn-submit').prepend('Some text');
		},
		iconToggleMenuMobile:function(){
			$('.child-menu-mobile').click(function(e) {
				$(this).toggleClass('fa-angle-down fa-angle-up');
				$(this).parent('.menu-item').find('>.sub-menu').toggleClass('active');
			});
		},
		btnshowHeight:function(){
			$('.btn-show-thongtin').click(function(e) {
				$('.content-add-height').addClass('active');
				$('.content-add-height li').removeClass('hidden');
				$(this).fadeOut();
			});

		},
		btnToggleMobile:function(){
			$('.m-btn-toggle').click(function(e) {
				$('.menu-mobile').toggleClass('active');
				$('.overlay-menu').toggleClass('active');

			});
			$('.overlay-menu').click(function(event) {
				// $(this).toggleClass('active');
				$('.m-btn-toggle').trigger('click');
			});
		},
		vTab:function(){
			$('.v-tab-js a').click(function(e) {
				
			});
		},
		googleMapscroll:function(){
			 /* When the user is scrolling, disable pointer events in the Google map. */
		      // $(window).on('scroll', function(e) {
		      //       $('.maps iframe').css("pointer-events", "none"); 
		      // });
		 
		      /* When the user stops scrolling, enable pointer events in the Google map. */
		      /* Note: 'Stopped scrolling' is defined as the user not scrolling for 150ms */
		      // $(window).on('scroll', function(e) {
		      //       $('.maps iframe').css("pointer-events", "auto");
		      // }, 150);
		 
		      /* 350ms after the mouse has entered the map area, emable pointer events. */
		      $(window).on('mouseenter', function(e) {
		            $('.maps iframe').css("pointer-events", "auto");
		      }, 2050);
		},
		googleChart:function(){
			 google.charts.load("current", {packages:["corechart"]});
		      google.charts.setOnLoadCallback(drawChart);
		      function drawChart() {
		        // Define the chart to be drawn.

	            var data = new google.visualization.DataTable();
	            data.addColumn('string', 'Browser');
	            data.addColumn('number', 'Percentage');
	            data.addRows([
	               ['Trả gốc: ~262,5 triệu', 45.0],
	               ['Trả gốc: ~262,5 triệu', 26.8],
	              
	            ]);

		        var options = {
		          pieHole: 0.7,
		        	pieSliceTextStyle: {
		            color: 'black',
		          },
		          legend: 'none',
		          pieSliceText: 'label',
				  backgroundColor: 'none',
					enableInteractivity : false,
					tooltip: {
		              textStyle: {
		                  fontSize: 13
		              }
		         	},
		         	 chartArea: {
			            left: 10,
			            top: 0,
			            width: 250,
			            height: 250
			        },
					colors: ['#70c9c3','#053350']
		        };

		        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
		        chart.draw(data, options);
		      }
		},
		chartJs:function(){
			new Chart(document.getElementById("doughnut-chart"), {
			    type: 'doughnut',
			    data: {
			      labels: ["Trả gốc", "Trả lãi"],

			      datasets: [
			        {
			          label: "Population (millions)",
			          backgroundColor: ["#70c9c3","#053350"],
			          data: [256,256],
			          borderWidth: 1,
			          // legend:{
			          // 	position: 'none'
			          // }
			        }
			      ]
			    },
			    options: {
			     
			      tooltips:{
			      	enabled: false
			      },
			      legend:{
			      	display: false
			      },
		          cutoutPercentage: 80,
			    }
			});
		},
		toggleIcon:function(){
			$('.btn-toogle-icon').click(function(event) {
				// $(this).fadeOut(0);
				$(this).children('i').toggleClass('fa-angle-down fa-angle-up');
			});
          
		},
		readmore:function(){
			if(!$('.read-more-toggle-icon').length()){
				return;
			}
			$('.read-more-toggle-icon').click(function(event) {
				$(this).fadeOut();
			});
		},
		radioCus:function(){
		    $('.label-radio-tron1').click(function(){
		        var name = $(this).find('input').attr('name');

		        $('.label-radio-tron1').find('input[name="'+ name +'"]').siblings('.radio-tron1').removeClass('active');

		        $(this).find('.radio-tron1').addClass('active');

		    })

		},
		galleryButtonBanner:function(){
			$('.btn-img-gallery').click(function() {
				$('.btn-triger-click-gallery').trigger('click');
			});
		},
		tabList:function(){
			$('.tab-list a').click(function(e) {
				e.preventDefault();
				$('.tab-list a').removeClass('active');
				$(this).addClass('active');
			});	
		},
		//gallery list
		galleryList:function(){
			$('.gallery-list').lightGallery();
		},
		// banner slider
		sliderBanner:function(){
	      var owl_banner = $(".slider-banner");      

	       owl_banner.owlCarousel({
	            responsiveClass:true,
	            margin:0,
	            loop:true,    
	            dots:true,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            animateOut: 'fadeIn',
    			animateIn: 'fadeOut',
    			transitionStyle : "fade",
    			mouseDrag:true,
	            // center: true,
	            slideBy:1, // group
	            items:1,

	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 1
	            },
	          
	            768: {
	              items: 1
	            },

	            992: {
	              items: 1
	            },
	            1199: {
	              items: 1
	            },
	           }
	          });
	      owl_banner.on('mouseover',function(e){
	          owl_banner.trigger('stop.owl.autoplay');
	      })
	      owl_banner.on('mouseleave',function(e){
	           owl_banner.trigger('play.owl.autoplay');
	      })


	      $(".btn-left").on('click', function () {
	         owl_banner.trigger('prev.owl.carousel');
	      });

	      $(".btn-right").on('click', function () {
	         owl_banner.trigger('next.owl.carousel');
	      });


	     

   	 	},
   	 	// slider on mobile
   	 	sliderOwlMobile:function(){
	      var owl_mobile = $(".owl-mobile");      

	       owl_mobile.owlCarousel({
	            responsiveClass:true,
	            margin:0,
	            loop:true,    
	            dots:false,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	      //       animateOut: 'fadeIn',
    			// animateIn: 'fadeOut',
    			transitionStyle : "fade",
    			mouseDrag:true,
	            // center: true,
	            slideBy:1, // group
	            items:1,

	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 1
	            },
	          
	            768: {
	              items: 1
	            },

	            992: {
	              items: 1
	            },
	            1199: {
	              items: 1
	            },
	           }
	          });
	      owl_mobile.on('mouseover',function(e){
	          owl_mobile.trigger('stop.owl.autoplay');
	      })
	      owl_mobile.on('mouseleave',function(e){
	           owl_mobile.trigger('play.owl.autoplay');
	      })


	      $(".btn-left").on('click', function () {
	         owl_mobile.trigger('prev.owl.carousel');
	      });

	      $(".btn-right").on('click', function () {
	         owl_mobile.trigger('next.owl.carousel');
	      });


	     

   	 	},

   	 	
		// customer slider
		sliderCustomerLine1:function(){
	      var owl_customer = $(".owl-customer-slider-1");      

	       owl_customer.owlCarousel({
	            responsiveClass:true,
	            margin:0,
	            loop:true,    
	            dots:true,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            center: true,
	            slideBy:1, // group
	            items:1,
	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 1
	            },
	          
	            768: {
	              items: 1
	            },

	            992: {
	              items: 1
	            },
	            1199: {
	              items: 1
	            },
	           }
	          });
	      owl_customer.on('mouseover',function(e){
	          owl_customer.trigger('stop.owl.autoplay');
	      })
	      owl_customer.on('mouseleave',function(e){
	           owl_customer.trigger('play.owl.autoplay');
	      })


	      $(".btn-left").on('click', function () {
	         owl_customer.trigger('prev.owl.carousel');
	      });

	      $(".btn-right").on('click', function () {
	         owl_customer.trigger('next.owl.carousel');
	      });

   	 	},
		sliderCustomer:function(){
	      var owl_customer = $("#owl-customer");      

	       owl_customer.owlCarousel({
	            responsiveClass:true,
	            margin:0,
	            loop:true,    
	            dots:false,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            center: true,
	            slideBy:1, // group
	            items:1,
	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 2
	            },
	          
	            768: {
	              items: 3
	            },

	            992: {
	              items: 3
	            },
	            1199: {
	              items: 3
	            },
	           }
	          });
	      owl_customer.on('mouseover',function(e){
	          owl_customer.trigger('stop.owl.autoplay');
	      })
	      owl_customer.on('mouseleave',function(e){
	           owl_customer.trigger('play.owl.autoplay');
	      })


	      $(".btn-left").on('click', function () {
	         owl_customer.trigger('prev.owl.carousel');
	      });

	      $(".btn-right").on('click', function () {
	         owl_customer.trigger('next.owl.carousel');
	      });

   	 	},
   	 	//carousel syn

   	 	carouselGallerySyn:function(){

   	 		 var gallery_sync1 = $(".gallery_sync1");

			  var gallery_sync2 = $(".gallery_sync2");

			  var slidesPerPage = 4; //globaly define number of elements per page

			  var syncedSecondary = true;



			  gallery_sync1.owlCarousel({

			    items : 1,

			    slideSpeed : 2000,

			    nav: false,

			    autoplay: true,

			    dots: false,

			    loop: true,

			    responsiveRefreshRate : 200,

			    navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],

			  }).on('changed.owl.carousel', syncPosition);

			  	 $(".btn-left.btn-gallery").on('click', function () {
			         gallery_sync1.trigger('prev.owl.carousel');
			      });

			      $(".btn-right.btn-gallery").on('click', function () {
			         gallery_sync1.trigger('next.owl.carousel');
			      });

			  gallery_sync2

			    .on('initialized.owl.carousel', function () {

			      gallery_sync2.find(".owl-item").eq(0).addClass("current");

			    })

			    .owlCarousel({

			    	responsiveClass:true,

			    items : slidesPerPage,

			    dots: false,

			    margin: 20,

			    nav: false,

			    smartSpeed: 200,

			    slideSpeed : 500,

			    slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel

			    responsiveRefreshRate : 200,

			     responsive: {

	            0: {

	              items: 2

	            },

	            480: {

	              items: 3

	            },

	          

	            768: {

	              items: 4

	            },



	            992: {

	              items: 4

	            },

	            1199: {

	              items: 4

	            },

	           },

			     navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],

			  }).on('changed.owl.carousel', syncPosition2);



			  function syncPosition(el) {

			    //if you set loop to false, you have to restore this next line

			    //var current = el.item.index;

			    

			    //if you disable loop you have to comment this block

			    var count = el.item.count-1;

			    var current = Math.round(el.item.index - (el.item.count/2) - .5);

			    

			    if(current < 0) {

			      current = count;

			    }

			    if(current > count) {

			      current = 0;

			    }

			    

			    //end block



			    gallery_sync2

			      .find(".owl-item")

			      .removeClass("current")

			      .eq(current)

			      .addClass("current");

			    var onscreen = gallery_sync2.find('.owl-item.active').length - 1;

			    var start = gallery_sync2.find('.owl-item.active').first().index();

			    var end = gallery_sync2.find('.owl-item.active').last().index();

			    

			    if (current > end) {

			      gallery_sync2.data('owl.carousel').to(current, 100, true);

			    }

			    if (current < start) {

			      gallery_sync2.data('owl.carousel').to(current - onscreen, 100, true);

			    }

			  }

			  

			  function syncPosition2(el) {

			    if(syncedSecondary) {

			      var number = el.item.index;

			      gallery_sync1.data('owl.carousel').to(number, 100, true);

			    }

			  }

			  

			  gallery_sync2.on("click", ".owl-item", function(e){

			    e.preventDefault();

			    var number = $(this).index();

			    gallery_sync1.data('owl.carousel').to(number, 300, true);

			  });

   	 	}, 	 	

		sliderPartner:function(){
			
		    var owl_partner = $(".owl_partner");      

	       	owl_partner.owlCarousel({
	            responsiveClass:true,
	            margin:30,
	            loop:true,    
	            dots:false,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:false,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            // center: true,
	            slideBy:1, // group
	            items:1,
	            responsive: {
	            0: {
	              items: 1,
	              margin: 10
	            },
	            480: {
	              items: 3
	            },
	          
	            768: {
	              items: 4
	            },

	            992: {
	              items: 4
	            },
	            1199: {
	              items: 5
	            },
	           }
	          });
		      owl_partner.on('mouseover',function(e){
		          owl_partner.trigger('stop.owl.autoplay');
		      })
		      owl_partner.on('mouseleave',function(e){
		           owl_partner.trigger('play.owl.autoplay');
		      })


		      $(".btn-left").on('click', function () {
		         owl_partner.trigger('prev.owl.carousel');
		      });

		      $(".btn-right").on('click', function () {
		         owl_partner.trigger('next.owl.carousel');
		      });

		},
		
		newsSlider:function(){
			
		    var owl_news = $("#owl-news");      

	       	owl_news.owlCarousel({
	            responsiveClass:true,
	            margin:30,
	            loop:true,    
	            dots:true,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            // center: true,
	            slideBy:1, // group
	            items:4,
	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 2
	            },
	          
	            768: {
	              items: 2
	            },

	            992: {
	              items: 2
	            },
	            1199: {
	              items: 2
	            },
	           }
	          });
		      owl_news.on('mouseover',function(e){
		          owl_news.trigger('stop.owl.autoplay');
		      })
		      owl_news.on('mouseleave',function(e){
		           owl_news.trigger('play.owl.autoplay');
		      })


		      $(".nnext").on('click', function () {
		         owl_news.trigger('prev.owl.carousel');
		      });

		      $(".nprev").on('click', function () {
		         owl_news.trigger('next.owl.carousel');
		      });

		},
		productRelated:function(){
			
		    var owl_product_related = $(".owl-product-related");      

	       	owl_product_related.owlCarousel({
	            responsiveClass:true,
	            margin:30,
	            loop:true,    
	            dots:false,
	            nav:false,
	            navText:['<i class="fa fa-angle-left" style="color:#cbcbcb"></i>','<i class="fa fa-angle-right" style="color:#cbcbcb"></i>'],
	            autoplay:true,
	            autoplayTimeout:5000,
	            autoplayHoverPause:true,
	            // center: true,
	            slideBy:1, // group
	            items:4,
	            responsive: {
	            0: {
	              items: 1
	            },
	            480: {
	              items: 2
	            },
	          
	            768: {
	              items: 2
	            },

	            992: {
	              items: 3
	            },
	            1199: {
	              items: 3
	            },
	           }
	          });
		      owl_product_related.on('mouseover',function(e){
		          owl_product_related.trigger('stop.owl.autoplay');
		      })
		      owl_product_related.on('mouseleave',function(e){
		           owl_product_related.trigger('play.owl.autoplay');
		      })


		      $(".btn-left").on('click', function () {
		         owl_product_related.trigger('prev.owl.carousel');
		      });

		      $(".btn-right").on('click', function () {
		         owl_product_related.trigger('next.owl.carousel');
		      });

		},
		counterAnimation:function(){
			 $('.counter').counterUp({
	            delay: 10,
	            time: 3000
	        });
			
		},
		lightBoxgallery:function(){
			var $gallery = $('.box-img a').simpleLightbox();

		$gallery.on('show.simplelightbox', function(){
			// console.log('Requested for showing');
		})
		.on('shown.simplelightbox', function(){
			// console.log('Shown');
		})
		.on('close.simplelightbox', function(){
			// console.log('Requested for closing');
		})
		.on('closed.simplelightbox', function(){
			// console.log('Closed');
		})
		.on('change.simplelightbox', function(){
			// console.log('Requested for change');
		})
		.on('next.simplelightbox', function(){
			// console.log('Requested for next');
		})
		.on('prev.simplelightbox', function(){
			// console.log('Requested for prev');
		})
		.on('nextImageLoaded.simplelightbox', function(){
			// console.log('Next image loaded');
		})
		.on('prevImageLoaded.simplelightbox', function(){
			// console.log('Prev image loaded');
		})
		.on('changed.simplelightbox', function(){
			// console.log('Image changed');
		})
		.on('nextDone.simplelightbox', function(){
			// console.log('Image changed to next');
		})
		.on('prevDone.simplelightbox', function(){
			// console.log('Image changed to prev');
		})
		.on('error.simplelightbox', function(e){
			// console.log('No image found, go to the next/prev');
			// console.log(e);
		});
		
		},
    	menuSrcollfix:function(){
    		$(".sc-header").stick_in_parent();
    	},
	    menuNav: function () {
	      // Collapse the navbar when page is scrolled
	      $(window).scroll(function () {
	      	var heightmenu = $('.sc-menu-fixed1').height();
	      
	        if ($(window).scrollTop() > heightmenu) {
	          $(".sc-header").addClass('navbar-shrink');
	        } else {
	          $(".sc-header").removeClass('navbar-shrink');
	        }
	      });
		},
		maxheight:function(){
			$('.box-icon-des-max-height').matchHeight(false);		
			$('.box-news-max-height').matchHeight(false);		
			$('.question-max-height').matchHeight(false);		
			$('.box-project-max-height').matchHeight(false);		
			
				
			
		},
		wowAnimation:function(){
			var wow = new WOW(
              {
              boxClass:     'wow',      // default
              animateClass: 'animated', // default
              offset:       0,          // default
              mobile:       false,       // default
              live:         true        // default
            }
            )
            wow.init();
		}
	}

	layoutRender.init();
		

});