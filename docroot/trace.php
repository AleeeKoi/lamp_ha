<?php
require 'vendor/autoload.php';


use Google\Cloud\Trace\TraceClient;
use Google\Cloud\Trace\RequestTracer;
use Google\Cloud\Trace\Reporter\SyncReporter;
use Google\Cloud\Trace\Sampler\RandomSampler;
 
$trace = new TraceClient();
$reporter = new SyncReporter($trace);
$sampler = new RandomSampler(0.9); 
RequestTracer::start($reporter, ['sampler' => $sampler]);
 
$p = RequestTracer::inSpan(['name' => 'some-expensive-operation'], function() {
      sleep(1); 
      return "done span 1";
});	
echo $p."<br/>";
 
$p = RequestTracer::inSpan(['name' => 'another-expensive-operation'], function() {
      sleep(3); 
      return "done span2";
});	
echo $p."<br/>";
echo "<br/>";

echo "Trace successful";
?>