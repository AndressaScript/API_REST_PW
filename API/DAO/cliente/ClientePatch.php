<?php 
   
   function editar_cliente_parcialmente($conexao, $id, $campo, $valor){

      
      $sql = "UPDATE Clientes SET $campo = '$valor' WHERE id = $id";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };
?>


