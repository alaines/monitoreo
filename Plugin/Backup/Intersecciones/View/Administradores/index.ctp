<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Administradores : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>intersecciones/administradores/add" class="btn btn-primary shadow"> Nuevo </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="administradoresIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Entidad</th>
                                <th>Responsable</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($administradores as $administradore): ?>
                            <tr>
                                <td><?php echo h($administradore['Administradore']['id']); ?>&nbsp;</td>
                                <td><?php echo h($administradore['Administradore']['nombre']); ?>&nbsp;</td>
                                <td><?php echo h($administradore['Administradore']['responsable']); ?>&nbsp;</td>
                                <td><?php echo h($administradore['Administradore']['telefono']); ?>&nbsp;</td>
                                <td><?php echo h($administradore['Administradore']['email']); ?>&nbsp;</td>
                                <td><?php echo (h($administradore['Administradore']['estado']) == TRUE) ? 'ACTIVO' : 'INACTIVO'; ?>&nbsp;</td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>intersecciones/administradores/edit/<?php echo $administradore['Administradore']['id'];?>" data-original-title="Editar Tipo" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
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
<?php echo $this->Html->script(array('intersecciones/administradores-index')); ?>