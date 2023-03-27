<?php

namespace Up\Tasks\Model;

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\ORM\Data\DataManager,
	Bitrix\Main\ORM\Fields\IntegerField,
	Bitrix\Main\ORM\Fields\StringField,
	Bitrix\Main\ORM\Fields\Validators\LengthValidator,
	Bitrix\Main\ORM\Fields\Relations\Reference,
	Bitrix\Main\ORM\Query\Join;

/**
 * Class TaskTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> NAME string(255) mandatory
 * <li> RESPONSIBLE_ID int mandatory
 * <li> PRIORITY_ID int mandatory
 * <li> STATUS_ID int mandatory
 * </ul>
 *
 * @package Bitrix\Tasks
 **/
class TaskTable extends DataManager
{
	/**
	 * Returns DB table name for entity.
	 *
	 * @return string
	 */
	public static function getTableName()
	{
		return 'up_tasks_task';
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
				'ID', [
						'primary' => true,
						'autocomplete' => true,
						'title' => Loc::getMessage('TASK_ENTITY_ID_FIELD')
					]
			),
			new StringField(
				'NAME', [
						  'required' => true,
						  'validation' => [__CLASS__, 'validateName'],
						  'title' => Loc::getMessage('TASK_ENTITY_NAME_FIELD')
					  ]
			),
			new IntegerField(
				'RESPONSIBLE_ID', [
									'required' => true,
									'title' => Loc::getMessage('TASK_ENTITY_RESPONSIBLE_ID_FIELD')
								]
			),
			new IntegerField(
				'PRIORITY_ID', [
								 'required' => true,
								 'title' => Loc::getMessage('TASK_ENTITY_PRIORITY_ID_FIELD')
							 ]
			),
			new IntegerField(
				'STATUS_ID', [
							   'required' => true,
							   'title' => Loc::getMessage('TASK_ENTITY_STATUS_ID_FIELD')
						   ]
			),
			new Reference(
				'STATUS',
				StatusTable::class,
				Join::on('this.STATUS_ID', 'ref.ID')
			),
			new Reference(
				'PRIORITY',
				PriorityTable::class,
				Join::on('this.PRIORITY_ID', 'ref.ID')
			),
			new Reference(
				'RESPONSIBLE',
				ResponsibleTable::class,
				Join::on('this.RESPONSIBLE_ID', 'ref.ID')
			)
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
			new LengthValidator(null, 255),
		];
	}
}