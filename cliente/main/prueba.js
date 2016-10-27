var app = angular.module('booksInventoryApp', []);

app.controller('booksCtrl', function($scope, $http) {

  $http.get("localhost:8000/proveedor")
    .then(function(response) {
      $scope.data = response.data;
    });
});