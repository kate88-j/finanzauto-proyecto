<div class="row">
    <div class="col-md-6">
        <h1>Lista de tipos de vehiculo</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Tipos de vehiculos</li>
        </ol>
    </div>
</div>

<div class="form-group">
    <a href="<?php echo URL; ?>tipos/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear un tipo de vehiculo</i></button>
    </a>
</div>


                <table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_tipo'] ?> </th>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['descripcion'] ?> </td>

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
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col"></th>
                        </tr>
                    </tfoot>
                </table>