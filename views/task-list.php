<?php
/**
 * @var CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Tasks");

$APPLICATION->IncludeComponent('up:tasks.task.list', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>