<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Intersecciones : Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>intersecciones/cruces/add" class="btn btn-primary shadow"> Nuevo </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="crucesIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Intersección</th>
                                <th>Distrito</th>
                                <th>Proyecto</th>
                                <th>Cod. Proyecto</th>
                                <th>Administrado por</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cruces as $cruce): ?>
                            <tr>
                                <td><?php echo h($cruce['Cruce']['codigo']); ?>&nbsp;</td>
                                <td><?php echo h($cruce['Cruce']['nombre']); ?>&nbsp;</td>
                                <td><?php echo h($cruce['Ubigeo']['distrito']); ?>&nbsp;</td>
                                <td><?php echo h($cruce['Proyecto']['nombre']); ?>&nbsp;</td>
                                <td><?php echo h($cruce['Cruce']['codigo_anterior']); ?>&nbsp;</td>
                                <td><?php echo h($cruce['Administradore']['nombre']); ?>&nbsp;</td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>intersecciones/cruces/edit/<?php echo $cruce['Cruce']['id'];?>" data-original-title="Editar Cruce" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo $this->webroot;?>intersecciones/cruces/ver/<?php echo $cruce['Cruce']['id'];?>" data-original-title="Ver Cruce" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo $this->webroot;?>intersecciones/cruces/perifericos/<?php echo $cruce['Cruce']['id'];?>" data-original-title="Ver Periféricos" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-network-wired"></i></a>
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
<?php echo $this->Html->script(array('intersecciones/cruces-index')); ?>