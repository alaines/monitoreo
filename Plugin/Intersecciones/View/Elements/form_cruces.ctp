    <div class="row">
        <div class="col-lg-3">
            <?= $this->Form->input('Cruce.id',['type'=>'hidden']); $this->Form->input('codigo',['type'=>'hidden']); ?>
            <?php echo $this->Form->input('Cruce.proyecto_id',['label'=>'Proyecto','empty'=>' --Seleccione-- ','class' => 'form-control','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('Cruce.codigo_anterior',['label'=>'Codigo en Proyecto','class' => 'form-control','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('Cruce.administradore_id',['label'=>'Administrado por','empty'=>' --Seleccione-- ','class' => 'form-control','readonly']); ?>
        </div>                    
        <div class="col-lg-3">
            <?= $this->Form->input('Cruce.ubigeo_id',['label'=>'Distrito','empty'=>' --Seleccione-- ','class' => 'form-control','readonly']); ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <label for="via1Busca">Via Principal / Eje</label>
            <input type="text" class="form-control" id="via1Busca" name='data[Eje][txt1]' placeholder="Ingrese Via 1" readonly="readonly" value="<?php echo $vias[0]['Eje']['nombre_via']; ?>">
            <input type="hidden" id="CruceVia1" name='data[Cruce][via1]' value="<?php echo $this->data['Cruce']['via1']; ?>">
        </div>
        <div class="col-lg-3">
            <label for="via2Busca">Via de referencia</label>
            <input type="text" class="form-control" id="via2Busca" name='data[Eje][txt2]' placeholder="Ingrese Via 2" readonly value="<?php echo $vias[1]['Eje']['nombre_via']; ?>">
            <input type="hidden" id="CruceVia2" name='data[Cruce][via2]' value="<?= $this->data['Cruce']['via2']; ?>">
        </div>
        <div class="col-lg-3"><?= $this->Form->input('latitud',['class' => 'form-control','readonly']); ?></div>
        <div class="col-lg-3"><?= $this->Form->input('longitud',['class' => 'form-control','readonly']); ?></div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->Form->input('tipo_gestion',['label'=>'Tipo de Gestión','class' => 'form-control','options' => $tipo_gestion,'empty' => '--Seleccione--','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('tipo_control',['label'=>'Modo de Control','class' => 'form-control','options' => $tipo_control,'empty' => '--Seleccione--','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('tipo_operacion',['label'=>'Modo de Operación','class' => 'form-control','options' => $tipo_operacion,'empty' => '--Seleccione--','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('tipo_comunicacion',['label'=>'Tipo de Comunicación','class' => 'form-control','options' => $tipo_comunicacion,'empty' => '--Seleccione--','readonly']) ?>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-3">
            <?php echo $this->Form->input('tipo_cruce',['options' => $tipo_cruce,'empty' => '--Seleccione--','class' => 'form-control','readonly']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('ano_implementacion',['label'=>'Año de Implementación','class' => 'form-control']); ?>
        </div>
        <div class="col-lg-3">
            <?= $this->Form->input('electrico_empresa',['label'=>'Empresa Eléctrica','empty'=>'--Seleccione --','options'=> ['E'=>'ENEL','L'=>'LUZ DEL SUR'],'class' => 'form-control']); ?>
        </div>
        <div class="col-lg-3">
            <?php echo $this->Form->input('electrico_suministro',['label'=>'N° de suministro','class' => 'form-control']); ?>
        </div>
    </div>
    <br>
