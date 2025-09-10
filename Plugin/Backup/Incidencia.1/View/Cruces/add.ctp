<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Cruces : Agregar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Cruce'); ?>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('codigo', array('type' => 'text', 'class' => 'form-control', 'required')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('nombre', array('class' => 'form-control', 'required'));?></div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('busca', array('type' => 'text', 'class' => 'form-control', 'label' => 'Proyecto'));?>
                        <?php echo $this->Form->input('proyecto_id', array('type' => 'hidden'));?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_controlador', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('tipo_controlador', array('class' => 'form-control', 'empty' => '--Seleccione--','options' => array('SICE'=>'SICE', 'SUTEC'=>'SUTEC', 'INDRA'=>'INDRA', 'TRELEC'=>'TRELEC','KAPSCH'=>'KAPSCH'))); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('modelo_controlador', array('type' => 'text', 'class' => 'form-control')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('ip_switch1', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('marca_switch_1', array('class' => 'form-control', 'empty' => '--Seleccione--','options' => array('MOXA'=>'MOXA', 'RUGGEDCOM'=>'RUGGEDCOM', 'ORING'=>'ORING'))); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('ip_switch_2', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('marca_switch_2', array('class' => 'form-control', 'empty' => '--Seleccione--','options' => array('MOXA'=>'MOXA', 'RUGGEDCOM'=>'RUGGEDCOM', 'ORING'=>'ORING'))); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_camara', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_traficam', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_ups', array('type' => 'text', 'class' => 'form-control')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_radio_1', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_radio_2', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('ip_radio_3', array('type' => 'text', 'class' => 'form-control')); ?></div>                
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('empresa_electrica', array('class' => 'form-control', 'empty' => '--Seleccione--','options' => array('ENEL'=>'ENEL', 'LUZ DEL SUR'=>'LUZ DEL SUR'))); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('suministro', array('type' => 'text', 'class' => 'form-control')); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('telefonos', array('type' => 'text', 'class' => 'form-control')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <br><button id="back" class="btn btn-primary shadow">Volver</button> 
                        <button type="submit" class="btn btn-warning shadow"> Grabar </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('incidencias/cruces-add')); ?>