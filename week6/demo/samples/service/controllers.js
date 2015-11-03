'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('MyController', ['$scope', 'phonesProvider', function($scope, phonesProvider) {
    
    
    phonesProvider.getPhones().success(function(response) {
         console.log(response);    
    }).error(function (response, status) {
       console.log(response);
    });
    
    
   
   console.log('loaded');
    
}]);



