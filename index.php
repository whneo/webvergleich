<?php

spl_autoload_register(function($class) {
    include './class/' . $class . '.php';
});
$homeSent = isset($_POST['homeSent']) ? $_POST['homeSent'] : '';
$einlesenSent = isset($_POST['einlesenSent']) ? $_POST['einlesenSent'] : '';
$vergleichenSent = isset($_POST['vergleichenSent']) ? $_POST['vergleichenSent'] : '';
$openHpiEinlesenSent = isset($_POST['openHpiEinlesenSent']) ? $_POST['openHpiEinlesenSent'] : '';
$openHpiVergleichenSent = isset($_POST['openHpiVergleichenSent']) ? $_POST['openHpiVergleichenSent'] : '';
$ihkEinlesenSent = isset($_POST['ihkEinlesenSent']) ? $_POST['ihkEinlesenSent'] : '';
$ihkVergleichenSent = isset($_POST['ihkVergleichenSent']) ? $_POST['ihkVergleichenSent'] : '';
$bbqEinlesenSent = isset($_POST['bbqEinlesenSent']) ? $_POST['bbqEinlesenSent'] : '';
$bbqVergleichenSent = isset($_POST['bbqVergleichenSent']) ? $_POST['bbqVergleichenSent'] : '';
$leitfadenFianEinlesenSent = isset($_POST['leitfadenFianEinlesenSent']) ? $_POST['leitfadenFianEinlesenSent'] : '';
$leitfadenFianVergleichenSent = isset($_POST['leitfadenFianVergleichenSent']) ? $_POST['leitfadenFianVergleichenSent'] : '';
$leitfadenFisiEinlesenSent = isset($_POST['leitfadenFisiEinlesenSent']) ? $_POST['leitfadenFisiEinlesenSent'] : '';
$leitfadenFisiVergleichenSent = isset($_POST['leitfadenFisiVergleichenSent']) ? $_POST['leitfadenFisiVergleichenSent'] : '';

$view = 'home';
if ($einlesenSent) {
    $ausgabe = isset($ausgabe) ? $ausgabe : '';
    $view = 'einlesen';
} else if ($vergleichenSent) {
    $ausgabe = isset($ausgabe) ? $ausgabe : '';
    $view = 'vergleichen';
}
//else if($bbqEinlesenSent){
//    $view = 'bbqEinlesen';
//}else if($bbqVergleichenSent){
//    $view = 'bbqVergleichen';
//}
else if ($ihkEinlesenSent) {
    $ausgabe = Ihk::lokalSpeichern();
    $view = 'einlesen';
} else if ($ihkVergleichenSent) {
    $ausgabe = Ihk::vergleichen();
    $view = 'vergleichen';
} else if ($leitfadenFianEinlesenSent) {
    $ausgabe = LeitfadenFian::lokalSpeichern();
    $view = 'einlesen';
} else if ($leitfadenFianVergleichenSent) {
    $ausgabe = LeitfadenFian::vergleichen();
    $view = 'vergleichen';
} else if ($leitfadenFisiEinlesenSent) {
    $ausgabe = LeitfadenFisi::lokalSpeichern();
    $view = 'einlesen';
} else if ($leitfadenFisiVergleichenSent) {
    $ausgabe = LeitfadenFisi::vergleichen();
    $view = 'vergleichen';
} else if ($openHpiEinlesenSent) {
    $ausgabe = OpenHpi::lokalSpeichern();
    $view = 'einlesen';
} else if ($openHpiVergleichenSent) {
    $ausgabe = OpenHpi::vergleichen();
    $view = 'vergleichen';
} else if ($homeSent) {
    $view = 'home';
}

include './view/' . $view . '.php';
include './view/end.php';
?>