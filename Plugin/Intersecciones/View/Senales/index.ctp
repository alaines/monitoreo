<div class="senales index">
	<h2><?php echo __('Senales'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('cruce_id'); ?></th>
			<th><?php echo $this->Paginator->sort('signal_id'); ?></th>
			<th><?php echo $this->Paginator->sort('num_signals'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_placa'); ?></th>
			<th><?php echo $this->Paginator->sort('num_placas'); ?></th>
			<th><?php echo $this->Paginator->sort('estructura_forma'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_soporte'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_registra'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($senales as $senale): ?>
	<tr>
		<td><?php echo h($senale['Senale']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($senale['Cruce']['id'], array('controller' => 'cruces', 'action' => 'view', $senale['Cruce']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($senale['Signal']['name'], array('controller' => 'signals', 'action' => 'view', $senale['Signal']['id'])); ?>
		</td>
		<td><?php echo h($senale['Senale']['num_signals']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['tipo_placa']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['num_placas']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['estructura_forma']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['tipo_soporte']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['created']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['modified']); ?>&nbsp;</td>
		<td><?php echo h($senale['Senale']['usuario_registra']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $senale['Senale']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $senale['Senale']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $senale['Senale']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $senale['Senale']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Senale'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Signals'), array('controller' => 'signals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signal'), array('controller' => 'signals', 'action' => 'add')); ?> </li>
	</ul>
</div>
