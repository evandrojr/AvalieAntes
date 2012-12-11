<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
		<title>phpChart - Series Update</title>
	</head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

	<form action="#" onsubmit="return updatePoint();">
	Series: <select name="seriesId">
		<option value="0">lions</option>
		<option value="1">tigers</option>
		<option value="2">bears</option>
	</select>
	Point: <select name="pointId">
		<option value="0">first</option>
		<option value="1">second</option>
		<option value="2">third</option>
		<option value="3">fourth</option>
		<option value="4">fifth</option>
	</select>
	X: <input type="text" size="3" name="xvalue" />
	Y: <input type="text" size="3" name="yvalue" />
	<input type="submit" name="submit" value="Update" />
	</form>

	<script type="text/javascript" lang="javascript">
	function updatePoint() {
        var f = document.forms[0];
        var seriesIndex = f.seriesId.selectedIndex;
        var series = plot1.series[seriesIndex];
        var data = series.data[f.pointId.selectedIndex];
        var xval = parseFloat(f.xvalue.value);
        var yval = parseFloat(f.yvalue.value);
        data[0] = xval;
        data[1] = yval;
        plot1.drawSeries({}, seriesIndex);
        return false;
    }
    
    function updateSeries() {
        plot1.series[2].data = [[1,4], [2,6], [3,4], [4,1], [5,7]];
        plot1.drawSeries({}, 2);
        return false;
    }
	</script>

<?php


$l1 = array(2, 3, 1, 4, 3);
$l2 = array(1, 4, 3, 2, 5);
$l3 = array(7, 9, 11, 6, 8);

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Chart 1 Example
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$pc = new C_PhpChartX(array($l1,$l2,$l3),'plot1');
$pc->add_plugins(array('highlighter'),true);

$pc->set_legend(array('show'=>true));
$pc->add_series(array('label'=>'lions'));
$pc->add_series(array('label'=>'tigers'));
$pc->add_series(array('label'=>'bears'));
$pc->draw(600,400);       

?> 


    </body>
</html>