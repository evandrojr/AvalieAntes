<?php
include_once "lib/highchartsphp/Highchart.php";
require_once "config.php";


$rs = $pdo->query("SELECT * FROM mais_reclamacoes")->fetchAll();
if(!$rs){
   print_r($pdo->errorInfo());
}


$empresaAr = array();
$reclamacoesAr = array();
$atendidasAr = array();

$maxEmpresas = 15;
foreach ($rs as $reg){
        if(!$maxEmpresas)
                     break;
        $empresaAr[] =  str_replace("S/ A", "S/A", str_replace("/","/ ", $reg['Empresa']));
        $naoAtendidasAr[] = intval($reg[3]) - intval($reg[4]);
        $atendidasAr[] =  intval($reg[4]);
        $maxEmpresas-=1;
}    



$chart = new Highchart();

$chart->chart->renderTo = "container";
$chart->chart->type = "column";
$chart->title->text = "Stacked column chart";
$chart->xAxis->categories = $empresaAr;
$chart->yAxis->min = 0;
$chart->yAxis->title->text = "Reclamações por empresa";
$chart->title->text = "Empresas com mais reclamaçoes no Procon em 2011";
$chart->subtitle->text = "Fonte: http://dados.gov.br";
$chart->yAxis->stackLabels->enabled = 1;
$chart->yAxis->stackLabels->style->fontWeight = "bold";
$chart->yAxis->stackLabels->style->color = new HighchartJsExpr("(Highcharts.theme && Highcharts.theme.textColor) || 'gray'");
$chart->legend->align = "right";
$chart->legend->x = -100;
$chart->legend->verticalAlign = "top";
$chart->legend->y = 20;
$chart->legend->floating = 1;
$chart->legend->backgroundColor = new HighchartJsExpr("(Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white'");
$chart->legend->borderColor = "#CCC";
$chart->legend->borderWidth = 1;
$chart->legend->shadow = false;

$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '<b>'+ this.x +'</b><br/>'+
    this.series.name +': '+ this.y +'<br/>'+
    'Total: '+ this.point.stackTotal;}");

$chart->plotOptions->column->stacking = "normal";
$chart->plotOptions->column->dataLabels->enabled = 1;
$chart->plotOptions->column->dataLabels->color = new HighchartJsExpr("(Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'");


$chart->series[] = array('name' => "Reclamações atendidas",
                         'data' => $atendidasAr);

$chart->series[] = array('name' => "Reclamações não atendidas",
                         'data' => $naoAtendidasAr);


?>

<html>
  <head>
    <title>Stacked column</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
      foreach ($chart->getScripts() as $script) {
         echo '<script type="text/javascript" src="' . $script . '"></script>';
      }
    ?>
  </head>
  <body>
    <div id="container"></div>
    <script type="text/javascript">
    <?php
      echo $chart->render("chart1");
    ?>
    </script>
  </body>
</html>
