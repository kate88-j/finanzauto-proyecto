<div class="row">
    <div class="col-md-6">
        <h1>Crear vehiculo</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>vehiculos">Vehiculos</a></li>
            <li class="breadcrumb-item active">Crear vehiculo</li>
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
                        <label for="txtPrecio">Precio</label>
                        <input type="number" class="form-control" id="txtPrecio" name="txtPrecio" aria-describedby="precioHelp">
                        <small id="precioHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selMarcas">Marcas</label>
                        <select class="form-control" id="selMarcas" name="selMarcas" required>
                            <option value="" selected>Seleccione...</option>

                            <?php
                            foreach ($listaMarcas as $row) {
                            ?>

                            <option value="<?php echo $row['id_marca'] ?>"> <?php echo $row['nombre'] ?> </option>
                            
                            <?php 
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selTipos">Tipos</label>
                        <select class="form-control" id="selTipos" name="selTipos" required>
                            <option value="" selected>Seleccione...</option>

                            <?php
                            foreach ($listaTipos as $row) {
                            ?>

                            <option value="<?php echo $row['id_tipo'] ?>"> <?php echo $row['nombre'] ?> </option>
                            
                            <?php 
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selConcesionarios">Concesionarios</label>
                        <select class="form-control" id="selConcesionarios" name="selConcesionarios" required>
                            <option value="" selected>Seleccione...</option>

                            <?php
                            foreach ($listaConcesionarios as $row) {
                            ?>

                            <option value="<?php echo $row['id_concesionario'] ?>"> <?php echo $row['nombre'] ?> </option>
                            
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