<?php 

    //incluir funções
    include_once 'functions.php';

    //receber número da página
    $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT); //filtrar valor e colocar em var
    $pagina = !empty($pagina_atual)?$pagina_atual:1; //se tiver vazio a url, então a página vai ser 1 senão vai ser o valor
    
    //quantidade de ítens por página
    $qtd_item_pagina = 5;

    //calcular inicio da visualização
    $inicio = ($qtd_item_pagina * $pagina) - $qtd_item_pagina;

    //somar qtd usuários
    $resultado_paginacao = somarQtd($conn);
    $linha_pg = mysqli_fetch_assoc($resultado_paginacao);
    //echo "<script>alert('".$linha_pg['qtd_usuarios']."')</script>";

    //quantidade de páginas
    $quantidade_pg = ceil($linha_pg['qtd_usuarios']/$qtd_item_pagina);
    //echo "<script>alert('".$quantidade_pg."')</script>";

    //quantidade máxima de links
    $max_links = 2;


?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD - Listar Usuário</title>
    </head>
    <body>

        <!--MENSAGEM-->
        <?php 
            if(isset($_SESSION['mensagem']) and !empty($_SESSION['mensagem'])){
                echo "<script>alert('".$_SESSION['mensagem']."')</script>";
                unset($_SESSION['mensagem']);
            }
        ?>
        <h1>Listar Usuário</h1>
        
        <!--TABELA PARA LISTAR USUÁRIOS-->
        <table border="1">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th colspan="3">E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $consulta_usuario = read($conn, $inicio, $qtd_item_pagina);//carregar consulta
                if(mysqli_num_rows($consulta_usuario)>0): //se houver registro na tabela
                    while($row = mysqli_fetch_assoc($consulta_usuario)): //cada linha da tabela vai pra var $row
                ?>
                        <tr>
                            <td><?php echo $row['nome']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><a href="editar.php?id_usuario=<?php echo $row['id'];?>">Editar</a></td>
                            <td><a href="excluir.php?id_usuario=<?php echo $row['id'];?>">Excluir</a></td>
                        </tr>
                <?php 
                    endwhile;
                endif;    
                ?>
            </tbody>
        </table>

        <br>

        <!--PAGINAÇÃO-->
        <a href="index.php?pagina=1">Primeira</a> <!--PRIMEIRA-->
        <!--PÁGINAS ANTERIORES-->
        <?php 
            for($pagina_anterior = $pagina - $max_links; $pagina_anterior <= $pagina - 1; $pagina_anterior++){
                if($pagina_anterior >= 1){
                    echo "<a href='index.php?pagina=$pagina_anterior'>$pagina_anterior</a>";
                }
            }
        ?>
        <!--PÁGINA ATUAL-->
        <a href="index.php?pagina=<?php echo $pagina;?>"><?php echo $pagina;?></a>
        
        <!--PÁGINAS POSTERIORES-->
        <?php 
            for($pagina_posterior = $pagina + 1; $pagina_posterior <= $pagina + $max_links; $pagina_posterior++){
                if($pagina_posterior <= $quantidade_pg){
                    echo "<a href='index.php?pagina=$pagina_posterior'>$pagina_posterior</a>";
                }
            }
        ?>
        <a href="index.php?pagina=<?php echo $quantidade_pg; ?>">Última</a> <!--ÚLTIMA-->

        <br>
        <br>
        <br>
        <button onclick="window.location.href='cadastrar.php'">Novo usuário</button>

    </body>
</html>