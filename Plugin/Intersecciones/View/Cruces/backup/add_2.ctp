<div class="row">
    <div class="col-lg-12">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist" id="formTab">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="cruce-tab" data-toggle="tab" href="#cruce" role="tab" aria-controls="cruce" aria-selected="true">Datos Intersección</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="semaforo-tab" data-toggle="tab" href="#semaforo" role="tab" aria-controls="semaforo" aria-selected="false">Semáforos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="structures-tab" data-toggle="tab" href="#structures" role="tab" aria-controls="structures" aria-selected="false">Bienes Semaforicos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="signals-tab" data-toggle="tab" href="#signals" role="tab" aria-controls="signals" aria-selected="false">Señalizacion</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="cabinet-tab" data-toggle="tab" href="#cabinet" role="tab" aria-controls="cabinet" aria-selected="false">Equipos en Gabinete</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="observaciones-tab" data-toggle="tab" href="#observaciones" role="tab" aria-controls="observaciones" aria-selected="false">Observaciones</a>
                </li>
            </ul>
            <?php echo $this->Form->create('Cruce',['type'=>'file']); ?>
            <div class="tab-content" id="formTabContent">
                <div class="tab-pane fade show active" id="cruce" role="tabpanel" aria-labelly="cruce-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Datos Intersección</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('proyecto_id',['label'=>'Proyecto','empty'=>' --Seleccione-- ','class' => 'form-control','required']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('codigo_anterior',['label'=>'Codigo en Proyecto','class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('administradore_id',['label'=>'Administrado por','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                                </div>                    
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('ubigeo_id',['label'=>'Distrito','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="via1Busca">Via Principal / Eje</label>
                                    <input type="text" class="form-control" id="via1Busca" name='data[Eje][txt1]' placeholder="Ingrese Via 1">
                                    <input type="hidden" id="CruceVia1" name='data[Cruce][via1]'>

                                    <label for="via2Busca">Via de referencia</label>
                                    <input type="text" class="form-control" id="via2Busca" name='data[Eje][txt2]' placeholder="Ingrese Via 2">
                                    <input type="hidden" id="CruceVia2" name='data[Cruce][via2]'>

                                    <?php echo $this->Form->input('latitud',['class' => 'form-control']); ?>

                                    <?php echo $this->Form->input('longitud',['class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-6">
                                    <div style="height: 100%; position: relative;" id="map_add"></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Plano PDF</label>
                                        <input type="file" name="data[Cruce][plano_pdf]" id="CrucePlanoPdf">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Plano DWG</label>
                                        <input type="file" name="data[Cruce][plano_dwg]" id="CrucePlanoDwg">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-check">
                                        <?php echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked')); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="semaforo" role="tabpanel" aria-labelly="signals-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Semáforos</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                              <thead>
                                <tr>
                                  <th scope="col">Tipo</th>
                                  <th scope="col">Posición</th>
                                  <th scope="col">Luces</th>
                                  <th scope="col">Cantidad</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="structures" role="tabpanel" aria-labelly="structures-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Bienes semafóricos</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_gestion',['label'=>'Tipo de Gestión','class' => 'form-control','options' => $tipo_gestion,'empty' => '--Seleccione--']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_control',['label'=>'Modo de Control','class' => 'form-control','options' => $tipo_control,'empty' => '--Seleccione--']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_operacion',['label'=>'Modo de Operación','class' => 'form-control','options' => $tipo_operacion,'empty' => '--Seleccione--']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_comunicacion',['label'=>'Tipo de Comunicación','class' => 'form-control','options' => $tipo_comunicacion,'empty' => '--Seleccione--']) ?>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_cruce',['options' => $tipo_cruce,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $this->Form->input('tipo_estructura',['label'=>'Tipo de Estructura','options' => $tipo_estructura,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-2">
                                    <?php echo $this->Form->input('ano_implementacion',['label'=>'Año de Implementación','class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-2">
                                    <?php echo $this->Form->input('electrico_empresa',['label'=>'Empresa Electrica','empty'=>'--Seleccione --','options'=> ['E'=>'ENEL','L'=>'LUZ DEL SUR'],'class' => 'form-control']); ?>
                                </div>
                                <div class="col-lg-2">
                                    <?php echo $this->Form->input('electrico_suministro',['label'=>'N° de suministro','class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="signals" role="tabpanel" aria-labelly="signals-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Señalización</h6>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="cabinet" role="tabpanel" aria-labelly="cabinet-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Gabinete</h6>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="observaciones" role="tabpanel" aria-labelly="observaciones-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Observaciones</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php echo $this->Form->input('observaciones',['class' => 'form-control']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <button id="back" class="btn btn-primary shadow"> Volver </button> 
                    <button type="submit" class="btn btn-warning shadow"> Grabar </button>
                </div>
            </div>
            <br>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('intersecciones/cruces-add')); ?>