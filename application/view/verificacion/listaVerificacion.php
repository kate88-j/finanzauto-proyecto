<div class="row">
    <div class="col-md-6">
        <h1>Pendientes por verificación</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Verificación</li>
        </ol>
    </div>
</div>

<table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Descripción</th> 
                            <th scope="col">Fecha</th>
                            <th scope="col">Status</th>
                            <th scope="col">solicitud_credito_id</th>
                            <th scope="col">empleado_id</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <td scope="row"> <?php echo $row['id_verificacion'] ?> </th>
                            <td> <?php echo $row['descripcion'] ?> </td>
                            <td> <?php echo $row['fecha'] ?> </td>
                            <td> <?php echo $row['status'] ?> </td>
                            <td> <?php echo $row['solicitud_credito_id'] ?> </td>
                            <td> <?php echo $row['empleado_id'] ?> </td>

                            <td>
                                <!-- Botones -->
                                <a href="<?php echo URL; ?>verificacion/verificar?id=<?php echo $row['id_verificacion'] ?>">
                                    <button class="btn btn-sm btn-primary" title="Gestionar"> <i class="fas fa-edit"></i> </button>
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
                            <th scope="col">Descripción</th> 
                            <th scope="col">Fecha</th>
                            <th scope="col">Status</th>
                            <th scope="col">solicitud_credito_id</th>
                            <th scope="col">empleado_id</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>
