angular.module('myApp.services', []).factory('BreakinBadChar', function($resource){

  return $resource('http://localhost:8000/proveedor/:num_registro', {num_registro:'@num_registro'}, {

    query: {method:'GET', isArray: true},
    get : {method: 'GET'},
    save : {method: 'POST'}

  });

});