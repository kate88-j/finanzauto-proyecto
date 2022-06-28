<div class="row">
    <div class="col-md-6">
        <h1>Buscar crédito</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>pagos">pagos</a></li>
            <li class="breadcrumb-item active">Buscar crédito</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <form method="POST">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="txtCredito">Credito #</label>
                        <input type="text" class="form-control" id="txtCredito" name="txtCredito" aria-describedby="creditoHelp">
                        <small id="creditoHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" id="btnBuscarCredito" name="btnBuscarCredito">Buscar</button>
        </form>

    </div>
</div>