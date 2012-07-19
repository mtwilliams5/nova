<?php
/**
 * Form Tabs Model
 *
 * *NOTE:* The link_id field does not reference another field in the database,
 * it is used to build the clickable tab.
 *
 * @package		Nova
 * @subpackage	Fusion
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Fusion;

class Model_Form_Tab extends \Model {
	
	public static $_table_name = 'form_tabs';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'form_key' => array(
			'type' => 'string',
			'constraint' => 20),
		'name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'link_id' => array(
			'type' => 'string',
			'constraint' => 20,
			'null' => true),
		'order' => array(
			'type' => 'int',
			'constraint' => 5,
			'null' => true),
		'display' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => 1),
		'updated_at' => array(
			'type' => 'bigint',
			'constraint' => 20,
			'null' => true),
	);

	/**
	 * Relationships
	 */
	public static $_has_many = array(
		'sections' => array(
			'model_to' => '\\Model_Form_Section',
			'key_to' => 'tab_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	/**
	 * Observers
	 */
	protected static $_observers = array(
		'\\Form_Tab' => array(
			'events' => array('before_delete', 'after_insert', 'after_update')
		),
		'\\Orm\\Observer_UpdatedAt' => array(
			'events' => array('before_save')
		),
	);

	public static function get_tabs($key)
	{
		$items = static::find()->where('form_key', $key)->order_by('name', 'asc')->get();

		$tabs = array();

		if (count($items) > 0)
		{
			foreach ($items as $tab)
			{
				$tabs[$tab->id] = $tab->name;
			}
		}

		return $tabs;
	}
}