<?php

// PARA PODER ENTRAR DE LOS NAVEGADORES
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
header("Content-Type: application/json");

require_once("ogg.php");
require_once("api.php");
require_once("sdcot.php");

$ogg = new ogg();
$api = new api();
$sdcot = new sdcot();

$text = $_POST["text"];
$output = $_POST["output"];

try {

    if ($api->exist($output)) {

        $global = 0;

        // QUITAR LOS CARACTERES EXTRANNOS
        $replacedText = $sdcot->replaceBadCharacters($text);

        // CREAR EL FICHERO TXT
        $fileTxt =  $api->createTxtFileWithContent($output . "\\" . "output.txt", $replacedText);

        // PROCESARLO
        $mp3File = $output . "\\" . "output.mp3";

        $resultSdcot = $sdcot->Process($fileTxt, $mp3File);

        // CONVERTIR A OGG
        $oggFile = $output . "\\" . "output.ogg";

        $result = $ogg->Process($mp3File, $oggFile);

        // BORRAR LOS ARCHIVOS SOBRANTES
        unlink($mp3File);
        unlink($fileTxt);

        if ($result == "1") {
            echo " Some error!";
        } else {
            $global += $result;
        }

        if ($global == 0) {
            echo " All ok, output:  " . $oggFile;
        } else {
            echo " Some error! ";
        }
    } else {
        echo "  Not exist: " . $output;
    }
} catch (Exception $e) {
    echo " Exception: " . $e->getMessage();
}
