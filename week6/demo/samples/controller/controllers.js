'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('MyController', ['$scope', function($scope) {
    $scope.customSpice = "wasabi";
    $scope.spice = 'very';

    $scope.spicy = function(spice) {
        $scope.spice = spice;
    };
}]);



