<div class="responsables view">
<h2><?php echo __('Responsable'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($responsable['Responsable']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Equipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($responsable['Equipo']['id'], array('controller' => 'equipos', 'action' => 'view', $responsable['Equipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($responsable['Responsable']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($responsable['Responsable']['estado']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Responsable'), array('action' => 'edit', $responsable['Responsable']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Responsable'), array('action' => 'delete', $responsable['Responsable']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $responsable['Responsable']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Responsables'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Responsable'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('controller' => 'equipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipo'), array('controller' => 'equipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ticket Seguimientos'), array('controller' => 'ticket_seguimientos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Seguimiento'), array('controller' => 'ticket_seguimientos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ticket Seguimientos'); ?></h3>
	<?php if (!empty($responsable['TicketSeguimiento'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ticket Id'); ?></th>
		<th><?php echo __('Equipo Id'); ?></th>
		<th><?php echo __('Responsable Id'); ?></th>
		<th><?php echo __('Reporte'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Usuario Registra'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($responsable['TicketSeguimiento'] as $ticketSeguimiento): ?>
		<tr>
			<td><?php echo $ticketSeguimiento['id']; ?></td>
			<td><?php echo $ticketSeguimiento['ticket_id']; ?></td>
			<td><?php echo $ticketSeguimiento['equipo_id']; ?></td>
			<td><?php echo $ticketSeguimiento['responsable_id']; ?></td>
			<td><?php echo $ticketSeguimiento['reporte']; ?></td>
			<td><?php echo $ticketSeguimiento['estado_id']; ?></td>
			<td><?php echo $ticketSeguimiento['created']; ?></td>
			<td><?php echo $ticketSeguimiento['usuario_registra']; ?></td>
			<td><?php echo $ticketSeguimiento['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ticket_seguimientos', 'action' => 'view', $ticketSeguimiento['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ticket_seguimientos', 'action' => 'edit', $ticketSeguimiento['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ticket_seguimientos', 'action' => 'delete', $ticketSeguimiento['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticketSeguimiento['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ticket Seguimiento'), array('controller' => 'ticket_seguimientos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
