<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Incidencia: Administrar</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->create('Incidencia',array('url'=>'add')); ?>
                        <?php echo $this->Form->input('parent_id', array('class'=>'form-control','options'=>$p_incidencias,'empty'=>'Escoja un opcion o deje en blanco','label'=>'Padre')); ?>
                        <?php echo $this->Form->input('tipo', array('class'=>'form-control','type'=>'text','required')); ?>
                        <?php echo $this->Form->input('prioridade_id', array('class'=>'form-control','options' => $prioridades,'label' => 'Prioridades','empty'=>'Asigne una pioridad','required')); ?>
                        <?= $this->Form->input('caracteristica',['class'=>'form-control','options' => ['I'=>'INCIDENCIA','T'=>'TRABAJO']]);?>
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
                                            echo ($p['Incidencia']['parent_id'] == '') ? '&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-folder-open"></i> '.$p['Incidencia']['tipo'] : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> '.$p['Incidencia']['tipo'];
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo $this->webroot; ?>incidencia/incidencias/delete/<?php echo $p['Incidencia']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>
                                            <a href="<?php echo $this->webroot; ?>incidencia/incidencias/edit/<?php echo $p['Incidencia']['id']; ?>" ><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                
                                    <?php foreach ($incidencias as $i):?>
                                        <?php if($i['Incidencia']['parent_id'] == $p['Incidencia']['id']): ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo ($i['Incidencia']['parent_id'] == '') ? '&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-folder-open"></i> '.$i['Incidencia']['tipo'] : '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> '.$i['Incidencia']['tipo'];
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo $this->webroot; ?>incidencia/incidencias/delete/<?php echo $i['Incidencia']['id']; ?>" ><i class="fa fa-trash-alt"></i></a>
                                                <a href="<?php echo $this->webroot; ?>incidencia/incidencias/edit/<?php echo $i['Incidencia']['id']; ?>" ><i class="fa fa-edit"></i></a>
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