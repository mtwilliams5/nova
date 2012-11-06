<?php
/**
 * Rank Info Model
 *
 * @package		Nova
 * @subpackage	Fusion
 * @category	Model
 * @author		Anodyne Productions
 * @copyright	2012 Anodyne Productions
 */
 
namespace Fusion;

class Model_Rank_Info extends \Model
{
	public static $_table_name = 'rank_info_';
	
	public static $_properties = array(
		'id' => array(
			'type' => 'int',
			'constraint' => 11,
			'auto_increment' => true),
		'name' => array(
			'type' => 'string',
			'constraint' => 255,
			'null' => true),
		'short_name' => array(
			'type' => 'string',
			'constraint' => 20,
			'null' => true),
		'order' => array(
			'type' => 'int',
			'constraint' => 5,
			'null' => true),
		'group' => array(
			'type' => 'int',
			'constraint' => 5,
			'null' => true),
		'status' => array(
			'type' => 'tinyint',
			'constraint' => 1,
			'default' => \Status::ACTIVE),
	);

	/**
	 * Relationships
	 */
	public static $_has_many = array(
		'ranks' => array(
			'model_to' => '\\Model_Rank',
			'key_to' => 'info_id',
			'key_from' => 'id',
			'cascade_save' => false,
			'cascade_delete' => false,
		),
	);

	/**
	 * Observers
	 */
	protected static $_observers = array(
		'\\Rank_Info' => array(
			'events' => array('before_delete', 'after_insert', 'after_update')
		),
	);

	/**
	 * Since the table name is appended with the genre, we can't hard-code
	 * it in to the model. The _init method is necessary since PHP won't
	 * allow creating an object project that's dynamic. This method changes
	 * the name of the table once the class is loaded.
	 *
	 * @internal
	 * @return	void
	 */
	public static function _init()
	{
		static::$_table_name = static::$_table_name.\Config::get('nova.genre');
	}

	/**
	 * Returns all items from the database.
	 *
	 * @api
	 * @param	bool	whether to get only displayed items or not
	 * @return	void
	 */
	public static function getItems($only_active = false)
	{
		// start the find
		$query = static::find();

		// add a where statement only if we want just displayed items
		if ($only_active)
		{
			$query->where('status', \Status::ACTIVE);
		}

		// return the ordered list
		return $query->order_by('group', 'asc')->order_by('order', 'asc')->get();
	}
}