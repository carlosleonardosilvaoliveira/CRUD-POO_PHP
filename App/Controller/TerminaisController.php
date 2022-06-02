<?php

class TerminaisController
{
    private $conectar;
    private $conn;

    public function __construct()
    {
        require_once __DIR__."/../core/Database.php";
        require_once __DIR__."/../Model/Terminais.php";

        $this->conectar = new Database();
        $this->conn = $this->conectar->conectar();
    }

    public function run($action)
    {
        switch($action) {
            case "index":
                $this->index();
            break;

            case "export":
                $this->exportCsv();
            break;

            case "import":
                $this->importCsv();
            break;

            default:
                $this->index();
            break;
        }
    }

    public function index()
    {
        $terminaisObj = new Terminais($this->conn);
        $terminais = $terminaisObj->getAll();

        $this->view("index", array(
            "terminais" => $terminais,
            "titulo" => "SAA"
        ));
    }

    public function exportCsv()
    {
        $terminaisObj = new Terminais($this->conn);
        $terminais = $terminaisObj->getAll();

        if ($terminais > 0) {
            $delimiter = ";";
            $filename = "export_".date('Y-m-d').".csv";

            $output = fopen('php://memory', 'w');
            $fields = array('Numero', 'Ponto', 'UF', 'Tipo', 'Marca', 'Modelo', 'Serie', 'IP');
            fputcsv($output, $fields, $delimiter);

            foreach ($terminais as $row) {
                $lineData = array($row['numero'], $row['ponto'], $row['uf'], $row['tipo'], $row['marca'], $row['modelo'], $row['serie'], $row['ip']);
                fputcsv($output, $lineData, $delimiter);
            }

            fseek($output, 0);

            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' .$filename. '";');

            fpassthru($output);
        }
    }

    public function importCsv()
    {

        $terminais = new Terminais($this->conn);

        if(isset($_POST["Import"])) {
            $filename = $_FILES["file"]["tmp_name"];

            if ($_FILES["file"]["size"] > 0) {
            
                $file = fopen($filename, "r");

                while (($getData = fgetcsv($file, 10000, ";")) !== FALSE) {

                        /*echo $csv['col1'] = $getData[0]." - ";
                        echo $csv['col2'] = $getData[1]." - ";
                        echo $csv['col3'] = $getData[2]." - ";
                        echo $csv['col4'] = $getData[3]." - ";
                        echo $csv['col5'] = $getData[4]." - ";
                        echo $csv['col6'] = $getData[5]." - ";
                        echo $csv['col7'] = $getData[6]." - ";
                        echo $csv['col8'] = $getData[7]."</br>";*/

                        
                        $terminais->setNumero($getData[0]);
                        $terminais->setPonto($getData[1]);
                        $terminais->setUf($getData[2]);
                        $terminais->setTipo($getData[3]);
                        $terminais->setMarca($getData[4]);
                        $terminais->setModelo($getData[5]);
                        $terminais->setSerie($getData[6]);
                        $terminais->setIp($getData[7]);
                        //$save = $terminais->save();

                }
                $save = $terminais->save();
                fclose($file);
            }
        } else {
            return false;
        }
        
    }

    public function view($view, $dados)
    {
        $data = $dados;
        require_once __DIR__.'/../View/'.$view.'View.php';
    }
}