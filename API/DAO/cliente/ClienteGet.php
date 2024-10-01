<?php 
   

   function pegar_cliente($conexao){

    $sql = "SELECT * FROM  Clientes";
    $res = mysqli_query($conexao, $sql) or die("Erro ao tentar consultar");

    $cliente = [];

    while ($registro = mysqli_fetch_array($res)) {
        $ID = utf8_encode( $registro['ID']);
        $Nome = utf8_encode($registro['Nome']);
        $Endereco = utf8_encode( $registro['Endereco']);
        $CPF = utf8_encode( $registro['CPF']);
        $Telefone = utf8_encode( $registro['Telefone']);
        $Email = utf8_encode(  $registro['Email']);
        $DataNascimento = utf8_encode( $registro['DataNascimento']);
        
       
        
        $novo_cliente = new Cliente($ID, $Nome, $Endereco, $CPF, $Telefone, $Email,  $DataNascimento);
        array_push($cliente ,$novo_cliente);
    };
    
    fecharConexao($conexao);
    return $cliente;
   };

   
?>