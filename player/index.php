<?php
require_once('../utils/common.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>加载中</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">
	<style>
		html{position: absolute;width: 100%;height:100%;background-repeat: no-repeat;background-position: center;}
	</style>
</head>
<body>
</body>
<script>
var ua=navigator.userAgent,
	touchMode=(ua.match(/mobile/i) || ua.match(/android/i))&& ('ontouchstart' in window),//touch player
	NyaPTime=<?php modTime('static/NyaP');?>;

var playerName='NyaP'+(touchMode?"Touch":"");
console.log('load player',playerName);
document.write(
	"<style>@import url('"+"../static/NyaP/"+playerName+".css?"+NyaPTime+"')</style>"+
	"<script src='../static/NyaP/"+playerName+".js?"+NyaPTime+"'><\/script>"
);
var NyaP_plugins=JSON.parse('<?php
	$plugin_list=glob('plugins/*.js');
	if(count($plugin_list)>0){
		$name_list=array();
		foreach($plugin_list as $name) {
			array_push($name_list, $name.'?'.modTime('player/'.$name,false));
		}
		echo json_encode($name_list);
	}else{
		echo '""';
	}
?>');
var playerOpt='<?php echo defined("playerOpt")?base64_encode(playerOpt):'';?>';

</script>
<script src='../static/api.js?<?php modTime('static/api.js');?>'></script>
<script src='../static/playPage.js?<?php modTime('static/playPage.js');?>'></script>
</html>