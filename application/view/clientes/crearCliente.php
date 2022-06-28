<div class="row">
    <div class="col-md-6">
        <h1>Crear cliente</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>clientes">Clientes</a></li>
            <li class="breadcrumb-item active">Crear cliente</li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
    
        <form method="POST"><!--con solo el metodo se sabe lo que envia, en este framework-->

            <h3>Info del cliente</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtCedula">Cédula</label>
                        <input type="number" class="form-control" id="txtCedula" name="txtCedula" placeholder="">
                        <small id="cedulaHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="">
                        <small id="nombreHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtApellido">Apellido</label>
                        <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="">
                        <small id="apellidoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtTelefono">Telefono</label>
                        <input type="number" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="">
                        <small id="telefonoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtDireccion">Dirección</label>
                        <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="">
                        <small id="direccionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"id="txtCorreo" name="txtCorreo" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtEstadoCivil">Estado Civil</label>
                        <input type="text" class="form-control" id="txtEstadoCivil" name="txtEstadoCivil" placeholder="">
                        <small id="estadocivilHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selEstado">Estado de Cliente</label>
                        <select class="form-control" id="selEstado" name="selEstado">
                            <option value="">Seleccione...</option>
                            <option value="1" selected>Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
        </form>


    </div>
</div>