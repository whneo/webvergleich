<?php

class OpenHpi {

    function __construct() {
        
    }

    public static function lokalSpeichern() {
        OpenHpi::speichern(OpenHpi::einlesen());
        if (file_exists('vergleich/openHpi/index.html')) {
            $ausgabe = "speichern erfolgreich";
        } else {
            $ausgabe = "speichern fehlgeschlagen";
        }
        return $ausgabe;
    }

    public static function einlesen() {
        $htmlInhalt = file_get_contents("https://open.hpi.de/courses");
        return $htmlInhalt;
    }

    public static function speichern($inhalt) {
        $workarround = fopen('vergleich/openHpi/index.html', 'w');
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
        $htmlarray = explode("<", OpenHpi::einlesen());
        $lokalesarray = explode("<", file_get_contents("vergleich/openHpi/index.html"));
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
        $ausgabe = OpenHpi::pruefen($htmlInhalt, $lokalerInhalt);
        return $ausgabe;
    }
}
