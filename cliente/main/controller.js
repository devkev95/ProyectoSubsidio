angular.module('myApp.controllers', []).controller('BreakinBadCharCtrl', function($scope, BreakinBadChar){

	BreakinBadChar.save({numRegistro:'876565-54', direccion:'Algo', telefono:'3456-7890', correoContacto:'algo@algo.com',
						estado:true, cuentas:[{numCuenta:'0006789-567-67'}, {numCuenta:'0007567-786'}]})
});
