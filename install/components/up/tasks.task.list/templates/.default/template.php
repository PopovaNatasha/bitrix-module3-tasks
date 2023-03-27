<?php

/**
* @var array $arResult
*/

\Bitrix\Main\UI\Extension::load('up.task-list');
\Bitrix\Main\UI\Extension::load('task-add');

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>
<div class="task-list">
	<div class="mb-4">
		<div class="field">
			<label class="label"></label>
			<div class="control">
				<input class="input" type="text" name="TASK" required placeholder="Input task">
				<a href="/tasks/create/" class="button is-success">Create</a>
			</div>
		</div>

	</div>

	<table class="table is-hoverable is-fullwidth mb-6" id="task-list-app">
<!--		<thead>-->
<!--		<tr>-->
<!--			<th>#</th>-->
<!--			<th>Task</th>-->
<!--			<th>Responsible</th>-->
<!--			<th>Priority</th>-->
<!--			<th>Status</th>-->
<!--			<th></th>-->
<!--		</tr>-->
<!--		</thead>-->
<!--		<tbody>-->
<!--		--><?php //foreach ($arResult['TASKS'] as $task):?>
<!--			<tr class="task" id="task-list-app">-->
<!--				<td>--><?//=$task['ID']?><!--</td>-->
<!--				<td>--><?//=$task['NAME']?><!--</td>-->
<!--				<td>--><?//=$task['RESPONSIBLE_NAME']?><!--</td>-->
<!--				<td><span class="tag is-danger">--><?//=$task['PRIORITY_NAME']?><!--</span></td>-->
<!--				<td><span class="tag is-info">--><?//=$task['STATUS_NAME']?><!--</span></td>-->
<!--				<td><button class="delete is-small"></button></td>-->
<!--			</tr>-->
<!--		--><?php //endforeach;?>
<!--		</tbody>-->
<!--	</table>-->
<!---->
<!--	<table class="table is-hoverable is-fullwidth mb-6">-->
<!--		<thead>-->
<!--		<tr>-->
<!--			<th>#</th>-->
<!--			<th>Task</th>-->
<!--			<th>Responsible</th>-->
<!--			<th>Priority</th>-->
<!--			<th>Status</th>-->
<!--			<th></th>-->
<!--		</tr>-->
<!--		</thead>-->
<!--		<tbody>-->
<!--		--><?php //foreach ($arResult['TASKS'] as $task):?>
<!--			<tr class="task" id="task-list-app">-->
<!--				<td>--><?//=$task['ID']?><!--</td>-->
<!--				<td>--><?//=$task['NAME']?><!--</td>-->
<!--				<td>--><?//=$task['RESPONSIBLE_NAME']?><!--</td>-->
<!--				<td><span class="tag is-danger">--><?//=$task['PRIORITY_NAME']?><!--</span></td>-->
<!--				<td><span class="tag is-info">--><?//=$task['STATUS_NAME']?><!--</span></td>-->
<!--				<td><button class="
"></button></td>-->
<!--			</tr>-->
<!--		--><?php //endforeach;?>
<!--		</tbody>-->
	</table>

	<div class="pagination-block">
		<nav class="pagination" role="navigation" aria-label="pagination">
			<ul class="pagination-list">
				<li>
					<a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
				</li>
				<li>
					<a class="pagination-link" aria-label="Goto page 2">2</a>
				</li>
				<li>
					<a class="pagination-link" aria-label="Goto page 3">3</a>
				</li>
			</ul>
		</nav>
	</div>


</div>



<!--<div id="task-list-app"></div>-->

<script>
	BX.ready(function() {

		window.TasksTaskList = new BX.Up.Tasks.TaskList({
			rootNodeId: 'task-list-app',
		});

	});
</script>