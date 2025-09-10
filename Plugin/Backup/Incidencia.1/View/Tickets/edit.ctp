<?php //debug($this->data); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Editar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Ticket'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('id',array('type' => 'hidden'));?>
                        <?php echo $this->Form->input('incidencia_nombre', array('class' => 'form-control', 'label' => 'Incidencia', 'options' => $incidencias, 'value' => $this->request->data['Incidencia']['parent_id'],'required')); ?>
                    </div>
                    <div class="col-lg-4">
                        <label for="TicketIncidenciaId">Tipo</label>
                        <?php echo $this->Form->input('tipoId',array('type' => 'hidden', 'value' => $this->request->data['Incidencia']['parent_id'])); ?>
                        <?php echo $this->Form->input('tipoId2',array('type' => 'hidden', 'value' => $this->request->data['Incidencia']['id'])); ?>
                        <select class="form-control" id="TicketIncidenciaId" name="data[Ticket][incidencia_id]" required="required">
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <?= $this->Form->input('prioridades', array('class' => 'form-control', 'label' => 'Prioridad', 'type'=>'text' ,'value'=>$this->data['Prioridade']['nombre'],'disabled')); ?>
                        <?= $this->Form->input('prioridade_id', array('type' => 'hidden')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="cruceBusca">Cruce</label>
                        <input type="text" class="form-control" id="cruceBusca" name='data[Cruce][txt]' placeholder="Ingrese Cruce" value="<?php echo $dataCruce; ?>">
                        <?php echo $this->Form->input('cruce_id',array('type' => 'hidden'));?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6"><?php echo $this->Form->input('reportadore_id', array('class' => 'form-control', 'label' => 'Quien reporta?', 'required')); ?></div>
                    <div class="col-lg-6"><?php echo $this->Form->input('equipo_id', array('class' => 'form-control', 'label' => 'Se asigna a :', 'required')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('descripcion', array('class' => 'form-control', 'label' => 'Detalle de incidencia', 'required')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-right"><br><button id="back" class="btn btn-primary shadow">Volver</button> <button type="submit" class="btn btn-warning shadow"> Grabar </button></div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('incidencias/tickets-edit')); ?>