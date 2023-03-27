<?php

namespace Up\Tasks\Task;

use Up\Tasks\Model\PriorityTable;
use Up\Tasks\Model\ResponsibleTable;
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

		return TaskTable::getList([
			'select' => [
				'ID',
				'NAME',
				'STATUS_NAME' => 'STATUS.NAME',
				'PRIORITY_NAME' => 'PRIORITY.NAME',
				'RESPONSIBLE_NAME' => 'RESPONSIBLE.NAME'
			],
			'limit' => $itemPerPage,
			'offset' => $offset,
		])->fetchAll();
	}
}
