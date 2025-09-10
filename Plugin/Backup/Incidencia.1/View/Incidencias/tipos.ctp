<?php if($opc == null):?>
<option value="">--Seleccione--</option>
<?php 
foreach ($tipos as $id => $nombre):
    echo '<option value="'.$id.'">'.$nombre.'</option>';
endforeach;
?>
<?php else: ?>
<?php 
foreach ($tipos as $id => $nombre):
    if ($id == $opc){ $select = 'selected="selected"'; } else {$select = '';}
    echo '<option value="'.$id.'"'.$select.'>'.$nombre.'</option>';
endforeach;
?>
<?php endif; ?>