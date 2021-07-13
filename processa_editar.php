<?php 
include_once 'functions.php'; //incluir funções

$id_usuario;//var global

//verificar se usuário clicou no botão
if(isset($_POST['editar'])){
    global $id_usuario;
    //limpar campos
    $id_usuario = isset($_POST['id'])?filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT):"";
    $nome = isset($_POST['nome'])?filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING):"";
    $email = isset($_POST['email'])?filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL):"";

    if(!empty($id_usuario)){
        //validar email e nome para editar
        if(validaForm($nome, $email)){
            //editar
            $editar_usuario = update($conn, $id_usuario, $nome, $email);

            //verificar se deu certo edição
            if(mysqli_affected_rows($conn)){
                $_SESSION['mensagem'] = "Usuário editado com sucesso!";
                header("Location: index.php?pagina=1");
                exit();
            }else{
                $_SESSION['mensagem'] = "Falha na edição!";
            }     
        }
    }else{
        $_SESSION['mensagem'] = "Código inexistente";
    }
}

//redirecionamento padrão
header("Location: editar.php?id_usuario=$id_usuario");

//echo "Nome: $nome <br/>Email: $email<br/>";