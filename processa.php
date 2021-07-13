<?php 

include_once 'functions.php';

//verificar se usuário clicou no botão
if(isset($_POST['cadastrar'])){
    //limpar campos
    $nome = isset($_POST['nome'])?filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING):"";
    $email = isset($_POST['email'])?filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL):"";

    //validar email e nome para cadastrar
    if(validaForm($nome, $email)){

        //verificar se já existe um usuário com mesmo e-mail no banco
        $consultar_email = readEmail($conn, $email);
        if(mysqli_num_rows($consultar_email)>0){
            $_SESSION['mensagem'] = "Já existe um usuário com esse e-mail no banco de dados. Preencha com outro, por favor.";
        }else{
            //cadastrar
            $inserir_usuario = create($conn, $nome, $email);

            //verificar se deu certo cadastro ou não
            if(mysqli_insert_id($conn)){
                $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
                header("location: index.php?pagina=1");
                exit();
            }else{
                $_SESSION['mensagem'] = "Falha no cadastro!";            
            } 
        } 
    }
}

//redirecionar
header("Location: cadastrar.php");

//echo "Nome: $nome <br/>Email: $email<br/>";