<h3 class="blue-grey-text">Disciplinas</h3><br>
<form method="post">
    <div class="input-field col s12 m6 l6 xl6">
        <i class="material-icons prefix">book</i>
        <input id="disciplina" name="disciplina" type="text" class="validate">
        <label for="disciplina">Cadastre Nova Disciplina</label>
    </div>
    <div class="input-field col s12 m6 l6 xl6">
        <select name="curso">
            <?php
                foreach ($curso as $c){
                    echo "
                        <option value='{$c->id_curso}'>{$c->descritivo_curso}</option>      
                    ";
                }
            ?>
        </select>
        <label>Curso</label>
    </div>
    <div class="col s12">
        <input class="btn col s12 m12 l12 xl12" id="btn" type="submit" value="Cadastrar"><br><br><br><br>
    </div>
</form>
<h6 class="blue-grey-text">Disciplinas Cadastradas por Cursos</h6><br>
<ul class="collapsible">
    <?php
        $b = BASE_URL;
        foreach ($disciplina as $d){
            if ($t != $d->id_curso){
                echo "
                    <li>
                        <div class='collapsible-header'>
                            <i class='material-icons'>book</i>{$d->descritivo_curso}
                        </div>
                        <div class='collapsible-body'>
                            <span>{$d->descritivo_disciplina}</span>
                ";
                if ($d->id_status == 0){
                    echo "<a href='{$b}/new/status_disciplina/{$d->id_disciplinas}/1' class='btn red darken-3 right'>Desativar</a>";
                }else{
                    echo "<a href='{$b}/new/status_disciplina/{$d->id_disciplinas}/0' class='btn blue-grey darken-3 right'>Ativar</a>";
                }

                echo "
                        <a href='{$b}/new/editar_disciplina/{$d->id_disciplinas}/{$d->descritivo_disciplina}' class='btn blue-grey darken-3 right' id='btn'>Editar</a>
                    </div>
                ";
                $t = $d->id_curso;
            }else{
                echo "
                    <div class='collapsible-body'>
                        <span>{$d->descritivo_disciplina}</span>                            
                        ";
                if ($d->id_status == 0){
                    echo "<a href='{$b}/new/status_disciplina/{$d->id_disciplinas}/1' class='btn red darken-3 right'>Desativar</a>";
                }else{
                    echo "<a href='{$b}/new/status_disciplina/{$d->id_disciplinas}/0' class='btn blue-grey darken-3 right'>Ativar</a>";
                }                echo"   <a href='{$b}/new/editar_disciplina/{$d->id_disciplinas}/{$d->descritivo_disciplina}' class='btn blue-grey darken-3 right' id='btn'>Editar</a>
                    </div>
                ";
            }
            if ($t != $d->id_curso){
                echo "
                    </li>
                ";
            }
        }
    ?>
</ul>