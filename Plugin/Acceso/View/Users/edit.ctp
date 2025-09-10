<?php
$write = 'readonly';
if($this->Session->read('Auth.User')['Grupo']['nombre' ] == "ADMINISTRADOR"){$write = '';}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios : Editar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('User'); ?>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('id'); ?>
                        <?php echo $this->Form->input('usuario', array('class'=>'form-control',$write)); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('clave1', array('class'=>'form-control','type'=>'password', 'label'=>'Clave')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('grupo_id', array('class'=>'form-control',$write)); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('area_id', array('class'=>'form-control',$write)); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <?php if($this->Session->read('Auth.User')['Grupo']['nombre' ] == "ADMINISTRADOR"){ echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked',$write));} ?>
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