import {Type} from 'main.core';

export class DeleteTask
{
	constructor(options = {})
	{
		// this.taskId = '';
		this.rootNodeId = options.rootNodeId;
		console.log(this.rootNodeId);
	}

	deleteTask()
	{
		return new Promise((resolve, reject) => {
			BX.ajax.runAction(
					'up:tasks.tasks.DeleteTask',
					{
						taskId: 1,
					})
				.then((response) => {
					const taskList = response.data.taskList;

					resolve(taskList);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}
}