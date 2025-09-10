<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Cruces : Listar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><a href="<?php echo $this->webroot; ?>incidencia/cruces/add" class="btn btn-primary shadow"> Nuevo </a></div> 
                </div>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="ticketsIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cruces as $cruce): ?>
                            <tr>
                                <td class="text-center"><?php echo ++$i; ?></td>
                                <td><?php echo $cruce['Cruce']['codigo']; ?></td>
                                <td><?php echo $cruce['Cruce']['nombre']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>incidencia/cruces/edit/<?php echo $cruce['Cruce']['id'];?>" data-original-title="Editar Cruce" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
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
