<div id="loader" class="align_center">
	<?php echo img($images['loading']);?><br />
	<?php echo text_output($label['loading'], 'span', 'fontSmall bold gray');?>
</div>

<div id="loaded" class="hidden">
	<?php echo text_output($header, 'h1', 'page-head');?>
	
	<div id="tabs">
		<ul>
			<?php if (isset($players['active'])): ?>
				<li><a href="#one"><span><?php echo $label['active'];?></span></a></li>
			<?php endif;?>
			
			<?php if (isset($players['inactive'])): ?>
				<li><a href="#two"><span><?php echo $label['inactive'];?></span></a></li>
			<?php endif;?>
			
			<?php if (isset($players['pending'])): ?>
				<li><a href="#three"><span><?php echo $label['pending'];?></span></a></li>
			<?php endif;?>
		</ul>
		
		<?php foreach ($players as $key => $p): ?>
			<?php if ($key == 'active'): ?>
				<div id="one">
			<?php elseif ($key == 'inactive'): ?>
				<div id="two">
			<?php else: ?>
				<div id="three">
			<?php endif;?>
			
			<?php if (count($p) > 0): ?>
				<table class="table100 zebra">
					<thead>
						<tr>
							<th><?php echo $label['name'];?></th>
							<th><?php echo $label['character'];?></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($p as $i): ?>
						<tr>
							<td class="col_40pct">
								<strong class="fontMedium"><?php echo $i['name'];?></strong><br />
								<span class="fontSmall gray">
									<strong><?php echo $i['email'];?></strong>
									<?php if (!empty($i['left'])): ?>
										<br />
										<?php echo $label['left'] .' '. $i['left'] .' '. $label['ago'];?>
									<?php endif;?>
								</span>
							</td>
							<td><?php echo $i['main_char'];?></td>
							<td class="col_100 align_right">
								<?php echo anchor('personnel/player/'. $i['id'], img($images['view']), array('class' => 'image'));?>
								&nbsp;
								<?php echo anchor('user/account/'. $i['id'], img($images['edit']), array('class' => 'image'));?>
								&nbsp;
								<a href="#" rel="facebox" myID="<?php echo $i['id'];?>" class="image">
									<?php echo img($images['delete']);?>
								</a>
							</td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else: ?>
			
			<?php endif;?>
			
			</div>
		<?php endforeach;?>
	</div>
</div>