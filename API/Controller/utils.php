<?php 
         function criarResposta($status, $msg){
            $resp = new Resposta($status, $msg);
     
            return $resp;
         }
    
         function receberDados(){
            $dados = json_decode(file_get_contents('php://input'));
            $Nome = $dados->Nome;
            $Endereco = $dados->Endereco;
            $CPF = $dados->CPF;
            $Email = $dados->Email;
            $Telefone = $dados->Telefone;
            $DataNascimento = $dados->DataNascimento;
          
    
            $user = new Cliente ("", $Nome , $Endereco , $CPF ,  $Email, $Telefone, $DataNascimento);
            return $user;
        }

        

               function receberDadosProduto() {
            $dados = json_decode(file_get_contents('php://input'));
            $Nome = utf8_encode($dados->Nome);
            $Descricao = utf8_encode($dados->Descricao);
            $Marca = utf8_encode($dados->Marca);
            $Preco = utf8_encode($dados->Preco);
            $Validade = utf8_encode($dados->Validade);
            
            $produto = new Produto("", $Nome, $Descricao, $Marca, $Preco, $Validade);
            return $produto;
         }




        function receberDadosPedido() {
         $dados = json_decode(file_get_contents('php://input'));
         
         $id_cliente = $dados->id_cliente;
         $data = $dados->data;
     
         $pedido = new Pedido("", $id_cliente, $data);
         return $pedido;
     }
     


     function receberDadosPedidoProduto() {
      $dados = json_decode(file_get_contents('php://input'));
      
      $id_pedido = $dados->id_pedido;
      $id_produto = $dados->$id_produto;
      $qtd = $dados-> $qtd;
  
      $pedidoproduto = new PedidoProduto("", $id_pedido, $id_produto,  $qtd);
      return $pedidoproduto;
  }

    




?>