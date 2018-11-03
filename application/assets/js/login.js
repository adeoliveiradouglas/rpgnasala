/**
 * 
 */

var loginComponent = angular.module('rpgNaSalaApp', []);

loginComponent.controller('loginController', function($scope, $http) {

	$scope.login = function() {
		console.log($scope);
		var pathname = window.location.pathname+"/index.php/";
		
		$http({
			method : 'POST',
			url : pathname+"api/auth/login",
            data: {email: $scope.email, passwd: $scope.passwd }

		}).then(function(response) {
			// on success
			console.log(response.data.nome);
			alert(response.data.nome);
		}, function(response) {
			// on error
			console.log(response.data, response.status);

		});
	};

});