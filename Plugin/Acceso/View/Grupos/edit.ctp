<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Grupos: Editar</h6>
            </div>
            <div class="card-body">
            <?php echo $this->Form->create('Grupo'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <h4><strong>Agregar Grupo</strong></h4>
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                        <?php echo $this->Form->input('nombre', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('descripcion', array('class' => 'form-control')); ?>
                        <?php echo $this->Form->input('edicion', array('class' => 'form-control', 'label' => 'Puede editar datos?','empty' => '--Seleccione--','options'=> array('1'=>'Si','0'=>'No')));?>
                        <br>
                        <button id="back" class="btn btn-primary shadow">Volver</button> 
                        <button type="submit" class="btn btn-warning shadow" id="comprobar"> Grabar </button>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>