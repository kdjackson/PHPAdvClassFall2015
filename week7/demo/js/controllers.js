'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('AddressCtrl', ['$scope', '$log', 'addressProvider', 
    function($scope, $log, addressProvider) {
    
        $scope.addresses = [];

        function getAddresses() {    
            addressProvider.getAllAddresses().success(function(response) {
                $scope.addresses = response.data;
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getAddresses();
    
    
}])

.controller('AddressDetailCtrl', ['$scope', '$log', '$routeParams', 'addressProvider',
    function($scope, $log, $routeParams, addressProvider) {
    
       var addressID = $routeParams.addressId;
        
       function getAddress() {    
            addressProvider.getAddresses(addressID).success(function(response) {
                $scope.address = response.data;
                $scope.address.birthday = new Date($scope.address.birthday);                
                console.log($scope.address);
                loadMap('41.8239890,-71.4128340');
            }).error(function (response, status) {
               $log.log(response);
            });
        };

        getAddress();
        
        
        function loadMap(location) {

        var lat = location.split(',')[0];
        var long = location.split(',')[1];

            var myCenter = new google.maps.LatLng(lat, long);

                var mapProp = {
                    center: myCenter,
                    zoom: 10,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
                var marker = new google.maps.Marker({
                    position: myCenter
                });
                marker.setMap(map);

        }
        
    
}]);



