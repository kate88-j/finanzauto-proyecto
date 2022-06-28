<div class="row">
    <div class="col-md-6">
        <h1>Editar vehiculo</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>vehiculos">Vehículos</a></li>
            <li class="breadcrumb-item active">Editando vehículo: <?php echo $respuesta['nombre']; ?></li>
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
                        <input type="text" class="form-control" value="<?php echo $respuesta['nombre']; ?>" id="txtNombre" name="txtNombre" aria-describedby="nombreHelp">
                        <small id="nombreHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input type="number" class="form-control" value="<?php echo $respuesta['precio']; ?>" id="txtPrecio" name="txtPrecio" aria-describedby="precioHelp">
                        <small id="precioHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="selMarcas">Marcas</label>
                        <select class="form-control" id="selMarcas" name="selMarcas" required>
                            <option value="">Seleccione...</option>

                            <?php
                            foreach ($listaMarcas as $row) {
                            ?>
                                <?php 
                                if ($respuesta['marca_id'] == $row['id_marca']) {
                                ?>

                                <option value="<?php echo $row['id_marca'] ?>" selected> <?php echo $row['nombre'] ?> </option>

                                <?php 
                                } else {
                                ?>

                                <option value="<?php echo $row['id_marca'] ?>"> <?php echo $row['nombre'] ?> </option>

                                <?php 
                                }
                                ?>
                            
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
                            <option value="">Seleccione...</option>

                            <?php
                            foreach ($listaTipos as $row) {
                            ?>
                                <?php 
                                if ($respuesta['tipo_id'] == $row['id_tipo']) {
                                    # code...
                                ?>

                                <option value="<?php echo $row['id_tipo'] ?>" selected> <?php echo $row['nombre'] ?> </option>

                                <?php 
                                } else {
                                ?>

                                <option value="<?php echo $row['id_tipo'] ?>"> <?php echo $row['nombre'] ?> </option>

                                <?php 
                                }
                                ?>
                            
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
                            <option value="">Seleccione...</option>

                            <?php
                            foreach ($listaConcesionarios as $row) {
                            ?>

                                <?php 
                                if ($respuesta['concesionario_id'] == $row['id_concesionario']) {
                                    # code...
                                ?>

                                <option value="<?php echo $row['id_concesionario'] ?>" selected> <?php echo $row['nombre'] ?> </option>

                                <?php 
                                } else {
                                ?>

                                <option value="<?php echo $row['id_concesionario'] ?>"> <?php echo $row['nombre'] ?> </option>
                                
                                <?php 
                                }
                                ?>

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