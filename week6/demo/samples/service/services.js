'use strict';
  
var appServices = angular.module('appServices', []);
 
appServices.factory('phonesProvider', ['$http', function($http) {

    var url = '../../data/phones.json';

    return {
        "getPhones": function () {
            return $http.get(url);
        }
    };
}]);