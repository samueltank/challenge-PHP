<?php declare(strict_types=1);
  # Funçoes para gerar uma listas numéricas

  function startIntervalGenerator(int $p_start, int $p_end) : void
  {
    # Gera tags <option> para um <select>:

    $start = (int) $p_start;
    $end   = (int) $p_end; 


    for($cont = (int) $start;/* until break */; $cont++) 
    {
      if($cont == ($end + 1)) break; # ponto de parada com break
      echo("<option value='${cont}'>${cont}</option>");
    }
  }
?>