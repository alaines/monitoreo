<?php $i = 0; ?>
<div class="row">
    <div class="col-lg-1 font-weight-bold text-center">#</div>
    <div class="col-lg-3 font-weight-bold">Elemento</div>
    <div class="col-lg-3 font-weight-bold">Tipo</div>
    <div class="col-lg-3 font-weight-bold">Cimiento</div>
    <div class="col-lg-1 font-weight-bold text-center">Cantidad</div>
</div>
<div id="estructura-inputs">
    <?php foreach ($this->request->data['Estructura'] as $e): ?>
    <div class="row">
        <div class="col-lg-1 text-center numerado-es">
            <?= $i + 1; ?>
            <?= $this->Form->input('Estructura.'.$i.'.id',['type'=>'hidden']); ?>
            <?= $this->Form->input('Estructura.'.$i.'.cruce_id',['type'=>'hidden', 'value'=>$cruce_id]); ?>
        </div>
        <div class="col-lg-3"><?= $this->Form->input('Estructura.'.$i.'.elemento',['label'=>false,'class'=>'form-control','options'=>$tipo_poste,'empty'=>'--SELECCIONE ELEMENTO--']); ?></div>
        <div class="col-lg-3"><?= $this->Form->input('Estructura.'.$i.'.tipo',['label'=>false,'class'=>'form-control','options'=>$tipo_estructura,'empty'=>'--SELECCIONE TIPO--']); ?></div>
        <div class="col-lg-3"><?= $this->Form->input('Estructura.'.$i.'.cimiento',['label'=>false,'options'=>['ENTERRADO'=>'ENTERRADO','A NIVEL'=>'A NIVEL','SOBRECIMIENTO'=>'SOBRECIMIENTO'],'empty'=>'--SELECCIONE CIMIENTO--','class'=>'form-control']); ?></div>
        <div class="col-lg-1"><?= $this->Form->input('Estructura.'.$i.'.cantidad',['label'=>false,'class'=>'form-control']); ?></div>
    </div>
    <?php $i++; ?>
    <?php endforeach; ?>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <button id="agregar-filas-es" name="agregar-filas-es" class="btn btn-info"><i class="fa fa-plus" aria-hidden="true"></i> Agregar Fila</button>
    </div>
</div>
<script type="text/javascript">
    $("#agregar-filas-es").click(function() {
        console.log('agrega estructura');
        var nes = $(".numerado-es").toArray().length;
        $("<div>").load("../rowreturn/<?= $cruce_id; ?>/es/"+nes, function() {
            $("#estructura-inputs").append($(this).html());
        });
        return false;
    })
</script>
