'use strict';

var appFilters = angular.module('appFilters', []);

appFilters.filter('findPhone', function() {
    return function(arr, id) {
        if ( !angular.isArray(arr) || !arr.length || !angular.isString(id) ) return arr;
        var results = {};
        
        // it's more
        angular.forEach(arr, function (value, key) {
            if ( !results.length ) {
                if ( value.hasOwnProperty('id') && value.id === id ) {
                    results = angular.copy(value);
                }
            }
        }, results);
        
        
        return results;
    };
});