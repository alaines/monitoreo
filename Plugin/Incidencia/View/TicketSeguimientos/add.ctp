<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Detalle</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('incidencia', array('readonly','class' => 'form-control', 'label' => 'Incidencia', 'value' => $tickets['Incidencia']['ParentIncidencia']['tipo'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('tipo', array('readonly','class' => 'form-control', 'label' => 'Tipo', 'value' =>  $tickets['Incidencia']['tipo'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('prioridad', array('readonly','class' => 'form-control', 'label' => 'Prioridad', 'value' => $tickets['Prioridade']['nombre'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="cruce">Cruce</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 input-group">
                        <input name="data[cruce]" class="form-control" value="<?php echo $tickets['Cruce']['nombre']; ?>" type="text" id="cruce" aria-label="Recipient's username" aria-describedby="infoCruce" readonly="">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="infoCruce" data-toggle="modal" data-target="#infoCruceModal">Información de Cruce</button>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8"><?php echo $this->Form->input('reportador', array('readonly','type' => 'text', 'class' => 'form-control', 'label' => 'Quien reporta?', 'value' => $tickets['Reportadore']['nombre'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('equipo', array('readonly','type' => 'text','class' => 'form-control','label' => 'Se asigna a :', 'value' => $tickets['Equipo']['nombre'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('descripcion', array('readonly','type' => 'textarea', 'rows' => 3,'class' => 'form-control', 'label' => 'Detalle de incidencia', 'value' => $tickets['Ticket']['descripcion'])); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Seguimiento</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('TicketSeguimiento'); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->input('Ticket.id', array('type' => 'hidden','value' => $tickets['Ticket']['id'])); ?>
                        <?php echo $this->Form->input('ticket_id', array('type' => 'hidden','value' => $tickets['Ticket']['id'])); ?>
                        <?php echo $this->Form->input('equipo_id', array('class' => 'form-control','empty' => '--Seleccione--', 'required')); ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="input select">
                            <label for="TicketSeguimientoResponsableId">Responsable</label>
                            <select name="data[TicketSeguimiento][responsable_id]" class="form-control" id="TicketSeguimientoResponsableId" required="required">
                                <option value='' selected="selected">--Seleccione--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4"><?php echo $this->Form->input('estado_id', array('class' => 'form-control','empty' => '--Seleccione--', 'required')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Form->input('usuario_registra', array('type' => 'hidden', 'value' => $this->Session->read('Auth.User')['id']));?>
                        <?php echo $this->Form->input('reporte', array('class' => 'form-control', 'type' => 'textarea', 'rows' => 3, 'required')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4"><br><button id="back" class="btn btn-primary shadow">Volver</button> <button type="submit" class="btn btn-warning">Grabar Seguimiento</button></div>
                </div>
                <?php $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="infoCruceModal" tabindex="-1" role="dialog" aria-labelledby="infoCruceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Información de Cruce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4"><?php echo $this->Form->input('cruceCodigo', array('class' => 'form-control', 'label' => 'Código', 'value' => $tickets['Cruce']['codigo'])); ?></div>
                    <div class="col-md-8"><?php echo $this->Form->input('cruceNombre', array('class' => 'form-control', 'label' => 'Cruce', 'value' => $tickets['Cruce']['nombre'])); ?></div>
                </div>
                <hr>
                <h5>Periféricos</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Periferico</th>
                                <th>Marca - Modelo</th>
                                <th>IP</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tickets['Cruce']['Periferico'] as $p): ?>
                            <tr>
                                <td><?= $p['tipo_periferico'] ?></td>
                                <td><?= $p['fabricante'].' - '.'modelo' ?></td>
                                <td><?= $p['ip'] ?></td>
                                <td><?= $p['estado'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('incidencias/ticketseguimientos-add')); ?>