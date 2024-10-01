<?php 
   
   function editar_pedido_parcialmente($conexao, $id_pedido, $campo, $valor){

      
      $sql = "UPDATE Pedidos SET $campo = '$valor' WHERE id_pedido = $id_pedido";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };
?>


