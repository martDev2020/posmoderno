<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-pr"><i class="flaticon-tick-inside-circle"></i> Registro productos</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaProd"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Clave</th>
                                <th>Clave alterna</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Imagen</th>
                                <th>Status</th>
                                <th>Stock</th>
                                <th>Categoría</th>
                                <th>Subcategoría</th>
                                <th>Departamento</th>
                                <th>Precio venta</th>
                                <th>Unidad compra</th>
                                <th>Unidad venta</th>
                                <th>Inv. min</th>
                                <th>Inv. max</th>
                                <th>Receta</th>
                                <th>Granel</th>
                                <th>Tasa impuesto</th>
                                <th>Fecha alta/modiciación</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <!-- Se trae desde js -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!---=================================================================
 * REGISTRO DE TASAIMPUESTO
 ===================================================================--->
<div class="modal fade" id="modal-pr" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos producto</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formPr" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-clave">
                                <label for="validationCustom11">Clave</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="clave"
                                        onkeyup="mayusP(this);" placeholder="Concepto" name="clave" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    La subcategoría ya existe en la base de datos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-claveAlt">
                                <label for="validationCustom11">Clave</label>
                                <?php
                                $item = null;
                                $value = null;
                                $response = ControladorProd::ctrMostrarProd($item, $value);
                                // var_dump($response);
                                if (!$response) {
                                    echo '
                                         <div class="input-group">
                                            <input type="text" class="form-control formulario_grupo-input" id="claveAlt"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveAlt" value="001" autocomplete="off"
                                                readonly="true">
                                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <div class="alert alert-success alert-val alert-solid" role="alert">
                                            No ingresar caracteres especiales
                                        </div>
                                    ';
                                } else {
                                    echo '
                                         <div class="input-group">
                                            <input type="text" class="form-control formulario_grupo-input" id="claveAlt"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveAlt" autocomplete="off"
                                                readonly="true">
                                            <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                        </div>
                                        <div class="alert alert-success alert-val alert-solid" role="alert">
                                            No ingresar caracteres especiales
                                        </div>
                                    ';
                                }

                                ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-valorti">
                                <label for="validationCustom11">Valor</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="valorti"
                                        onkeyup="mayusP(this);" placeholder="Valor" name="valorti" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 salir" id="val-tasacuota">
                                <label for="validationCustom11">Tasa o cuota</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="tasacuota"
                                        onkeyup="mayusP(this);" placeholder="Tasa o cuota" name="tasacuota"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeTI">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de tasaimpuesto -->