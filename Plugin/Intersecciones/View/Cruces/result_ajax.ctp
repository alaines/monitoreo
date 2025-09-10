<?php echo $this->Form->create('Cruce', array('url' => 'resultXls')) ?>
<input type="hidden" name="data" value='<?= serialize($cruces); ?>'></input>
<button type="submit" class="btn btn-success shadow">Generar <i class="far fa-file-excel"></i></button>
<?php echo $this->Form->end(); ?><br><br>
<?php $i = 1; ?>
<table class="table table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th>Código</th>
            <th>Intersección</th>
            <th>Distrito</th>
            <th>Proyecto</th>
            <th>Cod. Proyecto</th>
            <th>Administrado por</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cruces as $cruce): ?>
        <tr>
            <td class="text-center"><?= $i++;?></td>
            <td><?php echo h($cruce['Cruce']['codigo']); ?>&nbsp;</td>
            <td><?php echo h($cruce['Cruce']['nombre']); ?>&nbsp;</td>
            <td><?php echo h($cruce['Ubigeo']['distrito']); ?>&nbsp;</td>
            <td><?php echo h($cruce['Proyecto']['nombre']); ?>&nbsp;</td>
            <td><?php echo h($cruce['Cruce']['codigo_anterior']); ?>&nbsp;</td>
            <td><?php echo h($cruce['Administradore']['nombre']); ?>&nbsp;</td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    var cruces = <?php echo json_encode($cruces); ?>;
</script>

<?php //debug($cruces); ?>