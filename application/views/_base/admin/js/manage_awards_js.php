<script type="text/javascript">
	$(document).ready(function(){
		$('#tabs').tabs();
		
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$('.imagepick').click(function(){
			var image = $(this).attr('myfile');
			$('#images').val(image);
			
			return false;
		});
		
		$("a[rel*=facebox]").click(function() {
			var action = $(this).attr('myAction');
			var id = $(this).attr('myID');
			var location = '<?php echo site_url('ajax/del_award');?>/' + id;
			
			$.facebox(function() {
				$.get(location, function(data) {
					$.facebox(data);
				});
			});
			
			return false;
		});
	});
</script>