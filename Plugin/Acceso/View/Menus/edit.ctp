<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Menu: Editar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                    <?php echo $this->Form->create('Menu'); ?>
                    <?php echo $this->Form->input('id',array('type' => 'hidden')); ?><br>
                    <?php echo $this->Form->input('name', array('type'=>'text','label' => 'Nombre','class'=>'form-control')); ?><br/>
                    <?php echo $this->Form->input('url',array('type'=>'text','class'=>'form-control')); ?><br/>
                    <?php echo $this->Form->input('icono',array('type'=>'text','class'=>'form-control')); ?><br/>
                    <div class="form-inline form-group"><?php echo $this->Form->input('estado',['label' => '&nbsp;Estado','div' => false, 'class' => 'checkbox', 'checked']); ?> </div>
                    <br>
                    <button id="back" class="btn btn-primary shadow">Volver</button> 
                    <button type="submit" class="btn btn-warning shadow"> Guardar </button>
                    <?php echo $this->Form->end();?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
