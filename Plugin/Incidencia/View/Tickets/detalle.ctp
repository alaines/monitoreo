<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia : Detalle</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('id', array('readonly','class' => 'form-control', 'label' => 'Numero de Ticket', 'value' => $tickets['Ticket']['id'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('incidencia', array('readonly','class' => 'form-control', 'label' => 'Incidencia', 'value' => $tickets['Incidencia']['ParentIncidencia']['tipo'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('tipo', array('readonly','class' => 'form-control', 'label' => 'Tipo', 'value' =>  $tickets['Incidencia']['tipo'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('prioridad', array('readonly','class' => 'form-control', 'label' => 'Prioridad', 'value' => $tickets['Prioridade']['nombre'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('usuario_registra', array('readonly','class' => 'form-control', 'label' => 'Registrado por:', 'value' => $tickets['Ticket']['usuario_registra'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="cruce">Cruce</label>
                    </div>
                    <div class="col-lg-3">
                        <label for="Distrito">Distrito</label>
                    </div>
                    <div class="col-lg-3">
                        <label for="created">Fecha de creación</label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 input-group">
                            <input name="data[cruce]" class="form-control" readonly="readonly" value="<?php echo $tickets['Cruce']['nombre']; ?>" type="text" id="cruce" aria-label="Recipient's username" aria-describedby="infoCruce">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="infoCruce" data-toggle="modal" data-target="#infoCruceModal">Información de Cruce</button>
                            </div>
                    </div>
                    <div class="col-lg-3">
                        <?= $this->Form->input('Distrito', array('readonly','class' => 'form-control', 'label' => false, 'value' => $tickets['Cruce']['Ubigeo']['distrito'])); ?>
                    </div>
                    <div class="col-lg-3">
                        <?= $this->Form->input('created', ['readonly', 'class' => 'form-control','label' =>false,'value'=>$tickets['Ticket']['created']]); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3"><?php echo $this->Form->input('reportador', array('readonly','class' => 'form-control', 'label' => 'Quien reporta?', 'value' => $tickets['Reportadore']['nombre'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('reportadore_nombres', array('readonly','class' => 'form-control', 'label' => 'Nombre', 'value' => $tickets['Ticket']['reportadore_nombres'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('reportadore_dato_contacto', array('readonly','class' => 'form-control', 'label' => 'Dato contacto', 'value' => $tickets['Ticket']['reportadore_dato_contacto'])); ?></div>
                    <div class="col-lg-3"><?php echo $this->Form->input('equipo', array('readonly','class' => 'form-control','label' => 'Se asigna a :', 'value' => $tickets['Equipo']['nombre'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-12"><?php echo $this->Form->input('descripcion', array('readonly','type' => 'textarea', 'rows' => 3,'class' => 'form-control', 'label' => 'Detalle de incidencia', 'value' => $tickets['Ticket']['descripcion'])); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <br>
                        <button id="back" class="btn btn-primary shadow">Volver</button>
                        <?php if($this->Session->read('Auth.User')['Grupo']['edicion']): ?>
                        <a href="<?php echo $this->webroot.'incidencia/ticketSeguimientos/add/'.$tickets['Ticket']['id']; ?>" class="btn btn-warning">Registrar Acción</a>
                        <?php endif; ?>
                    </div>
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
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="ticketsDetalle" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Equipo</th>
                                <th>Responsable</th>
                                <th>Reporte</th>
                                <th>Hora y Fecha</th>
                                <th>Asignado por</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tickets['TicketSeguimiento'] as $seguimiento): ?>
                            <?php
                            if($seguimiento['Estado']['id'] == 1 || $seguimiento['Estado']['id'] == 4){
                                $state = 'warning';
                            } elseif ($seguimiento['Estado']['id'] == 3 || $seguimiento['Estado']['id'] == 5) {
                                $state = 'secondary';                         
                            } else {
                                $state = 'success';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?php echo ++$i; ?></td>
                                <td><?php echo $seguimiento['Equipo']['nombre']; ?></td>
                                <td><?php echo $seguimiento['Responsable']['nombre']; ?></td>
                                <td><?php echo $seguimiento['reporte']; ?></td>
                                <td><?php echo $seguimiento['created']; ?></td>
                                <td><?php echo $seguimiento['usuario_registra']; ?></td>
                                <td class="text-center"><h5><span class="badge badge-<?php echo $state; ?>"><?php echo $seguimiento['Estado']['nombre']; ?></span></h5></td>
                                <td class="text-center">
                                    <?php if($this->Session->read('Auth.User')['Grupo']['edicion']): ?>
                                    <a href="<?php echo $this->webroot;?>incidencia/ticketSeguimientos/edit/<?php echo $seguimiento['id'];?>" data-original-title="Editar" data-toggle="tooltip" data-placement="bottom" title="" class="edit"><i class="fa fa-edit"></i></a> 
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
                <?php 
                switch($tickets['Cruce']['electrico_empresa']){
                    case 'L': 
                        $empresa = 'LUZ DEL SUR';
                        break;
                    case 'E': 
                        $empresa = 'ENEL';
                        break;
                    default:
                        $empresa = '';
                }; 
                ?>
                <div class="col-md-4"><?php echo $this->Form->input('cruceCodigo', array('class' => 'form-control', 'label' => 'Código', 'value' => $tickets['Cruce']['codigo'])); ?></div>
                <div class="col-md-8"><?php echo $this->Form->input('cruceNombre', array('class' => 'form-control', 'label' => 'Cruce', 'value' => $tickets['Cruce']['nombre'])); ?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $this->Form->input('electricoEmpresa',['class' => 'form-control', 'label' => 'Empresa Eléctrica', 'value' => $empresa]); ?></div>
                <div class="col-md-6"><?= $this->Form->input('electricoSuministro',['class' => 'form-control', 'label' => 'N° Sumistro Eléctrico', 'value' => $tickets['Cruce']['electrico_suministro']]); ?></div>
            </div>
            <hr>
            <h5>Periféricos</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="ticketsDetalle">
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
<?php echo $this->Html->script(array('incidencias/tickets-detalle')); ?>