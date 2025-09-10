<div class="perifericos view">
<h2><?php echo __('Periferico'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Periferico'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['tipo_periferico']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fabricante'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['fabricante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modelo'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['modelo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero Serie'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['numero_serie']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['usuario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('En Garantia'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['en_garantia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($periferico['Periferico']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Periferico'), array('action' => 'edit', $periferico['Periferico']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Periferico'), array('action' => 'delete', $periferico['Periferico']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $periferico['Periferico']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Perifericos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Periferico'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cruces'); ?></h3>
	<?php if (!empty($periferico['Cruce'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ubigeo Id'); ?></th>
		<th><?php echo __('Tipo Gestion'); ?></th>
		<th><?php echo __('Administradore Id'); ?></th>
		<th><?php echo __('Proyecto Id'); ?></th>
		<th><?php echo __('Via1'); ?></th>
		<th><?php echo __('Via2'); ?></th>
		<th><?php echo __('Tipo Comunicacion'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Tipo Cruce'); ?></th>
		<th><?php echo __('Tipo Estructura'); ?></th>
		<th><?php echo __('Plano Pdf'); ?></th>
		<th><?php echo __('Plano Dwg'); ?></th>
		<th><?php echo __('Tipo Operacion'); ?></th>
		<th><?php echo __('Ano Implementacion'); ?></th>
		<th><?php echo __('Observaciones'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Latitud'); ?></th>
		<th><?php echo __('Longitud'); ?></th>
		<th><?php echo __('Codigo'); ?></th>
		<th><?php echo __('Tipo Control'); ?></th>
		<th><?php echo __('Codigo Anterior'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($periferico['Cruce'] as $cruce): ?>
		<tr>
			<td><?php echo $cruce['id']; ?></td>
			<td><?php echo $cruce['ubigeo_id']; ?></td>
			<td><?php echo $cruce['tipo_gestion']; ?></td>
			<td><?php echo $cruce['administradore_id']; ?></td>
			<td><?php echo $cruce['proyecto_id']; ?></td>
			<td><?php echo $cruce['via1']; ?></td>
			<td><?php echo $cruce['via2']; ?></td>
			<td><?php echo $cruce['tipo_comunicacion']; ?></td>
			<td><?php echo $cruce['estado']; ?></td>
			<td><?php echo $cruce['tipo_cruce']; ?></td>
			<td><?php echo $cruce['tipo_estructura']; ?></td>
			<td><?php echo $cruce['plano_pdf']; ?></td>
			<td><?php echo $cruce['plano_dwg']; ?></td>
			<td><?php echo $cruce['tipo_operacion']; ?></td>
			<td><?php echo $cruce['ano_implementacion']; ?></td>
			<td><?php echo $cruce['observaciones']; ?></td>
			<td><?php echo $cruce['created']; ?></td>
			<td><?php echo $cruce['modified']; ?></td>
			<td><?php echo $cruce['nombre']; ?></td>
			<td><?php echo $cruce['latitud']; ?></td>
			<td><?php echo $cruce['longitud']; ?></td>
			<td><?php echo $cruce['codigo']; ?></td>
			<td><?php echo $cruce['tipo_control']; ?></td>
			<td><?php echo $cruce['codigo_anterior']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cruces', 'action' => 'view', $cruce['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cruces', 'action' => 'edit', $cruce['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cruces', 'action' => 'delete', $cruce['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cruce['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
