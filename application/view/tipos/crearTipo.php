<div class="row">
    <div class="col-md-6">
        <h1>Crear tipo de vehiculo</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>tipos">Tipos de vehiculos</a></li>
            <li class="breadcrumb-item active">Crear tipo de vehículo</li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">

        <form method="POST"><!--con solo el metodo se sabe lo que envia, en este framework-->   
            <div class="form-group">
                <label for="txtNombre">Nombre</label>
                <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="">
            </div>

            <div class="form-group">
                <label for="txtDescripcion">Descripción</label>
                <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="">
            </div>

            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
        </form>

    </div>
</div>