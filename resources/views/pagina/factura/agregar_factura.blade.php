<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->

<script src="https://unpkg.com/sweetalert2@7.19.3/dist/sweetalert2.all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
<script src="{{ asset('js/js_ajax/facturas.js') }}"></script>

<!-- ================== END PAGE LEVEL STYLE ================== -->
<!-- end breadcrumb -->
<div id="response">
    <!-- begin page-header -->
    <h1 class="page-header">Agregar facturas
        <small>Aqui puedo agregar una factura</small>
    </h1>
    <!-- final cabecera -->
    <!-- begin panel -->
    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
        <div class=" panel-heading ui-sortable-handle">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                            class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                            class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                            class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">Nueva factura</h4>
        </div>
        <div class="panel-body">
            <div class="form-group row ">
                <div class="col-xs-2 col-sm-2 col-lg-2">
                    <label class="col-form-label">Numero de pedido</label>
                    <div class="input-group text">
                        <input type="text" class="form-control" id="idpedido" name="idpedido">
                        <a href="javascript:;" title="Agregar" onclick="buscarPedido()"
                        >
                            <div class="input-group-addon">
                                <i class="fa fa-search"></i>
                            </div>
                        </a>
                    </div>
                    <input type="hidden" id="respuesta">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">Fecha</label>
                    <input type="text" id="fecha" name="fecha" class="form-control " disabled/>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">Vendedor</label>
                    <input type="text" id="vendedor" name="vendedor" class="form-control " disabled/>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label" for="tipventa">Tipo Venta</label>
                    <input type="text" id="tipventa" name="tipventa" class="form-control" value="01| VENTA PRODUCTOS"
                           disabled/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">DNI/RUC</label>
                    <input type="text" class="form-control " id="dni" name="dni" onchange="cambiarDniORuc()"/>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">CLIENTE/RAZON SOCIAL</label>
                    <input type="text" class="form-control " id="cliente" name="cliente"/>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">DIRECCION</label>
                    <input type="text" class="form-control " id="direccion" name="direccion"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">MONEDA</label>
                    <input type="text" class="form-control" value="01| SOLES" id="moneda" name="moneda" disabled/>
                </div>
                <div class="col-xs-4 col-sm-4 col-lg-4">
                    <label class="col-form-label">DOCUMENTO</label>
                    <select name="docum" id="docum" class="form-control" onchange="dnioruc(this.value)" disabled>
                        <option value="null" disabled selected>SELECCIONAR</option>
                        <option value="BOLETA">BOLETA</option>
                        <option value="FACTURA">FACTURA</option>
                    </select>
                </div>
                <div class="col-xs-2 col-sm-2 col-lg-2">
                    <label class="col-form-label">SERIE</label>
                    <input type="text" class="form-control " id="serie" name="serie" readonly/>
                </div>
                <div class="col-xs-2 col-sm-2 col-lg-2">
                    <label class="col-form-label">NUMERO</label>
                    <input type="text" class="form-control " id="numero" name="numero" readonly/>
                </div>
            </div>
            <br>
            <table id="data-table-fixed-header"
                   class="table table-striped table-responsive table-bordered dataTable no-footer dtr-inline"
                   role="grid"
                   aria-describedby="data-table-fixed-header_info" width="100%">
                <thead>
                <tr role="row">
                    <th class="text-nowrap sorting text-center" tabindex="0"
                        aria-controls="data-table-fixed-header"
                        rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending"
                        style="width: 20%;; min-width: 20px;">CODIDO
                    </th>
                    <th class="text-nowrap sorting text-center" tabindex="0"
                        aria-controls="data-table-fixed-header"
                        rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending"
                        style="width: 100%;; min-width: 200px;">DESCRIPCION
                    </th>
                    <th class="text-nowrap sorting text-center" tabindex="0"
                        aria-controls="data-table-fixed-header"
                        rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending"
                        style="width: 100%;; min-width: 187px;">CANTIDAD
                    </th>
                    <th class="text-nowrap sorting text-center" tabindex="0"
                        aria-controls="data-table-fixed-header"
                        rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending"
                        style="width: 100%;; min-width: 187px;">PRECIO
                    </th>
                    <th class="text-nowrap sorting text-center" tabindex="0"
                        aria-controls="data-table-fixed-header"
                        rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending"
                        style="width: 100%;; min-width: 187px;">TOTAL
                    </th>
                </tr>
                </thead>
                <tbody id="cuerpotabla">
                </tbody>
            </table>
            <br>
            <div class="col-md-12" align="center" id="opc">

                <a href="/facturas" class="btn btn-danger" data-toggle="ajax">
                    <i class="fas fa-lg fa-fw m-r-10 fa-times-circle"></i>
                    Cancelar</a>
                <button href="javascript:;" class="btn btn-success " id="enviarpedido" onclick="enviarFacturaSunat()">
                    <i class="fas fa-lg fa-fw m-r-10 fa-paper-plane"> </i>Enviar
                </button>
            </div>
            <div class="col-md-12" align="center" id="impirmir">

            </div>
        </div>

        <br>
    </div>
</div>
<!-- end panel -->
<script>
    App.setPageTitle('Agregar productos | ARPEMAR SAC');
    App.restartGlobalFunction();

</script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<!-- ================== END PAGE LEVEL JS ================== -->
