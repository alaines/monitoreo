<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Usuarios : Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>acceso/users/add" class="btn btn-primary shadow"> Nuevo </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="userIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Usuario</th>
                                <th>Grupo</th>
                                <th class="text-center">Area</th>
                                <th class="text-center">Estado</th>
                                <th>Creado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $usuario): ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $usuario['User']['usuario']; ?></td>
                                <td><?php echo $usuario['Grupo']['nombre']; ?></td>
                                <td class="text-center"><?php echo $usuario['Area']['codigo']; ?></td>
                                <td class="text-center"><?php echo $usuario['User']['estado'] = 1 ? 'ACTIVO': 'INACTIVO'; ?></td>
                                <td><?php echo $usuario['User']['created']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>acceso/users/view/<?php echo $usuario['User']['id'];?>" data-original-title="Detalle Usuario" data-toggle="tooltip" data-placement="left" title="Ver" class="view"><i class="fa fa-eye"></i></a> 
                                    <a href="<?php echo $this->webroot;?>acceso/users/edit/<?php echo $usuario['User']['id'];?>" data-original-title="Editar Usuario" data-toggle="tooltip" data-placement="bottom" title="Editar" class="edit"><i class="fa fa-edit"></i></a> 
                                    <a href="#" onclick="realizaProceso(<?php echo $usuario['User']['id'];?>);" data-original-title="Reinicia Password" data-toggle="tooltip" data-placement="bottom" title="Reset Password" class="reset"><i class="fa fa-sync-alt"></i></a> 
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
<?php echo $this->Html->script(array('acceso/usuarios-index')); ?>