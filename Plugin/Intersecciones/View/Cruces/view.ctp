<?php //debug($cruce) ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Cruce : Datos</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">CODIGO: <?= $cruce['Cruce']['codigo']; ?></div>
                    <div class="col-lg-4">INTERSECCION: <?= $cruce['Cruce']['nombre']; ?></div>
                    <div class="col-lg-4">PROYECTO: <?= $cruce['Proyecto']['nombre']; ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">CODIGO: <?= $cruce['Cruce']['codigo']; ?></div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4"></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div style="height: 100%; position: relative;" id="map_view"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <?php echo $this->Form->input('codigo',['class' => 'form-control','required']); ?>
                        <?php echo $this->Form->input('proyecto_id',['label'=>'Proyecto','empty'=>' --Seleccione-- ','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-5">
                        <?php echo $this->Form->input('via1',['class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-5">
                        <?php echo $this->Form->input('via2',['class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('ubigeo_id',['label'=>'Distrito','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('latitud',['class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('longitud',['class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('administradore_id',['label'=>'Administrado por','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_gestion',['label'=>'Tipo de Gestión','class' => 'form-control','options' => $tipo_gestion,'empty' => '--Seleccione--']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_comunicacion',['label'=>'Tipo de Comunicación','class' => 'form-control','options' => $tipo_comunicacion,'empty' => '--Seleccione--']) ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_operacion',['label'=>'Tipo de Operación','class' => 'form-control','options' => $tipo_operacion,'empty' => '--Seleccione--']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_estructura',['label'=>'Tipo de Estructura','options' => $tipo_estructura,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_cruce',['options' => $tipo_cruce,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('ano_implementacion',['label'=>'Año de Implementación','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="CrucePlanoPdf">Plano Pdf</label>
                            <input type="file" name="data[Cruce][plano_pdf]" id="CrucePlanoPdf">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="CrucePlanoDwg">Plano Dwg</label>
                            <input type="file" name="data[Cruce][plano_dwg]" id="CrucePlanoDwg">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Form->input('orbservaciones',['class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <?php echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked')); ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button id="back" class="btn btn-primary shadow"> Volver </button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cruces view">
<h2><?php echo __('Cruce'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ubigeo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cruce['Ubigeo']['id'], array('controller' => 'ubigeos', 'action' => 'view', $cruce['Ubigeo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Georeferencia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cruce['Georeferencia']['id'], array('controller' => 'georeferencias', 'action' => 'view', $cruce['Georeferencia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Gestion'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_gestion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Administradore'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cruce['Administradore']['id'], array('controller' => 'administradores', 'action' => 'view', $cruce['Administradore']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Proyecto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cruce['Proyecto']['id'], array('controller' => 'proyectos', 'action' => 'view', $cruce['Proyecto']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eje'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cruce['Eje']['id'], array('controller' => 'ejes', 'action' => 'view', $cruce['Eje']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transversal'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['transversal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Comunicacion'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_comunicacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['estado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Cruce'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_cruce']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Estructura'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_estructura']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plano Pdf'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['plano_pdf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Plano Dwg'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['plano_dwg']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo Operacion'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['tipo_operacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Implementacion'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['ano_implementacion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Orbservaciones'); ?></dt>
		<dd>
			<?php echo h($cruce['Cruce']['orbservaciones']); ?>
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
	</dl>
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
<div class="related">
	<h3><?php echo __('Related Perifericos'); ?></h3>
	<?php if (!empty($cruce['Periferico'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tipo Periferico'); ?></th>
		<th><?php echo __('Fabricante'); ?></th>
		<th><?php echo __('Modelo'); ?></th>
		<th><?php echo __('Ip'); ?></th>
		<th><?php echo __('Numero Serie'); ?></th>
		<th><?php echo __('Usuario'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('En Garantia'); ?></th>
		<th><?php echo __('Estado'); ?></th>
		<th><?php echo __('Observaciones'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($cruce['Periferico'] as $periferico): ?>
		<tr>
			<td><?php echo $periferico['id']; ?></td>
			<td><?php echo $periferico['tipo_periferico']; ?></td>
			<td><?php echo $periferico['fabricante']; ?></td>
			<td><?php echo $periferico['modelo']; ?></td>
			<td><?php echo $periferico['ip']; ?></td>
			<td><?php echo $periferico['numero_serie']; ?></td>
			<td><?php echo $periferico['usuario']; ?></td>
			<td><?php echo $periferico['password']; ?></td>
			<td><?php echo $periferico['en_garantia']; ?></td>
			<td><?php echo $periferico['estado']; ?></td>
			<td><?php echo $periferico['observaciones']; ?></td>
			<td><?php echo $periferico['created']; ?></td>
			<td><?php echo $periferico['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'perifericos', 'action' => 'view', $periferico['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'perifericos', 'action' => 'edit', $periferico['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'perifericos', 'action' => 'delete', $periferico['id']), array('confirm' => __('Are you sure you want to delete # %s?', $periferico['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Periferico'), array('controller' => 'perifericos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
