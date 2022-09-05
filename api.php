<?php

$wall_id="guseynov002";
 
$group_id = preg_replace("/-/i", "", $wall_id);

$count = "3";
 
// Токен
$token = "cd1266c1cd1266c1cd1266c158ce02f349ccd12cd1266c1ae046b31367d5229308e7393";
 
$api = file_get_contents("https://api.vk.com/api.php?oauth=1&method=wall.get&owner_id={$wall_id}&count={$count}&v=5.58&access_token={$token}");
 
$wall = json_decode($api);

$wall = $wall->response->items;
 
for ($i = 0; $i < count($wall); $i++) {
	echo "
<b>".($i + 1)."</b>. <i>".$wall[$i]->text."</i><br />
".date("Y-m-d H:i:s", $wall[$i]->date)."<br />
https://vk.com/wall-{$group_id}_{$wall[$i]->id}
";
}