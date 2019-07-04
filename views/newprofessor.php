<h3 class="blue-grey-text">Cadastrar Professor</h3><br>
<form method="post">
    <div class="input-field col s12 m6 l6 xl6">
        <i class="material-icons prefix">person</i>
        <input id="nome" name="nome" type="text" class="validate" required autofocus>
        <label for="nome">Nome</label>
    </div>
    <div class="input-field col s12 m6 l6 xl6">
        <i class="material-icons prefix">credit_card</i>
        <input id="matricula" name="matricula" type="text" class="validate" required>
        <label for="matricula">Matricula</label>
    </div>
    <div class="input-field col s12">
        <i class="material-icons prefix">email</i>
        <input id="email" name="email" type="text" class="validate" required>
        <label for="email">Email</label>
    </div>
    <div class="col s12">
        <input class="btn blue-grey darken-3 col s12" type="submit" value="Cadastrar"><br><br><br><br>
    </div>
</form>