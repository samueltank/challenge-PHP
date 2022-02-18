<?php  declare(strict_types=1); // Torna o script mais rigoroso, retorna erro.
  
  # Declaração de variáveis:
  $arr_grades = [];
  $result     = (float) 0.0;

  function calcMedia(array $arr_grades) : float // retorna float
  {
    # Variáveis:
    $grades = $arr_grades;
    $sum    = (int) 0;
    
    # Calcula a soma de todos os itens do array:
    foreach($grades as $value) 
    {
      $sum += $value; 
    }

    return ($sum / count($grades));
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    global $arr_grades;

    $arr_grades = array(
      $arr_grades[0] = $_POST["grade1"],
      $arr_grades[1] = $_POST["grade2"],
      $arr_grades[2] = $_POST["grade3"],
      $arr_grades[3] = $_POST["grade4"]
    );

    $result = round(calcMedia($arr_grades), 2);
  } 
?>