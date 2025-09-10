<?php
  $listas = $this->requestAction('estadoCivils/listar/');
?>
<?php echo $this->Form->input('Persona.estado_civil_id', array('class'=>'form-control', 'options' => $listas, 'empty' => '--Seleccione--')); ?>
