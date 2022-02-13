<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-2"><i class="flaticon-tick-inside-circle"></i> Registro categorías</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaCategoria"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Status</th>
                                <th>Imagen</th>
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
 * REGISTRO DE CATEGORÍA
 ===================================================================--->
<div class="modal fade" id="modal-2" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de categoría</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formCateg" enctype="multipart/form-data" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombrecat">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombrecat"
                                        onkeyup="mayusP(this);" placeholder="Nombre categoría" name="nombrecat"
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
                            <div class="col-md-6 mb-3" id="val-descripcat">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripcat" id="descripcat" rows="3"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-fotoCat">
                                <label for="validationCustom14">Subir foto categoría</label>
                                <div class="input-group">
                                    <input type="file" class="fotoCategoria form-control formulario_grupo-input"
                                        id="fotoCat" name="fotoCat" autocomplete="off">
                                    <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                            foto
                                            2MB</b>
                                    </p>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <center><img src="vistas/img/categoria/default/anonymous.png" id="img-preview"
                                        class="img-thumbnail previsualizarCat" width="50%"></center>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajecat">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                    <button type="submit" id="ingrecat" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de categoría -->
<!---=================================================================
 * EDICIÓN DE CATEGORÍA
 ===================================================================--->
<div class="modal fade" id="modal-editCat" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de categoría</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formCategE" enctype="multipart/form-data" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombrecatE">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="hidden" id="idCategorias" name="idCategorias">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombrecatE"
                                        onkeyup="mayusP(this);" placeholder="Nombre categoría" name="nombrecatE"
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
                            <div class="col-md-6 mb-3" id="val-descripcatE">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripcatE" id="descripcatE" rows="3"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-fotoCatE">
                                <label for="validationCustom14">Subir foto categoría</label>
                                <div class="input-group">
                                    <input type="hidden" class="antiguaFotoCatE">
                                    <input type="file" class="fotoCategoria form-control formulario_grupo-input"
                                        id="fotoCatE" name="fotoCatE" autocomplete="off">
                                    <p class="help-block"><b>Tamaño recomendado 500px * 500px <br> Peso máximo de la
                                            foto
                                            2MB</b>
                                    </p>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <center><img src="vistas/img/categoria/default/anonymous.png"
                                        class="img-thumbnail previsualizarCat" id="previsualizarCat" width="50%">
                                </center>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajecatE">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                    <button type="submit" id="ingrecat" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de categoría -->