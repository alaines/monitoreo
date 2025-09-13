<div class="lots view">
<h2><?php echo __('Lot'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CreatedAt'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['createdAt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('UpdatedAt'); ?></dt>
		<dd>
			<?php echo h($lot['Lot']['updatedAt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parking'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lot['Parking']['name'], array('controller' => 'parkings', 'action' => 'view', $lot['Parking']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lot'), array('action' => 'edit', $lot['Lot']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lot'), array('action' => 'delete', $lot['Lot']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $lot['Lot']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Lots'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lot'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parkings'), array('controller' => 'parkings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parking'), array('controller' => 'parkings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Movements'), array('controller' => 'movements', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sensors'), array('controller' => 'sensors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sensor'), array('controller' => 'sensors', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Movements'); ?></h3>
	<?php if (!empty($lot['Movement'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('CreatedAt'); ?></th>
		<th><?php echo __('UpdatedAt'); ?></th>
		<th><?php echo __('Lot Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lot['Movement'] as $movement): ?>
		<tr>
			<td><?php echo $movement['id']; ?></td>
			<td><?php echo $movement['state']; ?></td>
			<td><?php echo $movement['created']; ?></td>
			<td><?php echo $movement['createdAt']; ?></td>
			<td><?php echo $movement['updatedAt']; ?></td>
			<td><?php echo $movement['lot_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'movements', 'action' => 'view', $movement['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'movements', 'action' => 'edit', $movement['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'movements', 'action' => 'delete', $movement['id']), array('confirm' => __('Are you sure you want to delete # %s?', $movement['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Movement'), array('controller' => 'movements', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sensors'); ?></h3>
	<?php if (!empty($lot['Sensor'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('State'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('CreatedAt'); ?></th>
		<th><?php echo __('UpdatedAt'); ?></th>
		<th><?php echo __('Lot Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lot['Sensor'] as $sensor): ?>
		<tr>
			<td><?php echo $sensor['id']; ?></td>
			<td><?php echo $sensor['code']; ?></td>
			<td><?php echo $sensor['state']; ?></td>
			<td><?php echo $sensor['created']; ?></td>
			<td><?php echo $sensor['modified']; ?></td>
			<td><?php echo $sensor['createdAt']; ?></td>
			<td><?php echo $sensor['updatedAt']; ?></td>
			<td><?php echo $sensor['lot_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sensors', 'action' => 'view', $sensor['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sensors', 'action' => 'edit', $sensor['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sensors', 'action' => 'delete', $sensor['id']), array('confirm' => __('Are you sure you want to delete # %s?', $sensor['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sensor'), array('controller' => 'sensors', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
