<?php 

   function pegar_pedidoproduto($conexao){

    $sql = "SELECT * FROM pedidos_produtos";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $pedidos = [];

    while ($registro = mysqli_fetch_array($res)) {
        $id_pedido = utf8_encode($registro['id_pedido']);
        $id_cliente = utf8_encode($registro['id_produto']);
        $data = utf8_encode($registro['qtd']);
        
    
        $novo_PedidoProduto = new PedidoProduto($id_pedido, $id_produto, $qtd);
        array_push($pedidos, $novo_PedidoProduto);
    };

    fecharConexao($conexao);
    return $pedidos;
   };

?>
