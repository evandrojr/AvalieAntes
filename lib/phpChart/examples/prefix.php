<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Tick Prefix Example</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>


<?php
    
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $data = array( array(25,100), array(26,0), array(27,100), array(28,0), array(29,0), array(30,300), array(31,300));
  
    $pc = new C_PhpChartX(array($data),'chart1');
    $pc->add_plugins(array('barRenderer','categoryAxisRenderer'),true);

    $pc->set_title(array('text'=>'Test'));
    $pc->set_axes(array(
    		'xaxis'=> array('renderer'=> 'plugin::CategoryAxisRenderer'),
    		'yaxis'=> array('min'=>0, 'tickOptions'=>array('prefix'=> '$'))
    	));
    $pc->set_series_default(array(
    		'color'=> '#F90',
    		'renderer'=> 'plugin::BarRenderer',
    		'shadow'=> false
    	));
    $pc->draw(600,400);       
  

    ?>

    </body>
</html>