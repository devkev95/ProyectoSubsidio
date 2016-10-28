angular.module('myApp.controllers', []).controller('BreakinBadCharCtrl', function($scope, BreakinBadChar){

	BreakinBadChar.save({"numRegistro":"3333334-55","direccion":"Otra cosa","correoContacto":"algoyotracosa@algo.com","estado":false,"cuentas":[ ], "telefono":"2577-7777"})
});
