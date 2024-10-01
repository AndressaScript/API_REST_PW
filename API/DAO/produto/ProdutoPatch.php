<?php 
   
   function editar_produto_parcialmente($conexao, $id, $campo, $valor){

      
      $sql = "UPDATE Produtos SET $campo = '$valor' WHERE id = $id";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };
?>


