<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Equipos : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>incidencia/equipos/add" class="btn btn-primary shadow"> Nueva </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="equiposIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($equipos as $equipo): ?>
                            <tr>
                                <td><?php echo h($equipo['Equipo']['id']); ?>&nbsp;</td>
                                <td><?php echo h($equipo['Equipo']['nombre']); ?>&nbsp;</td>
                                <td><?php echo (h($equipo['Equipo']['estado']) == TRUE) ? 'ACTIVO' : 'INACTIVO'; ?>&nbsp;</td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>incidencia/equipos/edit/<?php echo $equipo['Equipo']['id'];?>" data-original-title="Editar Cruce" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
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
<?php echo $this->Html->script(array('incidencias/equipos-index')); ?>