<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Reportes : Generar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Reporte');?>
                    <div class="row">
                        <div class="col-lg-2">
                            <?php echo $this->Form->input('fecha1',array('type' => 'text', 'div' => false, 'class' => 'form-control','required')); ?> &nbsp;
                        </div>
                        <div class="col-lg-2">
                            <?php echo $this->Form->input('fecha2',array('type' => 'text', 'div' => false, 'class' => 'form-control')); ?>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-danger shadow">Generar <i class="far fa-file-excel"></i></button>
                    </div>
                </div>
                <?php echo $this->Form->end();?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('incidencias/reportes-index')); ?>