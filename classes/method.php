<?php

include_once('classes/source.php');

// Function for Methods.
class method extends sourceQuery\source 
{
  // Funcion for fetching array.
  public function numRows($query)
  {
    $result =  mysqli_num_rows($query);
    return $result;
 } 

  
  // Funcion for fetching array.
  public function fetchArray($query)
  {
    $result =  mysqli_fetch_array($query);
    return $result;
  } 
  
  // Funcion for fetching assoc.
  public function fetchAssoc($query)
  {
    $result =  mysqli_fetch_assoc($query);
    return $result;
  } 
}

?>