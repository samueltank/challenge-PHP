<?php
  require_once("../../php/impar-par/listGenerate.php");
  require_once("../../php/impar-par/calc-impar-par.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Metadados do documento -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Plataforma de cálculo; realizada a pedido do professor Marcel 
      para aperfeiçoamento do conhecimento na linguagem PHP"
    />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="author" content="Samuel Tank" />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link 
      rel="preconnect" 
      href="https://fonts.gstatic.com" 
      crossorigin="crossorigin" 
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,
      300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&
      display=swap"
      rel="stylesheet"
    />

    <title>Impar & Par</title>

    <!-- Links CSS -->
    <link rel="stylesheet" href="../../style/home/basic-reset.css" />
    <link rel="stylesheet" href="../../style/home/root.css" />
    <link rel="stylesheet" href="../../style/home/body.css" />
    <link rel="stylesheet" href="../../style/home/menu.css" />
    <link rel="stylesheet" href="../../style/home/header.css" />
    <link rel="stylesheet" href="../../style/home/main.css" />
    <link rel="stylesheet" href="../../style/home/sec-tool.css" />
    <link rel="stylesheet" href="../../style/home/footer.css" />
    <link rel="stylesheet" href="../../style/impar-par/sec-display.css" />
    <link rel="stylesheet" href="../../style/impar-par/header.css" />
    <link rel="stylesheet" href="../../style/impar-par/form-table.css" />
    <link rel="stylesheet" href="../../style/impar-par/output.css" />
    <link rel="stylesheet" href="../../style/impar-par/error-msg.css" />
  </head>
  <body>
    <!-- Header do documento(página) -->
    <header class="doc-header">
      <h1>Plataforma de cálculo em PHP</h1>
      <span class="line"></span>
    </header>
    <!-- Conteúdo principal do documento -->
    <main class="doc-main">
      <section class="sec-tool">
        <!-- Contêiner do menu hamburguer -->
        <div class="container-list-menu">
          <div class="container-menu" id="container-menu">
            <!-- Menu -->
            <span class="humb-menu"></span>
            <span class="humb-menu"></span>
            <span class="humb-menu"></span>
          </div>
          <div class="list" id="list">
            <span class="ponta"></span>
            <ul class="list-opc">
              <li><a href="../../index.htm">Home</a></li>
              <li>
                <a href="../../html-php//calculadora/index.php">Calculadora</a>
              </li>
              <li><a href="../../html-php/media/index.php">Média</a></li>
              <li><a href="../../html-php/tabuada/index.php">Tabuada</a></li>
              <li><a href="./index.php">Ímpar/Par</a></li>
            </ul>
          </div>
        </div>

        <!-- Contêiner para o display da ferramenta escolhida -->
        <div class="tool-display">
          <section class="sec-display">
            <header class="sec-display-header">
              <h2>Quais números são pares e quais são ímpares?</h2>
            </header>

            <div class="form-media">
              <form
                action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]));?>" 
                enctype="multipart/form-data"
                id="form-media"
                autocomplete="on"
              >
                <fieldset id="initial-num-field">
                  <legend>Nº inicial</legend>
                  <label for="initial"></label>
                  <select 
                    name="initial" 
                    id="initial"
                  >
                    <option 
                      value="-1"  
                      selected="selected"
                    >Escolha uma opção</option>
                    <?php 
                      # Cria opções da lista suspensa:
                      echo(startIntervalGenerator(0, 500));
                    ?>
                  </select>
                  <?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                      if ($start == (-1)) {
                        echo(errorAlert("Escolha um número"));
                      }
                      if (!checkVia($start, $end)) {
                        echo(errorAlert("Número inicial maior que o final"));
                      }
                      if (!checkNotEquals($start, $end) and ($start != (-1))) {
                        echo(errorAlert("Números iguais!"));
                      }
                    }
                  ?>
                </fieldset>
                <fieldset id="final-num-field">
                  <legend>Nº Final</legend>
                  <label for="final"></label>
                  <select 
                    name="final" 
                    id="final"
                  >
                    <option 
                      value="-1"
                      selected="selected" 
                    >Escolha uma opção</option>
                    <?php 
                      # Cria opções da lista susptensa:
                      echo(startIntervalGenerator(100, 1000));
                    ?>
                  </select>
                  <?php
                    # Alerto sobre erro de caixa vazia:
                    if($_SERVER["REQUEST_METHOD"] == "POST") {
                      if($end == (-1)) {
                        echo(errorAlert("Escolha um número"));
                      }
                    }
                  ?>
                </fieldset>

                <div class="btns">
                  <input 
                    type="submit" 
                    value="Resetar" 
                    formaction="./index.php"
                    formnovalidate="formnovalidate" 
                  />
                  <input type="submit" value="Gerar" formmethod="post" />
                </div>
              </form>
            </div>

            <div class="output-display">
              <fieldset id="field-result">
                <legend>Resultado</legend>
                <label for="result"></label>
                  <fieldset id="field-odd">
                    <legend>Ímpares</legend>
                    <div class="odd-ones">
                      <?php 
                        # Listar o array de Ímpares
                        if($_SERVER["REQUEST_METHOD"] == "POST") 
                        displayOddList();
                      ?>
                    </div>
                  </fieldset>
                  <div class="total">
                    <?php 
                      if ($_SERVER["REQUEST_METHOD"] == "POST")
                      if (!empty($arr_odd))
                      echo("Total de Ímpares: ".count($arr_odd));
                    ?>
                  </div>
                  <fieldset id="field-pairs">
                    <legend>Pares</legend>
                    <div class="pairs">
                      <?php 
                        # Listar o array de Pares
                        if($_SERVER["REQUEST_METHOD"] == "POST")
                        displayEvenList()
                      ?>
                    </div>
                  </fieldset>
                  <div class="total">
                  <?php 
                    if ($_SERVER["REQUEST_METHOD"] == "POST")
                    if (!empty($arr_even))
                    echo("Total de pares: ".count($arr_even));
                  ?>
                  </div>
              </fieldset>
            </div>
          </section>
        </div>
      </section>
    </main>
    <!-- Footer do documento -->
    <footer class="doc-footer">
      <p><address>&copy;Sam Tank</address></p>
    </footer>
    <script src="../../menu-animation.js" defer="defer"></script>
  </body>
</html>