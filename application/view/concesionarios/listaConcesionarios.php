<div class="row">
    <div class="col-md-6">
        <h1>Lista de concesionarios</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Concesionarios</li>
        </ol>
    </div>
</div>

<div class="form-group">
    <a href="<?php echo URL; ?>concesionarios/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear concesionario</i></button>
    </a>
</div>

<div class="row">
    <div class="col-md-12">
        

                <table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_concesionario'] ?> </th>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['direccion'] ?> </td>
                            <td> <?php echo $row['telefono'] ?> </td>

                            <td>
                                <!-- Botones -->
                                <a href="<?php echo URL; ?>concesionarios/editar?id=<?php echo $row['id_concesionario'] ?>">
                                    <button class="btn btn-sm btn-primary" title="Editar"> <i class="fas fa-edit"></i> </button>
                                </a>
                                <a href="<?php echo URL; ?>concesionarios/eliminar?id=<?php echo $row['id_concesionario'] ?>">
                                    <button class="btn btn-sm btn-danger" title="Eliminar"> <i class="fas fa-trash"></i> </button>
                                </a>

                            </td>
                        </tr>

                    <?php
                    }
                    ?> 

                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th> 
                            <th scope="col">Nombre</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>

    </div>
</div>
