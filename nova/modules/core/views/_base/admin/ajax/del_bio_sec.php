<?php echo text_output($header, 'h2');?>

<?php echo text_output($text);?>

<?php echo form_open('site/biosections/delete');?>
	<?php echo form_dropdown('new_sec', $values['sections'], '', 'class="hud"');?>
	<?php echo form_hidden('id', $id);?>