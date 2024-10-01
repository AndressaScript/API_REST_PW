<?php 
   
   function incluir_cliente($conexao, $u){

        $sql = "INSERT INTO  Clientes (Nome, Endereco, CPF, Telefone, Email, DataNascimento) VALUES ('$u->Nome','$u->Endereco','$u->CPF' ,'$u->Telefone', '$u->Email', '$u->DataNascimento')";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };
?>


   
