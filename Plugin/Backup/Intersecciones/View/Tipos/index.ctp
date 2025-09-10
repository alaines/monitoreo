<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Tipos : Mantenimiento</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->create('Tipo',array('url'=>'add')); ?>
                        <?php echo $this->Form->input('parent_id', array('class'=>'form-control','options'=>$p_tipos,'empty'=>'Escoja un opcion o deje en blanco','label'=>'Categorias')); ?><br>
                        <?php echo $this->Form->input('name', array('class'=>'form-control','type'=>'text','required','label'=>'Tipos')); ?>
                        <br>
                        <div class="form-check">
                            <?php echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked')); ?>
                        </div>
                        <br><button type="submit" class="btn btn-primary"> Guardar </button>
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                        <h4><strong> Detalle de Incidencias </strong></h4>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Items</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($padres as $p): ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo $p['Tipo']['parent_id'] == '' ? '&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-folder-open"></i> '.$p['Tipo']['name'] : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> '.$p['Tipo']['name'];
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->webroot; ?>intersecciones/tipos/edit/<?php echo $p['Tipo']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                
                                    <?php foreach ($tipos as $i):?>
                                        <?php if($i['Tipo']['parent_id'] == $p['Tipo']['id']): ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo ($i['Tipo']['parent_id'] == '') ? '&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-folder-open"></i> '.$i['Tipo']['name'] : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> '.$i['Tipo']['name'];
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo $this->webroot; ?>intersecciones/tipos/edit/<?php echo $i['Tipo']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                    <?php endforeach;?>
                                
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>