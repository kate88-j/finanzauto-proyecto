<div class="row">
    <div class="col-md-6">
        <h1>Créditos listos para desembolsar</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">desembolsos</li>
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
                            <th scope="col"></th> 
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_verificacion'] ?> </th>
                            <td> <?php echo $row['descripcion'] ?> </td>
                            <td> <?php echo $row['fecha'] ?> </td>
                            <td> <?php echo $row['status'] ?> </td>
                            <td> <?php echo $row['solicitud_credito_id'] ?> </td>
                            <td> <?php echo $row['empleado_id'] ?> </td>

                            <td>


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
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>