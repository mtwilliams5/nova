<?php $string = random_string('alnum', 8);?>

<script type="text/javascript">
	$(document).ready(function(){
		$("a[rel*=facebox]").click(function() {
			var num = $(this).attr('myID');
			
			$.facebox(function() {
				$.get('<?php echo site_url();?>/ajax/add_comment_post/'+ num + '/<?php echo $string;?>', function(data) {
					$.facebox(data);
				});
			});
			return false;
		});
	});
</script>