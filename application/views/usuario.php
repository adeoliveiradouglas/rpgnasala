<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH .'resources/Constants.php';
require_once APPPATH .'resources/PageConstants.php';
require_once APPPATH .'resources/NavigationConstants.php';
?>

<html>
    <head>
    <?php include_once 'components/header.php';?>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-6 col-md-4"></div>
        <div class="col-6 col-md-4" style="background-color: #ffffff"><!-- Default form login -->
            <br>
            <form class="text-center p-5" method="post" action="<?= base_url('index.php/usuario/registrar'); ?>">
                
                
                <p class="h4 mb-4" style="color: #17a2b8">RPG na Sala</p>
                
                <!-- Nome completo -->
                <input type="text" name="nome"  required="required" class="form-control mb-4" placeholder="Nome completo">
				
				<!-- E-mail -->
                <input type="email" name="email"  required="required" class="form-control mb-4" placeholder="E-mail">

                <!-- Senha -->
                <input type="password" name="senha"  required="required" class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                <br>
              

                <!-- Sign up button -->
                <button class="btn btn-info my-4 btn-block" type="submit">Registrar</button>
            </form>
            <br><br>
            <!-- Default form login --></div>
        <div class="col-6 col-md-4"></div>
    </div>
</div>

</body>
</html>