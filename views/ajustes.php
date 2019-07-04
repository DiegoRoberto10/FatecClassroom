<h3 class='blue-grey-text'>Ajustes</h3>
<form method='post'>
    <div class='input-field col s12 m6 l6 xl6'>
        <i class='material-icons prefix'>person</i>
        <input id='nome' name='nome' type='text' class='validate' value='<?php echo $_SESSION['nome'] ?>' required>
        <label for='nome'>Nome</label>
    </div>
    <div class='input-field col s12 m6 l6 xl6'>
        <i class='material-icons prefix'>email</i>
        <input id='email' name='email' type='email' class='validate' value='<?php echo $_SESSION['email'] ?>'>
        <label for='email'>Email</label>
    </div>
    <div class='input-field col s12 m6 l6 xl6'>
        <i class='material-icons prefix'>vpn_key</i>
        <input id='senha1' name='senha1' type='password' class='validate' required>
        <label for='senha1'>Nova Senha</label>
    </div>
    <div class='input-field col s12 m6 l6 xl6'>
        <i class='material-icons prefix'>vpn_key</i>
        <input id='senha2' name='senha2' type='password' class='validate' required>
        <label for='senha2'>Repetir Nova Senha</label>
    </div>
    <div class='col s12'>
        <input class='btn blue-grey darken-3 col s12' type='submit' value='Confirmar Mudanças' required><br><br><br><br>
    </div>
</form>
