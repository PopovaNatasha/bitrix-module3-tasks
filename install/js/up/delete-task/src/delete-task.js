import {Type} from 'main.core';

export class DeleteTask
{
	constructor(options = {})
	{
		if (Type.isStringFilled(options.rootNodeId))
		{
			this.rootNodeId = options.rootNodeId;
		}
		else
		{
			throw new Error('DeleteTask: "${this.rootNodeId}" required');
		}

		this.rootNode = document.getElementById(this.rootNodeId);
		if (!this.rootNode)
		{
			throw new Error('DeleteTask: element with id "${this.rootNodeId}" not found');
		}

		this.deleteTask(this.rootNodeId);
	}

	deleteTask()
	{
		return new Promise((resolve, reject) => {
			BX.ajax.runAction(
					'up:tasks.tasks.DeleteTask',
					{data: {
							taskId: Number(this.rootNodeId),
						},
					})
				.then((response) => {
					console.log(response);
				})
				.catch((error) => {
					reject(error);
				})
			;
		});
	}
}