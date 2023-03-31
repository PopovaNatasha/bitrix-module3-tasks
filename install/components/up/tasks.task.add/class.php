<?php

use Up\Tasks\Model\PriorityTable,
	Up\Tasks\Model\ResponsibleTable,
	Up\Tasks\Model\TaskTable,
	Bitrix\Main\Context;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class TaskAddComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		try
		{
			$this->fetchTaskPriority();
			$this->fetchTaskResponsible();
			$this->includeComponentTemplate();

			if (Context::getCurrent()->getRequest()->isPost())
			{
				$this->addTask();
				// header("Location: /");
			}
		}
		catch (Exception $e)
		{
			ShowError($e->getMessage());
		}
	}

	protected function fetchTaskResponsible(): void
	{
		$responsibleList = ResponsibleTable::getList([
			'select' => ['ID', 'NAME']
		]);

		foreach ($responsibleList as $responsible)
		{
			$this->arResult['RESPONSIBLE'][] = $responsible;
		}
	}

	protected function fetchTaskPriority(): void
	{
		$priorityList = PriorityTable::getList([
			'select' => ['ID', 'NAME']
		]);

		foreach ($priorityList as $priority)
		{
			$this->arResult['PRIORITY'][] = $priority;
		}
	}

	protected function addTask(): void
	{
		$task = Context::getCurrent()->getRequest()->getPostList()->toArray();

		if (!trim($task['TASK']) || !trim($task['RESPONSIBLE']) || !trim($task['PRIORITY']))
		{
			throw new Exception('All fields must be hidden');
		}

		$responsibleId = (int)$task['RESPONSIBLE'];
		$priorityID = (int)$task['PRIORITY'];

		$result = TaskTable::add([
			'NAME' => $task['TASK'],
			'RESPONSIBLE_ID' => $responsibleId,
			'PRIORITY_ID' => $priorityID,
			'STATUS_ID' => 1
		]);

		if ($result->isSuccess())
		{
			$this->arResult['FORM_STATUS'] = 'SUCCESS';
		}
	}
}