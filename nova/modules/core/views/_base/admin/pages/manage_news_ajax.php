<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php echo text_output($label['header_news'], 'h2', 'page-subhead');?>

<?php if (isset($entries)): ?>
	<?php echo $pagination;?>
	
	<table class="table100 zebra">
		<tbody>
		<?php foreach ($entries as $e): ?>
			<tr>
				<td>
					<strong><?php echo $e['title'];?></strong><br />
					<span class="fontSmall gray">
						<?php echo $label['by'] .' '. $e['author'];?><br />
						
						<strong><?php echo $label['category'];?></strong> <?php echo $e['category'];?><br />
						<strong><?php echo $label['date'];?>:</strong> <?php echo $e['date'];?>
					</span>
				</td>
				<td class="col_150 align_right">
					<?php echo anchor('main/viewnews/'. $e['id'], img($images['view']), array('class' => 'image'));?>
					&nbsp;
					<?php if ($e['status'] == 'pending'): ?>
						<a href="#" rel="facebox" class="image" myAction="approve" myID="<?php echo $e['id'];?>" myPage="<?php echo $page;?>" myStatus="<?php echo $status;?>">
							<?php echo img($images['approve']);?>
						</a>
						&nbsp;
					<?php endif;?>
					<a href="#" rel="facebox" class="image" myAction="delete" myID="<?php echo $e['id'];?>" myPage="<?php echo $page;?>" myStatus="<?php echo $status;?>">
						<?php echo img($images['delete']);?>
					</a>
					&nbsp;
					<?php echo anchor('manage/news/edit/'. $e['id'], img($images['edit']), array('class' => 'image'));?>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
	</table><br />
	
	<?php echo $pagination;?>
<?php else: ?>
	<?php echo text_output($label['error_news'], 'h3', 'orange');?>
<?php endif;?>