<div class="crucesPerifericos form">
<?php echo $this->Form->create('CrucesPeriferico'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cruces Periferico'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cruce_id');
		echo $this->Form->input('periferico_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CrucesPeriferico.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CrucesPeriferico.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces Perifericos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perifericos'), array('controller' => 'perifericos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Periferico'), array('controller' => 'perifericos', 'action' => 'add')); ?> </li>
	</ul>
</div>
