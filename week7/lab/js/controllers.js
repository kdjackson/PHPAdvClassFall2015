'use strict';

var appControllers = angular.module('appControllers', []);

appControllers.controller('CorporationCtrl', ['$scope', '$log', 'corporationProvider',
    function ($scope, $log, corporationProvider) {

        $scope.corporations = [];

        function getCorporations() {
            corporationProvider.getAllCorporations().success(function (response) {
                $scope.corporations = response.data;
            }).error(function (response, status) {
                $log.log(response);
            });
        }
        ;

        getCorporations();


    }])

        .controller('CorporationDetailCtrl', ['$scope', '$log', '$routeParams', 'corporationProvider',
            function ($scope, $log, $routeParams, corporationProvider) {

                var corporationID = $routeParams.corporationId;
               
                function getCorporation() {
                    corporationProvider.getCorporations(corporationID).success(function (response) {                       
                        $scope.corporation = response.data;
                        $scope.corporation.incorp_dt = new Date($scope.corporation.incorp_dt);
                        loadMap($scope.corporation.location);                        
                    }).error(function (response, status) {
                        $log.log(response);
                    });
                }
                ;

                getCorporation();

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




