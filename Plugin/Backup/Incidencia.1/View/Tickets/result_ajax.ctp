<?php echo $this->Form->create('Tickets', array('url' => 'resultXls')) ?>
<input type="hidden" name="data" value='<?php echo serialize($tickets) ?>'></input>
<button type="submit" class="btn btn-success shadow">Generar <i class="far fa-file-excel"></i></button>
<?php echo $this->Form->end(); ?><br><br>
<?php $i = 1; ?>
<table class="table table-hover table-bordered">
    <thead class="thead-light">
        <tr>
            <th class="text-center">#</th>
            <th>Fecha y Hora</th>
            <th>Incidencia</th>
            <!--<th>Tipo</th>-->
            <th>Cruce</th>
            <th>Asignado a</th>
            <th>Estado</th>
            <th class="text-center">Detalle</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tickets as $ticket): ?>
        <tr>
            <td class="text-center"><?php echo $i++; ?></td>
            <td><?php echo $ticket['Ticket']['created']; ?></td>
            <!--<td><?php //echo $ticket['Incidencia']['ParentIncidencia']['tipo']; ?></td>-->
            <td><?php echo $ticket['Incidencia']['tipo']; ?></td>
            <td><?php echo $ticket['Cruce']['codigo'] . " - " . $ticket['Cruce']['nombre']; ?></td>
            <td><?php echo $ticket['Equipo']['nombre']; ?></td>
            <td><?php echo $ticket['Estado']['nombre']; ?></td>
            <td class="text-center">
                <a href="<?php echo $this->webroot;?>incidencia/tickets/detalle/<?php echo $ticket['Ticket']['id'];?>" data-original-title="Editar" data-toggle="tooltip" data-placement="bottom" title="" class="edit"><i class="fa fa-edit"></i></a> 
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script type="text/javascript">
    var tickets = <?php echo json_encode($tickets); ?>;
</script>

<?php //debug($tickets); ?>