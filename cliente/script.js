var scotchApp = angular.module('scotchApp', ['ngRoute']);


	// configure our routes
	scotchApp.config(function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/login.html',
				controller  : 'loginController'
			})

			.when('/home', {
				templateUrl : 'pages/home.html',
				controller  : 'homeController'
			})
			.when('/nuevoUsuario', {
				templateUrl : 'pages/new_account.html',
				controller  : 'UserController'
			})
			.when('/usuario', {
				templateUrl : 'pages/usuario.html',
				controller  : 'UsuarioController'
			})	
			.when('/proveedor', {
				templateUrl : 'pages/crearProveedor.html',
				controller: 'proveedoresController'
			})					
			.when('/proveedores/', {
				templateUrl : 'pages/proveedores.html',
				controller: 'proveedoresController'
			})
			.when('/cuentas', {
				templateUrl : 'pages/crearCuenta.html',
				controller  : 'CuentaController'
			})
			.when('/cuentasC', {
				templateUrl : 'pages/cuentas.html',
				controller  : 'CuentaController'
			});

	});

	// create the controller and inject Angular's $scope
	

	scotchApp.controller('UserController', function($scope, $http) {


    $scope.addUsuario = function(){	
   
   
   // $scope.characters.push({'num_registro':$scope.num_registro, 'nombre_proveedor': $scope.nombre_proveedor, 'direccion':$scope.direccion, 'telefono':$scope.telefono, 'correo_contacto': $scope.correo_contacto, 'estado':$scope.estado, 'cuentas':$scope.cuentas});
	
    //var data = "numRegistro=" +$scope.num_registro + ',nombreProveedor='+ $scope.nombre_proveedor + ',direccion=' + $scope.direccion + ', telefono=' + $scope.telefono + ', correoContacto=' + $scope.correo_contacto + ',estado=' + $scope.estado + ',cuentas=' + $scope.cuentas;
    var data = {"email":""+$scope.email+"","password": ""+$scope.password+"","nombres":""+$scope.nombres+"", "apellidos":""+$scope.apellidos+"","activo":""+$scope.activo+"", "rol":""+$scope.rol+""};

    //var data = {"numRegistro":"31113-559","nombreProveedor":"Z-gas","direccion":"Otra cosa", "telefono":"2577-7777","correoContacto":"algoyotracosa@algo.com","estado":1,"cuentas":[{"numCuenta":"112233"}]};

    $http.post('http://localhost:8000/usuario', data)
	.success(function(data) {
		$scope.message = data;
	}); 


	$scope.email='';
	$scope.password='';
	$scope.nombres='';
	$scope.apellidos='';
	$scope.activo='';
	$scope.rol='';
   
	
	};

	});

