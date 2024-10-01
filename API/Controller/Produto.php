<?php
    require 'utils.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/produto/ProdutoGet.php';
    require_once '../DAO/produto/ProdutoPost.php';
    require_once '../DAO/produto/ProdutoPut.php';
    require_once '../DAO/produto/ProdutoPatch.php';
    require '../DAO/produto/ProdutoDelete.php';
    require '../Model/Produto.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    
    //echo $req["REQUEST_METHOD"];
     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $usuarios = json_encode(pegar_produto($conexao));
            echo $usuarios;
             break;
         case 'POST':
             
             $u = receberDadosProduto();
             
    
             $resp = incluir_produto($conexao, $u);
             
             $in = new Resposta('', '');
                if($resp){
                   $in = criarResposta('200', 'Incluso com sucesso');
                } else {
                  $in = criarResposta('400', 'não incluso');
                }
             
             echo json_encode($in);
          
             break;
         case 'PUT':
            $dados = json_decode(file_get_contents('php://input'));
            $ID = $dados->ID;

            $u = receberDadosProduto();

            $resp = editar_produtos($conexao, $u, $ID);

            $in = new Resposta('', '');
                if($resp){
                   $in = criarResposta('204', 'Atualizado com sucesso');
                } else {
                  $in = criarResposta('400', 'Não atualizado');
                }

            echo json_encode($in);
             break;

         case 'PATCH':

            $dados = json_decode(file_get_contents('php://input'));
           
            $id = $dados->id;
            $campo = $dados->campo;
            $valor = $dados ->valor;

            $resp = editar_produto_parcialmente($conexao, $id, $campo, $valor);
            $resposta = new Resposta('','');
            if($resp){
                $in = criarResposta(204, 'Atualizado com sucesso');
            } else{
               $in = criarResposta('400', 'Não atualizado');
            }
            echo json_encode($in);
             break;
         case 'DELETE':
            $dados = json_decode(file_get_contents('php://input'));
            $id = $dados->id;
           // echo $id;
            $resp = deletar_produto($conexao, $id);
            $resposta = new Resposta('', '');
            if($resp){
                $resposta = criarResposta('204', 'Excluido com suceso');
            } else {
                $resposta = criarResposta('400', 'Não excluido');
            }
             echo json_encode($resposta);
             break;          
         default:
             # code...
             break;
     }





?>