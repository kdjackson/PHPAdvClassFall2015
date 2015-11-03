'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('PhoneListCtrl', ['$scope', 'phonesProvider', function($scope, phonesProvider) {
    
    $scope.phones = {};
    
    phonesProvider.getPhones().success(function(response) {
         $scope.phones = response;
    }).error(function (response, status) {
       console.log(response);
    });
    
    
}])
.controller('PhoneDetailCtrl', ['$scope', '$routeParams', 'phonesProvider', 'findPhoneFilter', 
    function($scope, $routeParams, phonesProvider, findPhoneFilter) {
    
        $scope.phone = {};
        var id = $routeParams.phoneId;

        phonesProvider.getPhones().success(function(response) {
             $scope.phone = findPhoneFilter(response,id);              
        }).error(function (response, status) {
           console.log(response);
        });  
    
}]);




