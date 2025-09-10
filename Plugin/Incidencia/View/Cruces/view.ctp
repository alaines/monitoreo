<div class="cruces view">
<h2><?php echo __('Cruce'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Codigo'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['codigo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Switch 1'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_switch_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Switch 2'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_switch_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Controlador'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_controlador']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Camara'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_camara']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Traficam'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_traficam']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip Ups'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ip_ups']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Empresa Electrica'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['empresa_electrica']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suministro'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['suministro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefonos'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['telefonos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Controlador'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_controlador']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo Controlador'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['modelo_controlador']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Registra'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['usuario_registra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Modifica'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['usuario_modifica']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cruce'), array('action' => 'edit', $cruce['Cruce']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cruce'), array('action' => 'delete', $cruce['Cruce']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cruce['Cruce']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Tickets'); ?></h3>
	<?php if (!empty($cruce['Ticket'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Incidencia Id'); ?></th>
		<th><?php echo __('Prioridade Id'); ?></th>
		<th><?php echo __('Cruce Id'); ?></th>
		<th><?php echo __('Equipo Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Usuario Registra'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Usuario Finaliza'); ?></th>
		<th><?php echo __('Estado Id'); ?></th>
		<th><?php echo __('Reportadore Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cruce['Ticket'] as $ticket): ?>
		<tr>
			<td><?php echo $ticket['id']; ?></td>
			<td><?php echo $ticket['incidencia_id']; ?></td>
			<td><?php echo $ticket['prioridade_id']; ?></td>
			<td><?php echo $ticket['cruce_id']; ?></td>
			<td><?php echo $ticket['equipo_id']; ?></td>
			<td><?php echo $ticket['descripcion']; ?></td>
			<td><?php echo $ticket['created']; ?></td>
			<td><?php echo $ticket['usuario_registra']; ?></td>
			<td><?php echo $ticket['modified']; ?></td>
			<td><?php echo $ticket['usuario_finaliza']; ?></td>
			<td><?php echo $ticket['estado_id']; ?></td>
			<td><?php echo $ticket['reportadore_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tickets', 'action' => 'view', $ticket['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tickets', 'action' => 'edit', $ticket['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tickets', 'action' => 'delete', $ticket['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticket['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
