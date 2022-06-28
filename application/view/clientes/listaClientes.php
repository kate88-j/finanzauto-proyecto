<div class="row">
    <div class="col-md-6">
        <h1>Lista de clientes</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Clientes</li>
        </ol>
    </div>
</div>

<div class="form-group">
    <a href="<?php echo URL; ?>clientes/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear cliente</i></button>
    </a>
</div>


                <table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th> 
                            <th scope="col">Cédula</th> 
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado Civil</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>



                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_cliente'] ?> </th>
                            <td> <?php echo $row['cedula'] ?> </td>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['apellido'] ?> </td>
                            <td> <?php echo $row['telefono'] ?> </td>
                            <td> <?php echo $row['direccion'] ?> </td>
                            <td> <?php echo $row['correo'] ?> </td>
                            <td> <?php echo $row['estado_civil'] ?> </td>
                            

                            <td>
                                <!-- Botones -->
                                <a href="<?php echo URL; ?>clientes/editar?id=<?php echo $row['id_cliente'] ?>">
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
                            <th scope="col">#</th> 
                            <th scope="col">Cédula</th> 
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado Civil</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>