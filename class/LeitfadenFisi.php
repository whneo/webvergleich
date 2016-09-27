<?php

class LeitfadenFisi {

    function __construct() {
        
    }

    public static function lokalSpeichern() {
        LeitfadenFisi::speichern(LeitfadenFisi::einlesen());
        if (file_exists('vergleich/leitfadenFisi/leitfadenFisi.pdf')) {
            $ausgabe = "speichern erfolgreich";
        } else {
            $ausgabe = "speichern fehlgeschlagen";
        }
        return $ausgabe;
    }

    public static function einlesen() {
        $htmlInhalt = file_get_contents("https://www.ihk-berlin.de/blob/bihk24/ausbildung/downloads/pdfdoc_download/Leitfaden_Abschlusspruefung/2278680/1ab1c4bd0ac406d100cd7ce35c725d93/Leitfaden_Fachinformatiker_Systemintegration-data.pdf");
        return $htmlInhalt;
    }

    public static function speichern($inhalt) {
        $workarround = fopen('vergleich/leitfadenFisi/leitfadenFisi.pdf', 'w');
        fwrite($workarround, $inhalt);
        fclose($workarround);
    }

    public static function vergleichen() {
        $htmlInhalt = LeitfadenFisi::einlesen();
        $lokalerInhalt = file_get_contents("vergleich/leitfadenFisi/leitfadenFisi.pdf");
        if ($htmlInhalt == $lokalerInhalt) {
            $ausgabe = "gleich";
        } else {
            $ausgabe = "ungleich";
        }
        return $ausgabe;
    }

}
