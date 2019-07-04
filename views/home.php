<h3 class="blue-grey-text">Home</h3>
<h6 class="blue-grey-text">Minhas Novas Reservas</h6><br>
<ul class="collapsible">
    <?php
        if ($reservaN) {
            foreach ($reservaN as $r) {
                if ($t != $r->id_reserva) {
                    $data = (new Reserva())->tratar_data($r->data_reserva);
                    echo "
                        <li>
                            <div class='collapsible-header'><i class='material-icons'>business_center</i>{$r->descritivo_sala}  -  {$r->descritivo_recurso}</div>
                            <div class='collapsible-body'>
                                <span>Data da Reserva: {$data}</span>
                                <a href='{$b}/new/excluir_reserva/{$r->id_reserva}' class='btn red darken-3 right' onclick='return confirmDeleteReserva()'>Excluir</a><br>
                                <span>Disciplina: {$r->descritivo_disciplina}</span><br>
                                <span>  Horarios: </span><br>
                                <span>{$r->descritivo_horario}</span><br>
                        ";
                    $t = $r->id_reserva;
                } else {
                    echo "<span>{$r->descritivo_horario}</span><br>";
                }
                if ($t != $r->id_reserva) {
                    echo "  </div>
                        </li>
                    ";
                }
            }
            $x = "";
        }else{
            $x = "<h5 class='center-align red-text darken-3'>Sem Reservas</h5>";
        }
    ?>
</ul>
    <?php
        echo $x;
    ?>
<br>
<h6 class="blue-grey-text">Minhas Reservas Antigas</h6><br>
<ul class="collapsible">
    <?php
    if ($reservaA) {
        foreach ($reservaA as $r) {
            if ($t != $r->id_reserva) {
                $data = (new Reserva())->tratar_data($r->data_reserva);
                echo "
                        <li>
                            <div class='collapsible-header'><i class='material-icons'>business_center</i>{$r->descritivo_sala}  -  {$r->descritivo_recurso}</div>
                            <div class='collapsible-body'>
                                <span>Data da Reserva: {$data}</span><br>
                                <span>Disciplina: {$r->descritivo_disciplina}</span><br>
                                <span>  Horarios: </span><br>
                                <span>{$r->descritivo_horario}</span><br>
                        ";
                $t = $r->id_reserva;
            } else {
                echo "<span>{$r->descritivo_horario}</span><br>";
            }
            if ($t != $r->id_reserva) {
                echo "  </div>
                        </li>
                    ";
            }
        }
        $x = "";
    }else{
        $x = "<h5 class='center-align red-text darken-3'>Sem Reservas</h5>";
    }
    ?>
</ul>
<?php
echo $x;
?>


