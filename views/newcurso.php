<h3 class="blue-grey-text">Cursos</h3>

<form action="" method="post"><br>
    <div class="input-field col s12">
        <i class="material-icons prefix">book</i>
        <input id="curso" name="curso" type="text" value="" class="validate">
        <label for="curso">Cadastre Novo Curso</label>
    </div>
    <div class="col s12">
        <input class="btn col s12 m12 l12 xl12" id="btn" type="submit" value="Cadastrar"><br><br><br><br>
    </div>
</form>
<h6 class="blue-grey-text">Cursos</h6><br>
<table class="blue-grey-text highlight responsive-table">
    <tbody>
        <?php
            $b = BASE_URL;
            foreach ($curso as $c){
                echo "
                    <tr>
                        <td>{$c->descritivo_curso}</td>
                        <td>
                            <a href='{$b}/new/editar_curso/{$c->id_curso}/{$c->descritivo_curso}' class='btn blue-grey darken-3' id='btn'>Editar</a>
                        </td>
                    </tr>
                ";
            }
        ?>
    </tbody>
</table>

