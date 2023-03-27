this.BX = this.BX || {};
this.BX.Up = this.BX.Up || {};
(function (exports,main_core) {
	'use strict';

	var TaskAdd = /*#__PURE__*/function () {
	  function TaskAdd() {
	    var options = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {
	      name: 'TaskAdd'
	    };
	    babelHelpers.classCallCheck(this, TaskAdd);
	    this.name = options.name;
	  }
	  babelHelpers.createClass(TaskAdd, [{
	    key: "setName",
	    value: function setName(name) {
	      if (main_core.Type.isString(name)) {
	        this.name = name;
	      }
	    }
	  }, {
	    key: "getName",
	    value: function getName() {
	      return this.name;
	    }
	  }]);
	  return TaskAdd;
	}();

	exports.TaskAdd = TaskAdd;

}((this.BX.Up.Tasks = this.BX.Up.Tasks || {}),BX));
