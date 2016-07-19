<?php
// ³aduje plik z konfiguracj¹ po³¹czenia z baz¹ danych
require_once ('config.php');

class tableMaster {
 
 // przechowuje po³¹czenie z baz¹ danych
  private $mMysqli;
  
  // konstruktor otwieraj¹cy po³¹czenie z baz¹ danych
  function __construct()
  {
    $this->mMysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  }

  // destruktor zamykaj¹cy po³¹czenie z baz¹
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
	  //pêtl¹ przechodzi przez wszystkie pasuj¹ce wpisy
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
