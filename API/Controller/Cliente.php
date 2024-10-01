<?php
    require 'utils.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/cliente/ClienteGet.php';
    require_once '../DAO/cliente/ClientePost.php';
    require_once '../DAO/cliente/ClientePut.php';
    require_once '../DAO/cliente/ClientePatch.php';
    require '../DAO/cliente/ClienteDelete.php';
    require '../Model/Cliente.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    
    //echo $req["REQUEST_METHOD"];
     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $usuarios = json_encode(pegar_cliente($conexao));
            echo $usuarios;
             break;
         case 'POST':
             
             $u = receberDados();
             
    
             $resp = incluir_cliente($conexao, $u);
             
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

            $u = receberDados();

            $resp = editar_clientes($conexao, $u, $ID);

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

            $resp = editar_cliente_parcialmente($conexao, $id, $campo, $valor);
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
            $resp = deletar_cliente($conexao, $id);
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