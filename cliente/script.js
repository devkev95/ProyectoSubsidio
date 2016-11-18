var scotchApp = angular.module('scotchApp', ['ngRoute']);


	// configure our routes
	scotchApp.config(function($routeProvider) {
		$routeProvider

			// route for the home page
			.when('/', {
				templateUrl : 'pages/home.html',
				controller  : 'mainController'
			})

			// route for the about page
			.when('/about', {
				templateUrl : 'pages/about.html',
				controller  : 'aboutController'
			})

			// route for the contact page
			.when('/contact', {
				templateUrl : 'pages/contact.html',
				controller  : 'contactController'
			})
			.when('/login', {
				templateUrl : 'pages/login.html',
				controller  : 'loginController'
			})
			.when('/nuevoUsuario', {
				templateUrl : 'pages/new_account.html',
				controller  : 'UserController'
			})
			.when('/usuario', {
				templateUrl : 'pages/usuario.html',
				controller  : 'UsuarioController'
			})			
			.when('/proveedores/', {
				templateUrl : 'pages/proveedores.html',
				controller: 'proveedoresController'
			});

	});

	// create the controller and inject Angular's $scope
	scotchApp.controller('mainController', function($scope) {
		// create a message to display in our view
		$scope.message = 'Everyone come and see how good I look!';
	});

	scotchApp.controller('aboutController', function($scope) {
		$scope.message = 'Look! I am an about page.';
	});

	scotchApp.controller('contactController', function($scope) {
		$scope.message = 'Contact us! JK. This is just a demo.';
	});

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
	}); 


	$scope.num_registro='';
	$scope.nombre_proveedor='';
	$scope.direccion='';
	$scope.telefono='';
	$scope.correo_contacto='';
	$scope.estado='';
	$scope.cuentas='';
   
	
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




