<?php

use Up\Tasks\Model\PriorityTable;
use Up\Tasks\Model\ResponsibleTable;
use Up\Tasks\Model\TaskTable,
	Up\Tasks\Model\StatusTable;


class TaskListComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->fetchTasksList();
		$this->includeComponentTemplate();
	}

	protected function fetchTasksList()
	{
		// ResponsibleTable::add([
		// 	'Name' => 'Svetlana Morozova'
		// ]);

		// TaskTable::update(6, [
		// 	'RESPONSIBLE_ID' => '3'
		// ]);

		// $tasks1 = TaskTable::query()->setSelect(['*', 'STATUS'])->fetchCollection();
		// foreach ($tasks1 as $task)
		// {
		// 	var_dump($task);
		// }

		// foreach ($tasks1-> as $task)
		// {
		// 	var_dump($task->getTitle());
		// }
		//
		$result = TaskTable::getList([
			'select' => [
				'*',
				'STATUS_NAME' => 'STATUS.NAME',
				'PRIORITY_NAME' => 'PRIORITY.NAME',
				'RESPONSIBLE_NAME' => 'RESPONSIBLE.NAME'
			]
		]);
		$tasks = [];

		foreach ($result as $item)
		{
			$tasks[] = $item;
		}

		$this->arResult['TASKS'] = $tasks;
	}

	protected function deleteTask()
	{

	}
}