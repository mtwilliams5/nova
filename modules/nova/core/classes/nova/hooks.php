<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Hooks class
 *
 * @package		Nova
 * @category	Hooks
 * @author		Anodyne Productions
 */

abstract class Nova_Hooks
{
	/**
	 * The browser hook grabs the user's browser and version from the user agent and then
	 * checks it against the list of acceptable browser versions. Nova 2 requires users
	 * to have IE 8+, Safari 4+, Firefox 3+ or Chrome 3+.
	 *
	 * @uses	Request::user_agent
	 * @uses	URL::base
	 * @return	void
	 */
	public static function browser()
	{
		// create an array of browsers and versions that we don't allow
		$notallowed = array(
			'Internet Explorer'	=> 8,
			'Safari'			=> 4,
			'Firefox'			=> 3,
			'Chrome'			=> 3,
		);
		
		// get the browser
		$browser = Request::user_agent('browser');
		
		// get the browser version
		$version = Request::user_agent('version');
		
		// make sure the index exists
		if (isset($notallowed[$browser]))
		{
			// if the version requirements don't line up, redirect them
			if (version_compare($version, $notallowed[$browser], '<'))
			{
				header('Location:'.url::base().'browser.php?b='.$browser.'&v='.$version.'&pv='.$notallowed[$browser]);
			}
		}
	}
	
	public static function maintenance()
	{
		# code...
	}
} // End hooks