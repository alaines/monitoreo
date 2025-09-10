<?php 
//debug();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Grupos: Menus</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('GruposMenus'); ?>
                <div class="col-lg-6 ">
                    <h4><strong> Opciones de Menu para <?php echo $grupo['Grupo']['nombre']?> </strong></h4>
                    <br>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Menú</th>
                                <th class="text-center"> Activo / Inactivo </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0;?>
                        <?php foreach ($menus as $val): ?>
                            <?php if (!empty($val['children'])): ?>    
                            <tr>  
                                <td> 
                                    <i class="fa fa-folder-open"></i> <?php echo $val['Menu']['name']; ?> 
                                </td>
                                <td class="text-center">
                                    <input type="hidden" name="data[<?php echo $i; ?>][grupo_id]" value="<?php echo $grupo['Grupo']['id']; ?>">
                                    <input type="checkbox" name="data[<?php echo $i; ?>][menu_id]" value="<?php echo $val['Menu']['id'];?>"  <?php foreach ($lista as $ide => $num){ if($ide == $val['Menu']['id']) { echo 'checked="checked"';} }?>>
                                    <?php foreach($lista as $ide => $num){ 
                                        if($ide == $val['Menu']['id']){ ?>
                                        <input type="hidden" name="data[<?php echo $i; ?>][id]" value="<?php echo $num; ?>">
                                    <?php }
                                    }; ?>
                                </td>
                            </tr>
                            <?php foreach ($val['children'] as $m ):?>
                            <?php ++$i; ?>
                            <tr>
                                <td> 
                                    &nbsp;&nbsp;<i class="far fa-folder-open"></i> <?php echo $m['Menu']['name']; ?>
                                </td>
                                <td class="text-center">
                                    <input type="hidden" name="data[<?php echo $i;?>][grupo_id]" value="<?php echo $grupo['Grupo']['id']; ?>">
                                    <input type="checkbox" name="data[<?php echo $i;?>][menu_id]" value="<?php echo $m['Menu']['id'];?>" <?php foreach ($lista as $ide => $num){ if($ide == $m['Menu']['id']) { echo 'checked="checked"';} }?>>
                                    <?php foreach ($lista as $ide => $num){ 
                                        if($ide == $m['Menu']['id']) { ?>
                                            <input type="hidden" name="data[<?php echo $i; ?>][id]" value="<?php echo $num; ?>">
                                    <?php } 
                                    }; ?>
                                </td>
                            </tr>
                            <?php if (!empty($m['children'])): ?>
                            <?php foreach ($m['children'] as $c ):?>
                            <?php ++$i; ?>
                            <tr>
                                <td> 
                                    &nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-list-alt"></i> <?php echo $c['Menu']['name']; ?>
                                </td>
                                <td class="text-center">
                                    <input type="hidden" name="data[<?php echo $i;?>][grupo_id]" value="<?php echo $grupo['Grupo']['id']; ?>">
                                    <input type="checkbox" name="data[<?php echo $i;?>][menu_id]" value="<?php echo $c['Menu']['id'];?>" <?php foreach ($lista as $ide => $num){ if($ide == $c['Menu']['id']) { echo 'checked="checked"';} }?>>
                                    <?php foreach ($lista as $ide => $num){ if($ide == $c['Menu']['id']) { ?>
                                        <input type="hidden" name="data[<?php echo $i; ?>][id]" value="<?php echo $num; ?>">
                                    <?php } 
                                    }; ?>
                                </td>
                            </tr>        
                            <?php endforeach;?>
                            <?php ++$i; ?>
                            <?php endif;?>
                            <?php endforeach;?>
                            <?php else: ?>
                                        <tr>
                                            <td><?php echo $val['Menu']['name'] ?> </td>
                                            <td class="text-center"></td>
                                        </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary"> Grabar </button> 
                    <button id="back" class="btn btn-warning shadow">Volver</button>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>