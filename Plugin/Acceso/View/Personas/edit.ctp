<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Personas : Editar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Persona'); ?>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                        <?php echo $this->Form->input('tipo_doc_id', array('class' => 'form-control', 'options' => $estadoCivils, 'empty' => '--Seleccione--', 'label' => 'Tipo de Documento')); ?>
                    </div>
                    <div class="col-lg-3"><?php echo $this->Form->input('num_doc', array('class' => 'form-control', 'type' => 'text', 'label' => 'Número de Documento')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('nacionalidad', array('class' => 'form-control', 'type' => 'text')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('genero', array('class' => 'form-control', 'options' => array('M' => 'Masculino', 'F' => 'Femenino'),'empty' => '--Seleccione--')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('ape_pat', array('class' => 'form-control', 'type' => 'text', 'label' => 'Apellido Paterno')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('ape_mat', array('class' => 'form-control', 'type' => 'text', 'label' => 'Apellido Materno')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('nombres', array('class' => 'form-control', 'type' => 'text')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('estado_civil_id', array('class' => 'form-control','empty' => '--Seleccione--')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('direccion', array('class' => 'form-control', 'type' => 'text')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('fecnac', array('class' => 'form-control', 'type' => 'text', 'label' => 'Fecha de Nacimiento', 'placeholder'=>'dd-mm-yyyy', 'maxlength'=>10)); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('movil1', array('class' => 'form-control', 'type' => 'text')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('movil2', array('class' => 'form-control', 'type' => 'text')); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('email', array('class' => 'form-control', 'type' => 'text')); ?></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <?php echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked')); ?>
                        </div>
                    </div>
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
<?php echo $this->Html->script(array('acceso/personas-add')); ?>