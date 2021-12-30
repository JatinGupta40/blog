<?php
namespace languageQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class language extends connection
{
  // Selecting the default language.`
  public function defaultLang()
  {
    $result = mysqli_query($this->connection," Select * from language where lang_default = 1");
    return $result;
  }

  // Fetching all the available languages.
  public function allLang()
  {
    $result = mysqli_query($this->connection,"Select * from language ORDER BY id");
    return $result;
  }
  
  // Checking for the existing language.`
  public function checkLang($name,$prefix)
  {
    $result = mysqli_query($this->connection," Select * from language where Name = '$name' OR prefix = '$prefix'");
    return $result;
  }
  
  // Adding New Language.
  public function addLang($name, $languagedirection, $prefix)
  {
    $result = mysqli_query($this->connection,"INSERT INTO language(Name, languagedirection, prefix, lang_default) VALUE ('$name', '$languagedirection', '$prefix', '0')");
    return $result;
  }
    
  // Checking Language direction via cookie.
  public function checkLangDirection($cookiename)
  {
    $result = mysqli_query($this->connection,"SELECT languagedirection from language where prefix = '$cookiename'");
    return $result;
  }
    
        
}
  

?>