<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Proyectos : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>incidencia/proyectos/add" class="btn btn-primary shadow"> Nueva </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="proyectosIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Siglas</th>
                                <th>Etapa</th>
                                <th>Empresa</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($proyectos as $proyecto): ?>
                        <tr>
                                <td><?php echo h($proyecto['Proyecto']['id']); ?>&nbsp;</td>
                                <td><?php echo h($proyecto['Proyecto']['nombre']); ?>&nbsp;</td>
                                <td><?php echo h($proyecto['Proyecto']['siglas']); ?>&nbsp;</td>
                                <td><?php echo h($proyecto['Proyecto']['etapa']); ?>&nbsp;</td>
                                <td><?php echo h($proyecto['Proyecto']['ejecutado_x_empresa']); ?>&nbsp;</td>
                                <td><?php echo (h($proyecto['Proyecto']['estado']) == TRUE) ? 'ACTIVO' : 'INACTIVO'; ?>&nbsp;</td>
                                <td class="text-center">
                                        <a href="<?php echo $this->webroot;?>incidencia/proyectos/edit/<?php echo $proyecto['Proyecto']['id'];?>" data-original-title="Editar Proyecto" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
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
<?php echo $this->Html->script(array('incidencias/proyectos-index')); ?>