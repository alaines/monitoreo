<div class="proyectos form">
<?php echo $this->Form->create('Proyecto'); ?>
	<fieldset>
		<legend><?php echo __('Edit Proyecto'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('siglas');
		echo $this->Form->input('nombre');
		echo $this->Form->input('etapa');
		echo $this->Form->input('ejecutado_x_empresa');
		echo $this->Form->input('estado');
		echo $this->Form->input('ano_proyecto');
		echo $this->Form->input('usuario_registra');
		echo $this->Form->input('usuario_modifica');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Proyecto.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Proyecto.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Proyectos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
	</ul>
</div>
