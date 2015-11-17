'use strict';
  
var appServices = angular.module('appServices', []);
 
appServices.factory('addressProvider', ['$http', 'config', function($http, config) {

    var url = config.endpoints.address;
    var model = config.models.address;
    
    return {
        "getAllAddresses": function () {
            return $http.get(url);
        },
        "getAddresses": function (address_id) {
            var _url = url + '/' + address_id;
            console.log(_url);
            return $http.get(_url);
        },
        "postAddress": function (address_id, fullname, email, addressline1, city, state, zip, birthday) {
            model.fullname = fullname;
            model.email = email;
            model.addressline1 = addressline1;
            model.city = city;
            model.state = state;
            model.zip = zip;
            model.birthday = birthday;
            return $http.post(url, model);
        },
        "deleteAddress" : function (address_id) {
            var _url = url + address_id;
            return $http.delete(_url);
        },
        "updateAddress" : function (address_id, fullname, email, addressline1, city, state, zip, birthday ) {  
            var _url = url + '/' + address_id;
            model.fullname = fullname;
            model.email = email;
            model.addressline1 = addressline1;
            model.city = city;
            model.state = state;
            model.zip = zip;
            model.birthday = birthday;
            return $http.put(_url, model);
        }
    };
}]);


