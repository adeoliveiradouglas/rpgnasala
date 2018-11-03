<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html ng-app="rpgNaSalaApp" lang="pt-br">
<head>
<title>RPG na Sala</title>
	<?php include_once 'components/script_css.php';?>
</head>
<body>
	<!-- Menu area -->
	<?php include_once 'components/menu.php';?>
	
	<div ng-controller="loginController">
		<form role="form">
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label> <input type="email"
					ng-model="email" class="form-control" id="exampleInputEmail1"
					aria-describedby="emailHelp" placeholder="Digite seu email"
					value="daniel.sajur@gmail.com" />

			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Senha</label> <input
					type="password" ng-model="passwd" class="form-control"
					id="exampleInputPassword1" placeholder="Digite sua senha">
			</div>

			<div id="opc">
				<a id="entrada" ng-click="login()" href="#">Entrar</a> <a id="reg"
					href="registro.html">Registrar</a></label>
			</div>

		</form>
	</div>
</body>
</html>