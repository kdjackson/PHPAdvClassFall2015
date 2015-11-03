'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('MyController', ['$scope', function($scope) {
    $scope.greeting = 'hello';
}]);



