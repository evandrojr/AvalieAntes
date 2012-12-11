<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>phpChart - Basic Chart with Custom Javascript</title>
</head>
  
<body>
<style type="text/css">
#basic_chart_4 .jqplot-point-label {
  border: 1.5px solid #aaaaaa;
  padding: 1px 3px;
  background-color: #eeccdd;
}
</style>
<?php
$data1 = array();
$pc = new C_PhpChartX(array($data1),'basic_chart_4');
$pc->set_title(array('text'=>'Basic Chart with Custom JS'));
$pc->set_data_renderer("js::sineRenderer");
$pc->add_plugins(array('pointLabels'));
$pc->set_animate(true);
$pc->draw();
?>
<script>
sineRenderer = function() {
	var data = [[]];
	for (var i=0; i<13; i+=0.5) {
	  data[0].push([i, Math.sin(i)]);
	}
	return data;
  };
</script>

<?php
/*
$data1 = array();
$pc = new C_PhpChartX('./jsondata.txt','basic_chart_ajax');
$pc->set_title(array('text'=>'Basic Chart with Ajax'));
$pc->set_data_renderer("js::ajaxDataRenderer");
$pc->draw();
*/
?>
<script>
var ajaxDataRenderer = function(url, plot) 
		{
			var ret = null;
			$.ajax({
				// have to use synchronous here, else returns before data is fetched
				async: false,
				url: url,
				dataType:'json',
				success: function(data) {
					ret = data;
				}
			});
			return ret;
		};
</script>



</body>
</html>

