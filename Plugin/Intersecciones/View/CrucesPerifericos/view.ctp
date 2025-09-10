<div class="crucesPerifericos view">
<h2><?php echo __('Cruces Periferico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($crucesPeriferico['CrucesPeriferico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cruce'); ?></dt>
		<dd>
			<?php echo $this->Html->link($crucesPeriferico['Cruce']['id'], array('controller' => 'cruces', 'action' => 'view', $crucesPeriferico['Cruce']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Periferico'); ?></dt>
		<dd>
			<?php echo $this->Html->link($crucesPeriferico['Periferico']['id'], array('controller' => 'perifericos', 'action' => 'view', $crucesPeriferico['Periferico']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($crucesPeriferico['CrucesPeriferico']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($crucesPeriferico['CrucesPeriferico']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cruces Periferico'), array('action' => 'edit', $crucesPeriferico['CrucesPeriferico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cruces Periferico'), array('action' => 'delete', $crucesPeriferico['CrucesPeriferico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $crucesPeriferico['CrucesPeriferico']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cruces Perifericos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruces Periferico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Perifericos'), array('controller' => 'perifericos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Periferico'), array('controller' => 'perifericos', 'action' => 'add')); ?> </li>
	</ul>
</div>
