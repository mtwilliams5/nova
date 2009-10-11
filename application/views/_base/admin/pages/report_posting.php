<div id="loader" class="align_center">
	<?php echo img($images['loading']);?><br />
	<?php echo text_output($label['loading'], 'span', 'fontSmall bold gray');?>
</div>

<div id="loaded" class="hidden">
	<?php echo text_output($header, 'h1', 'page-head');?>
	
	<div id="tabs">
		<ul>
			<li><a href="#one"><span><?php echo $label['players'];?></span></a></li>
			<li><a href="#two"><span><?php echo $label['char_active'];?></span></a></li>
			<li><a href="#three"><span><?php echo $label['char_npc'];?></span></a></li>
			<li><a href="#four"><span><?php echo $label['char_inactive'];?></span></a></li>
		</ul>
		
		<div id="one">
			<?php if (isset($players)): ?>
				<?php if (isset($players['active'])): ?>
					<br /><div class="search"></div>
					
					<?php echo text_output($label['players_active'], 'h2', 'page-subhead');?>
					
					<table class="table100 zebra search_players">
						<thead>
							<th><?php echo $label['name'];?></th>
							<th class="fontSmall"><?php echo $label['posts'];?></th>
							<th class="fontSmall"><?php echo $label['logs'];?></th>
							<th class="fontSmall"><?php echo $label['news'];?></th>
							<th class="fontSmall"><?php echo $label['total'];?></th>
						</thead>
						<tbody>
						<?php foreach ($players['active'] as $p): ?>
							<tr class="<?php echo $p['class'];?>">
								<td class="col_40pct">
									<?php echo text_output($p['name'], 'span', 'bold fontMedium');?>
									
									<?php if ($p['posts'] > 0 || $p['logs'] > 0): ?>
										<br />
										<?php if (empty($p['class'])): ?>
											<span class="fontSmall gray">
										<?php else: ?>
											<span class="fontSmall">
										<?php endif;?>
										
											<?php echo text_output($label['lastpost'], 'strong') .': '. $p['lastpost'];?>
										</span>
									<?php endif;?>
								</td>
								<td class="align_center"><?php echo $p['posts'];?></td>
								<td class="align_center"><?php echo $p['logs'];?></td>
								<td class="align_center"><?php echo $p['news'];?></td>
								<td class="align_center"><?php echo $p['posts'] + $p['logs'] + $p['news'];?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php endif;?>
				
				<?php if (isset($players['inactive'])): ?>
					<?php echo text_output($label['players_inactive'], 'h2', 'page-subhead');?>
					
					<table class="table100 zebra search_players">
						<thead>
							<th><?php echo $label['name'];?></th>
							<th class="fontSmall"><?php echo $label['posts'];?></th>
							<th class="fontSmall"><?php echo $label['logs'];?></th>
							<th class="fontSmall"><?php echo $label['news'];?></th>
							<th class="fontSmall"><?php echo $label['total'];?></th>
						</thead>
						<tbody>
						<?php foreach ($players['inactive'] as $p): ?>
							<tr>
								<td class="col_40pct bold fontMedium"><?php echo $p['name'];?></td>
								<td class="align_center"><?php echo $p['posts'];?></td>
								<td class="align_center"><?php echo $p['logs'];?></td>
								<td class="align_center"><?php echo $p['news'];?></td>
								<td class="align_center"><?php echo $p['posts'] + $p['logs'] + $p['news'];?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				<?php endif;?>
			<?php else: ?>
				<?php echo text_output($label['no_players'], 'h3', 'orange');?>
			<?php endif;?>
		</div>
		
		<div id="two">
			<?php if (isset($characters['active'])): ?>
				<?php echo text_output($label['char_active'], 'h2', 'page-subhead');?>
				
				<div class="search_active"></div><br />
				
				<table class="table100 zebra" id="search_active">
					<thead>
						<th><?php echo $label['name'];?></th>
						<th class="fontSmall"><?php echo $label['posts'];?></th>
						<th class="fontSmall"><?php echo $label['logs'];?></th>
						<th class="fontSmall"><?php echo $label['news'];?></th>
						<th class="fontSmall"><?php echo $label['total'];?></th>
					</thead>
					<tbody>
					<?php foreach ($characters['active'] as $c): ?>
						<tr class="<?php echo $c['class'];?>">
							<td class="col_40pct">
								<?php echo text_output($c['name'], 'span', 'bold fontMedium');?>
								
								<?php if ($c['posts'] > 0 || $c['logs'] > 0): ?>
									<br />
									<?php if (empty($c['class'])): ?>
										<span class="fontSmall gray">
									<?php else: ?>
										<span class="fontSmall">
									<?php endif;?>
									
										<?php echo text_output($label['lastpost'], 'strong') .': '. $c['lastpost'];?>
									</span>
								<?php endif;?>
							</td>
							<td class="align_center"><?php echo $c['posts'];?></td>
							<td class="align_center"><?php echo $c['logs'];?></td>
							<td class="align_center"><?php echo $c['news'];?></td>
							<td class="align_center"><?php echo $c['posts'] + $c['logs'] + $c['news'];?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else: ?>
				<?php echo text_output($label['no_characters'], 'h3', 'orange');?>
			<?php endif;?>
		</div>
		
		<div id="three">
			<?php if (isset($characters['npc'])): ?>
				<?php echo text_output($label['char_npc'], 'h2', 'page-subhead');?>
				
				<div class="search_npc"></div><br />
				
				<table class="table100 zebra" id="search_npc">
					<thead>
						<th><?php echo $label['name'];?></th>
						<th class="fontSmall"><?php echo $label['posts'];?></th>
						<th class="fontSmall"><?php echo $label['logs'];?></th>
						<th class="fontSmall"><?php echo $label['news'];?></th>
						<th class="fontSmall"><?php echo $label['total'];?></th>
					</thead>
					<tbody>
					<?php foreach ($characters['npc'] as $c): ?>
						<tr>
							<td class="col_40pct">
								<?php echo text_output($c['name'], 'span', 'bold fontMedium');?>
								
								<?php if ($c['posts'] > 0 || $c['logs'] > 0): ?>
									<br />
									<span class="fontSmall gray">
										<?php echo text_output($label['lastpost'], 'strong') .': '. $c['lastpost'];?>
									</span>
								<?php endif;?>
							</td>
							<td class="align_center"><?php echo $c['posts'];?></td>
							<td class="align_center"><?php echo $c['logs'];?></td>
							<td class="align_center"><?php echo $c['news'];?></td>
							<td class="align_center"><?php echo $c['posts'] + $c['logs'] + $c['news'];?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else: ?>
				<?php echo text_output($label['no_characters'], 'h3', 'orange');?>
			<?php endif;?>
		</div>
		
		<div id="four">
			<?php if (isset($characters['inactive'])): ?>
				<?php echo text_output($label['char_inactive'], 'h2', 'page-subhead');?>
				
				<div class="search_inactive"></div><br />
				
				<table class="table100 zebra" id="search_inactive">
					<thead>
						<th><?php echo $label['name'];?></th>
						<th class="fontSmall"><?php echo $label['posts'];?></th>
						<th class="fontSmall"><?php echo $label['logs'];?></th>
						<th class="fontSmall"><?php echo $label['news'];?></th>
						<th class="fontSmall"><?php echo $label['total'];?></th>
					</thead>
					<tbody>
					<?php foreach ($characters['inactive'] as $c): ?>
						<tr>
							<td class="col_40pct">
								<?php echo text_output($c['name'], 'span', 'bold fontMedium');?>
								
								<?php if ($c['posts'] > 0 || $c['logs'] > 0): ?>
									<br />
									<span class="fontSmall gray">
										<?php echo text_output($label['lastpost'], 'strong') .': '. $c['lastpost'];?>
									</span>
								<?php endif;?>
							</td>
							<td class="align_center"><?php echo $c['posts'];?></td>
							<td class="align_center"><?php echo $c['logs'];?></td>
							<td class="align_center"><?php echo $c['news'];?></td>
							<td class="align_center"><?php echo $c['posts'] + $c['logs'] + $c['news'];?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			<?php else: ?>
				<?php echo text_output($label['no_characters'], 'h3', 'orange');?>
			<?php endif;?>
		</div>
	</div>
</div>