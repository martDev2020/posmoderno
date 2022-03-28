<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-regF"><i class="flaticon-tick-inside-circle"></i> Registro régimen
                    fiscal</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaRegF"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Clave régimen fiscal</th>
                                <th>Descripción</th>
                                <th>Nombre</th>
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
 * REGISTRO DE REGIMEN FISCAL
 ===================================================================--->
<div class="modal fade" id="modal-regF" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos régimen fiscal</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formRF" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-claRF">
                                <label for="validationCustom11">Clave régimen fiscal</label>
                                <div class="input-group">
                                    <input type="number" class="form-control formulario_grupo-input" id="claRF"
                                        placeholder="Clave régimen fiscal" name="claRF" autocomplete="off"
                                        onkeyup="mayusP(this);">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales ni letras, sólo números (8 números)
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    La clave régimen fiscal ya existe en la base de datos.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-descripRF">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control formulario_grupo-input" name="descripRF" id="descripRF"
                                    rows="3" required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-nomRF">
                                <label for="validationCustomUsername2">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nomRF"
                                        placeholder="Nombre régimen fiscal" name="nomRF" autocomplete="off"
                                        onkeyup="mayusP(this);">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    El nombre régimen fiscal ya existe en la base de datos.
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeRF">
                            <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="ingreprov" class="btn btn-primary shadow-none">Guardar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de regimen fiscal -->
<!---=================================================================
 * EDICIÓN REGIMEN FISCAL
 ===================================================================--->
<div class="modal fade" id="modal-editRF" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Editar datos régimen fiscal</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formRFE" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-claRFE">
                                <label for="validationCustom11">Clave régimen fiscal</label>
                                <div class="input-group">
                                    <input type="hidden" id="idRFedit" name="idRFedit">
                                    <input type="text" class="form-control formulario_grupo-input" id="claRFE"
                                        placeholder="Clave régimen fiscal" name="claRFE" autocomplete="off"
                                        onkeyup="mayusP(this);">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales ni letras, sólo números (8 números)
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    La clave régimen fiscal ya existe en la base de datos.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-descripRFE">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control formulario_grupo-input" name="descripRFE" id="descripRFE"
                                    rows="3" required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-nomRFE">
                                <label for="validationCustomUsername2">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nomRFE"
                                        placeholder="Nombre régimen fiscal" name="nomRFE" autocomplete="off"
                                        onkeyup="mayusP(this);">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-dangered alert-solid" role="alert">
                                    El nombre régimen fiscal ya existe en la base de datos.
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajeRF">
                            <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" id="ingreprov" class="btn btn-primary shadow-none">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin de edición de regimen fiscal -->