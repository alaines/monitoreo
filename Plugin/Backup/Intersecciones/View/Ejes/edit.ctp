<div class="ejes form">
<?php echo $this->Form->create('Eje'); ?>
	<fieldset>
		<legend><?php echo __('Edit Eje'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Eje.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Eje.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Ejes'), array('action' => 'index')); ?></li>
	</ul>
</div>
