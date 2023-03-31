<?php

/**
 * @var array $arResult
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
?>

<?php if ($arResult['FORM_STATUS'] === 'SUCCESS'):?>
	<div class="notification is-primary" id="notification" style="display: block">
		<button class="delete" onclick="(document.getElementById('notification').style.display='none')"></button>
		Задача успешно добавлена
	</div>
<?php endif;?>

<form class="form-create-task" method="post" action="<?=POST_FORM_ACTION_URI?>">

	<div class="form-content" id="form-task-add">
		<div class="field">
			<label class="label">Task</label>
			<div class="control">
				<input class="input" type="text" name="TASK" required>
			</div>
		</div>

		<div class="field is-grouped">
			<div class="field mr-6">
				<label class="label">Responsible</label>
				<div class="control">
					<div class="select" id="select-responsible">
						<select name="RESPONSIBLE">
							<?php foreach ($arResult['RESPONSIBLE'] as $responsible):?>
								<option value="<?= $responsible['ID'] ?>"><?= $responsible['NAME'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label">Priority</label>
				<div class="control">
					<div class="select" id="select-priority">
						<select name="PRIORITY">
							<?php foreach ($arResult['PRIORITY'] as $priority):?>
								<option value="<?= $priority['ID'] ?>"><?= $priority['NAME'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div>

		<div class="field is-grouped">
			<div class="control">
				<button class="button is-link">Create</button>
			</div>
		</div>
	</div>
</form>
