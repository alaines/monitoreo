<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Parqueos : Registrar</h6>
            </div>
            <div class="card-body">
			<?php echo $this->Form->create('Lot'); ?>
			<div class="row">
				<div class="col-lg-6">
				<?php echo $this->Form->input('code',['label'=>'Codigo de Parqueo','class' => 'form-control']); ?>
				<?php echo $this->Form->input('latitude',['label'=>'Latitud','class' => 'form-control']); ?>
				<?php echo $this->Form->input('longitude',['label'=>'Longitud','class' => 'form-control']); ?>
				<?php echo $this->Form->input('parking_id',['label'=>'Lugar','class' => 'form-control']); ?>
				</div>
				<div class="col-lg-6">
				<div style="height: 100%; position: relative;" id="map_add"></div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-lg-12">
					<button id="back" class="btn btn-primary shadow"> Volver </button> 
					<button type="submit" class="btn btn-warning shadow"> Grabar </button>
				</div>
			</div>
			<?php echo $this->Form->end(); ?>
			</div>
		</div>
	</div>
</div>
<?php echo $this->Html->script(array('parqueos/lots-add')); ?>