<h3 class="blue-grey-text">Reservar</h3>
<form method='post'>
    <div class='input-field col s12 m4 l4 xl4'>
        <i class='material-icons prefix'>event</i>
        <input id="data" name="data" type="text" value="" class="datepicker" onchange="horario()" required autofocus>
        <label for='data'>Data</label>
    </div>
    <div class="input-field col s12 m4 l4 xl4">
        <i class='material-icons prefix'>room</i>
        <select name="sala" onchange="chamar(this.value, $('#data').val())">
            <?php
                foreach ($sala as $s){
                    echo "<option value='{$s->id_sala}'>{$s->descritivo_sala}</option>";
                }
            ?>
        </select>
    </div>

    <div class="input-field col s12 m4 l4 xl4">
        <i class='material-icons prefix'>description</i>
        <select name="disciplina">
            <?php
                foreach ($disciplina as $d){
                    if ($t != $d->id_curso){
                        echo "
                            <optgroup label='{$d->descritivo_curso}'>
                            <option value='{$d->id_disciplinas}'>{$d->descritivo_disciplina}</option>
                        ";
                        $t = $d->id_curso;

                    }else{
                        echo "<option value='{$d->id_disciplinas}'>{$d->descritivo_disciplina}</option>";
                    }
                    if ($t != $d->id_curso){
                        echo "</optgroup>";
                    }
                }
            ?>
        </select>
    </div>
    <div id="recursos" class="center-align blue-grey-text darken-3">
    </div>
    <div class='input-field col s12 m12 l12 xl12'>
        <p>
            <?php
                foreach ($horario as $h){
                    echo "
                        <label class='col s12 m6 l4 xl3'>
                        <input type='checkbox' name='horario[]' value='{$h->id_horario}' id='horario' class='filled-in'/>
                        <span>{$h->descritivo_horario}</span>
                        </label>
                    ";
                }
            ?>
        </p>
    </div>
    <div class='col s12'>
        <input class='btn blue-grey darken-3 col s12' type='submit' name="btnReservar" value='Reservar'><br><br><br><br>
    </div>
</form>