<h3 class="blue-grey-text">Professores</h3>

<table class="blue-grey-text highlight responsive-table">
    <thead>
    <tr>
        <th>Professores</th>
        <th>Status</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $b = BASE_URL;
        foreach ($professor as $p){
            echo "
                <tr>
                    <td>{$p->nome}</td>
                    <td>{$p->descritivo_status}</td>
                    <td>
            ";
            if ($p->id_status == 1){
                echo "
                    <a href='{$b}/home/trocar_status/{$p->id_professor}/2' onclick='return confirmStatus()'>
                        <input class='btn red darken-3' type='button' value='Desativar'>
                    </a>
                </td>
            </tr>
                ";
            }else{
                echo "
                    <a href='{$b}/home/trocar_status/{$p->id_professor}/1' onclick='return confirmStatus()'>
                        <input class='btn blue-grey darken-3' type='button' value='Ativar'>
                    </a>
                </td>
            </tr>
                ";
            }
        }
    ?>
    </tbody>
</table>
