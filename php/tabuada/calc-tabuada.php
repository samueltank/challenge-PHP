<?php  declare(strict_types=1); // Torna o script mais rigoroso, retorna erro.
  
  # Declaração de variáveis:
  $array_grades = array(0.0, 0.0, 0.0, 0.0);
  $array_length = (int) 0;
  $result       = (float) 0.0;

  function calcMedia(array $grades, int $arrayLength) : float {
    # Variável à soma:
    $sum = (int) 0;
    
    # Calcula a soma de todos os itens do array:
    for($i = 0; $i < $arrayLength; $i++) {
      $sum += $grades[$i]; 
    }

    return ($sum / $arrayLength);
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    global $array_grades, $array_length;

    $array_grades = array(
      $array_grades[0] = $_POST["grade1"],
      $array_grades[1] = $_POST["grade2"],
      $array_grades[2] = $_POST["grade3"],
      $array_grades[3] = $_POST["grade4"]
    );
    $array_length = count($array_grades);

    $result = round(calcMedia($array_grades, $array_length), 2);
  } 
?>