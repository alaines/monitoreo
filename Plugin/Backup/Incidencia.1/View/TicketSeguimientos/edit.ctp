<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Detalle</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4"><?php echo $this->Form->input('incidencia', array('class' => 'form-control', 'label' => 'Incidencia', 'value' => $tickets['Ticket']['Incidencia']['ParentIncidencia']['tipo'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('tipo', array('class' => 'form-control', 'label' => 'Tipo', 'value' =>  $tickets['Ticket']['Incidencia']['tipo'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('prioridad', array('class' => 'form-control', 'label' => 'Prioridad', 'value' => $tickets['Ticket']['Prioridade']['nombre'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <label for="cruce">Cruce</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12 input-group">
                            <input name="data[cruce]" class="form-control" value="<?php echo $tickets['Ticket']['Cruce'] == null ? '-' : $tickets['Ticket']['Cruce']['nombre']; ?>" type="text" id="cruce" aria-label="Recipient's username" aria-describedby="infoCruce">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="infoCruce" data-toggle="modal" data-target="#infoCruceModal">Información de Cruce</button>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8"><?php echo $this->Form->input('reportadore', array('type' => 'text','class' => 'form-control', 'label' => 'Quien reporta?', 'value' => $tickets['Ticket']['Reportadore']['nombre'])); ?></div>
                    <div class="col-lg-4"><?php echo $this->Form->input('equipo', array('type' => 'text','class' => 'form-control','label' => 'Se asigna a :', 'value' => $tickets['Ticket']['Equipo']['nombre'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('descripcion', array('type' => 'textarea', 'rows' => 3,'class' => 'form-control', 'label' => 'Detalle de incidencia', 'value' => $tickets['Ticket']['descripcion'])); ?></div>
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
                        <?php echo $this->Form->input('Ticket.id', array('type' => 'hidden')); ?>
                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                        <?php echo $this->Form->input('ticket_id', array('type' => 'hidden','value)' => $tickets['Ticket']['id'])); ?>
                        <?php echo $this->Form->input('equipo_id', array('class' => 'form-control')); ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="input select">
                            <input type="hidden" id="idResponsable" value="<?php echo $this->request->data['Responsable']['id']; ?>">
                            <label for="TicketSeguimientoResponsableId">Responsable</label>
                            <select name="data[TicketSeguimiento][responsable_id]" class="form-control" id="TicketSeguimientoResponsableId">
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4"><?php echo $this->Form->input('estado_id', array('class' => 'form-control')); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('reporte', array('class' => 'form-control', 'type' => 'textarea', 'rows' => 3)); ?></div>
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
                <div class="col-md-2"><?php echo $this->Form->input('cruceCodigo', array('class' => 'form-control', 'label' => 'Código', 'value' => $tickets['Cruce']['codigo'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceCcontrolador', array
                        ('class' => 'form-control', 'label' => 'IP Controlador', 'value' => $tickets['Cruce']['ip_controlador'])); ?></div>
                <div class="col-md-7"><?php echo $this->Form->input('cruceNombre', array('class' => 'form-control', 'label' => 'Cruce', 'value' => $tickets['Cruce']['nombre'])); ?></div>
            </div>
            <div class="row">
                <div class="col-md-3"><?php echo $this->Form->input('cruceIpSwitch1', array('class' => 'form-control', 'label' => 'IP Switch 1', 'value' => $tickets['Cruce']['ip_switch_1'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceIpSwitch2', array('class' => 'form-control', 'label' => 'IP Switch 1', 'value' => $tickets['Cruce']['ip_switch_2'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceIpCamara', array('class' => 'form-control', 'label' => 'IP Cámara', 'value' => $tickets['Cruce']['ip_camara'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceIpTraficam', array('class' => 'form-control', 'label' => 'IP Traficam', 'value' => $tickets['Cruce']['ip_traficam'])); ?></div>
            </div>
            <div class="row">
                <div class="col-md-3"><?php echo $this->Form->input('cruceEmpElec', array('class' => 'form-control', 'label' => 'Empresa Eléctrica', 'value' => $tickets['Cruce']['empresa_electrica'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceEmpElec', array('class' => 'form-control', 'label' => 'Suministro', 'value' => $tickets['Cruce']['suministro'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceEmpElec', array('class' => 'form-control', 'label' => 'Telefonos', 'value' => $tickets['Cruce']['telefonos'])); ?></div>
                <div class="col-md-3"><?php echo $this->Form->input('cruceEmpElec', array('class' => 'form-control', 'label' => 'Empresa Eléctrica', 'value' => $tickets['Cruce']['empresa_electrica'])); ?></div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
</div>
<?php //debug($this->request->data); ?>
<?php echo $this->Html->script(array('incidencias/ticketseguimientos-edit')); ?>