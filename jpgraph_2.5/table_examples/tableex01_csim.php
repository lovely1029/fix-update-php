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

$table->SetCellCSIMTarget(1,1,'tableex02.php','View details');

$table->SetRowFont(0,FF_FONT1,FS_BOLD);
$table->SetRowColor(0,'navy');
$table->SetRowFillColor(0,'lightgray');

$table->SetColFont(0,FF_FONT1,FS_BOLD);
$table->SetColColor(0,'navy');
$table->SetColFillColor(0,'lightgray');

$graph->Add($table);

$graph->StrokeCSIM();

?>
