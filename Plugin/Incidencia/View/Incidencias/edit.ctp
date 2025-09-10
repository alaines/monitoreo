<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencias : Editar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Incidencia'); ?>
                <div class="row">
                    <div class="col-lg-3">
                    <?php
                        echo $this->Form->input('id',['type'=>'hidden']);
                        echo $this->Form->input('parent_id',['class'=>'form-control','options' => $parentIncidencias,'label' => 'Nivel padre']);
                        echo $this->Form->input('tipo', array('class' => 'form-control', 'type' => 'text'));
                        echo $this->Form->input('prioridade_id',['class'=>'form-control','options' => $prioridades,'label' => 'Prioridades']);
                        echo $this->Form->input('caracteristica',['class'=>'form-control','options' => ['I'=>'INCIDENCIAS','T'=>'TRABAJOS']]);
                    ?>
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