<script type="text/javascript">
	$(document).ready(function(){
		$('#toggle_notes').click(function(){
			$('.notes_content').slideToggle('fast');
			return false;
		});
		
		$('button[value="Delete"]').click(function(){
			window.confirm('<?php echo $this->lang->line('confirm_delete_missionpost');?>');
		});
		
		$('button[value="Post"]').click(function(){
			window.confirm('<?php echo $this->lang->line('confirm_post_missionpost');?>');
		});
		
		$('a#add_author').click(function() {
			var player = $('#all').val();
			var hidden = $('#authors_hidden').val();
			var name = $("option[value='" + player + "']").html();
			
			if (hidden == 0)
			{
				hidden = '';
			}
			
			/* update the hidden field */
			$('#authors_hidden').val(hidden + ',' + player + ',');
			
			/* update the list of recipients */
			$('#authors').append('<span class="' + player + '"><a href="#" id="remove_author" class="image" myID="' + player + '" myName="' + name + '"><?php echo $remove;?></a>' + name + '<br /></span>');
			
			/* hide the option so it can't be selected again */
			$("#all option[value='" + player + "']").attr('disabled', 'yes');
			
			return false;
		});
		
		$('a#remove_author').live('click', function(event) {
			var player = $(this).attr('myID');
			var name = $(this).attr('myName');
			var hidden = $('#authors_hidden').val();
			var new_hidden = hidden.replace(player, "");
			
			/* update the hidden field */
			$('#authors_hidden').val(new_hidden);
			
			/* remove the name from the list */
			$('#authors span.' + player).remove();
			
			/* show the option again */
			$("#all option[value='" + player + "']").attr('disabled', '');
			
			return false;
		});
		
		<?php if (isset($replyall)): ?>
			<?php foreach ($replyall as $r): ?>
				$("#all option[value='<?php echo $r;?>']").attr('disabled', 'yes');
			<?php endforeach; ?>
		<?php endif; ?>
	});
</script>