<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cálculo do Salário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body class="text-warning bg-dark">
  <div  class="text-bg-dark p-3">
    <h2 class="text-center m-5" >Cálculo do Salário</h2>
    <div >
      <div class="container text-center">
        <div class="row align-items-center justify-content-center">
          <div class="col-6 ">

            <form method="$_GET">
              <div class="text-start mb-4">
                <label class="form-label text-warning bg-dark">Salário:</label>
                <input type="text" class="form-control" placeholder="Digite o valor do salário bruto" name="salario_bruto">
              </div>
              <div class="text-start mb-4">
                <label class="form-label text-warning bg-dark">Dependentes:</label>
                <input type="text" class="form-control" placeholder="Digite o número de dependentes" name="numero_Dependentes">
              </div>
              <div class="mb-4">
                <button type="submit" class="btn btn-outline-warning">Calcule</button>
              </div>
              
            </form>
          </div>
          <h1>Resultado</h1>

          <div class="text-warning">

            <?php
            include "./eder_calculodosalario.php";

            if (isset($_GET["salario_bruto"]) && isset($_GET["numero_Dependentes"])) {
              echo calcularINSS();
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>