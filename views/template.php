<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Fatec Classroom</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/assets/css/materialize.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    </head>
    <body>
        <div class="row">
                <?php
                    if (isset($_SESSION['id_professor'])){
                        echo "
                            <div class='col s12 offset-m2 m8 offset-l2 l8 offset-xl2 xl8 z-depth-4' id='box'>
                        ";
                        require_once 'menu.php';
                    }else{
                        echo "
                            <div class='col s12 offset-m3 m6 offset-l3 l6 offset-xl4 xl4 z-depth-4' id='box'>
                        ";
                    }
                    $this->loadViewInTemplate($viewName, $viewData);
                ?>
                <footer>
                    <br><br>
                    <p class="center-align blue-grey-text" id="footer">&copy; 2018 Fatec Classroom, FATEC JAHU.</p>
                </footer>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL ?>/assets/js/materialize.min.js"></script>
        <script>
            function confirmExit(){
                return confirm('Deseja realmente SAIR?');
            }
            function confirmStatus(){
                return confirm('Deseja realmente ALTERAR esse STATUS?');
            }
            function confirmDeleteReserva(){
                return confirm('Deseja realmente EXCLUIR essa RESERVA?');
            }
            $(document).ready(function(){
                $('select').formSelect();
                $('.tooltipped').tooltip();
                $('.collapsible').collapsible();
                $('.fixed-action-btn').floatingActionButton({
                    direction: 'top',
                    hoverEnabled: false
                });
                $('.datepicker').datepicker({
                    format: 'dd/mm/yyyy',
                    i18n: {
                        months: [
                            'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
                        ],
                        monthsShort: [
                            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
                        ],
                        weekdays: [
                            'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'
                        ],
                        weekdaysShort: [
                            'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'
                        ],
                        weekdaysAbbrev:	['D','S','T','Q','Q','S','S']
                    }
                });
            });

            function chamar(id, date) {
                $.ajax({
                    url : "<?php echo BASE_URL ?>/new/h",
                    type : 'post',
                    data : {
                        data_reserva : date,
                        id_sala: id
                    },
                    success: function (resp) {
                        const cb = $('form input:checkbox');
                        resp.forEach(function (elem) {
                            for(var i = 0;i < cb.length; i++){
                                if (cb[i].value === elem.id_horario){
                                    cb[i].checked = true;
                                    cb[i].disabled = true;
                                    break;
                                }
                            }
                        });
                    }
                });

                $.ajax({
                    url : "<?php echo BASE_URL ?>/new/r",
                    type : 'post',
                    data : {
                        id_sala: id
                    },
                    success: function (resp) {
                        const dv = document.getElementById('recursos');
                        dv.innerHTML = `<p><b>Recursos:</b> ${resp[0].descritivo_recurso}</p>`;
                    }
                });
            }
            function horario() {

                alert(new Date().getTime());

            }
        </script>
    </body>
</html>

