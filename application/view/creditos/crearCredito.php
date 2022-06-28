<div class="row">
    <div class="col-md-6">
        <h1>Crear credito</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>creditos">Creditos</a></li>
            <li class="breadcrumb-item active">Crear crédito</li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        

    <form method="POST"><!--con solo el metodo se sabe lo que envia, en este framework-->

<h3>Info del cliente</h3>

<div class="form-group">
    <label for="selListaClientes">Cliente del crédito:</label>
    <select class="form-control" id="selListaClientes" name="selListaClientes" required>
        <option value="" selected>Seleccione...</option>

        <?php
        foreach ($listaClientes as $row) {
        ?>

        <option value="<?php echo $row['id_cliente'] ?>"> <?php echo $row['cedula'] ?> - <?php echo $row['nombre'] ?> <?php echo $row['apellido'] ?> </option>
        
        <?php 
        }
        ?>

    </select>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtReferenciaPersonal1">Referencia personal 1</label>
            <input type="text" class="form-control" id="txtReferenciaPersonal1" name="txtReferenciaPersonal1" aria-describedby="referenciapersonal1Help">
            <small id="referenciapersonal1Help" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtReferenciaPersonal2">Referencia personal 2</label>
            <input type="text" class="form-control" id="txtReferenciaPersonal2" name="txtReferenciaPersonal2" aria-describedby="referenciapersonal2Help">
            <small id="referenciapersonal2Help" class="emailHelp="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtReferenciaFamliar1">Referencia familiar 1</label>
            <input type="text" class="form-control" id="txtReferenciaFamiliar1" name="txtReferenciaFamiliar1" aria-describedby="referenciafamiliar1Help">
            <small id="referenciafamliar1Help" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtReferenciaFamliar2">Referencia familiar 2</label>
            <input type="text" class="form-control" id="txtReferenciaFamiliar2" name="txtReferenciaFamiliar2" aria-describedby="referenciafamiliar2Help">
            <small id="referenciafamliar2Help" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
</div>

<br>

<h3>Info del crédito</h3>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtValorCredito">Valor del crédito</label>
            <input type="number" class="form-control" id="txtValorCredito" name="txtValorCredito" aria-describedby="valorcreditoHelp">
            <small id="valorcreditoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtCuotas">Cuotas</label>
            <input type="number" class="form-control" id="txtCuotas" name="txtCuotas"  aria-describedby="cuotasHelp">
            <small id="cuotasHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
</div>

<br>

<h3>Info vehiculo</h3>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="txtCantidadVehiculos">Cantidad vehiculos</label>
            <input type="number" class="form-control" id="txtCantidadVehiculos" name="txtCantidadVehiculos" aria-describedby="cantidadvehiculosHelp">
            <small id="cantidadvehiculosHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label for="selListaVehiculos">Lista Vehiculos</label>
            <select class="form-control" id="selListaVehiculos" name="selListaVehiculos" required>
                <option value="" selected>Seleccione...</option>

                <?php
                foreach ($listaVehiculos as $row) {
                ?>

                <option value="<?php echo $row['id_vehiculo'] ?>"> <?php echo $row['nombre'] ?> </option>
                
                <?php 
                }
                ?>

            </select>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-6">

    </div>
    <div class="col-md-6">

    </div>
</div>

<button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
</form>


    </div>
</div>