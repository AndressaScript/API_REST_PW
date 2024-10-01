<?php 

    class Produto {
        public $ID;
        public $Nome;
        public $Descricao;
        public $Marca;
        public $Preco;
        public $Validade;

        function __construct($ID_informado, $Nome_informado, $Descricao_informada, $Marca_informada, $Preco_informado, $Validade_informada) {
            $this->ID = $ID_informado;
            $this->Nome = $Nome_informado;
            $this->Descricao = $Descricao_informada;
            $this->Marca = $Marca_informada;
            $this->Preco = $Preco_informado;
            $this->Validade = $Validade_informada;
        }
    }

?>
