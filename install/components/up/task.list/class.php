<?php

class TaskListComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->fetchIssues();
		$this->includeComponentTemplate();
	}

	protected function fetchIssues()
	{
		$this->arResult['ISSUES'] = [
			[
				'ID' => 555,
				'NAME' => 'Create design prototype',
				'RESPONSIBLE' => 'Eugene Zadorin',
				'PRIORITY' => 'High',
				'STATUS' => 'In progress',
			],
			[
				'ID' => 111,
				'NAME' => 'Build database schema',
				'RESPONSIBLE' => 'Eugene Zadorin',
				'PRIORITY' => 'Normal',
				'STATUS' => 'New',
			],
			[
				'ID' => 222,
				'NAME' => 'Write some tests',
				'RESPONSIBLE' => 'Eugene Zadorin',
				'PRIORITY' => 'Low',
				'STATUS' => 'Done',
			],
		];
	}

}