<div class="tipos view">
<h2><?php echo __('Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tipo['ParentTipo']['id'], array('controller' => 'tipos', 'action' => 'view', $tipo['ParentTipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($tipo['Tipo']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tipo'), array('action' => 'edit', $tipo['Tipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tipo'), array('action' => 'delete', $tipo['Tipo']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $tipo['Tipo']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tipos'), array('controller' => 'tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tipos'); ?></h3>
	<?php if (!empty($tipo['ChildTipo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tipo['ChildTipo'] as $childTipo): ?>
		<tr>
			<td><?php echo $childTipo['id']; ?></td>
			<td><?php echo $childTipo['parent_id']; ?></td>
			<td><?php echo $childTipo['nombre']; ?></td>
			<td><?php echo $childTipo['estado']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tipos', 'action' => 'view', $childTipo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tipos', 'action' => 'edit', $childTipo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tipos', 'action' => 'delete', $childTipo['id']), array('confirm' => __('Are you sure you want to delete # %s?', $childTipo['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Tipo'), array('controller' => 'tipos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
