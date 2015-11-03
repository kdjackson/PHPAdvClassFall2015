'use strict';
angular
    .module('app.widgets')
    .controller('WidgetController', WidgetController);

WidgetController.$inject = ['TodoService'];

function WidgetController(TodoService) {
    var vm = this;
    
    vm.todoItems = TodoService.getTodoList();    
    vm.addTodoItem = TodoService.add;
    vm.removeTodoItem = TodoService.remove;
    
    
}

