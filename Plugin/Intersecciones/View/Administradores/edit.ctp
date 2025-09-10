<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Administradores : Registrar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Administradore'); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                        <?php echo $this->Form->input('nombre',['label'=>'Entidad','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $this->Form->input('responsable',['class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo $this->Form->input('telefono',['class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-6">
                        <?php echo $this->Form->input('email',['class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <?php echo $this->Form->input('estado', ['type' => 'checkbox','class' => 'form-check-input', 'checked']); ?>
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