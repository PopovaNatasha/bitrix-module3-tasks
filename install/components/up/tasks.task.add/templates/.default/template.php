<?php
/**
 * @var array $arResult
 */
?>
<form class="form-create-task" method="post" action="<?=POST_FORM_ACTION_URI?>">
	<div class="form-content">
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
					<div class="select">
						<select name="RESPONSIBLE">
							<?php foreach ($arResult['RESPONSIBLE'] as $responsible):?>
								<option><?= $responsible ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label">Priority</label>
				<div class="control">
					<div class="select">
						<select name="PRIORITY">
							<?php foreach ($arResult['PRIORITY'] as $priority):?>
								<option><?= $priority ?></option>
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