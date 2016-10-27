angular.module('myApp.controllers', []).controller('BreakinBadCharCtrl', function($scope, BreakinBadChar){
	$scope.characters = BreakinBadChar.query();
});
