<?php
// �aduje plik z konfiguracj� po��czenia z baz� danych
require_once ('config.php');

class tableMaster {
 
 // przechowuje po��czenie z baz� danych
  private $mMysqli;
  
  // konstruktor otwieraj�cy po��czenie z baz� danych
  function __construct()
  {
    $this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  }

  // destruktor zamykaj�cy po��czenie z baz�
  function __destruct()
  {
    $this->mMysqli->close();      
  } 

  public function getAllRecords() {
	return $this->getRecords();  
	  
  }
  
  private function getRecords () {
  $result = $this->mMysqli->query('SELECT url, nazwa FROM movietable');
  //buduje odpowiedz JSON do Javascriptu  
  
  
  $response = array();
  if($result->num_rows){
	  //p�tl� przechodzi przez wszystkie pasuj�ce wpisy
	  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
		  $movie = array();
		  $movie['url'] = urlencode($row['url']);
		  $movie['nazwa'] = $row['nazwa'];
		  array_push($response, $movie);
		}
	  $result->close();
     }
  
  return $response;
  }
}
?>
