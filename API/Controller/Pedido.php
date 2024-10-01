<?php
    require 'utils.php';
    require_once '../DAO/conexao.php';
    require_once '../DAO/pedido/PedidoGet.php';
    require_once '../DAO/pedido/PedidoPost.php';
    require_once '../DAO/pedido/PedidoPut.php';
    require_once '../DAO/pedido/PedidoPatch.php';
    require '../DAO/pedido/PedidoDelete.php';
    require '../Model/Pedido.php';
    require '../Model/Resposta.php';

    $req = $_SERVER;
    $conexao = conectar();
    
    //echo $req["REQUEST_METHOD"];
     switch ($req["REQUEST_METHOD"]) {
         case 'GET':
            $usuarios = json_encode(pegar_pedido($conexao));
            echo $usuarios;
             break;
         case 'POST':
             
             $u = receberDadosPedido();
             
    
             $resp = incluir_pedido($conexao, $u);
             
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
            $id_pedido = $dados->id_pedido;

            $u = receberDadosPedido();

            $resp = editar_pedidos($conexao, $u, $id_pedido);

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
               
                $id_pedido = $dados->id_pedido;
                $campo = $dados->campo;
                $valor = $dados ->valor;
    
                $resp =  editar_pedido_parcialmente($conexao, $id_pedido, $campo, $valor);
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
            $resp = deletar_pedido($conexao, $id);
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