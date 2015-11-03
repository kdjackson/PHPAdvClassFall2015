 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers',
  'appServices',
  'appFilters'
]);


myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/phone-list.html',
            controller: 'PhoneListCtrl'
        }).
        when('/phones/:phoneId', {
            templateUrl: 'partials/phone-detail.html',
            controller: 'PhoneDetailCtrl'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);