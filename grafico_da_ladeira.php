<?php
include_once "lib/highchartsphp/Highchart.php";

$chart = new Highchart();

$chart->chart->renderTo = "container";
$chart->chart->zoomType = "xy";
$chart->title->text = "Empresas com mais reclamaçoes no Procon em 2011";
$chart->subtitle->text = "Fonte: http://dados.gov.br/dataset/cadastro-nacional-de-reclamacoes-fundamentadas-procons-sindec";


$pdo = new PDO("mysql:host=localhost;dbname=procon;charset=utf-8", "root", "");
if(!$pdo){
    die('Erro ao criar a conexão');
}
$pdo -> exec("SET CHARACTER SET utf8");


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
        //echo 'Código: ' . $reg[0] . '<br />';
        //echo 'Código: ' . $reg[1] . '<br />';
        $empresaAr[] =  str_replace("S/ A", "S/A", str_replace("/","/ ", $reg['Empresa']));
        $reclamacoesAr[] = intval($reg['Reclamacoes']);
        $atendidasAr[] = intval($reg[5]);
        $maxEmpresas-=1;

   //echo $reg['Reclamacoes'] . '<br />';
   //echo $reg[5] . '<br /><br />';
}    


//$chart->xAxis = array(array('categories' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')));

//print_r($rs);

$chart->xAxis = array(array('categories' => $empresaAr));

$leftYaxis = new HighchartOption();

$leftYaxis->labels->formatter = new HighchartJsExpr("function() {
    return this.value +'%'; }");

$leftYaxis->labels->style->color = "#89A54E";
$leftYaxis->title->text = "Perc reclamações NÃO atendidas";
$leftYaxis->title->style->color = "#89A54E";

$rightYaxis = new HighchartOption();
$rightYaxis->title->text = "Número de reclamações";
$rightYaxis->title->style->color = "#4572A7";

$rightYaxis->labels->formatter = new HighchartJsExpr("function() {
    return this.value; }");

$rightYaxis->labels->style->color = "#4572A7";
$rightYaxis->opposite = 1;
$chart->yAxis = array($leftYaxis, $rightYaxis);

$chart->tooltip->formatter = new HighchartJsExpr("function() {
    return '' + this.x +': '+ this.y +
    (this.series.name == 'Número de reclamações' ? ' reclamações ' : '% das reclamações NÃO foram atendidas'); }");

$chart->legend->layout = "vertical";
$chart->legend->align = "left";
$chart->legend->x = 120;
$chart->legend->verticalAlign = "top";
$chart->legend->y = 100;
$chart->legend->floating = 1;
$chart->legend->backgroundColor = "#FFFFFF";

$chart->series[] = array('name' => "Número de reclamações",
                         'color' => "#4572A7",
                         'type' => "column",
                         'yAxis' => 1,
                         'data' => $reclamacoesAr);

$chart->series[] = array('name' => "% Reclamações NÃO atendidas",
                         'color' => "#89A54E",
                         'type' => "spline",
                         'data' => $atendidasAr);
?>

<html>
  <head>
    <title>Dual axes line and column</title>
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





