 'use strict';

var myApp = angular.module('myApp', [
  'ngRoute',
  'appControllers'
]);

myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
        when('/', {
            templateUrl: 'partials/home.html',
             controller: 'HomeController'
        }).
        when('/Book/:bookId', {
            templateUrl: 'partials/book.html',
            controller: 'BookController',
        }).
        when('/Book/:bookId/ch/:chapterId', {
            templateUrl: 'partials/chapter.html',
            controller: 'ChapterController'
        }).
        otherwise({
          redirectTo: '/'
        });
  }]);