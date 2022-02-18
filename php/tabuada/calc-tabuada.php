<?php  declare(strict_types=1); // Torna o script mais rigoroso, retorna erro.
  
  # Declaração de variáveis:
  $table    = (int) 0;
  $counter  = (int) 0;
  
  function generateTable(int $pTable, int $pCounter) {
    global $table, $counter;
    
    $table   = $pTable;
    $counter = $pCounter;

    for($count = (int) 0; $count <= $counter; $count++) {
      $result = ($count * $table);
      echo("$table x $count = $result <br /> ");
    }
  }

  if($_SERVER["REQUEST_METHOD"] == "POST") {
    global $counter, $table;

    $counter = $_POST["counter"];
    $table   = $_POST["table"];
  }
?>