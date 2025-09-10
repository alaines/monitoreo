<?php //debug($tickets) ?>
<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencias : Listar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>incidencia/tickets/add" class="btn btn-primary shadow"> Nueva </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="ticketsIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha y Hora</th>
                                <th>Incidencia</th>
                                <th>Cruce</th>
                                <th class="text-center">Prioridad</th>
                                <th>Asignado a</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tickets as $ticket): ?>
                            <?php
                            if($ticket['Estado']['id'] == 1){
                                $stateClass = 'primary';
                            } elseif ($ticket['Estado']['id'] == 4){ 
                                $stateClass = 'success';
                            } elseif ($ticket['Estado']['id'] == 5) {
                                $stateClass = 'secondary';                         
                            } else {
                                $stateClass = 'warning';
                            }
                            ?>
                            <tr>
                                <td class="text-center"><?php echo ++$i; ?></td>
                                <td><?php echo h($ticket['Ticket']['created']); ?></td>
                                <td><?php echo $ticket['Incidencia']['tipo']; ?></td>
                                <td><?php echo $ticket['Cruce']['codigo'] . " - " . $ticket['Cruce']['nombre']; ?></td>
                                <td class="text-center"><?php echo $ticket['Prioridade']['nombre']; ?></td>
                                <td><?php echo $ticket['Equipo']['nombre']?></td>
                                <td class="text-center"><h5><span class="badge badge-<?php echo $stateClass; ?>"><?php echo $ticket['Estado']['nombre']; ?></span></h5></td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>incidencia/tickets/detalle/<?php echo $ticket['Ticket']['id'];?>" data-original-title="Detalle Incidencia" data-toggle="tooltip" data-placement="left" class="view"><i class="fa fa-clipboard-list "></i></a>  
                                    <a href="<?php echo $this->webroot;?>incidencia/tickets/edit/<?php echo $ticket['Ticket']['id'];?>" data-original-title="Editar Incidencia" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a> 
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
<?php echo $this->Html->script(array('incidencias/tickets-index')); ?>