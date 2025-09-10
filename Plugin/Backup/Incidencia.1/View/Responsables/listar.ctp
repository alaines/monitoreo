<?php if($res == null):?>
<option value="">--Seleccione--</option>
<?php 
foreach ($responsables as $id => $nombre):
    echo '<option value="'.$id.'">'.$nombre.'</option>';
endforeach;
?>
<?php else:?>
<option value="00">--Seleccione--</option>
<?php 
echo $res;
foreach ($responsables as $id => $nombre):
    if ($id == $res){ $select = 'selected="selected"'; } else {$select = '';}
    echo '<option value="'.$id.'"'.$select.'>'.$nombre.'</option>';
endforeach;
?>
<?php endif;?>
    

