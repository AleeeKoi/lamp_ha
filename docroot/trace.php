<?php
require 'vendor/autoload.php';


use Google\Cloud\Trace\TraceClient;

$client = new TraceClient();
$trace = $client->trace();
$span = $trace->span(['name' => 'main']);
$trace->setSpans([$span]);

$client->insert($trace);

echo "<br/>";

echo "Trace successful";
?>
