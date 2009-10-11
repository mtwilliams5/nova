<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
|---------------------------------------------------------------
| USER PANEL LIBRARY
|---------------------------------------------------------------
|
| File: libraries/User_panel_base.php
| System Version: 1.0
|
| Library that handles generating the user panel.
|
*/

class User_panel_base {
    
    var $skin;
    
	function User_panel_base()
	{
		$this->skin = $this->session->userdata('skin_admin');
	}
	
	function panel_1()
	{
		/* load the resources */
		$this->ci->load->library('parser');
		$this->ci->load->model('privmsgs_model', 'pm');
		
		/* run the methods */
		$player = $this->ci->player->get_user_details($this->ci->session->userdata('player_id'));
		$count = $this->ci->pm->count_unread_pms($this->ci->session->userdata('player_id'));
		
		$data['count'] = ($count > 0) ? ' <strong>('. $count .')</strong>' : FALSE;
		
		if ($player->num_rows() > 0)
		{
			$row = $player->row();
			
			$data['name'] = $row->name;
		}
		else
		{
			$data['name'] = '';
		}
		
		$data['label'] = array(
			'edit_account' => ucwords(lang('actions_edit') .' '. lang('labels_account')),
			'edit_prefs' => ucwords(lang('actions_edit') .' '. lang('labels_site') .' '. lang('labels_preferences')),
			'private_messages' => ucwords(lang('global_privatemessages')),
			'request_loa' => ucwords(lang('actions_request') .' '. lang('abbr_loa')),
		);
		
		/* parse the content */
		$content = $this->ci->parser->parse('_base/ajax/userpanel_1', $data, TRUE);
		
		return $content;
	}
	
	function panel_2()
	{
		/* load the resources */
		$this->ci->load->library('parser');
		
		/* run the methods */
		$characters = $this->ci->char->get_player_characters($this->ci->session->userdata('player_id'), 'active', 'array');
		
		/* set the variables */
		$data = array();
		
		foreach ($characters as $char)
		{
			$data['panel_characters'][] = array(
				'id' => $char,
				'name' => $this->ci->char->get_character_name($char, TRUE)
			);
		}
		
		$data['label'] = array(
			'characters' => ucfirst(lang('global_characters')),
		);
		
		/* parse the content */
		$content = $this->ci->parser->parse('_base/ajax/userpanel_2', $data, TRUE);
		
		return $content;
	}
	
	function panel_3()
	{
		/* load the resources */
		$this->ci->load->library('parser');
		
		$data['panel_my_links'] = $this->ci->session->userdata('my_links');
		
		$data['label'] = array(
			'links' => ucwords(lang('labels_my') .' '. lang('labels_links')),
		);
		
		/* parse the content */
		$content = $this->ci->parser->parse('_base/ajax/userpanel_3', $data, TRUE);
		
		return $content;
	}
	
	function panel_workflow()
	{
		/* load the resources */
		$this->ci->load->library('parser');
		$this->ci->load->model('privmsgs_model', 'pm');
		$this->ci->load->model('posts_model', 'posts');
		$this->ci->load->model('personallogs_model', 'logs');
		$this->ci->load->model('news_model', 'news');
		
		$data['unreadpm'] = $this->ci->pm->count_unread_pms($this->ci->session->userdata('player_id'));
		$data['unreadpm_icon'] = ($data['unreadpm'] > 0) ? 'green' : 'gray';
		
		$data['unreadjp'] = $this->ci->posts->count_unattended_posts($this->ci->session->userdata('characters'));
		
		$posts = $this->ci->posts->count_character_posts($this->ci->session->userdata('characters'), 'saved');
		$logs = $this->ci->logs->count_player_logs($this->ci->session->userdata('player_id'), 'saved');
		$news = $this->ci->news->count_player_news($this->ci->session->userdata('player_id'), 'saved');
		
		$data['saveditems'] = $posts + $logs + $news;
		
		$data['unreadjp_icon'] = ($data['saveditems'] > 0) ? 'yellow' : 'gray';
		$data['unreadjp_icon'] = ($data['unreadjp'] > 0) ? 'green' : $data['unreadjp_icon'];
		
		$data['icons'] = array(
			'green' => array(
				'src' => asset_location('images', 'icon-green.png'),
				'alt' => '',
				'class' => 'image panel-notify-icon'),
			'gray' => array(
				'src' => asset_location('images', 'icon-gray.png'),
				'alt' => '',
				'class' => 'image panel-notify-icon'),
			'yellow' => array(
				'src' => asset_location('images', 'icon-yellow.png'),
				'alt' => '',
				'class' => 'image panel-notify-icon'),
		);
		
		$data['label'] = array(
			'dashboard' => ucfirst(lang('labels_dashboard')),
			'inbox' => ucfirst(lang('labels_inbox')),
			'writing' => ucwords(lang('labels_writing') .' '. lang('labels_entries')),
		);
		
		/* parse the content */
		$content = $this->ci->parser->parse('_base/ajax/userpanel_workflow', $data, TRUE);
		
		return $content;
	}
}

/* End of file User_panel_base.php */
/* Location: ./application/libraries/User_panel_base.php */