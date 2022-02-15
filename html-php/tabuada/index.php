<?php
  require_once("../../php/tabuada/calc-tabuada.php");
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
      para aperfeiçoamento do conhecimento da linguagem PHP"
    />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="author" content="Samuel Tank" />

    <!-- Fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,
    300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&
    display=swap"
      rel="stylesheet"
    />

    <title>Home</title>

    <!-- Links CSS -->
    <link rel="stylesheet" href="../../style/home/basic-reset.css" />
    <link rel="stylesheet" href="../../style/home/root.css" />
    <link rel="stylesheet" href="../../style/home/body.css" />
    <link rel="stylesheet" href="../../style/home/menu.css" />
    <link rel="stylesheet" href="../../style/home/header.css" />
    <link rel="stylesheet" href="../../style/home/main.css" />
    <link rel="stylesheet" href="../../style/home/sec-tool.css" />
    <link rel="stylesheet" href="../../style/home/footer.css" />
    <link rel="stylesheet" href="../../style/tabuada/sec-display.css" />
    <link rel="stylesheet" href="../../style/tabuada/header.css" />
    <link rel="stylesheet" href="../../style/tabuada/form-table.css" />
    <link rel="stylesheet" href="../../style/tabuada/output.css" />
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
              <li><a href="#">Calculadora</a></li>
              <li><a href="../media/index.php">Média</a></li>
              <li><a href="./index.php">Tabuada</a></li>
              <li><a href="#">Par/Ímpar</a></li>
            </ul>
          </div>
        </div>

        <!-- Contêiner para o display da ferramenta escolhida -->
        <div class="tool-display">
          <section class="sec-display">
            <header class="sec-display-header">
              <h2>Gerador de Tabuada</h2>
            </header>

            <div class="form-media">
              <form
                action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]));?>" 
                enctype="multipart/form-data"
                id="form-media"
              >
                <fieldset id="table-field">
                  <legend>Tabuada</legend>
                  <label for="table"></label>
                  <input
                    type="number"
                    name="table"
                    id="table"
                    required="required"
                    placeholder="Insira a Tabuada"
                    min="1"
                    max="1000"
                    step="1"
                    title="Insira um valor entre 1 e 1000(inclusos)"
                    value="<?php echo($table);?>"
                  />
                </fieldset>
                <fieldset id="counter-field">
                  <legend>Contador</legend>
                  <label for="counter"></label>
                  <input
                    type="number"
                    name="counter"
                    id="counter"
                    required="required"
                    placeholder="Insira o Contador"
                    min="1"
                    max="1000"
                    step="1"
                    title="Insira um valor entre 1 e 1000(inclusos)"
                    value="<?php echo($counter);?>"
                  />
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
                <div class="mult-table">
                  <?php 
                    # Método para impressão da tabuada:
                    generateTable($table, $counter);
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