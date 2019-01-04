function changePage(page,ctrl){
	jQuery('input[name=filter_page]').val(page);
	jQuery(ctrl).closest('form')[0].submit();	
}
jQuery(document).ready(function($) {
	var menu_item_has_children= $('.dmpd').children('li.menu-item-has-children');
	var btn_toggle=$(menu_item_has_children).children('button');	
	$(btn_toggle).click(function() {			
		var li_has_children=$(this).closest('li');
		var ul_submenu=$(li_has_children).children('ul');		
		var ds=$(ul_submenu).css('display');		
		if(ds=='none'){
			$(ul_submenu).slideDown();
		}else{
			$(ul_submenu).slideUp();
		}		
		var i_r=$(this).children('i');
		$(i_r).toggleClass('fa-angle-up fa-angle-down');
	});
});