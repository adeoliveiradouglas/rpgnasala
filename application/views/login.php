<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>


<!--	<?php include_once 'components/menu.php';?>  -->


<div class="container">
    <div class="row">
        <div class="col-6 col-md-4"></div>
        <div class="col-6 col-md-4"><!-- Default form login -->
            <br>
            <form class="text-center p-5" method="post">
               
                <p class="h4 mb-4" style="color: #17a2b8">RPG na Sala</p>
              

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
                <a href="<?=base_url()?>index.php/login/registro">Registre-se</a>

            </form>
            <br><br><br>
            <!-- Default form login --></div>
        <div class="col-6 col-md-4"></div>
    </div>
</div>


