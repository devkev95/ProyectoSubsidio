angular.module('myAppEdit.controllers', []).controller('TablaProveedoresEditCtrl', function($scope, ProveedorChar){
	ProveedorChar.update({"nombreProveedor":"nombre_proveedor","direccion":"direccion","correoContacto":"correo_contacto","estado":"estado","cuentas":[ ], "telefono":"telefono"})

});
