<?php 
   function deletar_produto($conexao, $ID){

        $sql = "DELETE FROM  Produtos WHERE id = $ID";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar deletar");


        fecharConexao($conexao);
        return $res;
   };

   
   
?>