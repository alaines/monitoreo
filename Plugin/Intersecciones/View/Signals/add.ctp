<?php //debug($listado); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Señalizacion: Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo $this->Form->create('Signal'); ?>
                            <?= $this->Form->input('parent_id',['class'=>'form-control', 'label'=>'Tipos', 'options'=>$tipos, 'empty'=>'Escoja una opción o deje en blanco']); ?>
                            <?= $this->Form->input('name', ['label' => 'Nombre','class'=>'form-control']); ?>
                            <?= $this->Form->input('code', ['label' => 'Código','class'=>'form-control']); ?><br>
                            <div class="form-inline form-group"><?= $this->Form->input('state',['label' => '&nbsp;Estado','div' => false, 'class' => 'checkbox', 'checked']); ?> </div>
                            <br>
                            <button type="submit" class="btn btn-primary"> Guardar </button>
                        <?php echo $this->Form->end();?>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <h4><strong> Listado de Señales </strong></h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Señales</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>    
                            <tbody>
                                <?php foreach($listado as $k => $l): ?>
                                <tr>
                                    <td><?= $l; ?></td>
                                    <td class="text-center"><a href="<?php echo $this->webroot; ?>intersecciones/signals/edit/<?= $k; ?>" ><i class="fa fa-edit"></i></a></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>