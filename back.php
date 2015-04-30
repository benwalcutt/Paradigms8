<?php
$incoming = file_get_contents('php://input');

if($incoming != null) {
	$req_dir = $incoming;
}

if(isset($req_dir)) {
	$cur_dir = $req_dir;
}
else
	$cur_dir = getcwd();

$resp = new stdClass();
$resp->loc = $cur_dir;
$resp->dir = glob($cur_dir . "/*", GLOB_ONLYDIR);
$resp->files = glob($cur_dir . "/*.*");
header('Content-Type: application/json');
print(json_encode($resp));
?>
