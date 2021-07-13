<?php 

include_once 'functions.php';
$id_usuario;

if(!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])){
    $_SESSION['mensagem_erro'] = "É necessário selecionar um usuário para excluir";
}else{
    global $id_usuario; 
    $id_usuario = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);//pegar id

    $excluir_usuario = delete($conn, $id_usuario);
    
    //verificar se exclusão de usuário deu certo ou não
    if(mysqli_affected_rows($conn)){
        $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
    }else{
        $_SESSION['mensagem'] = "Falha ao excluir";
    }
}
 
//redirecionamento padrão
header("Location: index.php?pagina=1");