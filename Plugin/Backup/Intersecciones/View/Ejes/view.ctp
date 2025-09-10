<div class="ejes view">
<h2><?php echo __('Eje'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Via'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['nombre_via']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Via'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['tipo_via']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nro Carriles'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['nro_carriles']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciclovia'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['ciclovia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Observaciones'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['observaciones']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($eje['Eje']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Eje'), array('action' => 'edit', $eje['Eje']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Eje'), array('action' => 'delete', $eje['Eje']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $eje['Eje']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Ejes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Eje'), array('action' => 'add')); ?> </li>
	</ul>
</div>
