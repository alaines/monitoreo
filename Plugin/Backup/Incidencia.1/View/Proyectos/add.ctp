<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Proyecto : Registrar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Proyecto'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('nombre', array('class' => 'form-control', 'type' => 'text', 'required')); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('siglas', array('class' => 'form-control', 'type' => 'text')); ?>
                    </div>                    
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('etapa', array('class' => 'form-control', 'type' => 'text')); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('ejecutado_x_empresa', array('label' => 'Empresa Ejecutora','class' => 'form-control', 'type' => 'text')); ?>
                    </div>
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('ano_proyecto', array('label' => 'Año de Implementacion','class' => 'form-control', 'type' => 'text')); ?>
                    </div> 
                    <div class="col-lg-4">
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