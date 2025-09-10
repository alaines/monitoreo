<div class="crucesPerifericos form">
<?php echo $this->Form->create('CrucesPeriferico'); ?>
	<fieldset>
		<legend><?php echo __('Add Cruces Periferico'); ?></legend>
	<?php
		echo $this->Form->input('cruce_id');
		echo $this->Form->input('periferico_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>