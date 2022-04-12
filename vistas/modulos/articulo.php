<div class="row">
    <div class="col-md-12">
        <div class="ms-panel">
            <div class="col-md-3 col-sm-6">
                <button type="button" id="modalPr" class="btn btn-pill btn-gradient-primary has-icon"
                    data-toggle="modal" data-target="#modal-pr"><i class="flaticon-tick-inside-circle"></i> Registro
                    productos</button>
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
                <form method="post" id="formPr" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-claveArt">
                                <label for="validationCustom11">Código</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="claveArt"
                                        onkeyup="mayusP(this);" placeholder="Concepto" name="claveArt"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                                <div class="alert alert-danger alert-val-danger alert-solid" role="alert">
                                    El código ya existe en la base de datos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-claveAltA">
                                <label for="validationCustom11">Clave</label>
                                <?php
                                $item = null;
                                $value = null;
                                $response = ControladorProd::ctrMostrarProd($item, $value);
                                // var_dump($response);
                                if (!$response) {
                                    echo '
                                         <div class="input-group">
                                            <input type="text" class="form-control formulario_grupo-input" id="claveAltA"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveAltA" value="001" autocomplete="off"
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
                                            <input type="text" class="form-control formulario_grupo-input" id="claveAltA"
                                                onkeyup="mayusP(this);" placeholder="Clave" name="claveAltA" autocomplete="off"
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
                            <div class="col-md-6 mb-3" id="val-nombreArt">
                                <label for="validationCustom11">Producto</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="nombreArt"
                                        onkeyup="mayusP(this);" placeholder="Nombre producto" name="nombreArt"
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
                            <div class="col-md-6 mb-3" id="val-descrArt">
                                <label for="validationCustom11">Descripción</label>
                                <div class="input-group">
                                    <input type="text" class="form-control formulario_grupo-input" id="descrArt"
                                        onkeyup="mayusP(this);" placeholder="Descripción" name="descrArt"
                                        autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-fotoArt">
                                <label for="validationCustom14">Subir foto producto</label>
                                <div class="input-group">
                                    <input type="file" class="fotoArt form-control formulario_grupo-input" id="fotoArt"
                                        name="fotoArt" autocomplete="off">
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
                                <center><img src="vistas/img/productos/default/anonymous.png" id="img-preview"
                                        class="img-thumbnail previsualizarArt" width="50%"></center>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-selectCat">
                                <label for="validationCustom15">Categoria</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectC" name="selectCat">
                                        <option value="">- - - - - - -Elegir categoría- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $categorias = ControladorCategoria::ctrMostrarCategoria($item, $value);
                                        foreach ($categorias as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["nombre_cat"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    Elija una de las opciones
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-selectsubcat">
                                <label for="validationCustom15">Subcategoría</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectS" name="selectsubcat">
                                        <option value="">- - - - - - -Elegir subcategoría- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $categorias = ControladorSubCategoria::ctrMostrarSubCategoria($item, $value);
                                        foreach ($categorias as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["nombre_subcat"] . '</option>';
                                            }
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
                            <div class="col-md-6 mb-3" id="val-selectdep">
                                <label for="validationCustom15">Departamento</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectD" name="selectdep">
                                        <option value="">- - - - - - -Elegir departamento- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $depart = ControladorDep::ctrMostrarDep($item, $value);
                                        foreach ($depart as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["nombre_dep"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    Elija una de las opciones
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-selectUC">
                                <label for="validationCustom15">Unidad compra</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectUC" name="selectUC">
                                        <option value="">- - - - - - -Elegir unidad compra- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $unidadCom = ControladorUC::ctrMostrarUC($item, $value);
                                        foreach ($unidadCom as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["nombre_unCompra"] . '</option>';
                                            }
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
                            <div class="col-md-6 mb-3" id="val-selectUV">
                                <label for="validationCustom15">Unidad venta</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectUV" name="selectUV">
                                        <option value="">- - - - - - -Elegir unidad venta- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $univent = ControladorUV::ctrMostrarUV($item, $value);
                                        foreach ($univent as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["nombre_univent"] . '</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    Elija una de las opciones
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-precv">
                                <label for="validationCustom11">Pecio venta</label>
                                <div class="input-group">
                                    <input type="number" min="0" step="any" class="form-control formulario_grupo-input"
                                        id="precv" placeholder="Precio venta" name="precv" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-invmin">
                                <label for="validationCustom11">Inventario mínimo</label>
                                <div class="input-group">
                                    <input type="number" min="0" step="any" class="form-control formulario_grupo-input"
                                        id="invmin" placeholder="Inventario mínimo" name="invmin" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                            <div class="col-md-6 mb-3 salir" id="val-invmax">
                                <label for="validationCustom11">Inventario máximo</label>
                                <div class="input-group">
                                    <input type="number" min="0" step="any" class="form-control formulario_grupo-input"
                                        id="invmax" placeholder="Inventario máximo" name="invmax" autocomplete="off">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No ingresar caracteres especiales sólo dígitos
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-selectUImp">
                                <label for="validationCustom15">Tasa impuesto</label>
                                <div class="input-group">
                                    <select class="form-control" id="valid-selectUImp" name="selectUImp">
                                        <option value="">- - - - - - -Elegir tasa impuesto- - - - - - -</option>
                                        <?php
                                        $item = null;
                                        $value = null;
                                        $tasaImp = ControladorTI::ctrMostrarTi($item, $value);
                                        foreach ($tasaImp as $key => $value1) {
                                            if ($value1["activo"] == 1) {
                                                echo '<option value="' . $value1["id"] . '">' . $value1["concepto"] . '</option>';
                                            }
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
                            <div class="col-md-6 mb-3" id="val-recArt">
                                <label for="validationCustom11">Receta</label>
                                <div class="input-group">
                                    <label for="validationCustom11">Si</label>&nbsp;
                                    <label class="ms-checkbox-wrap ms-checkbox-primary">
                                        <input type="radio" value="SI" name="offer1" id="offer1" onclick="PromCat();">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">No</label>&nbsp;
                                    <label class="ms-checkbox-wrap ms-checkbox-primary">
                                        <input type="radio" value="NO" name="offer1" id="offer1" onclick="PromCat();">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    Elegir una opción
                                </div>
                            </div>
                            <div class="col-md-6 mb-3" id="val-granArt">
                                <label for="validationCustom11">Granel</label>
                                <div class="input-group">
                                    <label for="validationCustom11">Si</label>&nbsp;
                                    <label class="ms-checkbox-wrap ms-checkbox-primary">
                                        <input type="radio" value="SI" name="offer2" id="offer1" onclick="PromCat();">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">No</label>&nbsp;
                                    <label class="ms-checkbox-wrap ms-checkbox-primary">
                                        <input type="radio" value="NO" name="offer2" id="offer1" onclick="PromCat();">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    Elegir una opción
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