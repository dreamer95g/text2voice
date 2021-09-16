<?php


class ogg
{


    public function __construct()
    {
    }



    public function Process($input, $output)
    {
        $result = 0;

        if (file_exists($output)) {
            unlink($output);
        }

        $bin = dirname(__FILE__) . "\\encoder\\ffmpeg.exe";

        $comand = " -i " . $input . " -vn -c:a libopus -b:a 16k -ac 2 -compression_level 10 -frame_duration 60 -application voip " . $output;

        $arg = $bin . $comand;

        //EJECUTAR
        system($arg, $result);

        return $result;
    }
}
