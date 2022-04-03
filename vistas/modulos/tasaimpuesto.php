<div class="row">
    <div class="col-md-12">
        <div class="ms-panel" id="modalRF">
            <div class="col-md-3 col-sm-6">
                <button type="button" id="modalTI" class="btn btn-pill btn-gradient-primary has-icon"
                    data-toggle="modal" data-target="#modal-regTI"><i class="flaticon-tick-inside-circle"></i> Registro
                    tasa
                    impuesto</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaRegTI"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Concepto</th>
                                <th>Clave</th>
                                <th>Valor</th>
                                <th>Tasa-cuota</th>
                                <th>Activo</th>
                                <th>Usuario</th>
                                <th>Fecha alta/modificación</th>
                                <th>
                                    <center>Acciones</center>
                                </th>
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
<div class="modal fade" id="modal-regTI" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos tasa impuesto</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formTI" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-conceptoTI">
                                <label for="validationCustom11">Concepto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="conceptoTI"
                                        onkeyup="mayusP(this);" placeholder="Concepto" name="conceptoTI"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    La subcategoría ya existe en la base de datos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-claveTI">
                                <label for="validationCustom11">Clave</label>
                                <?php
                                $item = null;
                                $value = null;
                                $response = ControladorTI::ctrMostrarTi($item, $value);
                                // var_dump($response);
                                if (!$response) {
                                    echo '
                                         <div class="input-group">
                                            <input type="text" class="form-control formulario_grupo-input" id="claveTI"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveTI" value="001" autocomplete="off"
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
                                            <input type="text" class="form-control formulario_grupo-input" id="claveTI"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveTI" autocomplete="off"
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
                    <button type="submit" id="ingresubcat" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de tasaimpuesto -->
<!---=================================================================
 * EDICIÓN DE TASAIMPUESTO
 ===================================================================--->
<div class="modal fade" id="modal-regTIE" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Editar datos tasa impuesto</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formTIE" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-conceptoTIE">
                                <label for="validationCustom11">Concepto</label>
                                <div class="input-group">
                                    <input type="hidden" id="idTimpE" name="idTimpE">
                                    <input type="text" class="form-control formulario_grupo-input" id="conceptoTIE"
                                        onkeyup="mayusP(this);" placeholder="Concepto" name="conceptoTIE"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    La subcategoría ya existe en la base de datos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-claveTIE">
                                <label for="validationCustom11">Clave</label>
                                <?php
                                $item = null;
                                $value = null;
                                $response = ControladorTI::ctrMostrarTi($item, $value);
                                // var_dump($response);
                                if (!$response) {
                                    echo '
                                         <div class="input-group">
                                            <input type="text" class="form-control formulario_grupo-input" id="claveTIE"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveTIE" value="001" autocomplete="off"
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
                                            <input type="text" class="form-control formulario_grupo-input" id="claveTIE"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveTIE" autocomplete="off"
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
                            <div class="col-md-6 mb-3" id="val-valortiE">
                                <label for="validationCustom11">Valor</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="valortiE"
                                        onkeyup="mayusP(this);" placeholder="Valor" name="valortiE" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 salir" id="val-tasacuotaE">
                                <label for="validationCustom11">Tasa o cuota</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="tasacuotaE"
                                        onkeyup="mayusP(this);" placeholder="Tasa o cuota" name="tasacuotaE"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeTIE">
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
<!-- Fin de edición de tasaimpuesto -->