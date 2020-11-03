<script>
$(document).ready (function () {

	$('#classification').on ('change', function () {
		var clsf_ids = $(this).val ();
		var url = '<?php echo site_url ('qb/admin/index/'.$lesson_id); ?>/'+clsf_ids+'/<?php echo $diff_ids.'/'.$exclude; ?>';
		$(location).attr('href', url);
	});

	$('#difficulty').on ('change', function () {
		var diff_ids = $(this).val ();
		var url = '<?php echo site_url ('qb/admin/index/'.$lesson_id.'/'.$clsf_ids); ?>/'+diff_ids+'<?php echo $exclude; ?>';
		$(location).attr('href', url);
	});
	
	
	/* SELECT ALL GROUP CHECKBOXES */
	$('.checkAll').on('click',function() {
		var id = $(this).val();
		if ($(this).is(':checked')) {
			$('.checks'+id).prop('checked','checked');
		} else {        
			$('.checks'+id).prop('checked','');
		}
	});
	/* SELECT ALL GROUP CHECKBOXES */


	/* SELECT ALL CHECKBOXES */
	$("#selectAll").change(function(){  //"select all" change
		$(".checks").prop('checked', $(this).prop("checked")); //change all ".checks" checked status
	});

	//".checks" change
	$('.checks').change(function(){
		//uncheck "select all", if one of the listed checks item is unchecked
		if(false == $(this).prop("checked")){ //if this item is unchecked
			$("#selectAll").prop('checked', false); //change "select all" checked status to false
		}
		//check "select all" if all checks items are checked
		if ($('.checks:checked').length == $('.checks').length ){
			$("#selectAll").prop('checked', true);
		}
	});
	/* //-SELECT ALL CHECKBOXES */

});
</script>

<script>
</script>