this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var DeleteTask = /*#__PURE__*/function () {
	  function DeleteTask() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
	    babelHelpers.classCallCheck(this, DeleteTask);
	    if (main_core.Type.isStringFilled(options.rootNodeId)) {
	      this.rootNodeId = options.rootNodeId;
	    } else {
	      throw new Error('DeleteTask: "${this.rootNodeId}" required');
	    }
	    this.rootNode = document.getElementById(this.rootNodeId);
	    if (!this.rootNode) {
	      throw new Error('DeleteTask: element with id "${this.rootNodeId}" not found');
	    }
	    this.deleteTask(this.rootNodeId);
	  }
	  babelHelpers.createClass(DeleteTask, [{
	    key: "deleteTask",
	    value: function deleteTask() {
	      var _this = this;
	      return new Promise(function (resolve, reject) {
	        BX.ajax.runAction('up:tasks.tasks.DeleteTask', {
	          data: {
	            taskId: Number(_this.rootNodeId)
	          }
	        }).then(function (response) {
	          console.log(response);
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
