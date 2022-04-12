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
                <h1>Modificar datos de categoría</h1>
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
                                    <input type="hidden" class="antiguaFotoCatE" name="antiguaFotoCatE">
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
<!---=================================================================
 * OFERTA DE CATEGORÍA
 ===================================================================--->
<div class="modal fade" id="modal-ofertaCat" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Promoción categoría</h1>
                <div class="ms-panel-body">
                    <form method="post" id="formOfC" enctype="multipart/form-data" autocomplete="nope">
                        <div class="form-row">
                            <div class="col-md-6 mb-3" id="val-descripOfC">
                                <label for="exampleTextarea">Descripción</label>
                                <textarea class="form-control" name="descripOfC" id="descripOfC" rows="1"
                                    required="true" autocomplete="off">
                                </textarea>
                                <div class=" alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                        <div class="form-row ms-list">
                            <div class="col-md-4 mb-3" id="val-descCat">
                                <label for="validationCustom11">Descuento categoría</label>
                                <input type="hidden" id="idPromC" name="idPromC">
                                <label class="ms-checkbox-wrap ms-checkbox-primary">
                                    <input type="radio" value="descat" name="offer1" id="offer1" onclick="PromCat();">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="input-group">
                                    <input type="number"
                                        class="form-control formulario_grupo-input valorOferta disabledmodal"
                                        id="descCat" name="descCat" min="0" step="any" placeholder="Descuento"
                                        autocomplete="off" disabled="disabled">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">%</span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-precOfCat">
                                <label for="validationCustom11">Precio categoría</label>
                                <label class="ms-checkbox-wrap ms-checkbox-primary">
                                    <input type="radio" value="precio-cat" name="offer1" id="offer2"
                                        onclick="PromCat();">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="input-group">
                                    <input type="number"
                                        class="form-control disabledmodal formulario_grupo-input valorOferta"
                                        id="precOfCat" name="precOfCat" min="0" step="any" placeholder="Precio"
                                        autocomplete="off" disabled="disabled">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2">$</span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-prodCat">
                                <label for="validationCustom11">Artículo (2 * 1)</label>
                                <label class="ms-checkbox-wrap ms-checkbox-primary">
                                    <input type="radio" value="articulo-cat" value="1" name="offer1" id="offer3"
                                        onclick="PromCat();">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="input-group">
                                    <input type="text"
                                        class="form-control disabledmodal formulario_grupo-input valorOferta"
                                        id="prodCat" name="prodCat" placeholder="Producto" autocomplete="off"
                                        disabled="disabled">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío, ingresar número * número.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-piezaminCat">
                                <label for="validationCustom11">Pieza mínima</label>
                                <label class="ms-checkbox-wrap">
                                    <input type="checkbox" class="disabledmodal" value="4" id="pzmin" name="pzmin"
                                        disabled="disabled" onclick="HabilitarCheck();">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="input-group">
                                    <input type="number" min="0" step="any"
                                        class="form-control disabledmodal formulario_grupo-input valorOferta"
                                        id="piezaminCat" name="piezaminCat" placeholder="Pieza mínima"
                                        autocomplete="off" disabled="disabled">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-piezapromCat">
                                <label for="validationCustom11">Pieza promoción</label>
                                <label class="ms-checkbox-wrap">
                                    <input type="checkbox" class="disabledmodal" value="5" id="pzprom" name="pzprom"
                                        disabled="disabled" onclick="HbilitarCheck2();">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="input-group">
                                    <input type="number" min="0" step="any"
                                        class="form-control disabledmodal formulario_grupo-input valorOferta"
                                        id="piezapromCat" name="piezapromCat" placeholder="Pieza promoción"
                                        autocomplete="off" disabled="disabled">
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-artmixtCat">
                                <label for="validationCustom11">Artículos mixtos</label>
                                <label class="ms-checkbox-wrap">
                                    <input type="checkbox" class="disabledmodal" value="1" name="artmixtCat"
                                        id="artmixtCat" disabled="disabled">
                                    <i class="ms-checkbox-check"></i>
                                </label>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-iniOfCat">
                                <label for="validationCustom11">Fecha inicial</label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input datepicker"
                                        placeholder="Fecha inicial" autocomplete="off" name="iniOfCat" id="iniOfCat">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-calendar"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-iniHoraCat">
                                <label for="validationCustom11">Hora inicial</label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="iniHoraCat" id="iniHoraCat" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3" id="val-finFeCat">
                                <label for="validationCustom11">Fecha final</label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input datepicker"
                                        placeholder="Fecha final" autocomplete="off" name="finFeCat" id="finFeCat">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-calendar"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                            <div class="col-md-4 mb-3" id="val-finHoraCat">
                                <label for="validationCustom11">Hora final</label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora final" autocomplete="off" [(ngModel)]="place2search"
                                        name="finHoraCat" id="finHoraCat" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                                <div class="alert alert-success alert-val alert-solid" role="alert">
                                    No debe estar vacío
                                </div>
                            </div>
                        </div>
                </div>
                <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajecatProm">
                    <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="ingrecatProm" class="btn btn-primary shadow-none">Guardar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fin de registro de oferta de categoría -->
<!---=================================================================
 * HORARIOS AVANZADOS
 ===================================================================--->
<div class="modal fade" id="modal-hora" tabindex="-1" role="dialog" aria-labelledby="modal-4">
    <div class="modal-dialog modal-hora" role="document">
        <div class="modal-content modal-color">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h1>Horarios avanzados de promoción</h1>
                <form method="post" id="formHoraC" enctype="multipart/form-data" autocomplete="nope">
                    <div class="ms-panel-body">
                        <div class="form-row ms-list">
                            <div class="col-md-4">
                                <input type="hidden" id="idCatOf" name="idCatOf">
                                <label for="validationCustom11"><b>Días</b></label>
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Lunes">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Lunes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom11"><b>Hora inicial</b></label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horLunesIni" id="horLunesIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom11"><b>Hora final</b></label>
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horLunesFin" id="horLunesFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Martes">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Martes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horMartesIni" id="horMartesIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horMartesFin" id="horMartesFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Miercoles">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Miércoles</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horMierIni" id="horMierIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horMierFin" id="horMierFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Jueves">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Jueves</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horJuevIni" id="horJuevIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horJuevFin" id="horJuevFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Viernes">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Viernes</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horVierIni" id="horVierIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horVierFin" id="horVierFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Sabado">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Sábado</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horSabIni" id="horSabIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horSabFin" id="horSabFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <label class="ms-checkbox-wrap">
                                        <input type="checkbox" value="Domingo">
                                        <i class="ms-checkbox-check"></i>
                                    </label>
                                    <label for="validationCustom11">Domingo</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horDomIni" id="horDomIni" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type='text' class="form-control formulario_grupo-input"
                                        placeholder="Hora inicial" autocomplete="off" [(ngModel)]="place2search"
                                        name="horDomFin" id="horDomFin" spellcheck="false">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupPrepend2"><i
                                                class="fa fa-clock"></i></span>
                                    </div>
                                    <i class="formulario_validacion-estado fas fa-times-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger alert-val alert-solid" role="alert" id="form-mensajecatE">
                        <strong>Error: revisa los campos que estén correctos y no deben estar vacíos.</strong>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                        <button type="submit" id="ingrecat" class="btn btn-primary shadow-none">Guardar</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>