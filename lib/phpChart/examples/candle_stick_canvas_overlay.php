<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Candle Stick</title>
</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Candle Stick Chart Example
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    $ohlc = array(array('1/24/2011', 607.57, 612.49, 601.23, 611.08),
        array('1/21/2011', 639.58, 641.73, 611.36,   611.83),
        array('1/20/2011', 632.21, 634.08, 623.29,   626.77),
        array('1/19/2011', 642.12, 642.96, 629.66,   631.75),
        array('1/18/2011', 626.06, 641.99, 625.27,   639.63),
        array('1/14/2011', 617.4, 624.27, 617.08,   624.18),
        array('1/13/2011', 616.97, 619.67, 614.16,   616.69),
        array('1/12/2011', 619.35, 619.35, 614.77,   616.87),
        array('1/11/2011', 617.71, 618.8, 614.5,  616.01),
        array('1/10/2011', 614.8, 615.39, 608.56,   614.21),
        array('1/7/2011', 615.91, 618.25, 610.13,   616.44),
        array('1/6/2011', 610.68, 618.43, 610.05,  613.5),
        array('1/5/2011', 600.07, 610.33, 600.05,   609.07),
        array('1/4/2011', 605.62, 606.18, 600.12,   602.12),
        array('1/3/2011', 596.48, 605.59, 596.48,   604.35),
        array('12/31/2010', 596.74, 598.42, 592.03,   593.97),
        array('12/30/2010', 598, 601.33, 597.39,   598.86),
        array('12/29/2010', 602, 602.41, 598.92,   601),
        array('12/28/2010', 602.05, 603.87, 598.01,   598.92),
        array('12/27/2010', 602.74, 603.78, 599.5,   602.38),
        array('12/23/2010', 605.34, 606, 602.03,   604.23),
        array('12/22/2010', 604, 607, 603.28,   605.49),
        array('12/21/2010', 598.57, 604.72, 597.61,   603.07),
        array('12/20/2010', 594.65, 597.88, 588.66,   595.06),
        array('12/17/2010', 591, 592.56, 587.67,  590.8),
        array('12/16/2010', 592.85, 593.77, 588.07,   591.71),
        array('12/15/2010', 594.2, 596.45, 589.15,  590.3),
        array('12/14/2010', 597.09, 598.29, 592.48,   594.91),
        array('12/13/2010', 597.12, 603, 594.09,   594.62),
        array('12/10/2010', 593.14, 593.99, 590.29,  592.21),
        array('12/9/2010', 593.88, 595.58, 589,   591.5),
        array('12/8/2010', 591.97, 592.52, 583.69,   590.54),
        array('12/7/2010', 591.27, 593, 586,   587.14),
        array('12/6/2010', 580.57, 582, 576.61,   578.36),
        array('12/3/2010', 569.45, 576.48, 568,   573),
        array('12/2/2010', 568.66, 573.33, 565.35,   571.82),
        array('12/1/2010', 563, 571.57, 562.4,  564.35),
        array('11/30/2010', 574.32, 574.32, 553.31,   555.71),
        array('11/29/2010', 589.17, 589.8, 579.95,  582.11),
        array('11/26/2010', 590.46, 592.98, 587,   590),
        array('11/24/2010', 587.31, 596.6, 587.05,   594.97),
        array('11/23/2010', 587.01, 589.01, 578.2,   583.01),
        array('11/22/2010', 587.47, 593.44, 582.75,   591.22),
        array('11/19/2010', 597, 597.89, 590.34,   590.83),
        array('11/18/2010', 589, 599.98, 588.56,   596.56),
        array('11/17/2010', 585, 589.5, 581.37,  583.55),
        array('11/16/2010', 592.76, 597.89, 583.45,   583.72),
        array('11/15/2010', 603.08, 604, 594.05,  595.47),
        array('11/12/2010', 613.99, 616.9, 601.21,   603.29),
        array('11/11/2010', 619.7, 619.85, 614.21,   617.19),
        array('11/10/2010', 622.08, 623, 617.51, 622.88),
        array('11/9/2010', 630, 630.85, 620.51,   624.82),
        array('11/8/2010', 624.02, 629.49, 623.13,   626.77),
        array('11/5/2010', 623.18, 625.49, 621.11,   625.08),
        array('11/4/2010', 624.64, 629.92, 622.1,   624.27),
        array('11/3/2010', 617.5, 621.83, 613.5,   620.18),
        array('11/2/2010', 618.67, 620, 614.58,  615.6),
        array('11/1/2010', 615.73, 620.66, 611.21,   615),
        array('10/29/2010', 617.07, 619, 612.99,   613.7),
        array('10/28/2010', 620.05, 621, 613.3,  618.58));
    
    $pc = new C_PhpChartX(array($ohlc),'plot1','default','',array('ohlc'));
    $pc->add_plugins(array('dateAxisRenderer','categoryAxisRenderer','ohlcRenderer','canvasOverlay'));
    $pc->sort_data(true);
	$pc->set_animate(true);
    $pc->set_title(array('text'=>'Chart'));
    $pc->set_axes_default(array());
    $pc->set_axes(array(
         'xaxis'=>array(
			'renderer'=>'plugin::DateAxisRenderer',
			'tickOptions'=>array('formatString'=>'%b %e')),
         'yaxis'=>array(
			'min'=>560,
			'max'=>650,
			'tickOptions'=>array('formatString'=>'%.2f'))
    ));
    $pc->add_series(array(
			'renderer'=>'plugin::OHLCRenderer',
			'rendererOptions'=>array('candleStick'=>true)));

    $pc->draw(600,400);
?>
<script lang="text/javascript">
$(document).ready(function(){ 
	$('#start').click(function (){
		startit();
	});
	$('#stop').click(function (){
		stopit();
	});

	var j = new $.jsDate();
	for (var i=0; i<ohlc.length; i++) {
		j.add(-1, 'day');
	}
        
	function startit() {
		counter = 0;
		Interval = setInterval(runUpdate, 250);
	}

	function runUpdate() {
		if (counter < 1000) {
			var val = Math.random()*5 * (Math.random() - 0.5),
					d = plot1.series[0].data,
					dl = d.length,
					curhi = d[dl - 1][2],
					curlo = d[dl - 1][3],
					curclose = d[dl - 1][4];
					newval = curclose + val;


			if (newval > curhi) { curhi = newval }
			else if (newval < curlo) { curlo = newval }

			d[dl - 1][2] = curhi;
			d[dl - 1][3] = curlo;
			d[dl - 1][4] = newval;

			if (curhi > plot1.axes.yaxis.max) {

			}
			else if (curlo < plot1.axes.yaxis.min) {

			}

			else {
					plot1.drawSeries({}, 0);
					counter++;
			}

			val = d = dl = curhi = curlo = curclose = newval = null;
		}
		else {
			val = d = dl = curhi = curlo = curclose = newval = null;
			clearInterval(Interval);
		}
	}

	function stopit() {
		clearInterval(Interval);
	}
});
</script>

<button id="start">Start</button>
<button id="stop">Stop</button>

    </body>
</html>