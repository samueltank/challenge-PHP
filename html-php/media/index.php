<?php
  require_once("../../php/media/calc-media.php");
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

    <title>Média simples</title>

    <!-- Links CSS -->
    <link rel="stylesheet" href="../../style/home/basic-reset.css" />
    <link rel="stylesheet" href="../../style/home/root.css" />
    <link rel="stylesheet" href="../../style/home/body.css" />
    <link rel="stylesheet" href="../../style/home/menu.css" />
    <link rel="stylesheet" href="../../style/home/header.css" />
    <link rel="stylesheet" href="../../style/home/main.css" />
    <link rel="stylesheet" href="../../style/home/sec-tool.css" />
    <link rel="stylesheet" href="../../style/home/footer.css" />
    <link rel="stylesheet" href="../../style/media/sec-display.css" />
    <link rel="stylesheet" href="../../style/media/header.css" />
    <link rel="stylesheet" href="../../style/media/form-media.css" />
    <link rel="stylesheet" href="../../style/media/output.css" />
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
                <a href="../../html-php/calculadora/index.php">Calculadora</a>
              </li>
              <li><a href="./index.php">Média</a></li>
              <li><a href="../../html-php/tabuada/index.php">Tabuada</a></li>
              <li><a href="../../html-php/impar-par/index.php">Ímpar/Par</a></li>
            </ul>
          </div>
        </div>

        <!-- Contêiner para o display da ferramenta escolhida -->
        <div class="tool-display">
          <section class="sec-display">
            <header class="sec-display-header">
              <h2>Cálculo de Média Simples</h2>
            </header>

            <div class="form-media">
              <form
                action="<?php echo(htmlspecialchars($_SERVER["PHP_SELF"]));?>" 
                enctype="multipart/form-data"
                id="form-media"
                autocomplete="on"
              >
                <fieldset id="fieldset-nota-1">
                  <legend>Nota 1</legend>
                  <label for="grade1"></label>
                  <input
                    type="number"
                    name="grade1"
                    id="grade1"
                    required="required"
                    placeholder="Insira a nota 1"
                    min="0"
                    max="10"
                    step="0.1"
                    title="Insira um valor entre 0 e 10(inclusos)"
                    value="<?php 
                      if($_SERVER["REQUEST_METHOD"] == "POST")
                      echo($arr_grades[0]);
                    ?>"
                  />
                </fieldset>
                <fieldset id="fieldset-nota-2">
                  <legend>Nota 2</legend>
                  <label for="grade2"></label>
                  <input
                    type="number"
                    name="grade2"
                    id="grade2"
                    required="required"
                    placeholder="Insira a nota 2"
                    min="0"
                    max="10"
                    step="0.1"
                    title="Insira um valor entre 0 e 10(inclusos)"
                    value="<?php 
                      if($_SERVER["REQUEST_METHOD"] == "POST")
                      echo($arr_grades[1]);
                    ?>"
                  />
                </fieldset>
                <fieldset id="fieldset-nota-3">
                  <legend>Nota 3</legend>
                  <label for="grade3"></label>
                  <input
                    type="number"
                    name="grade3"
                    id="grade3"
                    required="required"
                    placeholder="Insira a nota 3"
                    min="0"
                    max="10"
                    step="0.1"
                    title="Insira um valor entre 0 e 10(inclusos)"
                    value="<?php 
                      if($_SERVER["REQUEST_METHOD"] == "POST")
                      echo($arr_grades[2]);
                      ?>"
                  />
                </fieldset>
                <fieldset id="fieldset-nota-4">
                  <legend>Nota 4</legend>
                  <label for="grade4"></label>
                  <input
                    type="number"
                    name="grade4"
                    id="grade4"
                    required="required"
                    placeholder="Insira a nota 4"
                    min="0"
                    max="10"
                    step="0.1"
                    title="Insira um valor entre 0 e 10(inclusos)"
                    value="<?php 
                      if($_SERVER["REQUEST_METHOD"] == "POST")
                      echo($arr_grades[3]);
                    ?>"
                  />
                </fieldset>

                <div class="btns">
                  <input 
                    type="submit" 
                    value="Resetar" 
                    formaction="../../html-php/media/index.php"
                    formnovalidate="formnovalidate"
                    />
                  <input type="submit" value="Calcular" formmethod="post" />
                </div>
              </form>
            </div>

            <div class="output-display">
              <fieldset id="result-field">
                <legend>Resultado</legend>
                <label for="result"></label>
                <input
                  type="number"
                  name="result"
                  id="result"
                  placeholder="..."
                  readonly="readonly"
                  value="<?php 
                    if($_SERVER["REQUEST_METHOD"] == "POST")
                    echo($result);
                  ?>"
                  title="O resultado sairá aqui!"
                />
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