<?php

class LeitfadenFian {

    function __construct() {
        
    }

    public static function lokalSpeichern() {
        LeitfadenFian::speichern(LeitfadenFian::einlesen());
        if (file_exists('vergleich/leitfadenFian/leitfadenFian.pdf')) {
            $ausgabe = "speichern erfolgreich";
        } else {
            $ausgabe = "speichern fehlgeschlagen";
        }
        return $ausgabe;
    }

    public static function einlesen() {
        $htmlInhalt = file_get_contents("https://www.ihk-berlin.de/blob/bihk24/pruefungen_lehrgaenge/pruefungen/ausbildungspruefungen/Download/3384972/0c298404ca83c0f7c5c9312543e7f168/Leitfaden-Fachinformatiker-Anwendungsentwicklung-data.pdf");
        return $htmlInhalt;
    }

    public static function speichern($inhalt) {
        $workarround = fopen('vergleich/leitfadenFian/leitfadenFian.pdf', 'w');
        fwrite($workarround, $inhalt);
        fclose($workarround);
    }

    public static function vergleichen() {
        $htmlInhalt = LeitfadenFian::einlesen();
        $lokalerInhalt = file_get_contents("vergleich/leitfadenFian/leitfadenFian.pdf");
        if ($htmlInhalt == $lokalerInhalt) {
            $augabe = "gleich";
        } else {
            $ausgabe = "ungleich";
        }
        return $augabe;
    }
}
