<?php

namespace Up\Tasks\Model;

use Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\ORM\Fields\Relations\Reference,
	Bitrix\Main\ORM\Query\Join;

/**
 * Class StatusTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> NAME string(60) mandatory
 * </ul>
 *
 * @package Bitrix\Tasks
 **/

class StatusTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_status';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	public static function getMap()
	{
		return [
			new IntegerField(
				'ID',
				[
					'primary' => true,
					'autocomplete' => true,
				]
			),
			new StringField(
				'NAME',
				[
					'required' => true,
					'validation' => [__CLASS__, 'validateName'],
				]
			),
			// new Reference(
			// 	'TASK',
			// 	TasksTable::class,
			// 	Join::on('this.ID', 'ref.STATUS_ID')
			// )
		];
	}

	/**
	 * Returns validators for NAME field.
	 *
	 * @return array
	 */
	public static function validateName()
	{
		return [
			new LengthValidator(null, 60),
		];
	}
}