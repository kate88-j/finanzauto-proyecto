<div class="row">
    <div class="col-md-6">
        <h1>Crear marca</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>marcas">Marcas</a></li>
            <li class="breadcrumb-item active">Crear marca</li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">

        <form method="POST">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" aria-describedby="nombreHelp">
                        <small id="nombreHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción</label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" aria-describedby="descripcionHelp">
                        <small id="descripcionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Guardar</button>
        </form>

    </div>
</div>