<script type="text/javascript">
	$(document).ready(function(){
		$('table.zebra tbody > tr:nth-child(odd)').addClass('alt');
		
		$('a.addtoggle').click(function(){
			$('.addcat').slideDown();
			
			return false;
		});
	});
</script>