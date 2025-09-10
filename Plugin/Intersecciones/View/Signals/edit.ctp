<div class="signals form">
<?php echo $this->Form->create('Signal'); ?>
	<fieldset>
		<legend><?php echo __('Edit Signal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('lft');
		echo $this->Form->input('rght');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('state');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Signal.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Signal.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Signals'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Senales'), array('controller' => 'senales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Senale'), array('controller' => 'senales', 'action' => 'add')); ?> </li>
	</ul>
</div>
