<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('persona_id');
		echo $this->Form->input('usuario');
		echo $this->Form->input('grupo_id');
		echo $this->Form->input('clave');
		echo $this->Form->input('area_id');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usuario.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Usuario.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Personas'), array('controller' => 'personas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Persona'), array('controller' => 'personas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grupos'), array('controller' => 'grupos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grupo'), array('controller' => 'grupos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
	</ul>
</div>
