<?php if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true) {

Redirect::to('index');} 
?>
<?php 
	if (isset($_POST['id'])) {
		$exittask= new TasksController();
		$exittask->deleteTask();
 	}
?>