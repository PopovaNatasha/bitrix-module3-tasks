<?php

namespace Up\Tasks\Controller;

use Bitrix\Main\Engine\Controller,
	Bitrix\Main\Error,
	Up\Tasks\Task\Repository;

class Tasks extends Controller
{
	protected const TASK_PER_PAGE = 10;

	public function getListAction(int $pageNumber = 1): ?array
	{
		if ($pageNumber < 0)
		{
			$this->addError(new Error('pageNumber should be greater than 0', 'invalid_page_number'));

			return null;
		}

		$taskList = Repository::getPage(self::TASK_PER_PAGE, $pageNumber);

		return [
			'pageNumber' => $pageNumber,
			'taskList' => $taskList,
		];
	}

	public function deleteTaskAction(int $taskId): ?bool
	{
		try
		{
			Repository::deleteTask($taskId);

			return true;
		}
		catch (\Exception $error)
		{
			$this->addError(new Error($error->getMessage()));

			return null;
		}
	}
}