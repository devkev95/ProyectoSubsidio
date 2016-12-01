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
			})
			.when('/transacciones', {
				templateUrl : 'pages/transacciones.html',
				controller  : 'TransaccionController'
			})
			.when('/transaccion', {
				templateUrl : 'pages/crearTransaccion.html',
				controller  : 'TransaccionController'
			});

	});

	// create the controller and inject Angular's $scope
	


/*global define */


	scotchApp.controller('proveedoresController', function($scope, $http) {
    
    $scope.addRow = function(){	
     
    var data = {"numRegistro":""+$scope.num_registro+"","nombreProveedor": ""+$scope.nombre_proveedor+"","direccion":""+$scope.direccion+"", "telefono":""+$scope.telefono+"","correoContacto":""+$scope.correo_contacto+"", "estado":""+$scope.estado+""};

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

   	};	


	$scope.getProveedores = function(){
        $http.get('http://localhost:8000/proveedor')
            .success(function(data){
                $scope.characters = data;
            });
    };
    
    $scope.getProveedores();

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

			}); 
	};

	 $scope.updateProveedor = function(num_registro){	
   
   	
    var data = {"nombreProveedor": ""+$scope.nombre_proveedor+"","direccion":""+$scope.direccion+"", "telefono":""+$scope.telefono+"","correoContacto":""+$scope.correo_contacto+"", "estado":""+$scope.estado+""};


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
    	  localStorage.token = data.token;
    	  nombre = data.nombre;
    	  rol = data.rol;
    	 alert('Nombre de Usuario: '+nombre+'Rol del Usuario:'+rol);

    	 window.location="#/home";
    });

	$scope.email='';
	$scope.password='';

	};

});

scotchApp.controller('homeController', function($scope, $http) {

	$scope.logout = function(){
		 localStorage.token = 0;
		window.location="#/";
	};

});

	scotchApp.controller('UsuarioController', function($scope, $http) {

	$scope.getUsuarios = function(){

		var config = { headers: {
			'Authorization': 'Bearer '+localStorage.token,
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



	scotchApp.controller('UserController', function($scope, $http) {


    $scope.addUsuario = function(){	
   	
    var data = {"email":""+$scope.email+"","password": ""+$scope.password+"","nombres":""+$scope.nombres+"", "apellidos":""+$scope.apellidos+"","activo":""+$scope.activo+"", "rol":""+$scope.rol+""};

    var config = { headers: {
			'Authorization': 'Bearer '+localStorage.token,
			 'Content-Type': 'application/json'
			}
		};

    $http.post('http://localhost:8000/usuario', data, config)
	.success(function(data) {
		$scope.message = data;
		alert($scope.message);
	}); 


	$scope.email='';
	$scope.password='';
	$scope.nombres='';
	$scope.apellidos='';
	$scope.activo='';
	$scope.rol='';
   
	
	};
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


scotchApp.controller('TransaccionController', function($scope, $http){

    $scope.crearTransaccion = function(){	
    	
    var data = {"tipo":""+$scope.tipo_transaccion+"","proveedor": ""+$scope.proveedor+"","cuenta": ""+$scope.cuenta_bancaria+"","monto":""+$scope.monto+""};


    $http.post('http://localhost:8000/transacciones', data)
	.success(function(data) {
		$scope.message = data;
		alert($scope.message);
	}); 


	$scope.tipo_transaccion='';
	$scope.proveedor='';
	$scope.cuenta_bancaria='';
	$scope.monto='';
	
	};

	$scope.getTransacciones = function(){
        $http.get('http://localhost:8000/transacciones')
            .success(function(data){
                $scope.cuentas = data;
            });
    };
    
    $scope.getTransacciones();
});

