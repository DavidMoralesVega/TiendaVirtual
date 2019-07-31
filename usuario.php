<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrar Usuarios</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
    require_once 'css.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
    <?php
        require_once 'componentes/nav-top.php';
    ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php 
        require_once 'componentes/sidebar.php';
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar usuarios</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <h3 class="card-title p-3">
                                <i class="fas fa-users mr-2"></i>
                                Lista de usuarios
                            </h3>
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item">
                                    <a class="btn btn-primary text-white">
                                        <i class="fas fa-plus mr-2"></i>
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="TablaUsuarios" class="display table table-bordered table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Cedula de Identidad</th>
                                        <th>Fecha de registro</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    require_once 'conexion/conexion.php';
                                    $ListaUsuarios = mysqli_query($conexion, "SELECT * FROM usuario");

                                    foreach ($ListaUsuarios as $key => $Usuario)
                                    {
                                        $Rol = ($Usuario["Rol"] == "A") ? 'ADMINISTRADOR' : 'VENDEDOR';
                                        echo '<tr>
                                                <td>No</td>
                                                <td>'.$Usuario["Nombre"].'</td>
                                                <td>'.$Usuario["Apellidos"].'</td>
                                                <td>'.$Usuario["CedulaIdentidad"].'</td>
                                                <td>'.$Usuario["Fecha"].'</td>
                                                <td>'.$Rol.'</td>
                                                <td>'.$Usuario["Estado"].'</td>
                                                <td>Acciones</td>
                                            </tr>';
                                    }
                                ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php
        require_once 'componentes/footer.php';
    ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
    require_once 'js.php';
?>
</body>
</html>
