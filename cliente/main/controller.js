angular.module('myApp.controllers', []).controller('BreakinBadCharCtrl', function($scope, BreakinBadChar){

	BreakinBadChar.delete({"num_registro":"12121-55","nombreProveedor":"Z","direccion":"Otra cosa","correoContacto":"algoyotracosa@algo.com","estado":false,"cuentas":[{"numCuenta":"0006789-567-67"} ], "telefono":"2577-7777"});
});
