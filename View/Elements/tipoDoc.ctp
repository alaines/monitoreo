<?php
  $listas = $this->requestAction('tipoDocs/listar/');
?>
<?php echo $this->Form->input('Persona.tipo_doc_id', array('class'=>'form-control', 'options' => $listas, 'empty' => '--Seleccione--', 'label' => 'Tipo de Documento')); ?>