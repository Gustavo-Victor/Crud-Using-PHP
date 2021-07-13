<?php

include_once 'conexao.php';

//inserir usuário
function create($conexao, $nome, $email){
    $sql = "INSERT INTO tbl_usuario (nome, email, created) 
    VALUES ('$nome', '$email', NOW())";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function somarQtd($conexao){
    $sql = "SELECT COUNT(id) 'qtd_usuarios' FROM tbl_usuario";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//mostrar usuário
function read($conexao, $inicio, $qtd){
    $sql = "SELECT * FROM tbl_usuario LIMIT $inicio, $qtd";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//mostrar usuário pelo id
function readId($conexao, $id_usuario){
    $sql = "SELECT * FROM tbl_usuario WHERE id = '$id_usuario'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//mostrar pelo nome
function readEmail($conexao, $email){
    $sql = "SELECT * FROM tbl_usuario WHERE email = '$email'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//atualizar dados do usuário
function update($conexao, $id_usuario, $nome, $email){
    $sql = "UPDATE tbl_usuario SET 
    nome = '$nome', email = '$email', modified = NOW()
    WHERE id = '$id_usuario'";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//remover usuário
function delete($conexao, $id_usuario){
    $sql = "DELETE FROM tbl_usuario WHERE id = $id_usuario";
    $resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

//validar campos antes de inserir ou editar
function validaForm($nome, $email){
    if(empty($nome) || empty($email)){
        $_SESSION['mensagem_erro'] = "Preencha todos os campos do formulário";
        return false;
    }elseif(strlen($nome) < 5 || strlen($_POST['nome']) > 70){ //verificar nome
        $_SESSION['mensagem_erro'] = "Nome não pode ter mais que 70 ou menos que 5 caracteres";  
        return false;
    }elseif(strlen($email)<11 || strlen($email) > 70){ //verificar e-mail
        $_SESSION['mensagem_erro'] = "E-mail não pode ter mais que 70 ou menos que 11 caracteres"; 
        return false;
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['mensagem_erro'] = "Preencha um endereço de e-mail válido"; 
        return false;
    }else{
        return true;
    }
}