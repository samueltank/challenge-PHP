<?php declare(strict_types=1);  // Torna o script mais rigoroso.

  /* 
   * @author:        samueltank
   * @last-att-date: 02/18/2022
   * @version:       1.0.1  
   * @description:   Módulo para cálculos e formação de listas com numeros
   *                 pares e ímpares, baseado em um intervalo 
   *                 determinado pelo usuário.
  */

  // Declaração de variáveis:

  # Variáveis para manipulação das listas:
  $arr_numbers = [];
  $arr_odd     = [];
  $arr_even    = [];

  # Variáveis de entrada:
  $start; $end; // = null
  
  // Funções e condicionais:

  // Gera uma sequência numérica entre o $start e o $end: 
  function generateNumbersList() : array { 
    global $start, $end;

    # Cria a lista de números de acordo com as entradas do user:
    for ($cont = $start; $cont <= $end; $cont++) {
      $arr_numbers[] = (int) $cont;
    }
    return $arr_numbers;
  }
  
  // Gera uma sequência numérica com os ímpares da $arr_numbers:
  function generateOddNumList() : array {
    global $arr_odd, $arr_numbers;

    foreach ($arr_numbers as $value) {
      if ($value % 2 != 0) {
        $arr_odd[] = (int) $value;
      }
    }
    
    return $arr_odd;
  }
  
  // Mostra no container os itens da $arr_odd (usada no HTML):
  function displayOddList() : void {
    global $arr_odd;

    foreach ($arr_odd as $value) {
      echo($value . "<br />");
    }
  }

  // Gera uma sequência numérica com os pares da $arr_numbers:
  function generateEvenNumList() : array {
    global $arr_even, $arr_numbers;

    foreach ($arr_numbers as $value) {
      if ($value % 2 == 0) {
        $arr_even[] = (int) $value;
      }
    }

    return $arr_even;
  }

  // Mostra no container os itens da $arr_even (usada no HTML):
  function displayEvenList() : void {
    global $arr_even;

    foreach ($arr_even as $value) {
      echo($value . "<br />");
    }
  }

  // Checagem vazia personalizada
  function checkNotEmpty(int $iniValue, int $finValue) : bool {
    $notEmpty = (($iniValue != (-1)) and ($finValue != (-1))) ? true : false; 
    return $notEmpty;
  }
  
  // Checa se o valor inicial é maior que o valor final:
  function checkVia(int $initialValue, int $finishValue) : bool {
    # checkVia = Check Viability.
    $viability = ($initialValue > $finishValue) ? false : true;
    return $viability;
  }

  function checkNotEquals(int $iniValue, int $finValue) : bool {
    $equals = ($iniValue == $finValue) ? false : true;
    return $equals;
  }

  // Alerta quando há um erro com uma msg específica:
  function errorAlert(string $msg) : void {
    echo("<span class='error'>* ${msg}</span>");
  }

  // Captura as informações do formulário pelo "REQUEST_METHOD" post:
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $start = (int) $_POST["initial"]; 
    $end   = (int) $_POST["final"]; 

    # Executa os funções caso as três funções sejam true:
    if (checkNotEmpty($start, $end) and checkVia($start, $end) and
        checkNotEquals($start, $end)) { 

      $arr_numbers = generateNumbersList();
      $arr_odd     = generateOddNumList();
      $arr_even    = generateEvenNumList();
    }
  }
?>