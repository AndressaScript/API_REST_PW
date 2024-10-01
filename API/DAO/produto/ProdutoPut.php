<?php 

function editar_produtos($conexao, $u, $id) {

    $sql = "UPDATE Produtos SET Nome = '$u->Nome', Descricao = '$u->Descricao', Marca = '$u->Marca', Preco = '$u->Preco', Validade = '$u->Validade' WHERE ID = $id";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar atualizar o produto");

    fecharConexao($conexao);
    
    return $res;
}

?>
