<?php 

function editar_pedidos($conexao, $u, $id_pedido){

    $sql = "UPDATE Pedidos SET id_cliente = '$u->id_cliente', data = '$u->data' WHERE id_pedido = $id_pedido";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar atualizar o pedido");
    fecharConexao($conexao);
    return $res;
};

?>

