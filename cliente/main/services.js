

angular.module('myApp.services', []).factory('ProveedorChar', function($resource){

  return $resource('http://localhost:8000/proveedor',{}, {

    query: {method:'GET', isArray: true},
    get : {method: 'GET'},
    save : {method: 'POST'},
    update : {method: 'PUT'},
    delete : {method: 'DELETE'}

  });

});

