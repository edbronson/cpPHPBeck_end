<?php
function calcularINSS()
{
  $salario_bruto = $_GET['salario_bruto'];
  $aliquota = 0;
  
 

  $faixaUM = 97.65;
  $faixaDois = 114.23;
  $faixaTres = 154.27;

  if ($salario_bruto <= 1302.00) {
    $aliquota = $salario_bruto * 0.075;
    $salarioSemInss = $salario_bruto - $aliquota;
  } else if ($salario_bruto <= 2571.29) {
    $aliquota =  $faixaUM + (($salario_bruto - 1302.00) * 0.09);
    $salarioSemInss = $salario_bruto - $aliquota;
  } else if ($salario_bruto <= 3856.94) {
    $aliquota =  $faixaUM + $faixaDois + (($salario_bruto - 2571.29) * 0.12);
    $salarioSemInss = $salario_bruto - $aliquota;
  } else if ($salario_bruto <= 7507.49) {
    $aliquota =  $faixaUM + $faixaDois +  $faixaTres + (($salario_bruto - 3856.94) * 0.14);
    $salarioSemInss = $salario_bruto - $aliquota;
  } else {
    $salarioSemInss = $salario_bruto - 877.24;
  }

  return calcularIRRF($salarioSemInss, $aliquota);
}

function calcularIRRF($salarioSemInss, $aliquota)
{
  $numero_Dependentes = $_GET['numero_Dependentes'];
  $irrf = 0;
  $valorLiquido = 0;

  $valorBaseIR1 = $salarioSemInss;
  $valorBaseIR2 = $valorBaseIR1 - ($numero_Dependentes * 189.59);

  switch (true) {
    case ($valorBaseIR2 <= 1903.98):
      $irrf = 0;
      break;
    case ($valorBaseIR2 <= 2826.65):
      $irrf = ($valorBaseIR2 * 0.075) - 142.80;
      break;
    case ($valorBaseIR2 <= 3751.05):
      $irrf = ($valorBaseIR2 * 0.15) - 354.80;
      break;
    case ($valorBaseIR2 <= 4664.68):
      $irrf = ($valorBaseIR2 * 0.225) - 636.13;
      break;
    default:
      $irrf = ($valorBaseIR2 * 0.275) - 869.36;
  }

  $valorLiquido = $salarioSemInss - $irrf;

  return "Valor de IRRF: " . round($irrf, 2) . '<br>' .
  "Valor de INSS: " . round($aliquota, 2) . '<br>' . 
  "Salario liquido: " . round($valorLiquido, 2) ;
}
?>

