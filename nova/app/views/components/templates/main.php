<noscript>
	<div class="system_warning"><?php echo ___("You need to have Javascript turned on to use all of Nova 3's features.");?></div>
</noscript>

<?php echo $panel;?>

<header>
	<div class="wrapper">
		<div class="nav-main">
			<img src="<?php echo Url::base().MODFOLDER;?>/app/views/design/images/main/nova.png" class="float-right">
			<?php echo $navmain;?>
		</div>
	</div>
</header>

<section>
	<div class="wrapper">
		<nav>
			<?php echo $navsub;?>
		</nav>
		
		<div id="content">
			<?php echo $flash;?>
			
			<h1 class="page-head"><?php echo $header;?></h1>
			<p><?php echo $message;?></p>
			
			<?php echo $content;?>
			<?php echo $ajax;?>
			
			<div style="clear:both;">&nbsp;</div>
		</div>
		
		<footer>
			<?php echo $footer;?>
		</footer>
	</div>
</section>