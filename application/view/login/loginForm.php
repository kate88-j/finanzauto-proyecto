<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    
    <link rel="stylesheet" href="<?php echo URL; ?>/css/login-styles.css">

    <title>Login</title>
</head>
<body>
    


<section class="login-block">
    <div class="container">
        <div class="row ">
            <div class="col login-sec">
                <h2 class="text-center">Ingreso Finanzauto</h2>
                <form class="login-form" method="post" action="<?php echo URL; ?>auth/login">

                    <div class="form-group">
                        <label for="txtUsuario" class="text-uppercase">Usuario</label>
                        <input type="text" class="form-control" name="txtUsuario" id="txtUsuario" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="txtContrasena" class="text-uppercase">Contraseña</label>
                        <input type="password" class="form-control" name="txtContrasena" id="txtContrasena" placeholder="">
                    </div>

                    <div class="form-check">
                        <button type="submit" class="btn btn-login float-right" name="btnLogin" id="btnLogin">Ingresar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>



</body>
</html>