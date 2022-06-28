<div class="row">
    <div class="col-md-6">
        <h1>Lista de vehículos</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Vehículos</li>
        </ol>
    </div>
</div>


<div class="form-group">
    <a href="<?php echo URL; ?>vehiculos/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear vehículo</i></button>
    </a>
</div>

<div class="row">
    <div class="col-md-12">

                <table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Concesionario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['precio'] ?> </td>
                            <td> <?php echo $row['marca'] ?> </td>
                            <td> <?php echo $row['tipo'] ?> </td>
                            <td> <?php echo $row['concesionario'] ?> </td>

                            <td>
                                <!-- Botones -->
                                <a href="<?php echo URL; ?>vehiculos/editar?id=<?php echo $row['id_vehiculo'] ?>">
                                    <button class="btn btn-sm btn-primary" title="Editar"> <i class="fas fa-edit"></i> </button>
                                </a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?> 

                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Concesionario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>

    </div>
</div>
