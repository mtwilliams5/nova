<div id="header"></div>

<div id="container">
	<div class="head">
		<h1><?php echo $label;?></h1>
	</div>
	
	<div class="content">
		<div id="loading" class="hidden">
			<img src="<?php echo url::base().APPFOLDER;?>/views/_base/install/images/loading-circle-large.gif" alt="" />
			<br />
			<strong><?php echo ucfirst(__('processing'));?>...</strong>
		</div>
		
		<div id="loaded" class="UITheme">
			<?php if (Request::instance()->action == 'step' && Request::instance()->param('id') > 0): ?>
				<div id="amount"><span id="percent">0%</span></div>
				<div id="progress"></div>
				<div style="clear:both;"></div>
			<?php endif;?>
		
			<?php echo $flash_message;?>
			<?php echo $content;?>
		</div>
	</div>
	
	<?php if ($controls !== FALSE): ?>	
		<div class="lower">
			<div class="control"><?php echo $controls;?></div>
			<div class="control-text"><?php echo $controls_text;?></div>
		</div>
	<?php endif;?>
	
	<div class="footer">
		Powered by <strong><?php echo Kohana::config('info.app_name').' '.Kohana::config('info.app_version_major');?></strong>
	</div>
</div>