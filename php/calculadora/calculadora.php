<?php  declare(strict_types=1); // Torna o script mais rigoroso, retorna erro.
  
  # Declaração de variáveis:
  $numOne = $numTwo = $options = $result = null;

  function calcSum($num1, $num2) : float {
    $result = (float) 0.0;
    $result = (float) $num1 + $num2;
    return $result;
  }
  function calcSub($num1, $num2) : float {
    $result = (float) 0.0;
    $result = (float) $num1 - $num2;
    return $result;
  }
  function calcMult($num1, $num2) : float {
    $result = (float) 0.0;
    $result = (float) $num1 * $num2;
    return $result;
  }
  function calcDiv($num1, $num2) : float {
    $result = (float) 0.0;
    $result = (float) $num1 / $num2;
    return $result;
  }

  function execCalc(String $option, $num1, $num2) {
    switch ($option) {
      case "SUM": 
        return calcSum($num1, $num2);
        break;
      case "SUBTRACTION":
        return calcSub($num1, $num2);
        break;
      case "MULTIPLICATION":
        return calcMult($num1, $num2);
      case "DIVISION":
        return calcDiv($num1, $num2);
        break;
    }
  }

  // Alerta quando há um erro com uma msg específica:
  function errorAlert(string $msg) : void {
    echo("<span class='error'>* ${msg}</span>");
  }

  if(($_SERVER["REQUEST_METHOD"] == "POST") and ($_POST["num2"] != 0)) {
    global $options;
    $numOne  = $_POST["num1"];
    $numTwo  = $_POST["num2"];
    $options = (String) strtoupper($_POST["operation"]);

    $result = execCalc($options, $numOne, $numTwo);
  } 
?>