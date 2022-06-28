<div class="row">
    <div class="col-md-6">
        <h1>Editar empleado</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>empleados">Empleados</a></li>
            <li class="breadcrumb-item active">Editando empleado: <?php echo $respuesta['cedula']; ?> </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
    
    <form method="POST">

        <h3>Info del empleado</h3>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtCedula">Cédula</label>
                    <input type="number" class="form-control" value="<?php echo $respuesta['cedula']; ?>" id="txtCedula" name="txtCedula" aria-describedby="cedulaNumber" disabled>
                    <small id="cedulaHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtNombre">Nombre</label>
                    <input type="txt" class="form-control" value="<?php echo $respuesta['nombre']; ?>" id="txtNombre" name="txtNombre" aria-describedby="nombreHelp">
                    <small id="nombreHelp" class="Help="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInput1">Apellido</label>
                    <input type="txt" class="form-control" value="<?php echo $respuesta['apellido']; ?>" id="txtApellido" name="txtApellido" aria-describedby="apellidoHelp">
                    <small id="apellidoHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtTelefono">Telefono</label>
                    <input type="number" class="form-control" value="<?php echo $respuesta['telefono']; ?>" id="txtTelefono" name="txtTelefono" aria-describedby="telefonoNumber">
                    <small id="telefonoHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtDireccion">Dirección</label>
                    <input type="txt" class="form-control" value="<?php echo $respuesta['direccion']; ?>" id="txtDireccion" name="txtDireccion" aria-describedby="direccionHelp">
                    <small id="direccionHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtCorreo">Email</label>
                    <input type="txt" class="form-control" value="<?php echo $respuesta['email']; ?>" id="txtCorreo" name="txtCorreo" aria-describedby="correoHelp">
                    <small id="correoHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">

                <div class="form-group">
                    <label for="selAreaEmpresa">Area empresa</label>
                    <select class="form-control" id="selAreaEmpresa" name="selAreaEmpresa" required>
                        <option value="" selected>Seleccione...</option>

                        <?php
                        foreach ($listaAreasEmpresa as $row) {
                        ?>

                            <?php 
                            if ($respuesta['area_empresa_id'] == $row['id_area_empresa']) {
                                # code...
                            ?>

                            <option value="<?php echo $row['id_area_empresa'] ?>" selected> <?php echo $row['nombre'] ?> </option>

                            <?php 
                            } else {
                            ?>

                            <option value="<?php echo $row['id_area_empresa'] ?>"> <?php echo $row['nombre'] ?> </option>

                            <?php 
                            }
                            ?>

                        <?php 
                        }
                        ?>

                    </select>
                </div>

            </div>
            <div class="col-md-6">    
            </div>
        </div>
        
        <h3>Credenciales empleado</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtUssername">USSERNAME</label>
                    <input type="text" class="form-control" value="<?php echo $respuesta['username']; ?>" id="txtUssername" name="txtUssername" aria-describedby="usernameHelp">
                    <small id="usernameHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="txtPassword">PASSWORD</label>
                    <input type="password" class="form-control" id="txtPassword" name="txtPassword" aria-describedby="passwordHelp">
                    <small id="passwordHelp" class="form-text text-muted">We'll never share your  with anyone else.</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="selEstado">Estado del empleado</label>
                    <select class="form-control" id="selEstado" name="selEstado">
                        <option value="">Seleccione...</option>

                        <?php
                        if ($respuesta['status'] == 1) {
                        ?>

                        <option value="1" selected>Activo</option>
                        <option value="0">Inactivo</option>

                        <?php
                        } else {
                        ?>

                        <option value="1">Activo</option>
                        <option value="0" selected>Inactivo</option>

                        <?php
                        }
                        ?>

                    </select>
                </div>
            </div>    
        </div>

        <br>

        <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Guardar</button>
        </form>


    </div>
</div>

