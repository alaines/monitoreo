    <div class="row">
        <div class="col-lg-1 text-center numerado-es">
            <?= $num + 1; ?>
            <?php $i = $num ?>
            <input type="hidden" name="data[Estructura][<?= $i; ?>][cruce_id]" value="<?= $cruce_id ?>" id="Estructura<?= $i; ?>CruceId">        
        </div>
        <div class="col-lg-3">
            <div class="input select">
                <select name="data[Estructura][<?= $i; ?>][elemento]" class="form-control" id="Estructura<?= $i; ?>Elemento">
                <option value="">--SELECCIONE ELEMENTO--</option>
                <option value="49">BANDERA</option>
                <option value="54">CAMARA MONITOREO</option>
                <option value="53">CAMARA TRAFICO 4.50M</option>
                <option value="52">CAMARA TRAFICO 6.00M</option>
                <option value="46">PASTORAL 3.50M</option>
                <option value="45">PASTORAL 5.20M</option>
                <option value="50">PEDESTAL</option>
                <option value="51">PEDESTAL CONTROL</option>
                <option value="47">PORTICO</option>
                <option value="48">SEMIPORTICO</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input select">
                <select name="data[Estructura][<?= $i; ?>][tipo]" class="form-control" id="Estructura<?= $i; ?>Tipo">
                <option value="">--SELECCIONE TIPO--</option>
                <option value="21">CUADRADA</option>
                <option value="22">ORNAMENTAL</option>
                <option value="20">TUBULAR</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input select">
                <select name="data[Estructura][<?= $i; ?>][cimiento]" class="form-control" id="Estructura<?= $i; ?>Cimiento">
                <option value="">--SELECCIONE CIMIENTO--</option>
                <option value="ENTERRADO">ENTERRADO</option>
                <option value="A NIVEL">A NIVEL</option>
                <option value="SOBRECIMIENTO">SOBRECIMIENTO</option>
                </select></div>
        </div>
        <div class="col-lg-1"><div class="input number"><input name="data[Estructura][<?= $i; ?>][cantidad]" class="form-control" type="number" id="Estructura<?= $i; ?>Cantidad"></div></div>
    </div>
	