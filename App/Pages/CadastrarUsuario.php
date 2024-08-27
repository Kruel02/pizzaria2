<?php
require __DIR__ . "/partials/header.php";
require __DIR__ . "/../config/config.php";
?>
<form action="./cadastrarusuario_action.php" method="POST" id="form">
    <div class="form-item">
        <label for="nome-usuario">Usuário:</label>
        <input type="text" name="usuario" id="nome-usuario">
    </div>
    <div class="form-item">
        <label for="cpf-usuario">CPF:</label>
        <input type="text" name="cpf" id="cpf-usuario">
    </div>
    <div class="form-item">
        <label for="login-usuario">Login:</label>
        <input type="text" name="login" id="login-usuario">
    </div>
    <div class="form-item">
        <label for="senha-usuario">Senha:</label>
        <input type="password" name="pwd" id="senha-usuario">
    </div>    
    <div>
        <input type="submit" name="btn-action" value="Cadastrar" class="btn btn--verde">        
    </div>
</form>
<?php
require __DIR__ . "/partials/footer.php";
require __DIR__ . "/partials/modal.php";
?>