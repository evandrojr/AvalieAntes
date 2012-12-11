<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Image Export Demo</title>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $line1 = array(6.75, 14, 10.75, 5.125, 10);
    $line2 = array(1, 4, 5, 2, 2);

    $tickers = array('2008-03-01', '2008-04-01', '2008-05-01', '2008-06-01', '2008-07-01');
    
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Chart 1 Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $pc = new C_PhpChartX(array($line1,$line2),'chart2');
    $pc->add_plugins(array('canvasTextRenderer'));

    
    
    $pc->set_stack_series(array('stackSeries'=>true));
    $pc->set_legend(array('show'=>true,'location'=>'ne'));
    $pc->set_title(array('text'=>'Data per month stack by user'));
    $pc->set_series_default(array(
        'renderer'=>'plugin::BarRenderer',
        'rendererOptions'=>array('barWidth'=>20)
    ));
    
    $pc->add_series(array('label'=>'User1'));
    $pc->add_series(array('label'=>'User2'));

    $pc->set_axes(array(
        'xaxis'=>array(
			'renderer'=>'plugin::CategoryAxisRenderer',
			'ticks'=>$tickers,
			'rendererOptions'=>array(),
			'tickOptions'=>array()),
        'yaxis'=>array('min'=>0)
    ));
    
    $pc->draw(400,300);
    ?>

	<script type="text/javascript">
$(document).ready(function(){

    if (!$.jqplot.use_excanvas) {
        $('div.jqplot-target').each(function(){
            // Add a view image button
            var btn = $(document.createElement('button'));
            btn.text('View as PNG');
            btn.bind('click', {chart: $(this)}, function(evt) {
            evt.data.chart.jqplotViewImage();
            });
            $(this).after(btn);

            // add a save image button
            btn = $(document.createElement('button'));
            btn.text('Save as PNG');
            btn.bind('click', {chart: $(this)}, function(evt) {
              evt.data.chart.jqplotSaveImage();
            });
            $(this).after(btn);
            btn = null;
        });
    }

    //$('#chart2').CanvasHack();
});
</script>

    </body>
</html>