<?php 
   function deletar_cliente($conexao, $ID){

        $sql = "DELETE FROM  Clientes WHERE id = $ID";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar deletar");


        fecharConexao($conexao);
        return $res;
   };

   
   
?>