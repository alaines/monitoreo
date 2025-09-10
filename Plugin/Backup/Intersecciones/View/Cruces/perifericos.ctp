<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Perifericos : Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 text-center"><strong>Cruce: <?= $cruce['Cruce']['nombre']; ?></strong></div>
                    <div class="col-lg-4 text-center"><strong>Administrado por: <?= $cruce['Administradore']['nombre']; ?></strong></div>
                    <div class="col-lg-4 text-center"><strong>RED: <?= $cruce['Proyecto']['nombre']; ?></strong></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <a href="<?php echo $this->webroot; ?>intersecciones/perifericos/add/<?= $cruce['Cruce']['id']; ?>" class="btn btn-primary shadow"> Agregar Periferico</a>
                    </div> 
                </div>
                <?php if (!empty($cruce['Periferico'])): ?>
                <div class="table-responsive">
                    <br>
                    <table class="table table-bordered table-hover" id="crucesIndex" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php echo __('Tipo Periferico'); ?></th>
                                <th><?php echo __('Fabricante'); ?></th>
                                <th><?php echo __('Modelo'); ?></th>
                                <th><?php echo __('IP'); ?></th>
                                <th><?php echo __('En Garantia'); ?></th>
                                <th><?php echo __('Estado'); ?></th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cruce['Periferico'] as $periferico): ?>
                            <tr>
                                <td><?= $tipo_perifericos[$periferico['tipo_periferico']]; ?></td>
                                <td><?php echo $periferico['fabricante']; ?></td>
                                <td><?php echo $periferico['modelo']; ?></td>
                                <td><?php echo $periferico['ip']; ?></td>
                                <td><?php echo $periferico['en_garantia']; ?></td>
                                <td><?php echo $periferico['estado']; ?></td>
                                <td class="text-center">
                                    <a href="<?php echo $this->webroot;?>intersecciones/perifericos/edit/<?= $periferico['id'];?>/<?= $cruce['Cruce']['id'];?>" data-original-title="Editar Periferico" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo $this->webroot;?>intersecciones/perifericos/view/<?= $periferico['id'];?>" data-original-title="Ver Cruce" data-toggle="tooltip" data-placement="bottom" class="edit"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="<?php echo $this->webroot; ?>intersecciones/cruces/" class="btn btn-primary shadow"> Volver a Cruces</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('intersecciones/cruces-index')); ?>