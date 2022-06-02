<?php

class terminais
{
    private $conn;

    private $numero;
    private $ponto;
    private $uf;
    private $tipo;
    private $marca;
    private $modelo;
    private $serie;
    private $ip;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    //Getters
    public function getNumero()
    {
        return $this->numero;
    }
    public function getPonto()
    {
        return $this->ponto;
    }
    public function getUf()
    {
        return $this->uf;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getModelo()
    {
        return $this->modelo;
    }
    public function getSerie()
    {
        return $this->serie;
    }
    public function getIp()
    {
        return $this->ip;
    }

    //Setters
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }
    public function setPonto($ponto)
    {
        $this->ponto = $ponto;
    }
    public function setUf($uf)
    {
        $this->uf = $uf;
    }
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }
    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    //Funcoes do Banco
    public function getAll()
    {
        $consult = $this->conn->prepare("SELECT * FROM simgaindsaa");
        $consult->execute();

        $result = $consult->fetchAll();
        $this->conn = null;

        return $result;
    }

    public function getById($numero)
    {
        $consult = $this->conn->prepare("SELECT * FROM simgaindsaa WHERE numero = :numero");
        $consult->execute(array(
            "numero" => $numero
        ));

        $result = $consult->fetchObject();
        $this->conn = null;

        return $result;
    }

    public function save()
    {
        $consult = $this->conn->prepare("INSERT INTO simgaindsaa (numero, ponto, uf, tipo, marca, modelo, serie, ip) VALUES (:numero, :ponto, :uf, :tipo, :marca, :modelo, :serie, :ip)");
        $result = $consult->execute(array(
            "numero" => $this->numero,
            "ponto" => $this->ponto,
            "uf"    => $this->uf,
            "tipo" => $this->tipo,
            "marca" => $this->marca,
            "modelo" => $this->modelo,
            "serie"  => $this->serie,
            "ip"   => $this->ip
        ));
        $this->conn = null;

        return $result;
    }
}