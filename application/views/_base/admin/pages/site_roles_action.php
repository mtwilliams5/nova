<?php echo text_output($header, 'h1', 'page-head');?>

<?php echo text_output($text);?>

<p><?php echo anchor('site/roles', $label['back'], array('class' => 'bold'));?></p><br />

<?php if (isset($pages)): ?>
	<?php echo form_open('site/roles/'. $action .'/'. $id);?>
		<table class="table100">
			<tbody>
				<tr>
					<td class="align_top">
						<strong><?php echo $label['name'];?></strong><br />
						<?php echo form_input($inputs['name']);?>
					</td>
					<td class="cell-spacer"></td>
					<td>
						<strong><?php echo $label['desc'];?></strong><br />
						<?php echo form_textarea($inputs['desc']);?>
					</td>
			</tbody>
		</table>
		
		<?php echo text_output($label['pages'], 'h3', 'page-subhead');?>
		
		<?php foreach ($pages['group'] as $group): ?>
			<?php echo text_output($group['group'], 'h4');?>
			
			<?php $i = 0;?>
			<table class="table100 zebra">
				<tbody>
				<?php foreach ($group['pages'] as $page): ?>
					<?php if ($i % 3 == 0): ?>
						<tr>
					<?php endif;?>
							
							<td>
								<div class="inline_img_left">
									<?php echo form_checkbox('page_'. $page['id'], $page['id'], $page['checked'], 'id="page_'. $page['id'] .'"');?>
								</div>
								<label for="page_<?php echo $page['id'];?>">
									<?php echo $page['name'];?><br />
									<span class="fontSmall gray">
										<?php echo $page['url'];?>
										<?php if (!empty($page['desc'])): ?>
											<a href="#" rel="tooltip" tooltip="<?php echo $page['desc'];?>">[?]</a>
										<?php endif;?>
									</span>
								</label>
							</td>
							
							<?php if($i == (count($group['pages']) - 1)): ?>
								<?php while (($i + 1) % 3 != 0): ?>
									<td>&nbsp;</td>
									<?php $i++;?>
								<?php endwhile; ?>
							<?php endif;?>
							
						<?php if (($i + 1) % 3 == 0): ?>
							</tr>
						<?php endif;?>
					<?php $i++;?>
				<?php endforeach;?>
				</tbody>
			</table>
		<?php endforeach;?>
		
		<br />
		<?php echo form_button($button_submit);?>
	<?php echo form_close();?>
<?php endif;?>