<?php //debug($tipo_senal); ?>
<div class="row">
    <div class="col-lg-12">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist" id="formTab">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="cruce-tab" data-toggle="tab" href="#cruce" role="tab" aria-controls="cruce" aria-selected="true">Datos Intersección</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="conexionado-tab" data-toggle="tab" href="#conexionado" role="tab" aria-controls="conexionado" aria-selected="false">Conexionado</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="semaforo-tab" data-toggle="tab" href="#semaforo" role="tab" aria-controls="semaforo" aria-selected="false">Semáforos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="structures-tab" data-toggle="tab" href="#structures" role="tab" aria-controls="structures" aria-selected="false">Estructuras</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="signals-tab" data-toggle="tab" href="#signals" role="tab" aria-controls="signals" aria-selected="false">Señalizacion</a>
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
                            <?= $this->element('Intersecciones.form_cruces'); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="conexionado" role="tabpanel" aria-labelly="conexionado-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Equipamiento - Conexionado</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->element('Intersecciones.form_conexionado'); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="semaforo" role="tabpanel" aria-labelly="signals-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Semáforos</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->element('Intersecciones.form_semaforo'); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="structures" role="tabpanel" aria-labelly="structures-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Estructuras</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->element('Intersecciones.form_estructuras'); ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="signals" role="tabpanel" aria-labelly="signals-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Señalización Vertical</h6>
                        </div>
                        <div class="card-body">
                            <?= $this->element('Intersecciones.form_senales'); ?>
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
<?php echo $this->Html->script(array('intersecciones/inventarios-add')); ?>
