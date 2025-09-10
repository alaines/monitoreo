<div class="ejes form">
<?php echo $this->Form->create('Eje'); ?>
	<fieldset>
		<legend><?php echo __('Add Eje'); ?></legend>
	<?php
		echo $this->Form->input('nombre_via');
		echo $this->Form->input('tipo_via');
		echo $this->Form->input('nro_carriles');
		echo $this->Form->input('ciclovia');
		echo $this->Form->input('observaciones');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ejes'), array('action' => 'index')); ?></li>
	</ul>
</div>
