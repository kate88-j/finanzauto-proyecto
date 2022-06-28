<div class="row">
    <div class="col-md-6">
        <h1>Detalle pago crédito: <?php echo $infoCredito['id_solicitud_credito']; ?></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>pagos">Pagos</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>pagos">Buscar crédito</a></li>
            <li class="breadcrumb-item active">Detalle pago crédito: <?php echo $infoCredito['id_solicitud_credito']; ?></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <h3>Info del cliente</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="txtCliente" class="col-sm-5 col-form-label">Cliente:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['cedula_cliente']; ?> - <?php echo $infoCredito['nombre_cliente']; ?> <?php echo $infoCredito['apellido_cliente']; ?>" id="txtReferenciaPersonal1" name="txtReferenciaPersonal1">
                    </div>
                </div>
            </div>
        </div>

        <h3>Info del credito</h3>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="txtValor" class="col-sm-5 col-form-label">Cantidad prestamo:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['valor']; ?>" id="txtValor" name="txtValor">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="txtCuotas" class="col-sm-5 col-form-label">Cuotas pactadas:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['cuotas']; ?>" id="txtCuotas" name="txtCuotas">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="txtFechaApertura" class="col-sm-5 col-form-label">Fecha apertura:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['fecha_apertura']; ?>" id="txtFechaApertura" name="txtFechaApertura">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="txtValorRestante" class="col-sm-5 col-form-label">Cantidad restante:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['valor_restante']; ?>" id="txtValorRestante" name="txtValorRestante">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
        </div>

        <form method="POST">

            <div class="form-group">
                <label for="txtAbono">Abono: </label>
                <span id="abonoTooltip"></span>
                <input onkeyup="restante(this.value)" type="number" step="any" class="form-control" aria-describedby="abonoHelp" id="txtAbono" name="txtAbono" placeholder="">
                <small id="abonoHelp" class="form-text text-muted">
                    <i class="bi bi-info-circle-fill"> Valores positivos con o sin decimales.</i>
                </small>
            </div>

            <div>
                <button type="submit" class="btn btn-primary" id="btnGuardarAbono" name="btnGuardarAbono">Guardar abono</button>
            </div>

        </form>

        <div class="row">
            <div class="col-md-12">

                <br>
                <h2>Abonos a capital</h2>
                <br>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">cantidad_abono</th>
                            <th scope="col">fecha_creacion</th>
                            <th scope="col">prestamo_id</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //print_r($infoAbonos); ?>

                    <?php
                    foreach ($infoAbonos as $row) {
                    ?>

                        <tr>
                            <th scope="row"> <?php echo $row['id_pago_credito'] ?> </th>
                            <td> <?php echo $row['valor'] ?> </td>
                            <td> <?php echo $row['fecha'] ?> </td>
                            <td> <?php echo $row['solicitud_credito_id'] ?> </td>
                        </tr>

                    <?php
                    }
                    ?> 

                    </tbody>
                    <tfoot>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">cantidad_abono</th>
                            <th scope="col">fecha_creacion</th>
                            <th scope="col">prestamo_id</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>


        


    </div>
</div>


















