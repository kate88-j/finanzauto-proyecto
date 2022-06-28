<div class="row">
    <div class="col-md-6">
        <h1>Lista de Areas Empresa</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item active">Areas Empresa</li>
        </ol>
    </div>
</div>

<div class="form-group">
    <a href="<?php echo URL; ?>areas-empresa/crear">
        <button class="btn btn-info"><i class="fas fa-plus"> Crear area Empresa</i></button>
    </a>
</div>

<div class="row">
    <div class="col-md-12">
        

                <table id="tabla-databable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                    <?php
                    foreach ($tabla as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_area_empresa'] ?> </th>
                            <td> <?php echo $row['nombre'] ?> </td>
                            <td> <?php echo $row['descripcion'] ?> </td>

                            <td>
                                <!-- Botones -->
                                <a href="<?php echo URL; ?>areas_empresa/editar?id=<?php echo $row['id_area_empresa'] ?>">
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
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </tfoot>
                </table>

    </div>
</div>
