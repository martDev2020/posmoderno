<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" class="btn btn-pill btn-gradient-primary has-icon" data-toggle="modal"
                    data-target="#modal-gc"><i class="flaticon-tick-inside-circle"></i> Registro subcategorías</button>
            </div>
            <div class="ms-panel-body">
                <div class="table-responsive">
                    <table
                        class="table table-bordered table-hover thead-primary table-striped dt-responsive nowrap tablaSubcat"
                        width="100%">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Categría</th>
                                <th>Subcategoría</th>
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
 * REGISTRO DE SUBCATEGORÍA
 ===================================================================--->
<div class="modal fade" id="modal-gc" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Ingresar datos de subcategoría</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formsubCateg" enctype="multipart/form-data" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-selectcat">
                                <label for="validationCustom15">Categoria</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-select" name="selectcat">
                                        <option value="">- - - - -Elegir categoría- - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $categorias = ControladorCategoria::ctrMostrarCategoria($item, $value);
                                        foreach ($categorias as $key => $value1) {
                                            echo '<option value="' . $value1["id"] . '">' . $value1["nombre_cat"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    Elija una de las opciones
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombresubcat">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombresubcat"
                                        onkeyup="mayusP(this);" placeholder="Nombre subcategoría" name="nombresubcat"
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
                            <div class="col-md-6 mb-3" id="val-descripsubcat">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripsubcat" id="descripsubcat" rows="3"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-fotosubCat">
                                <label for="validationCustom14">Subir foto subcategoría</label>
                                <div class="input-group">
                                    <input type="file" class="fotosubCategoria form-control formulario_grupo-input"
                                        id="fotosubCat" name="fotosubCat" autocomplete="off">
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
                                <center><img src="vistas/img/categoria/default/anonymous.png" id="img-previewsubc"
                                        class="img-thumbnail previsualizarsubCat" width="50%"></center>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajesubcat">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                    <button type="submit" id="ingresubcat" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de subcategoría -->
<!---=================================================================
 * EDICIÓN DE SUBCATEGORÍA
 ===================================================================--->
<div class="modal fade" id="modal-edsub" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Editar datos de subcategoría</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formsubCategE" enctype="multipart/form-data" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-selectcatE">
                                <label for="validationCustom15">Categoria</label>
                                <div class="input-group">
                                    <input type="hidden" id="idSucatE" name="idSucatE">
                                    <select class="form-control" id="selectE" name="selectcatE">
                                        <option value="">- - - - -Elegir categoría- - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $categorias = ControladorCategoria::ctrMostrarCategoria($item, $value);
                                        foreach ($categorias as $key => $value1) {
                                            echo '<option value="' . $value1["id"] . '">' . $value1["nombre_cat"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    Elija una de las opciones
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-nombresubcatE">
                                <label for="validationCustom11">Nombre</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombresubcatE"
                                        onkeyup="mayusP(this);" placeholder="Nombre subcategoría" name="nombresubcatE"
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
                            <div class="col-md-6 mb-3" id="val-descripsubcatE">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripsubcatE" id="descripsubcatE" rows="3"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-fotosubCatE">
                                <label for="validationCustom14">Subir foto subcategoría</label>
                                <div class="input-group">
                                    <input type="hidden" class="antiguaFotosubCatE" name="antiguaFotosubCatE">
                                    <input type="file" class="fotosubCategoriaE form-control formulario_grupo-input"
                                        id="fotosubCatE" name="fotosubCatE" autocomplete="off">
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
                                <center><img src="vistas/img/categoria/default/anonymous.png" id="img-previewsubcE"
                                        class="img-thumbnail previsualizarsubCatE" width="50%">
                                </center>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajesubcatE">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Canceler</button>
                    <button type="submit" id="editsubcat" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de edición de subcategoría -->