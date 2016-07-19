<?php
// zaczyna sesje PHP
session_start();
// ³¹duje plik php z ustawieniami klasy, do której bêdziemy siê odwo³ywaæ
require_once ('handle.class.php');
require_once ('error_handler.php');


$tabelka = new tableMaster;
//przypisuje do zmiennej $response macierz z wszystkimi komórkami z bazy danych
//przy pomocy specjalnej metody getAllRecords - metoda klasy tableMaster
$response = $tabelka->getAllRecords();

// generuje odpowiedŸ
if(ob_get_length()) ob_clean();
header('Content-Type: application/json');
echo json_encode($response);

?>
