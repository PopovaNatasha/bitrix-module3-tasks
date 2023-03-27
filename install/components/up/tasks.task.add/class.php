<?php

use Up\Tasks\Model\PriorityTable;
use Up\Tasks\Model\ResponsibleTable;
use Up\Tasks\Model\TaskTable,
	Up\Tasks\Model\StatusTable,
	Bitrix\Main\Context;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

class TaskAddComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$method = Context::getCurrent()->getRequest()->getRequestMethod();

		if ($method === 'GET')
		{
			$this->fetchTaskResponsible();
			$this->fetchTaskPriority();
			$this->includeComponentTemplate();
		}
		if ($method === 'POST')
		{
			$this->addTask();
			$this->fetchTaskResponsible();
			$this->fetchTaskPriority();
			$this->includeComponentTemplate();
		}
	}

	protected function fetchTaskResponsible()
	{
		$responsibleList = ResponsibleTable::getList([
			'select' => ['NAME']
		]);

		foreach ($responsibleList as $responsible)
		{
			$this->arResult['RESPONSIBLE'][] = $responsible['NAME'];
		}
	}

	protected function fetchTaskPriority(): void
	{
		$priorityList = PriorityTable::getList([
			'select' => ['NAME']
		]);

		foreach ($priorityList as $priority)
		{
			$this->arResult['PRIORITY'][] = $priority['NAME'];
		}
	}

	protected function addTask(): void
	{
		$task = Context::getCurrent()->getRequest()->getPostList()->toArray();

		$responsibleId = ResponsibleTable::getRow([
			'select' => ['ID'],
			'filter' => ['NAME' => $task['RESPONSIBLE']]
		]);

		$priorityID = PriorityTable::getRow([
			'select' => ['ID'],
			'filter' => ['NAME' => $task['PRIORITY']]
		]);

		$responsibleId = (int)$responsibleId['ID'];
		$priorityID = (int)$priorityID['ID'];

		$result = TaskTable::add([
			'NAME' => $task['TASK'],
			'RESPONSIBLE_ID' => $responsibleId,
			'PRIORITY_ID' => $priorityID,
			'STATUS_ID' => 1
		]);

		if ($result->isSuccess())
		{
			var_dump($result->getId());
		}

	}
}