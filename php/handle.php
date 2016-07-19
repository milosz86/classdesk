<?php
// zaczyna sesje PHP
session_start();
// ��duje plik php z ustawieniami klasy, do kt�rej b�dziemy si� odwo�ywa�
require_once ('handle.class.php');
require_once ('error_handler.php');


$tabelka = new tableMaster;
//przypisuje do zmiennej $response macierz z wszystkimi kom�rkami z bazy danych
//przy pomocy specjalnej metody getAllRecords - metoda klasy tableMaster
$response = $tabelka->getAllRecords();

// generuje odpowied�
if(ob_get_length()) ob_clean();
header('Content-Type: application/json');
echo json_encode($response);

?>
