<div class="incidencias form">
<?php echo $this->Form->create('Incidencia'); ?>
	<fieldset>
		<legend><?php echo __('Add Incidencia'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('tipo');
		echo $this->Form->input('estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Incidencias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Incidencias'), array('controller' => 'incidencias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Incidencia'), array('controller' => 'incidencias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
