<div class="senales view">
<h2><?php echo __('Senale'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cruce'); ?></dt>
		<dd>
			<?php echo $this->Html->link($senale['Cruce']['id'], array('controller' => 'cruces', 'action' => 'view', $senale['Cruce']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Signal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($senale['Signal']['name'], array('controller' => 'signals', 'action' => 'view', $senale['Signal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Signals'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['num_signals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Placa'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['tipo_placa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Num Placas'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['num_placas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estructura Forma'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['estructura_forma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Soporte'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['tipo_soporte']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario Registra'); ?></dt>
		<dd>
			<?php echo h($senale['Senale']['usuario_registra']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Senale'), array('action' => 'edit', $senale['Senale']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Senale'), array('action' => 'delete', $senale['Senale']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $senale['Senale']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Senales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Senale'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cruces'), array('controller' => 'cruces', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cruce'), array('controller' => 'cruces', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Signals'), array('controller' => 'signals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Signal'), array('controller' => 'signals', 'action' => 'add')); ?> </li>
	</ul>
</div>
