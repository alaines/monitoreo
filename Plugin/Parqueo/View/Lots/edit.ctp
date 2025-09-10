<div class="lots form">
<?php echo $this->Form->create('Lot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Lot'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('latitude');
		echo $this->Form->input('longitude');
		echo $this->Form->input('state');
		echo $this->Form->input('createdAt');
		echo $this->Form->input('updatedAt');
		echo $this->Form->input('parking_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lot.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Lot.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Lots'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parkings'), array('controller' => 'parkings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parking'), array('controller' => 'parkings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movements'), array('controller' => 'movements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sensors'), array('controller' => 'sensors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sensor'), array('controller' => 'sensors', 'action' => 'add')); ?> </li>
	</ul>
</div>
