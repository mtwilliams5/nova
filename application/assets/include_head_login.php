<?php
/*
|---------------------------------------------------------------
| INCLUDE - HEADER DATA
|---------------------------------------------------------------
|
| File: application/assets/include_head_login.php
| System Version: 1.0
|
*/
?><script type="text/javascript" src="<?php echo base_url() . APPFOLDER .'/assets/js/jquery.js';?>"></script>
		<script type="text/javascript" src="<?php echo base_url() . APPFOLDER .'/assets/js/jquery.countdown.js';?>"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#countdown').countDown({
					startNumber: 5,
					startFontSize: '1em',
					endFontSize: '1em'
				});
			});
		</script>