/*global define */

	scotchApp.controller('proveedoresController', function($scope, $http) {

    $scope.getProveedores = function(){
        $http.get('http://localhost:8000/proveedor')
            .success(function(data){
                $scope.characters = data;
            });
    };
    
    $scope.getProveedores();

    $scope.addRow = function(){	
   
   
    $scope.characters.push({'num_registro':$scope.num_registro, 'nombre_proveedor': $scope.nombre_proveedor, 'direccion':$scope.direccion, 'telefono':$scope.telefono, 'correo_contacto': $scope.correo_contacto, 'estado':$scope.estado, 'cuentas':$scope.cuentas});
	
    //var data = "numRegistro=" +$scope.num_registro + ',nombreProveedor='+ $scope.nombre_proveedor + ',direccion=' + $scope.direccion + ', telefono=' + $scope.telefono + ', correoContacto=' + $scope.correo_contacto + ',estado=' + $scope.estado + ',cuentas=' + $scope.cuentas;
    var data = {"numRegistro":""+$scope.num_registro+"","nombreProveedor": ""+$scope.nombre_proveedor+"","direccion":""+$scope.direccion+"", "telefono":""+$scope.telefono+"","correoContacto":""+$scope.correo_contacto+"", "estado":""+$scope.estado+"","cuentas":[{"numCuenta": ""+$scope.cuentas+""}]};

    //var data = {"numRegistro":"31113-559","nombreProveedor":"Z-gas","direccion":"Otra cosa", "telefono":"2577-7777","correoContacto":"algoyotracosa@algo.com","estado":1,"cuentas":[{"numCuenta":"112233"}]};

    $http.post('http://localhost:8000/proveedor', data)
	.success(function(data) {
		$scope.message = data;
		alert($scope.message);
	}); 


	$scope.num_registro='';
	$scope.nombre_proveedor='';
	$scope.direccion='';
	$scope.telefono='';
	$scope.correo_contacto='';
	$scope.estado='';
	$scope.cuentas='';
   
	
	};

	$scope.deleteRow= function(num_registro){

		var index = -1;		
		var comArr = eval( $scope.characters );
		for( var i = 0; i < comArr.length; i++ ) {
			if( comArr[i].num_registro === num_registro ) {
				index = i;
				break;
			}
		}
		if( index === -1 ) {
			alert( "Algo salio mal" );
		}
		$scope.characters.splice( index, 1 );	

		var data = {"numRegistro":""+$scope.num_registro+""};

		$http.delete('http://localhost:8000/proveedor/'+num_registro)
		.success(function(data) {
			$scope.message = data;
			alert($scope.message);
			}); 


	};

	$scope.updateRow= function(num_registro){

		$http.get('http://localhost:8000/proveedor/'+num_registro)
		.success(function(data) {
			$scope.num_registro=data.num_registro;
			$scope.nombre_proveedor=data.nombre_proveedor;
			$scope.direccion=data.direccion;
			$scope.telefono=data.telefono;
			$scope.correo_contacto=data.correo_contacto;
			$scope.estado=data.estado;
			$scope.cuentas=data.cuentas[0].num_cuenta;
			}); 
	};

	 $scope.updateProveedor = function(num_registro){	
   
   
    //$scope.characters.push({'num_registro':$scope.num_registro, 'nombre_proveedor': $scope.nombre_proveedor, 'direccion':$scope.direccion, 'telefono':$scope.telefono, 'correo_contacto': $scope.correo_contacto, 'estado':$scope.estado, 'cuentas':$scope.cuentas});
	
    //var data = "numRegistro=" +$scope.num_registro + ',nombreProveedor='+ $scope.nombre_proveedor + ',direccion=' + $scope.direccion + ', telefono=' + $scope.telefono + ', correoContacto=' + $scope.correo_contacto + ',estado=' + $scope.estado + ',cuentas=' + $scope.cuentas;
    var data = {"nombreProveedor": ""+$scope.nombre_proveedor+"","direccion":""+$scope.direccion+"", "telefono":""+$scope.telefono+"","correoContacto":""+$scope.correo_contacto+"", "estado":""+$scope.estado+"","cuentas":[{"numCuenta": ""+$scope.cuentas+""}]};

    //var data = {"numRegistro":"31113-559","nombreProveedor":"Z-gas","direccion":"Otra cosa", "telefono":"2577-7777","correoContacto":"algoyotracosa@algo.com","estado":1,"cuentas":[{"numCuenta":"112233"}]};

    $http.put('http://localhost:8000/proveedor/'+num_registro, data)
	.success(function(data) {
		$scope.message = data;
		$scope.getProveedores();
		alert($scope.message);

	}); 


	$scope.num_registro='';
	$scope.nombre_proveedor='';
	$scope.direccion='';
	$scope.telefono='';
	$scope.correo_contacto='';
	$scope.estado='';
	$scope.cuentas='';
   
   	$scope.getProveedores();
	
	};

});
	


	var token;

	scotchApp.controller('loginController', function($scope, $http) {

    $scope.login = function(){	
  
    var data = {"email":""+$scope.email+"","password": ""+$scope.password+""};

    $http.post('http://localhost:8000/login', data)
    .success(function(data, status, headers, config){
    	$scope.message= data;
    	  token = data.token;
    	 alert(token);
    	 window.location="#/home";
    });

	$scope.email='';
	$scope.password='';

	};
});


	scotchApp.controller('UsuarioController', function($scope, $http) {

	$scope.getUsuarios = function(){

		var config = {headers: {
			'Authorization': 'Bearer'+token,
			 'Content-Type': 'application/json'
			}
		};

       $http.get('http://localhost:8000/usuario', config)
      .success(function(data){
                $scope.usuarios = data;
            });
    };
    
    $scope.getUsuarios();
});


	scotchApp.controller('CuentaController', function($scope, $http){

    $scope.crearCuenta = function(){	
    	
    var data = {"numCuenta":""+$scope.num_cuenta+"","banco": ""+$scope.nombre_banco+"","monto":""+$scope.monto_actual+""};


    $http.post('http://localhost:8000/cuenta_bancaria', data)
	.success(function(data) {
		$scope.message = data;
		alert($scope.message);
	}); 


	$scope.num_cuenta='';
	$scope.nombre_banco='';
	$scope.monto_actual='';
	
	};

	$scope.getCuentas = function(){
        $http.get('http://localhost:8000/cuenta_bancaria')
            .success(function(data){
                $scope.cuentas = data;
            });
    };
    
    $scope.getCuentas();
});



