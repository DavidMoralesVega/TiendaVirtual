<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    require_once 'css.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <?php
      require_once 'componentes/nav-top.php';
  ?>
  <?php
    require_once 'componentes/sidebar.php';
  ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
         
        </div>
      </div>
    </section>
  </div>
  <?php
    require_once 'componentes/footer.php';
  ?>
</div>
    <?php
        require_once 'js.php';
    ?>
</body>
</html>
