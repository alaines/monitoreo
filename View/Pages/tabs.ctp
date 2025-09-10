<div class="row">
    <div class="col-lg-12">
        <div role="tabpanel">
            <ul class="nav nav-tabs" role="tablist" id="formTab">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="cruce-tab" data-toggle="tab" href="#cruce" role="tab" aria-controls="cruce" aria-selected="true">Datos Intersección</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="signals-tab" data-toggle="tab" href="#signals" role="tab" aria-controls="signals" aria-selected="false">Señalizacion</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="structures-tab" data-toggle="tab" href="#structures" role="tab" aria-controls="structures" aria-selected="false">Bienes Semaforicos</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="cabinet-tab" data-toggle="tab" href="#cabinet" role="tab" aria-controls="cabinet" aria-selected="false">Equipos en Gabinete</a>
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="signals" role="tabpanel" aria-labelly="signals-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Señalización</h6>
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
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="structures" role="tabpanel" aria-labelly="structures-tab">
                    <div class="card shadow w-100">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Inventario : Semáforos</h6>
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
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('tabs')); ?>