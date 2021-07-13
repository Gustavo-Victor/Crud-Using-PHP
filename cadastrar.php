<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - Cadastrar Usuário</title>
    </head>
    <body>
        <!--MENSAGEM-->
        <?php 
            if(isset($_SESSION['mensagem']) and !empty($_SESSION['mensagem'])){
                echo "<script>alert('".$_SESSION['mensagem']."')</script>";
                unset($_SESSION['mensagem']);
            }
        ?>
        <h1>Cadastrar Usuário</h1>
        <form action="processa.php" name="form" id="form" method="POST">
            <fieldset>
                <legend>Dados do usuário</legend>
                <label for="nome">Nome: </label> <br>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome do usuário..." maxlength="70" required="required"><br><br>
                
                <label for="email">Email: </label> <br>
                <input type="text" name="email" id="email" maxlength="70" placeholder="Digite o e-mail do usuário..." required="required"><br>

                <br>
                <input type="submit" value="Cadastrar" name="cadastrar"> <br>
            </fieldset>
        </form>

        <br>
        <button onclick="window.location.href='index.php?pagina=1'">Lista de usuários</button>
    </body>
</html>