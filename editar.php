<?php 
    include_once 'functions.php';
    $id_usuario;
    $consultar_id;
    $array;

    if(isset($_GET['id_usuario']) && !empty($_GET['id_usuario'])){
        $id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
        $consultar_id = readId($conn, $id_usuario);
        $array = mysqli_fetch_assoc($consultar_id);
    }else{
        $_SESSION['mensagem_erro'] = "Usuário inexistente!";
        header("Location: index.php");
    }
    
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - Editar Usuário</title>
    </head>
    <body>
        <!--MENSAGEM-->
        <?php 
            if(isset($_SESSION['mensagem']) and !empty($_SESSION['mensagem'])){
                echo "<script>alert('".$_SESSION['mensagem']."')</script>";
                unset($_SESSION['mensagem']);
            }
        ?>
        <h1>Editar Usuário</h1>
        <form action="processa_editar.php" name="form" id="form" method="POST">
            <fieldset>
                <legend>Dados do usuário</legend>
                <input type="hidden" name="id" value="<?php echo $array['id']; ?>">

                <label for="nome">Nome: </label> <br>
                <input type="text" name="nome" id="nome" value="<?php echo $array['nome']; ?>" placeholder="Digite o nome do usuário..." maxlength="70" required="required"><br><br>
                
                <label for="email">Email: </label> <br>
                <input type="text" name="email" id="email" value="<?php echo $array['email']; ?>" maxlength="70" placeholder="Digite o e-mail do usuário..." required="required"><br>

                <br>
                <input type="submit" value="Editar" name="editar"> <br>
            </fieldset>
        </form>

        <br>
        <button onclick="window.location.href='index.php?pagina=1'">Lista de usuários</button>
    </body>
</html>