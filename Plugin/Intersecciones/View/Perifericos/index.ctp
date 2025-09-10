<div class="perifericos index">
	<h2><?php echo __('Perifericos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo_periferico'); ?></th>
			<th><?php echo $this->Paginator->sort('fabricante'); ?></th>
			<th><?php echo $this->Paginator->sort('modelo'); ?></th>
			<th><?php echo $this->Paginator->sort('ip'); ?></th>
			<th><?php echo $this->Paginator->sort('numero_serie'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario'); ?></th>
			<th><?php echo $this->Paginator->sort('password'); ?></th>
			<th><?php echo $this->Paginator->sort('en_garantia'); ?></th>
			<th><?php echo $this->Paginator->sort('estado'); ?></th>
			<th><?php echo $this->Paginator->sort('observaciones'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($perifericos as $periferico): ?>
	<tr>
		<td><?php echo h($periferico['Periferico']['id']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['tipo_periferico']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['fabricante']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['modelo']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['ip']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['numero_serie']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['usuario']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['password']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['en_garantia']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['estado']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['observaciones']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['created']); ?>&nbsp;</td>
		<td><?php echo h($periferico['Periferico']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $periferico['Periferico']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $periferico['Periferico']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $periferico['Periferico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $periferico['Periferico']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Periferico'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
	</ul>
</div>
