<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tienda Virtual</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
        require_once 'css.php';
    ?>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a href="#"><strong>TIENDA VIRTUAL</strong></a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
        <p class="login-box-msg">Ingrese sus datos para iniciar sesion</p>

        <form action="" method="post">
            <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario">
            <div class="input-group-append input-group-text">
                <span class="fas fa-user"></span>
            </div>
            </div>
            <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Contraseña">
            <div class="input-group-append input-group-text">
                <span class="fas fa-lock"></span>
            </div>
            </div>
            <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat text-uppercase">Ingresar
                    <i class="fas fa-angle-right ml-3"></i>
                </button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
</body>
</html>
