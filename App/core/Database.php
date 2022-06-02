<?php

class Database
{
    private $DB_HOST    = "localhost";
    private $DB_USER    = "root";
    private $DB_PASSWORD= "";
    private $DB_NAME    = "monitoramento";

    public function conectar()
    {

        $bbdd = 'mysql:host='. $this->DB_HOST .  ';dbname=' . $this->DB_NAME;

        $conn = new PDO($bbdd, $this->DB_USER, $this->DB_PASSWORD);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}

/*$conn = new Database();

if($conn){
    echo "Conexao";
}else{
    echo "Sem conexao";
}*/