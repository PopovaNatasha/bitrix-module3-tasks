<?php

class ProjectListComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->prepareTemplateParams();
		$this->fetchProjectsList();
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['DATE_FORMAT'] = $arParams['DATE_FORMAT'] ?? 'd.m.Y';

		return $arParams;
	}

	protected function prepareTemplateParams()
	{
		$this->arResult['DATE_FORMAT'] = $this->arParams['DATE_FORMAT'];
	}

	protected function fetchProjectsList()
	{
		// db connect
		// select * from projects
		$projects = [
			[
				'id' => 123,
				'name' => 'Bitrix University Demo',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem blanditiis commodi cum dicta ex excepturi in ipsa, iusto maxime molestiae nobis non officia officiis porro sunt, tempore vel vero, voluptates!',
				'tasks_count' => 10,
				'last_activity' => new DateTime(),
			],
			[
				'id' => 456,
				'name' => 'Projector - simple tool for managing issues',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
				'tasks_count' => 34,
				'last_activity' => new DateTime(),
			]
		];

		$this->arResult['PROJECTS'] = $projects;
	}
}