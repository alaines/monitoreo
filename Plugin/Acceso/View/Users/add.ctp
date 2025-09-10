<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios : Registrar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Usuario'); ?>
                <div class="row">
                    <div class="col-md-4">
                        <?php echo $this->element('tipoDoc');?>
                    </div>
                    <div class="col-md-4">
                        <?php echo $this->Form->input('Persona.num_doc',['class' => 'form-control', 'label' => 'DNI']);?>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-4"><?php echo $this->Form->input('User.usuario', array('type'=>'text' ,'class'=>'form-control', 'label'=>'Nombre de Usuario'));?></div>
                    <div class="col-md-4" id="respuestaUsuario"></div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('Persona.nombres', ['type'=>'text', 'class'=>'form-control']);?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('Persona.ape_pat', ['type'=>'text', 'class'=>'form-control', 'label' => 'Apellido Paterno']);?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('Persona.ape_mat', ['type'=>'text', 'class'=>'form-control', 'label' => 'Apellido Materno']);?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <label class="control-label" for="PersonaFecnac">Fecha Nacimiento</label>
                        <input type="text" class="form-control" name="data[Persona][fecnac]" id="PersonaFecnac" placeholder="dd-mm-yyyy" maxlength="10"/>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->element('genero');?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->element('estcivil');?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('User.grupo_id', array('class' => 'form-control','options' => $grupos,'empty' => '--Seleccione--'));?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('User.area_id', array('class' => 'form-control','options' => $areas,'empty' => '--Seleccione--'));?></div>
                </div>
                <br>
                <div class="row" id="dataGrupos"></div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <br><button id="back" class="btn btn-primary shadow">Volver</button> 
                        <button type="submit" class="btn btn-warning shadow" id="comprobarUsuario"> Grabar </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('acceso/usuarios-add')); ?>
