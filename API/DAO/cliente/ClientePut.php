<?php 
   
   function editar_clientes($conexao, $u, $id){

        $sql = "UPDATE  Clientes SET Nome = '$u->Nome',Endereco='$u->Endereco', CPF = '$u->CPF', Telefone = '$u->Telefone', Email = '$u->Email',  DataNascimento = '$u->DataNascimento' WHERE id = $id";
        $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir");
        fecharConexao($conexao);
        return $res;
   };

?>
