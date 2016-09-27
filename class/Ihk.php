<?php

class Ihk {

    function __construct() {
        
    }

    public static function lokalSpeichern() {
        Ihk::speichern(Ihk::einlesen());
        if (file_exists('vergleich/ihk/index.html')) {
            $ausgabe = "speichern erfolgreich";
        } else {
            $ausgabe = "speichern fehlgeschlagen";
        }
        return $ausgabe;
    }

    public static function einlesen() {
        $htmlInhalt = file_get_contents("https://www.ihk-berlin.de/ausbildung/Ausbildungsberufe_von_A_bis_Z/Fachinformatiker/");
        return $htmlInhalt;
    }

    public static function speichern($inhalt) {
        $workarround = fopen('vergleich/ihk/index.html', 'w');
        fwrite($workarround, $inhalt);
        fclose($workarround);
    }

    public static function pruefen($htmlInhalt, $lokalerInhalt) {
        if ($htmlInhalt == $lokalerInhalt) {
            $ausgabe = "gleich";
        } else {
            $ausgabe = "ungleich";
        }
        return $ausgabe;
    }
    
    public static function vergleichen(){
        $htmlarray = explode("<", Ihk::einlesen());
        $lokalesarray = explode("<", file_get_contents("vergleich/ihk/index.html"));
        $regex = "~^meta|^script|^link[\d\D\w\W\S]+~";
        for ($i = 0; $i < count($htmlarray); $i++) {
            if (preg_match($regex, $htmlarray[$i])) {
                unset($htmlarray[$i]);
            }
        }
        for ($i = 0; $i < count($lokalesarray); $i++) {
            if (preg_match($regex, $lokalesarray[$i])) {
                unset($lokalesarray[$i]);
            }
        }
        $htmlarray = array_values($htmlarray);
        $lokalesarray = array_values($lokalesarray);
        $htmlInhalt = implode("<", $htmlarray);
        $lokalerInhalt = implode("<", $lokalesarray);
        $ausgabe = Ihk::pruefen($htmlInhalt, $lokalerInhalt);
        return $ausgabe;
    }
}
