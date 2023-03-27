<?php

namespace Up\Tasks\Task;

use Up\Tasks\Model\TaskTable;

class Repository
{
	public static function getPage(int $itemPerPage, int $pageNumber): array
	{
		if ($pageNumber > 1)
		{
			$offset = $itemPerPage * ($pageNumber - 1);
		}
		else
		{
			$offset = 0;
		}

		$taskList = TaskTable::getList([
			'select' => [
				'ID',
				'NAME',
			],
			'limit' => $itemPerPage,
			'offset' => $offset,
		])->fetchAll();

		return $taskList;
	}

	// public static function addTask(string $task)
	// {
	// 	$result = TaskTable::add([
	// 		'NAME' => $task,
	// 	]);
	//
	// 	if (!$result->isSuccess)
	// 	{
	// 		throw new \Exception($result->getErrors);
	// 	}
	// }
}
