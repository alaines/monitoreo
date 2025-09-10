<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Inventario : Seleccion de cruce</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Inventarios'); ?>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="cruceBusca">Cruce</label>
                        <input type="text" class="form-control" id="cruceBusca" name='data[cruce_txt]' placeholder="Ingrese Cruce">
                        <input type="hidden" id="cruce_id" name='data[cruce_id]'>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <button type="submit" id="buscar" class="btn btn-danger shadow">Buscar</button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('intersecciones/inventarios-index')); ?>
