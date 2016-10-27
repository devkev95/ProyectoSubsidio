angular.module('myApp.services', []).factory('BreakinBadChar', function($resource){

  return $resource('http://localhost:8000/proveedor', {}, {

    query: {method:'GET', isArray: true}

  });

});