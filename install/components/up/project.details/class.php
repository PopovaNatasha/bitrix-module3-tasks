<?php

class ProjectDetailsComponent extends CBitrixComponent
{
	public function executeComponent()
	{
		$this->fetchProjectData();
		$this->includeComponentTemplate();
	}

	public function onPrepareComponentParams($arParams)
	{
		$arParams['ID'] = (int)$arParams['ID'];
		if ($arParams['ID'] <= 0)
		{
			throw new Exception('Invalid project ID');
		}

		return $arParams;
	}

	protected function fetchProjectData()
	{
		// db connect
		// select * from projects where ID =

		$this->arResult['PROJECT'] = [
			'ID' => $this->arParams['ID'],
			'NAME' => 'Projector - simple tool for managing issues',
			'DESCRIPTION' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
		];
	}
}