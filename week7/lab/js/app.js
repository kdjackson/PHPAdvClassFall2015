'use strict';

var myApp = angular.module('myApp', [
    'ngRoute',
    'appControllers',
    'appServices'
]);

myApp.constant('config', {
    "endpoints": {
        "corporation": 'http://localhost:81/PHPAdvClass2015/week5/lab/api/v1/corp'
    },
    "models": {
        "corporation": {
            "corp": '',
            "incorp_dt": '',
            "email": '',
            "owner": '',
            "phone": '',
            "location": ''
        }
    }

});


myApp.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.
                when('/', {
                    templateUrl: 'partials/corporations.html',
                    controller: 'CorporationCtrl'
                }).
                when('/corporation/:corporationId', {
                    templateUrl: 'partials/corporation-detail.html',
                    controller: 'CorporationDetailCtrl'
                }).
                otherwise({
                    redirectTo: '/'
                });
    }]);

/*
 myApp.config(['$httpProvider',
 function($httpProvider) {
 // Use x-www-form-urlencoded Content-Type
 $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
 
 $httpProvider.defaults.transformRequest = function(data){
 if (data === undefined) {
 return data;
 }
 var str = [];
 for(var key in data) {
 if (data.hasOwnProperty(key)) {
 var val = data[key];
 str.push(encodeURIComponent(key) + "=" + encodeURIComponent(val));
 }
 }
 return str.join("&");
 }; 
 
 }]); */