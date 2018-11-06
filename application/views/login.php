<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<html>
	<head>
	<?php include_once 'components/header.php';?>
</head>
<body>
<?php include_once 'components/menu.php';?>
<div class="container">
    <div class="row">
        <div class="col-6 col-md-4"></div>
        <div class="col-6 col-md-4"><!-- Default form login -->
            <br>
            <form class="text-center p-5" method="post" action="<?= base_url('index.php/auth?access=login'); ?>">
               
                <p class="h4 mb-4"><?php echo Constants::TITLE;?></p>
              
              	<?php if(isset($msg)){?>
                    <div class="alert alert-danger" role="alert">
                    	<?php echo $msg;?>
                    </div>
                <?php }?>
                <!-- Email -->
                <input type="email" id="email" name="email" class="form-control mb-4" required="required" placeholder="E-mail">

                <!-- Password -->
                <input type="password" id="senha" name="senha"  required="required" class="form-control mb-4" placeholder="Senha">


                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Entrar</button>

             <!--    <div class="d-flex justify-content-around">
                    <div>
                       
                        <a href="">Esqueceu sua senha?</a>
                    </div>
                </div> -->

                <!-- Register -->
                <a href="<?=base_url(NavigationConstants::USER)?>">Registre-se</a>
            </form>
            <br><br><br>
            <!-- Default form login --></div>
        <div class="col-6 col-md-4"></div>
    </div>
</div>
</body>
</html>

