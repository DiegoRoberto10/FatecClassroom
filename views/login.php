<div class="row">
    <h1 class="center-align blue-grey-text" id="h2">Fatec Classroom</h1>
    <form action="" method="post"><br><br>
        <div class="input-field col s12">
            <i class="material-icons prefix">credit_card</i>
            <input id="matricula" name="matricula" type="text" class="validate" autofocus>
            <label for="matricula">Matricula</label>
        </div>
        <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
            <input id="senha" name="senha" type="password" class="validate">
            <label for="senha">Senha</label>
        </div>
        <div class="col s12">
            <input class="btn col s12 m12 l12 xl12" id="btn" type="submit" value="Entrar"><br><br>
            <a href="<?php echo BASE_URL ?>/user/esqueceu_senha">Esqueci minha senha</a>
        </div>
    </form>
</div>