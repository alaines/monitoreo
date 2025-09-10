    <div class="row">
        <div class="col-lg-1 text-center numerado-sm">
            <?= $num + 1; ?>
            <?php $i = $num ?>
            <input type="hidden" name="data[Semaforo][<?= $i; ?>][cruce_id]" value="<?= $cruce_id ?>" id="Semaforo<?= $i; ?>CruceId">        
        </div>
        <div class="col-lg-3">
            <div class="input select">
                <select name="data[Semaforo][<?= $i; ?>][tipo]" class="form-control" id="Semaforo<?= $i; ?>Tipo">
                <option value="">--SELECCIONE TIPO--</option>
                <option value="PEA">PEATONAL</option>
                <option value="VEH">VEHICULAR</option>
                <option value="CIC">CICLISTA</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="input select">
                <select name="data[Semaforo][<?= $i; ?>][posicion]" class="form-control" id="Semaforo<?= $i; ?>Posicion">
                <option value="">--SELECCIONE POSICION--</option>
                <option value="PED">PEDESTAL</option>
                <option value="ADO">ADOSADO</option>
                <option value="AER">AEREO</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="input select">
                <select name="data[Semaforo][<?= $i; ?>][luces]" class="form-control" id="Semaforo<?= $i; ?>Luces">
                <option value="">--SELECCIONE LUCES--</option>
                <option value="1C-1L">1C-1L</option>
                <option value="1C-2L">1C-2L</option>
                <option value="1C-3L">1C-3L</option>
                <option value="1C-4L">1C-4L</option>
                <option value="1C-5L">1C-5L</option>
                </select>
            </div>
        </div>
        <div class="col-lg-1"><div class="input number"><input name="data[Semaforo][<?= $i; ?>][cantidad]" class="form-control" type="number" id="Semaforo<?= $i; ?>Cantidad"></div></div>
    </div>
	