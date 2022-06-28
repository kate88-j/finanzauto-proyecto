<div class="row">
    <div class="col-md-6">
        <h1>Lista de creditos</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Creditos</li>
        </ol>
    </div>
</div>

<div class="form-group">
    <a href="<?php echo URL; ?>creditos/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear un nuevo crédito</i></button>
    </a>
</div>


<table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th> 
                            <th scope="col">Valor</th>
                            <th scope="col">Cantidad Vehiculos</th>
                            <th scope="col">Cuotas</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_solicitud_credito'] ?> </th>
                            <td> <?php echo $row['valor'] ?> </td>
                            <td> <?php echo $row['cantidad_vehiculos'] ?> </td>
                            <td> <?php echo $row['cuotas'] ?> </td>
                            <td> <?php echo $row['fecha_apertura'] ?> </td>
                            

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
                            <th scope="col">Valor</th>
                            <th scope="col">Cantidad Vehiculos</th>
                            <th scope="col">Cuotas</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>