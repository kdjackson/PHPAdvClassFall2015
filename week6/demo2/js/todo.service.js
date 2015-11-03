'use strict';
angular
    .module('app.widgets')
    .factory('TodoService', TodoService);

//TodoService.$inject = ['$log'];

function TodoService($log) {
    
    var service = {
        '_properties' : {
            'todoList' : []
        },
        'getTodoList' : getTodoList,
        'add' : add,
        'remove' : remove
        
    };
    return service;

    ////////////

    function getTodoList() {
        return service._properties.todoList;
    };
    
    function add(item) {
        if ( angular.isString(item) && item.length ) {
            service._properties.todoList.push(item);
            console.log('item Added ' + item);
        }
        return service;
    };
    
    function remove() {        
        var list = getTodoList(),
            itemRemoved = list.pop();
        console.log('item Removed ' + itemRemoved);
        return service;
    };
}