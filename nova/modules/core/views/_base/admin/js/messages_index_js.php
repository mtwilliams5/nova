<style>
.popover .inner { width: 550px !important; }
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$('[rel=popover]').popover({
			animate: false,
			offset: 5,
			placement: 'right',
			html: true
		});
		
		$('#inbox_check_all').click(function(){
			$("input[type='checkbox']").attr('checked', $('#inbox_check_all').is(':checked'));
		});
		
		$('#loading').hide();
		$('#loaded').removeClass('hidden');
	});
</script>