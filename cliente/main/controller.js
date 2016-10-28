angular.module('myApp.controllers', []).controller('BreakinBadCharCtrl', function($scope, BreakinBadChar){

	BreakinBadChar.delete({num_registro:'876565-54'})
});
