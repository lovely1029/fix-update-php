<?

// init2
$id = $_POST['id']?$_POST['id']:$_GET['id'];
$back_page = $_POST['back_page']?$_POST['back_page']:$_GET['back_page'];

$UserWilshire = UserPeer::retrieveByPK($id);

if($UserWilshire === null) {
	$urlLocation = sprintf("%s?page=%s&rand=%d&bad_id", $_SERVER['SCRIPT_NAME'], PAGE_PARENT_C, rand(100000, 999999));
	header('Location: '. $urlLocation);
	exit;
}



