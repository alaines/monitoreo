<div class="row">
    <div class="col-lg-12">
        <div class="card shadow w-100">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Cruce : Editar</h6>
            </div>
            <div class="card-body">
                <?php echo $this->Form->create('Cruce',['type'=>'file']); ?>
                <div class="row">
                    <div class="col-lg-3">
                        <?= $this->Form->input('id',['type'=>'hidden']); $this->Form->input('codigo',['type'=>'hidden']); ?>
                        <?php echo $this->Form->input('proyecto_id',['label'=>'Proyecto','empty'=>' --Seleccione-- ','class' => 'form-control','required']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('codigo_anterior',['label'=>'Codigo en Proyecto','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('administradore_id',['label'=>'Administrado por','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                    </div>                    
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('ubigeo_id',['label'=>'Distrito','empty'=>' --Seleccione-- ','class' => 'form-control', 'required']); ?>
                        <?= $this->Form->input('ubigeo_cruce',['type' => 'hidden','value'=>$ubigeo_actual]); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <label for="via1Busca">Via Principal / Eje</label>
                        <input type="text" class="form-control" id="via1Busca" name='data[Eje][txt1]' placeholder="Ingrese Via 1" value="<?php echo $vias[0]['Eje']['nombre_via']; ?>">
                        <input type="hidden" id="CruceVia1" name='data[Cruce][via1]' value="<?php echo $this->data['Cruce']['via1']; ?>">
                    
                        <label for="via2Busca">Via de referencia</label>
                        <input type="text" class="form-control" id="via2Busca" name='data[Eje][txt2]' placeholder="Ingrese Via 2" value="<?php echo $vias[1]['Eje']['nombre_via']; ?>">
                        <input type="hidden" id="CruceVia2" name='data[Cruce][via2]' value="<?php echo $this->data['Cruce']['via2']; ?>">
                        
                        <?php echo $this->Form->input('latitud',['class' => 'form-control']); ?>

                        <?php echo $this->Form->input('longitud',['class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-6">
                        <div style="height: 100%; position: relative;" id="map_add"></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_gestion',['label'=>'Tipo de Gestión','class' => 'form-control','options' => $tipo_gestion,'empty' => '--Seleccione--']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_control',['label'=>'Modo de Control','class' => 'form-control','options' => $tipo_control,'empty' => '--Seleccione--']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_operacion',['label'=>'Modo de Operación','class' => 'form-control','options' => $tipo_operacion,'empty' => '--Seleccione--']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_comunicacion',['label'=>'Tipo de Comunicación','class' => 'form-control','options' => $tipo_comunicacion,'empty' => '--Seleccione--']) ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_cruce',['options' => $tipo_cruce,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('tipo_estructura',['label'=>'Tipo de Estructura','options' => $tipo_estructura,'empty' => '--Seleccione--','class' => 'form-control']); ?>
                    </div>
                    <div class="col-lg-3">
                        <?php echo $this->Form->input('ano_implementacion',['label'=>'Año de Implementación','class' => 'form-control']); ?>
                    </div>

                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputFile">Plano PDF</label>
                            <?php echo $this->Form->input('plano_pdf',['type'=>'hidden']); ?>
                            <input type="file" name="data[Cruce][plano_pdf_edit]" id="CrucePlanoPdf">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?php
                        if($this->data['Cruce']['plano_pdf'] != ''){
                            echo $this->Html->link(
                                $this->Html->image("pdf.png", array("alt" => "PDF")),
                                $this->webroot."files/planos/pdf/".$this->data['Cruce']['plano_pdf'],
                                array('height' => '70%','escape' => false)
                            );
                        }
                        ?>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputFile">Plano DWG</label>
                            <?php echo $this->Form->input('plano_dwg',['type'=>'hidden']); ?>
                            <input type="file" name="data[Cruce][plano_dwg_edit]" id="CrucePlanoDwg">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <?php
                        if($this->data['Cruce']['plano_dwg'] != ''){
                            echo $this->Html->link(
                                $this->Html->image("dwg.png", array("alt" => "DWG")),
                                $this->webroot."files/planos/dwg/".$this->data['Cruce']['plano_dwg'],
                                array('height' => '70%','escape' => false)
                            );
                        }
                        ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $this->Form->input('observaciones',['class' => 'form-control']); ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-check">
                            <?php echo $this->Form->input('estado', array('class' => 'form-check-input', 'checked')); ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <button id="back" class="btn btn-primary shadow"> Volver </button> 
                        <button type="submit" class="btn btn-warning shadow"> Grabar </button>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<?php echo $this->Html->script(array('intersecciones/cruces-edit')); ?>