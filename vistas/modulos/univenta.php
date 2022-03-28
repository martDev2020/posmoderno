<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-regUC"><i class="flaticon-tick-inside-circle"></i> Registro unidad
                    venta</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaUniV"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Unidad</th>
                                <th>Status</th>
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
 * REGISTRO DE UNIDAD COMPRA
 ===================================================================--->
<div class="modal fade" id="modal-regUC" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de unidad compra</h1>
                <form method="post" id="formUVen" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombreUniV">
                                <label for="validationCustom11">Unidad</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombreUniV"
                                        onkeyup="mayusP(this);" placeholder="Unidad venta" name="nombreUniV"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    El nombre ya existe en la base de datos
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeUV">
                        <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="ingreUV" class="btn btn-primary shadow-none">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de unidad compra -->
<!---=================================================================
 * EDICIÓN DE UNIDAD VENTA
 ===================================================================--->
<div class="modal fade" id="modal-editUVen" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Editar datos de unidad venta</h1>
                <form method="post" id="formUVenE" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombreUniVE">
                                <label for="validationCustom11">Unidad</label>
                                <div class="input-group">
                                    <input type="hidden" id="idUVentaE" name="idUVentaE">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombreUniVE"
                                        onkeyup="mayusP(this);" placeholder="Unidad venta" name="nombreUniVE"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-dangered alert-solid" role="alert">
                                    El nombre ya existe en la base de datos
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeUVE">
                        <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="guardarUVE" class="btn btn-primary shadow-none">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de edición de unidad compra -->