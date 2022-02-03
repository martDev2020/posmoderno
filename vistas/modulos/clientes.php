<div class="row">

    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-1"><i class="flaticon-tick-inside-circle"></i> Registro clientes</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaClientes"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Razón social</th>
                                <th>Status</th>
                                <th>RFC</th>
                                <th>Email</th>
                                <th>Fecha de alta</th>
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
 * REGISTRO DE PROVEEDORES
 ===================================================================--->
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de clientes</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formCli" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-nombrecli">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombrecli"
                                        placeholder="Nombre cliente" name="nombrecli" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-dircli">
                                <label for="validationCustomUsername2">Dirección</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="dircli"
                                        placeholder="Dirección" name="dircli" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-telcli">
                                <label for="validationCustom13">Teléfono</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="telcli"
                                        name="telcli" placeholder="Teléfono" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar letra o caracteres especiales, sólo números de 10 dígitos.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col-md-4 mb-3" id="val-emailcli">
                                <label for="validationCustom14">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="text" class="form-control formulario_grupo-input" id="emailcli"
                                        placeholder="Email" name="emailcli" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No es un email correcto.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-razoncli">
                                <label for="validationCustom14">Razón social</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="razoncli"
                                        placeholder="Razón social" name="razoncli" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresara caracteres especiales.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-rfccli">
                                <label for="validationCustom14">RFC</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="rfccli"
                                        placeholder="RFC" name="rfccli" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresara caracteres especiales.
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensaje">
                            <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                            <button type="submit" id="ingrecli" class="btn btn-primary shadow-none">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de proveedores -->
<!---=================================================================
 * EDITAR PROVEEDORES
 ===================================================================--->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de proveedor</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formProvEdit" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="edit-nombreprovE">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="hidden" class="form-control formulario_grupo-input" id="idProv"
                                        name="idProv" autocomplete="off">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombreprovE"
                                        placeholder="Nombre proveedor" name="nombreprovE" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="edit-dirprovE">
                                <label for="validationCustomUsername2">Dirección</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="dirprovE"
                                        placeholder="Dirección" name="dirprovE" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="edit-telprovE">
                                <label for="validationCustom13">Teléfono</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="telprovE"
                                        name="telprovE" placeholder="Teléfono" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar letra o caracteres especiales, sólo números de 10 dígitos.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">

                            <div class="col-md-6 mb-3" id="edit-emailprovE">
                                <label for="validationCustom14">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                    </div>
                                    <input type="text" class="form-control formulario_grupo-input" id="emailprovE"
                                        placeholder="Email" name="emailprovE" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No es un email correcto.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="edit-descripprovE">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripprovE" id="descripprovE" rows="3"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeE">
                            <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                            <button type="submit" id="editprov" class="btn btn-primary shadow-none">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin de editar proveedores -->