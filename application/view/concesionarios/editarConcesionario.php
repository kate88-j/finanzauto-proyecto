<div class="row">
    <div class="col-md-6">
        <h1>Editar concesionario</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>concesionarios">Concesionarios</a></li>
            <li class="breadcrumb-item active">Editando concesionario: <?php echo $respuesta['nombre']; ?></li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        
        <form method="POST"><!--con solo el metodo se sabe lo que envia, en este framework--> 

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo $respuesta['nombre']; ?>" id="txtNombre" name="txtNombre" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtDireccion">Dirección</label>
                        <input type="text" class="form-control" value="<?php echo $respuesta['direccion']; ?>" id="txtDireccion" name="txtDireccion" placeholder="">
                        <small id="emailHelp" class="emailHelp="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtTelefono">Telefono</label>
                        <input type="number" class="form-control" value="<?php echo $respuesta['telefono']; ?>" id="txtTelefono" name="txtTelefono" placeholder="">
                        <small id="emailHelp" class="emailHelp="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
        </form>

    </div>
</div>