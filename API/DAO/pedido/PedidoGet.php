<?php 

   function pegar_pedido($conexao){

    $sql = "SELECT * FROM Pedidos";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $pedidos = [];

    while ($registro = mysqli_fetch_array($res)) {
        $id_pedido = utf8_encode($registro['id_pedido']);
        $id_cliente = utf8_encode($registro['id_cliente']);
        $data = utf8_encode($registro['data']);
        
    
        $novo_pedido = new Pedido($id_pedido, $id_cliente, $data);
        array_push($pedidos, $novo_pedido);
    };

    fecharConexao($conexao);
    return $pedidos;
   };

?>
