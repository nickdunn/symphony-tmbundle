<?php

function createPrivateFunctionName($name) {
	$exploded = str_split($name);
	$name = strtolower(reset($exploded));
	unset($exploded[0]);
	$name .= implode("", $exploded);
	return $name;
}

function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12);
        return $uuid;
    }
}


$delegates = simplexml_load_file('_docs/delegates.xml');
foreach($delegates->xpath('//delegate') as $delegate) {
	
	$fh = fopen('Symphony-tmbundle/Snippets/' . $delegate->attributes()->name . '.tmSnippet', 'w');
	
	$context = $delegate->xpath('parameters/parameter[@name="context"]/description/p');
	if(!$context) {
		continue;
	}
	$context = reset($context);
	$context = trim((string)$context, "'");
	
	$content = sprintf("array(
	'page' =&gt; '%s',
	'delegate' => '%s',
	'callback' => '%s'
),
", $context, $delegate->attributes()->name, createPrivateFunctionName($delegate->attributes()->name));

	$body = sprintf(file_get_contents('snippet.txt'), $content, $delegate->attributes()->name, guid());

	fwrite($fh, $body);
	fclose($fh);
	
}

$packages = simplexml_load_file('_docs/packages.xml');
$items = '';
foreach($packages->xpath('//*[@name and name() != "package"]') as $item) {
	$items .= '<string>'.$item->attributes()->name.'</string>' . "\n";
}
$fh = fopen('Symphony-tmbundle/Preferences/Completions.tmPreferences', 'w');
$completions = sprintf(file_get_contents('completions.txt'), $items, guid());
fwrite($fh, $completions);
fclose($fh);

$output = shell_exec("cp -rf Symphony-tmbundle /Users/nick/Library/Application\ Support/TextMate/Bundles/Symphony.tmbundle");