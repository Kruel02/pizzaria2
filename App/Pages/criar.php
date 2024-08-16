<?php
require_once("./../Config/config.php");
require_once("./../Pages/Partials/Header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar pizza</title>
</head>
<body>
    <main>
            <form action="./criar_action.php" method="post">


                <div class="Form-item" >
                    <label for="">Nome da pizza</label>
                    <input type="text" name="NomePizza" id="Nome-Pizza">

                </div>
                <div class="Form-item" >
                    <label for="Valor-Pizza">Valor R$</label>
                    <input type="text" name="ValorPizza" id="Valor-Pizza">

                </div>

                <div class="Form-item" >
                    <label for="Tamanho-Pizza">Tamanho </label>
                    <input type="text" name="TamanhoPizza" id="Tamanho-Pizza">

                </div>

                <div class="Form-item" >
                    <label for="Descricao-pizza">Descrição</label>
                    <textarea type="text" name="DescricaoPizza" id="descricao-Pizza" cols="30" rows="30"></textarea>

                </div>
                <div>

                    <input type="submit" value="Submit">

                </div>



            </form>





    </main>




</body>
</html>



