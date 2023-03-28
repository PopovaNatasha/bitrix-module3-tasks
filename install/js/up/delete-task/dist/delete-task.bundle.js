this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var DeleteTask = /*#__PURE__*/function () {
	  function DeleteTask() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
	    babelHelpers.classCallCheck(this, DeleteTask);
	    // this.taskId = '';
	    this.rootNodeId = options.rootNodeId;
	    console.log(this.rootNodeId);
	  }
	  babelHelpers.createClass(DeleteTask, [{
	    key: "deleteTask",
	    value: function deleteTask() {
	      return new Promise(function (resolve, reject) {
	        BX.ajax.runAction('up:tasks.tasks.DeleteTask', {
	          taskId: 1
	        }).then(function (response) {
	          var taskList = response.data.taskList;
	          resolve(taskList);
	        })["catch"](function (error) {
	          reject(error);
	        });
	      });
	    }
	  }]);
	  return DeleteTask;
	}();

	exports.DeleteTask = DeleteTask;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
