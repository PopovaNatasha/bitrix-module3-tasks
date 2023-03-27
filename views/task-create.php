<?php
/**
 * @var CMain $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("New task");

$APPLICATION->IncludeComponent('up:tasks.task.add', '', []);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>