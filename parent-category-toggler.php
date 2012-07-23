<?php
/*
Plugin Name: Parent Category Toggler
Plugin URI: http://wordpress.org/extend/plugins/parent-category-toggler/
Description: Automatically toggle the parent categories when a sub category is selected.
Version: 1.03
Author: Ben Lobaugh
Author URI: http://ben.lobaugh.net
Original Author: Aw Guo
Original Author URI: http://www.ifgogo.com
Licence: GPL
*/

function super_category_toggler() {
	echo '
		<script>
		jQuery(".selectit input").change(function(){
			var $chk = jQuery(this);
			var ischecked = $chk.is(":checked");
			$chk.parent().parent().siblings().children("label").children("input").each(function(){
var b = this.checked;
ischecked = ischecked || b;
})
			checkParentNodes(ischecked, $chk);
		});
		function checkParentNodes(b, $obj)
		{
			$prt = findParentObj($obj);
			if ($prt.length != 0)
			{
			 $prt[0].checked = b;
			 checkParentNodes(b, $prt);
			}
		}
		function findParentObj($obj)
		{
			return $obj.parent().parent().parent().prev().children("input");
		}
		</script>
		';
}
add_action('admin_footer', 'super_category_toggler');
?>