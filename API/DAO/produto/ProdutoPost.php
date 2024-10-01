<?php 

function incluir_produto($conexao, $u) {
    $sql = "INSERT INTO Produtos (Nome, Descricao, Marca, Preco, Validade) VALUES ('$u->Nome', '$u->Descricao', '$u->Marca', '$u->Preco', '$u->Validade')";
    
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar incluir produto");
    fecharConexao($conexao);
    return $res;
}

?>
