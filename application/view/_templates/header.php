<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URL; ?>css/styles.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo URL; ?>adminlte/plugins/fontawesome-free/css/all.min.css">

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo URL; ?>adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo URL; ?>adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <?php
    if(isset($page_title) && $page_title != null){
    ?>
      <title><?php echo $page_title ?> - Finanzauto S.A</title>
    <?php
    }else{
    ?>
      <title>Finanzauto S.A</title>
    <?php
    }
    ?>

</head>
<body>

    <header class="">

      <?php //echo $opt_menu; ?>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" /*style="background-color: #b9d2fa;"*/ >
        <a class="navbar-brand" href="<?php echo URL; ?>">Finanzauto S.A.</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

            <li class="nav-item<?php if($opt_menu == 'Dashboard'){ echo ' active'; } ?>">
              <a class="nav-link" href="<?php echo URL; ?>">Inicio<span class="sr-only">(current)</span></a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>auth/login">Ingreso al sistema</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Radicados</a>
            </li> -->

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
          ?>

            <li class="nav-item dropdown<?php if($open_menu == 'gestionCreditos'){ echo ' show'; } ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                Gestión de créditos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item<?php if($opt_menu == 'listaClientes'){ echo ' active'; } ?>" href="<?php echo URL; ?>clientes">Clientes</a>
                    <a class="dropdown-item<?php if($opt_menu == 'crearCredito'){ echo ' active'; } ?>" href="<?php echo URL; ?>creditos/crear">Solicitud de crédito</a>
                    <a class="dropdown-item<?php if($opt_menu == 'listaCreditos'){ echo ' active'; } ?>" href="<?php echo URL; ?>creditos">Lista créditos</a>
                </div>
            </li>

          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 5) {
          ?>

            <li class="nav-item<?php if($opt_menu == 'listaPagos'){ echo ' active'; } ?>">
                <a class="nav-link" href="<?php echo URL; ?>pagos">Pagos</a>
            </li>

          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 2) {
          ?>

            <li class="nav-item<?php if($opt_menu == 'listaVerificaciones'){ echo ' active'; } ?>">
                <a class="nav-link" href="<?php echo URL; ?>verificacion">Verificación</a>
            </li>

          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 3) {
          ?>

            <li class="nav-item<?php if($opt_menu == 'listaDesembolsos'){ echo ' active'; } ?>">
                <a class="nav-link" href="<?php echo URL; ?>desembolsos">Desembolsos</a>
            </li>

          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1 || $_SESSION['area_empresa'] == 4) {
          ?>

            <li class="nav-item dropdown<?php if($open_menu == 'inventario'){ echo ' show'; } ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                Inventario
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item<?php if($opt_menu == 'listaConcesionarios'){ echo ' active'; } ?>" href="<?php echo URL; ?>concesionarios">Concesionarios</a>
                    <a class="dropdown-item<?php if($opt_menu == 'listaMarcas'){ echo ' active'; } ?>" href="<?php echo URL; ?>marcas">Marcas</a>
                    <a class="dropdown-item<?php if($opt_menu == 'listaTipos'){ echo ' active'; } ?>" href="<?php echo URL; ?>tipos">Tipos de vehículos</a>
                    <a class="dropdown-item<?php if($opt_menu == 'listaVehiculos'){ echo ' active'; } ?>" href="<?php echo URL; ?>vehiculos">Vehículos</a>
                </div>
            </li>

          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['area_empresa']) && $_SESSION['area_empresa'] == 1) {
          ?>

            <li class="nav-item dropdown<?php if($open_menu == 'finanzautoSA'){echo ' show'; } ?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                Finanzauto S.A.
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item<?php if($opt_menu == 'listaAreasEmpresa'){ echo ' active'; } ?>" href="<?php echo URL; ?>areas-empresa">Areas empresa</a>
                    <a class="dropdown-item<?php if($opt_menu == 'listaEmpleados'){ echo ' active'; } ?>" href="<?php echo URL; ?>empleados">Empleados</a>
                </div>
            </li>

          <?php
          }
          ?>

            <!-- <li class="nav-item">
              <a class="nav-link disabled">Disabled</a>
            </li> -->

          </ul>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-user"></i>
                <?php echo $_SESSION['nombre_completo']; ?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URL; ?>auth/logout">
                <i class="fas fa-sign-out-alt"></i>
                Salir
              </a>
            </li>
          </ul>

        </div>
      </nav>

    </header>

    <br>

    <div class="container">
