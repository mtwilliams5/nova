<?php

$section = 'main';

$path = explode('/', dirname(__FILE__));

// Windows servers user back slashes, so we have to capture for that
if (count($path) <= 1)
	$path = explode('\\', dirname(__FILE__));

$pcount = count($path);
$skinLoc = $pcount -1;
$currentSkin = $path[$skinLoc];

// set up the link tag parameters
$link = array(
	'href'		=> APPFOLDER."/views/$currentSkin/$section/css/main.css",
	'rel'		=> 'stylesheet',
	'type'		=> 'text/css',
	'media'		=> 'screen',
	'charset'	=> 'utf-8'
);

// load the panel helper
$this->load->helper('panel');

// set up the locations of the icons
$panel = array(
	'inbox'		=> array('src' => APPFOLDER."/views/$currentSkin/$section/images/panel-mail.png"),
	'writing'	=> array('src' => APPFOLDER."/views/$currentSkin/$section/images/panel-writing.png"),
	'dashboard'	=> array('src' => APPFOLDER."/views/$currentSkin/$section/images/panel-dashboard.png"),
);

$loginButton = array(
	'class'		=> 'button-signin',
	'value'		=> 'submit',
	'type'		=> 'submit',
	'name'		=> 'submit',
	'content'	=> ucwords(lang('actions_login'))
);

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php echo $title;?></title>
		
		<meta name="description" content="<?php echo $this->config->item('meta_desc');?>">
		<meta name="keywords" content="<?php echo $this->config->item('meta_keywords');?>">
		<meta name="author" content="<?php echo $this->config->item('meta_author');?>">
		
		<?php echo $_redirect;?>

		<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php include_once MODFOLDER.'/assets/global/main_head.php';?>
		
		<?php echo link_tag($link);?>
	</head>
	<body>
		<div id="wrap">
			<noscript>
				<div class="system_warning"><?php echo lang_output('text_javascript_off', '');?></div>
			</noscript>
			
			<?php if (Auth::is_logged_in()): ?>
				<div id="panel" class="hide">
					<div class="panel-body">
						<table class="table100">
							<tbody>
								<tr>
									<td class="panel_1 align_top"><?php echo $panel_1;?></td>
									<td class="panel_spacer"></td>
									<td class="panel_2 align_top"><?php echo $panel_2;?></td>
									<td class="panel_spacer"></td>
									<td class="panel_3 align_top"><?php echo $panel_3;?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif;?>

			<header>
				<div class="container">
					<a class="brand pull-left"><?php echo $this->options['sim_name'];?></a>

					<div class="nav-main pull-right"><?php echo $nav_main;?></div>
				</div>
			</header>
			
			<div class="container body-container">
				<div class="row">
					<div class="span10 nova-content">
						<?php echo $flash_message;?>
						<?php echo $content;?>
						<?php echo $ajax;?>
					</div>

					<div class="span2 align-right">
						<?php if (Auth::is_logged_in()): ?>
							<div class="row-fluid user-controls">
								<div class="span4"><?php echo panel_dashboard(false, img($panel['dashboard']));?></div>
								<div class="span4"><?php echo panel_inbox(true, true, false, '(x)', img($panel['inbox']));?></div>
								<div class="span4"><?php echo panel_writing(true, true, false, '(x)', img($panel['writing']));?></div>
							</div>
						<?php endif;?>

						<div class="nav-sub">
							<?php echo $nav_sub;?>
						</div>
					</div>
				</div>
			</div>

			<footer>
				Powered by <?php echo APP_NAME;?> from <a href="http://www.anodyne-productions.com" target="_blank">Anodyne Productions</a> | 
				<?php echo anchor('main/credits', 'Site Credits');?>
			</footer>
		</div>

		<?php include_once MODFOLDER.'/assets/global/main_foot.php';?>

		<script type="text/javascript" src="<?php echo base_url().APPFOLDER;?>/views/<?php echo $currentSkin;?>/jquery.blockUI.js"></script>
		
		<?php echo $javascript;?>
		
		<script type="text/javascript">
			$(document).ready(function(){
				
				$('body').click(function(event){
					if (! $(event.target).closest('div').hasClass('signin-panel'))
					{
						$.unblockUI();
					}
				});
				
				$('a#userpanel').unbind('click').click(function(){
					$.blockUI({
						message: $('#panel'),
						css: { 
							border: '0', 
							cursor: 'cursor',
							background: 'transparent',
							width: '800px',
							top: '10%',
							left: '50%',
							margin: '0 0 0 -400px'
						}
					});
					
					return false;
				});
			});
			
			// if the escape key is pressed, close the menu
			$(document).keyup(function(event){
				if (event.keyCode == 27) {
					$.unblockUI();
				}
			});
		</script>
	</body>
</html>