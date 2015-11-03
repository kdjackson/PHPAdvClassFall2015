'use strict';
angular
    .module('app.widgets')
    .directive('widgetOne', widgetOne);

function widgetOne() {
    var directive = {
        restrict: 'EA',
        templateUrl: 'templates/widget-one.directive.html',
        scope: {
            title: '@',
            todoItems: '=',
            removeItem: '&'
        },
        link: link
        
    };
    return directive;

    function link(scope, element, attrs) {
      
    }
}