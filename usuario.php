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
                                    <a data-toggle="modal" data-target="#ModalInsertarUsuario" class="btn btn-primary text-white">
                                        <i class="fas fa-plus mr-2"></i>
                                        Nuevo
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="TablaUsuarios" class="TablaUsuarios display table table-bordered table-hover dataTable">
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
                                      $i++;
                                      $Rol = ($Usuario["Rol"] == "A") ? 'ADMINISTRADOR' : 'VENDEDOR';
                                        echo '<tr>
                                                <td>'.$i.'</td>
                                                <td>'.$Usuario["Nombre"].'</td>
                                                <td>'.$Usuario["Apellidos"].'</td>
                                                <td>'.$Usuario["CedulaIdentidad"].'</td>
                                                <td>'.$Usuario["Fecha"].'</td>
                                                <td>'.$Rol.'</td>';

                                        if ($Usuario["Estado"] != 0)
                                        {
                                          echo '<td>
                                                  <button
                                                  IdUsuario="'.$Usuario["IdUsuario"].'"
                                                  EstadoUsuario="0"
                                                  class="btn btn-success btnActivar">ACTIVO</button>
                                                </td>';
                                        }
                                        else
                                        {
                                          echo '<td>
                                                  <button
                                                  IdUsuario="'.$Usuario["IdUsuario"].'"
                                                  EstadoUsuario="1"
                                                  class="btn btn-danger btnActivar">PASIVO</button>
                                                </td>';
                                        }
                                                
                                        echo  '<td>
                                                  <button IdUsuario="'.$Usuario["IdUsuario"].'" id="btnEditarUsuario" data-toggle="modal" data-target="#ModalActualizarUsuario" class="btn btn-info btn-sm">
                                                  <i class="fas fa-user-edit"></i>
                                                  </button>
                                                  <button IdUsuario="'.$Usuario["IdUsuario"].'" id="btnEliminarUsuario" data-toggle="modal" data-target="#ModalEliminarUsuario" class="btn btn-danger btn-sm">
                                                  <i class="fas fa-user-times"></i>
                                                  </button>
                                                </td>
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
<!-- Modal Insertar Usuario -->
<div class="modal fade" id="ModalInsertarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Nuevo usuario</h4>
        <button type="button" data-dismiss="modal" class="close">
          <span>&times;</span>
        </button>
      </div>

      <form action="controladores/usuario.controlador.php" method="POST">
        <div class="modal-body">
          <p class="text-center">Ingrese los datos del usuario</p>
          
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input name="UINombre" id="UINombre" onkeypress="GenerateUser()" onkeyup="Mayus(this);" type="text" placeholder="Ingresar nombre" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input name="UIApellidos" id="UIApellidos" onkeypress="GenerateUser()" onkeyup="Mayus(this);" type="text" placeholder="Ingresar apellidos" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input name="UICedulaIdentidad" id="UICedulaIdentidad" onchange="ValidarCI()" onkeypress="GenerateUser()" onkeyup="Mayus(this);" type="text" placeholder="Ingresar cedula de identidad" class="form-control">
          </div>
          

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input name="UIUser" id="UIUser" type="text" placeholder="Ingresar usuario" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <select name="UIRol" class="form-control">
              <option selected disabled value="">Seleccionar rol</option>
              <option value="A">ADMINISTRADOR</option>
              <option value="V">VENDEDOR</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button data-dismiss="modal" type="button" class="btn btn-default">Cerrar</button>
          <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
      </form>


    </div>
  </div>
</div>
<!-- Modal Insertar Usuario -->


<!-- Modal Actualizar Usuario -->
<div class="modal fade" id="ModalActualizarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Actualizar datos del usuario</h4>
        <button type="button" data-dismiss="modal" class="close">
          <span>&times;</span>
        </button>
      </div>

      <form action="controladores/usuario.controlador.php" method="POST">
        <div class="modal-body">
          <p class="text-center">Ingrese los datos del usuario</p>
          <input name="UAIdUsuario" type="hidden" id="UAIdUsuario">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeyup="Mayus(this)" id="UANombre" name="UANombre" type="text" placeholder="Ingresar nombre" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeyup="Mayus(this)" id="UAApellidos" name="UAApellidos" type="text" placeholder="Ingresar apellidos" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input onkeyup="Mayus(this)" id="UACedulaIdentidad" name="UACedulaIdentidad" type="text" placeholder="Ingresar cedula de identidad" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <input id="UAUser" type="text" placeholder="Ingresar usuario" class="form-control">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
            <select id="UARol" name="UARol" class="form-control">
              <option selected disabled value="">Seleccionar rol</option>
              <option value="A">ADMINISTRADOR</option>
              <option value="V">VENDEDOR</option>
            </select>
          </div>

        </div>
        <div class="modal-footer justify-content-between">
          <button data-dismiss="modal" type="button" class="btn btn-default">Cerrar</button>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Actualizar Usuario -->

<!-- MODAL ELIMINAR USUARIO-->
<div class="modal fade" id="ModalEliminarUsuario">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Eliminar usuario</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="controladores/usuario.controlador.php" method="POST">
        <input id="UEIdUsuario" name="UEIdUsuario" type="hidden">
        <div class="modal-body">
          <p id="MensajeEliminar" class="text-center">Ingrese los datos del usuario</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>                            
</div>
<!-- MODAL ELIMINAR USUARIO-->