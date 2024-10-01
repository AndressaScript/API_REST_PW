<?php

class Cliente {
    public $ID;
    public $Nome;
    public $Endereco;
    public $CPF;
    public $Telefone;
    public $Email;
    public $DataNascimento;

    public function __construct($ID, $Nome, $Endereco, $CPF, $Telefone, $Email, $DataNascimento) {
        $this->ID = $ID;
        $this->Nome = $Nome;
        $this->Endereco = $Endereco;
        $this->CPF = $CPF;
        $this->Telefone = $Telefone;
        $this->Email = $Email;
        $this->DataNascimento = $DataNascimento;
    }
}

    
?>