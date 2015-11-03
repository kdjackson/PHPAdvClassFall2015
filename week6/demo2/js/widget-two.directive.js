'use strict';
angular
    .module('app.widgets')
    .directive('widgetTwo', widgetTwo);

function widgetTwo() {
    var directive = {
        restrict: 'EA',
        templateUrl: 'templates/widget-two.directive.html',
        scope: {
            title: '@',
            add: '&'
        },
        link: link
        
    };
    return directive;

    function link(scope, element, attrs) {
      
    }
}

