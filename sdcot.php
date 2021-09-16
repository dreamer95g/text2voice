<?php

class sdcot
{

    public function __construct()
    {
    }

    public function replaceBadCharacters($cadena)
    {
        $cadena = str_replace("á", "a", $cadena);
        $cadena = str_replace("é", "e", $cadena);
        $cadena = str_replace("í", "i", $cadena);
        $cadena = str_replace("ó", "o", $cadena);
        $cadena = str_replace("ú", "u", $cadena);
        $cadena = str_replace("ñ", "nn", $cadena);
        $cadena = str_replace("ü", "u", $cadena);
        $cadena = str_replace("ë", "e", $cadena);
        $cadena = str_replace("“", ' ', $cadena);
        $cadena = str_replace("”", ' ', $cadena);
        $cadena = str_replace("‘", ' ', $cadena);
        $cadena = str_replace("Á", 'A', $cadena);
        $cadena = str_replace("É", 'E', $cadena);
        $cadena = str_replace("Í", 'I', $cadena);
        $cadena = str_replace("Ó", 'O', $cadena);
        $cadena = str_replace("Ú", 'U', $cadena);
        $cadena = str_replace("Ñ", 'NN', $cadena);
        $cadena = str_replace("—", ' ', $cadena);
        $cadena = str_replace("*", ' ', $cadena);
        $cadena = str_replace("", ' ', $cadena);
        $cadena = str_replace("«", ' ', $cadena);
        $cadena = str_replace("»", ' ', $cadena);
        $cadena = str_replace("<", ' ', $cadena);
        $cadena = str_replace(">", ' ', $cadena);
        $cadena = str_replace("*", ' ', $cadena);
        $cadena = str_replace("+", ' ', $cadena);

        return $cadena;
    }

    public function Process($input, $output)
    {
        $result = 0;

        if (!file_exists($output)) {
            $bin = dirname(__FILE__) . "\\sdcot\\sdcot.exe";

            $sdcotBin = '"C:\\Program Files (x86)\\Sodels\\SodelsCot Estándar\\SDCot.exe"';

            $comand = " -bin " . " $sdcotBin " . " -filetxt " . " $input " . " -outputfile " . $output;

            $arg = $bin . $comand;

            //EJECUTAR
            system($arg, $result);
        } else {
            $result = -1;
        }

        return $result;
    }
}
