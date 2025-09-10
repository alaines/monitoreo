<div class="senales form">
<?php echo $this->Form->create('Senale'); ?>
	<fieldset>
		<legend><?php echo __('Edit Senale'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cruce_id');
		echo $this->Form->input('signal_id');
		echo $this->Form->input('num_signals');
		echo $this->Form->input('tipo_placa');
		echo $this->Form->input('num_placas');
		echo $this->Form->input('estructura_forma');
		echo $this->Form->input('tipo_soporte');
		echo $this->Form->input('usuario_registra');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Senale.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Senale.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Senales'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Signals'), array('controller' => 'signals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signal'), array('controller' => 'signals', 'action' => 'add')); ?> </li>
	</ul>
</div>
