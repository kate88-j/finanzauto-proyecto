<div class="row">
    <div class="col-md-6">
        <h1>Verificando crédito: <?php echo $infoCredito['id_solicitud_credito']; ?></h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>verificacion">Verificación</a></li>
            <li class="breadcrumb-item active">Verificando crédito: <?php echo $infoCredito['id_solicitud_credito']; ?></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <h3>Info del cliente</h3>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="txtReferenciaPersonal1" class="col-sm-5 col-form-label">Cliente:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['cedula_cliente']; ?> - <?php echo $infoCredito['nombre_cliente']; ?> <?php echo $infoCredito['apellido_cliente']; ?>" id="txtReferenciaPersonal1" name="txtReferenciaPersonal1">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtReferenciaPersonal1" class="col-sm-5 col-form-label">Referencia personal 1:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['referencia_personal_1']; ?>" id="txtReferenciaPersonal1" name="txtReferenciaPersonal1">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtReferenciaPersonal2" class="col-sm-5 col-form-label">Referencia personal 2:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['referencia_personal_2']; ?>" id="txtReferenciaPersonal2" name="txtReferenciaPersonal2">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                    <div class="form-group row">
                        <label for="txtReferenciaFamiliar1" class="col-sm-5 col-form-label">Referencia familiar 1:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['referencia_familiar_1']; ?>" id="txtReferenciaFamiliar1" name="txtReferenciaFamiliar1">
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
            <div class="form-group row">
                        <label for="txtReferenciaFamiliar2" class="col-sm-5 col-form-label">Referencia familiar 2:</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['referencia_familiar_2']; ?>" id="txtReferenciaFamiliar2" name="txtReferenciaFamiliar2">
                        </div>
                    </div>
            </div>
        </div>

        <br>

        <h3>Info del crédito</h3>

        <div class="row">
            <div class="col-md-6">
            <div class="form-group row">
                        <label for="txtValorCredito" class="col-sm-5 col-form-label">Valor del crédito:</label>
                        <div class="col-sm-7">
                            <input type="number" readonly class="form-control-plaintext" value="<?php echo $infoCredito['valor']; ?>" id="txtValorCredito" name="txtValorCredito">
                        </div>
                    </div>
            </div>
            <div class="col-md-6">
            <div class="form-group row">
                        <label for="txtCuotas" class="col-sm-5 col-form-label">Cuotas:</label>
                        <div class="col-sm-7">
                            <input type="number" readonly class="form-control-plaintext" value="<?php echo $infoCredito['cuotas']; ?>" id="txtCuotas" name="txtCuotas">
                        </div>
                    </div>
            </div>
        </div>

        <br>

        <h3>Info vehiculo</h3>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtNombreVehiculo" class="col-sm-5 col-form-label">Nombre:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['vehiculo']; ?>" id="txtNombreVehiculo" name="txtNombreVehiculo">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtMarcaVehiculo" class="col-sm-5 col-form-label">Marca:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['marca']; ?>" id="txtMarcaVehiculo" name="txtMarcaVehiculo">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtTipoVehiculo" class="col-sm-5 col-form-label">Tipo / Modelo:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['tipo']; ?>" id="txtTipoVehiculo" name="txtTipoVehiculo">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtConcesionarioVehiculo" class="col-sm-5 col-form-label">Concesionario:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['concesionario']; ?>" id="txtConcesionarioVehiculo" name="txtConcesionarioVehiculo">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtCantidadVehiculos" class="col-sm-5 col-form-label">Cantidad vehiculos:</label>
                    <div class="col-sm-7">
                        <input type="text" readonly class="form-control-plaintext" value="<?php echo $infoCredito['cantidad_vehiculos']; ?>" id="txtCantidadVehiculos" name="txtCantidadVehiculos">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                ----------
            </div>
        </div>

        <br>

        <form method="POST">

            <h3>Proceso verificación</h3>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción</label>
                        <input type="text" class="form-control" value="<?php echo $respuesta['descripcion']; ?>" id="txtDescripcion" name="txtDescripcion" aria-describedby=descripcionHelp">
                        <small id="descripcionHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="selEstado">Estado de verificación</label>
                        <select class="form-control" id="selEstado" name="selEstado">
                                <option value="0">Seleccione</option>

                                <?php 
                                if ($respuesta['status'] == 1) {
                                ?>    
                                
                                <option value="1" selected>Aceptado</option>

                                <?php 
                                } else {
                                ?>

                                <option value="1">Aceptado</option>

                                <?php 
                                }
                                ?>

                                <?php 
                                if ($respuesta['status'] == 2) {
                                ?>    
                                
                                <option value="2" selected>En proceso</option>

                                <?php 
                                } else {
                                ?>

                                <option value="2">En proceso</option>

                                <?php 
                                }
                                ?>

                                <?php 
                                if ($respuesta['status'] == 3) {
                                ?>    
                                
                                <option value="3" selected>Negado</option>

                                <?php 
                                } else {
                                ?>

                                <option value="3">Negado</option>

                                <?php 
                                }
                                ?>

                        </select>
                    </div>

                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" id="btnGuardar" name="btnGuardar">Guardar</button>
        </form>

    </div>
</div>