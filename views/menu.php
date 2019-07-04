<nav>
    <div class="nav-wrapper blue-grey darken-3 col s12">
        <ul class="right">
            <?php
                $b = BASE_URL;
                if ($_SESSION['id_permissao'] == 2){
                    echo "
                        <li><a href='{$b}/home' class='tooltipped' data-position='bottom' data-tooltip='Home'><i class='material-icons'>home</i></a></li>
                        <li><a href='{$b}/home/professores' class='tooltipped' data-position='bottom' data-tooltip='Professores'><i class='material-icons'>people</i></a></li>
                        <li><a href='{$b}/user/ajustes' class='tooltipped' data-position='bottom' data-tooltip='Ajustes'><i class='material-icons'>settings</i></a></li>
                        <li><a href='{$b}/user/logout' class='tooltipped' data-position='bottom' data-tooltip='Sair' onclick='return confirmExit()'><i class='material-icons'>power_settings_new</i></a></li>
                    ";
                }else{
                    echo "
                        <li><a href='{$b}/home' class='tooltipped' data-position='bottom' data-tooltip='Home'><i class='material-icons'>home</i></a></li>
                        <li><a href='{$b}/user/ajustes' class='tooltipped' data-position='bottom' data-tooltip='Ajustes'><i class='material-icons'>settings</i></a></li>
                        <li><a href='{$b}/user/logout' class='tooltipped' data-position='bottom' data-tooltip='Sair' onclick='return confirmExit()'><i class='material-icons'>power_settings_new</i></a></li>
                    ";
                }
            ?>
        </ul>
    </div>
</nav>
<div class='fixed-action-btn'>
    <a class='btn-floating btn-large red'>
        <i class='large material-icons'>add</i>
    </a>
    <ul>
        <?php
        if ($_SESSION['id_permissao'] == 2){
            echo "
                <li><a href='{$b}/new/novo_curso' class='btn-floating red tooltipped' data-position='left' data-tooltip='+Cursos'><i class='material-icons'>book</i></a></li>
                <li><a href='{$b}/new/nova_disciplina' class='btn-floating red tooltipped' data-position='left' data-tooltip='+Disciplinas'><i class='material-icons'>description</i></a></li>
                <li><a href='{$b}/new/novo_professor' class='btn-floating red tooltipped' data-position='left' data-tooltip='+Professores'><i class='material-icons'>school</i></a></li>
                <li><a href='{$b}/new' class='btn-floating red tooltipped' data-position='left' data-tooltip='+Reserva'><i class='material-icons'>business_center</i></a></li>
            ";
        }else{
            echo "
                <li><a href='{$b}/new' class='btn-floating red tooltipped' data-position='left' data-tooltip='+Reserva'><i class='material-icons'>business_center</i></a></li>
            ";
        }
        ?>
    </ul>
</div>
