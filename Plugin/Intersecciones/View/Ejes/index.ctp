<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Ejes : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>intersecciones/ejes/add" class="btn btn-primary shadow"> Nuevo </a></div>
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="areasIndex" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de via</th>
                            <th>Ciclovia?</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($ejes as $eje): ?>
                            <tr>
                                <td><?php echo h($eje['Eje']['id']); ?>&nbsp;</td>
                                <td><?php echo h($eje['Eje']['nombre_via']); ?>&nbsp;</td>
                                <td><?php echo (h($eje['Eje']['ciclovia']) == TRUE) ? 'SI' : 'NO'; ?>&nbsp;</td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>intersecciones/ejes/edit/<?php echo $eje['Eje']['id'];?>" data-original-title="Editar Eje" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
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
<?php echo $this->Html->script(array('intersecciones/ejes-index')); ?>