<?php
require __DIR__ . "/partials/header.php";
require __DIR__ . "/../config/config.php";



$usuario = filter_input(INPUT_POST,"usuario");
$cpf = filter_input(INPUT_POST,"cpf", FILTER_VALIDATE_INT);
$senha = filter_input(INPUT_POST,"pwd");
$login = filter_input(INPUT_POST,"login", FILTER_VALIDATE_EMAIL);

if ($usuario && $cpf && $senha && $login) 
{
$sql = $pdo->prepare("INSERT INTO usuario (IdPerfil, nome,cpf,pwd,login) Values (:idPerfil, :nome, :nome: :cpf, :pwd, :login)" );
$sql->bindValue("Idperfil",2);
$sql->bindValue("nome", $nome);
$sql->bindValue(":cpf", $cpf);
$pwdcrypt = password_hash($pwd, PASSWORD_DEFAULT);
$sql->bindValue(":pwd", $pwdcrypt);
$sql->bindValue(":login", $login);
$sql->execute();
header('Location: Login.php');
exit;
}
else {
    header('Location: Login.php');

    
}


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