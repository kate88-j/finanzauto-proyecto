<div class="row">
    <div class="col-md-6">
        <h1>Crear area empresa</h1>
    </div>
    <div class="col-md-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo URL; ?>areas-empresa">AreasEmpresa</a></li>
            <li class="breadcrumb-item active">Crear areas empresa</li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        

        <form method="POST"><!--con solo el metodo se sabe lo que envia, en este framework-->

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label>
                        <input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" placeholder="">
                        <small id="emailHelp" class="emailHelp="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary" name="btnGuardar" id="btnGuardar">Guardar</button>
        </form>

    </div>
</div>  