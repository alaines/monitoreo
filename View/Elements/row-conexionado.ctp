    <div class="row">
        <div class="col-lg-1 text-center numerado-cx">
            <?= $num +1 ; ?>
            <?php $i = $num ?>
            <input type="hidden" name="data[Conexionado][<?= $i; ?>][cruce_id]" id="Conexionado<?= $i; ?>CruceId" value="<?= $cruce_id ?>">
        </div>
        <div class="col-lg-2">
            <select name="data[Conexionado][<?= $i; ?>][elemento]" class="form-control" id="Conexionado<?= $i; ?>Elemento">
                <option value="">--SELECCIONE ELEMENTO--</option>
                <option value="CAJ">CAJA DE PASO</option>
                <option value="POZ">POZO A TIERRA</option>
                <option value="SUM">SUMINISTRO</option>
            </select>
        </div>
        <div class="col-lg-2">
            <select name="data[Conexionado][<?= $i; ?>][tipo]" class="form-control" id="Conexionado<?= $i; ?>Tipo">
                <option value="">--SELECCIONE TIPO--</option>
                <option value="C1">C1</option>
                <option value="C2">C2</option>
                <option value="C3">C3</option>
                <option value="HOR">HORIZONTAL</option>
                <option value="VER">VERTICAL</option>
                <option value="ADO">ADOSADO</option>
                <option value="MUR">MURETE</option>
            </select>
        </div>
        <div class="col-lg-1"><input name="data[Conexionado][<?= $i; ?>][cantidad]" class="form-control" type="number" id="Conexionado<?= $i; ?>Cantidad"></div>        
        <div class="col-lg-1"><input name="data[Conexionado][<?= $i; ?>][tapa]" class="form-control" type="number" id="Conexionado<?= $i; ?>Tapa"></div>
        <div class="col-lg-2">
            <select name="data[Conexionado][<?= $i; ?>][estado]" class="form-control" id="Conexionado<?= $i; ?>Estado">
                <option value="">--SELECCIONE ESTADO--</option>
                <option value="B">BUEN0</option>
                <option value="R">REGULAR</option>
                <option value="M">MALO</option>
            </select>
        </div>

        <div class="col-lg-3"><input name="data[Conexionado][<?= $i; ?>][observacion]" class="form-control" type="text" id="Conexionado<?= $i; ?>Observacion"></div>
    </div>
	