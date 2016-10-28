angular.module('myApp.controllers', []).controller('TablaProveedoresCtrl', function($scope, ProveedorChar){


	$scope.characters = ProveedorChar.query();


});
