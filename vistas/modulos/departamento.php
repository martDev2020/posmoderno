<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-dep"><i class="flaticon-tick-inside-circle"></i> Registro departamento</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaDep"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Nombre</th>
                                <th>Status</th>
                                <th>Fecha alta/modiciación</th>
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
 * REGISTRO DE DEPARTAMENTO
 ===================================================================--->
<div class="modal fade" id="modal-dep" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de departamento</h1>
                <form method="post" id="formDep" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombredep">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombredep"
                                        onkeyup="mayusP(this);" placeholder="Nombre departamento" name="nombredep"
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
                    <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajedep">
                        <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="ingredep" class="btn btn-primary shadow-none">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de departmento -->
<!---=================================================================
 * EDICIÓN DE DEPARTAMENTO
 ===================================================================--->
<div class="modal fade" id="modal-editDep" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de departamento</h1>
                <form method="post" id="formDepE" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombredepE">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="hidden" id="idDepE" name="idDepE">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombredepE"
                                        onkeyup="mayusP(this);" placeholder="Nombre departamento" name="nombredepE"
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
                    <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajedepE">
                        <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="ingredepE" class="btn btn-primary shadow-none">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de edicion de departmento -->