<?php
include '../jpgraph.php';
include '../jpgraph_canvas.php';
include '../jpgraph_table.php';

$cols = 4;
$rows = 3;
$data = array( array('','Jan','Feb','Mar','Apr'),
	       array('Min','15.2', '12.5', '9.9', '70.0'),
	       array('Max','23.9', '14.2', '18.6', '71.3'));

$graph = new CanvasGraph(300,200);

$table = new GTextTable($cols,$rows);
$table->Init();
$table->Set($data);
$graph->Add($table);
$graph->Stroke();

?>
