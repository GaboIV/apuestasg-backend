<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset='utf-8' />
        <title>Carga Datos desde retrospecto oficial de INH</title>

        <style type="text/css">
            .agregado { display: inline-block; padding: 8px; background: #9EE1FF; border: 1px #002B63 solid; margin: 5px; }
            .modificado { display: inline-block; padding: 8px; background: #B5EFA5; border: 1px #42563C solid; margin: 5px; }
            .error { display: inline-block; padding: 8px; background: #FF433D; border: 1px #771E1C solid; margin: 5px; }
        </style>
    </head>
<body>

<?php

include("conexion.php");

echo "Iniciando <br><br>";

/** Se incluye el Parche **/
set_include_path(get_include_path() . PATH_SEPARATOR . 'Classes/');

/** Abrimos IOFactory como gestor de archivos .xls */
include 'PHPExcel/IOFactory.php';

/** Seleccionamos la ruta del archivo */
$inputFileName = 'carreras.xls';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();

$porcadauno = 100 / $highestRow;

$vu = "0";

echo "  <div style='width:500px; background: #f1f1f1!important; padding: 5px; height: 32px;'>
            <div id='temp_agabe' style='text-align:center; width:0%; background: white; height: 22px;'></div>
        </div><br><br>";

$racecourse = "La Rinconada";

$c1 = "SELECT * FROM racecourses WHERE name = '$racecourse'";
$ec1 = $conexion->query($c1);
$rc1 = $ec1->num_rows;

if ($rc1 > 0) {
    $fc1 = $ec1->fetch_assoc();

    $id_hipodromo = $fc1['id'];
    $acro_hipodromo = $fc1['acro_2'];
}

//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++){ 

    $completado = ($row * $porcadauno);
    $complet = intval($completado);
    $compor = $complet."%";
    echo "<script type='text/javascript'>document.getElementById('temp_agabe').style.width = '$compor'; document.getElementById('temp_agabe').innerHTML = '$compor';</script>";    

    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
    $dato1 = $rowData['0']['0']; 

    if ($row > -1) {
        if (preg_match("/REUNION/", $dato1)) {
            $nro = $rowData['0']['9'];
            $nro_carr = explode("CARRERA Nº:  ", $nro);
            $nro_carrera = trim($nro_carr[1]);

            if (strlen($nro_carrera) == 1) {
                $nro_carrera = "0".$nro_carrera;
            }

            $fech= $rowData['0']['5'];
            $fecha = str_replace(".", "-", $fech);

            $cod = $rowData['0']['11'];
            $codi = explode("CARRERA ANUAL: ", $cod);
            $codigo = $codi[1];

            $ho = $rowData['0']['15'];
            $hor = explode("HORA: ", $ho);
            $hora = $hor[1];

            $fecha_hora = strtotime($fecha." ".$hora);
            $anyo = date("y", $fecha_hora);
            $fecha_hora = date('Y-m-d H:i:s', $fecha_hora);

            $cod_carrera = $acro_hipodromo.$anyo.$codigo.$nro_carrera;

            echo "<br>Nueva Carrera: $cod_carrera <br> Fecha: $fecha_hora<br>";
        } 

        if (preg_match("/Descripción/", $dato1)) {
            $des = $dato1;
            $descri = explode("Descripción de la Condición:", $des);
            $descripcion = addslashes(trim($descri[1]));

            echo "Título: $descripcion<br>";

            if (preg_match("/YEGUAS/", $descripcion) OR preg_match("/POTRANCAS/", $descripcion)) {
                $sexo = 2;
            } elseif (preg_match("/CABALLOS/", $descripcion) OR preg_match("/POTROS/", $descripcion)) {
                $sexo = 1;
            } else {
                $sexo = 1;
            }
        }

        if (preg_match("/PREMIOS/", $dato1)) {
            $dis = $rowData['0']['14'];
            $dista = explode("DISTANCIA:", $dis);
            $distan = explode(" ", trim($dista[1]));
            $distancia = $distan[0];

            echo "$distancia <br>";

            $c2 = "SELECT * FROM careers WHERE code = '$cod_carrera'";
            $ec2 = $conexion->query($c2);
            $rc2 = $ec2->num_rows;

            if ($rc2 == 0) {
                $c3 = "INSERT INTO careers (code, racecourse_id, date, posttime, distance, surface, number, valid, title) VALUES ('$cod_carrera','$id_hipodromo','$fecha_hora', '$fecha_hora', '$distancia','1', '$nro_carrera', '0', '$descripcion')";
                $ec3 = $conexion->query($c3);
                if($ec3){
                    $id_carrera = $conexion->insert_id; 
                } else {
                    printf("Errormessage: %s\n", $conexion->error);
                    echo "<br>";
                }
            } else {
                $fc2 = $ec2->fetch_assoc();

                $id_carrera = $fc2['id'];
            }
        }

        if (is_numeric($dato1)) {
            $horse_name = addslashes(ucwords(strtolower($rowData['0']['1'])));
            $numero = $dato1;

            $peso = $rowData['0']['7'];

            $jinete = addslashes(ucwords(strtolower($rowData['0']['8'])));

            $jockey_q = "SELECT * FROM jockeys WHERE name_id = '$jinete' LIMIT 1";
            $jockey_e = $conexion->query($jockey_q);
            $jockey_n = $jockey_e->num_rows;

            if ($jockey_n == 0) {
                $jockey_qi = "INSERT INTO jockeys (name_id, name, weight, height, country_id) VALUES ('$jinete', '$jinete', 0, 0, 231)";
                $jockey_ei = $conexion->query($jockey_qi);

                if($jockey_ei){
                    $id_jockey = $conexion->insert_id; 
                }
            } else {
                $jockey = $jockey_e->fetch_assoc();
                $id_jockey = $jockey['id']; 
            }

            $entrenador = addslashes(ucwords(strtolower($rowData['0']['13'])));

            $trainer_q = "SELECT * FROM trainers WHERE name_id = '$entrenador' ORDER BY id DESC LIMIT 1";
            $trainer_e = $conexion->query($trainer_q);
            $trainer_n = $trainer_e->num_rows;

            if ($trainer_n == 0) {
                $trainer_qi = "INSERT INTO trainers (name_id, name, country_id) VALUES ('$entrenador', '$entrenador', 231)";
                $trainer_ei = $conexion->query($trainer_qi);

                if($trainer_ei){
                    $id_trainer = $conexion->insert_id; 
                }
            } else {
                $trainer = $trainer_e->fetch_assoc();
                $id_trainer = $trainer['id']; 
            }

            $puesto = trim($rowData['0']['16']);

            $cc1 = "SELECT * FROM horses WHERE name = '$horse_name'";
            $ecc1 = $conexion->query($cc1);
            $rcc1 = $ecc1->num_rows;

            if ($rcc1 == 0) {
                
                $s1 = " SELECT * FROM horses ORDER BY id DESC LIMIT 1";
                $es1 = $conexion->query($s1);
                $ns1 = $es1->num_rows;

                if ($ns1 > 0) {
                    $rs1 = $es1->fetch_assoc();

                    $codigo_ult_cab = $rs1["code"];
                    $solo_n_c_u_c = explode("CAB", $codigo_ult_cab);
                    $nuevo_s_c_u_c = $solo_n_c_u_c[1] + 1;

                    if ($nuevo_s_c_u_c < 10) {
                        $nuevo_s_c_u_c = "00".$nuevo_s_c_u_c;
                    } elseif ($nuevo_s_c_u_c < 100) {
                        $nuevo_s_c_u_c = "0".$nuevo_s_c_u_c;
                    }

                    $codigo_final_cab = $codigo_ult_cab[0].$codigo_ult_cab[1].$codigo_ult_cab[2].$nuevo_s_c_u_c;
                } else {
                    $codigo_final_cab = "CAB001";
                }

                echo "$codigo_final_cab <br>";                

                $cc2 = "INSERT INTO horses (code, name, sex) VALUES ('$codigo_final_cab','$horse_name','$sexo')";
                $ecc2 = $conexion->query($cc2);
                if($ecc2){
                    $id_caballo = $conexion->insert_id; 
                } else {
                    printf("Errormessage: %s\n", $conexion->error);
                    echo "<br>";
                }
            } else {
                $fcc1 = $ecc1->fetch_assoc();

                $id_caballo = $fcc1['id'];
            }

            $cc3 = "SELECT * FROM inscriptions WHERE horse_id = '$id_caballo' AND career_id = '$id_carrera'";
            $ecc3 = $conexion->query($cc3);
            $rcc3 = $ecc3->num_rows;

            if ($rcc3 == 0) {
                $cc4 = "INSERT INTO inscriptions (horse_id, career_id, trainer_id, jockey_id, weight, number, position) VALUES ('$id_caballo','$id_carrera', '$id_trainer', '$id_jockey', '$peso','$numero','$puesto')";
                $ecc4 = $conexion->query($cc4);
                if($ecc4){
                    $id_inscripcion = $conexion->insert_id; 
                } else {
                    printf("Errormessage: %s\n", $conexion->error);
                    echo "<br>";
                }
            }

            echo "$numero - $puesto - $horse_name - $peso kgs. - $jinete - $entrenador<br>";
        }
    }
}
?>
<body>
</html>