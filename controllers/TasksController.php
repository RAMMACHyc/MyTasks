<?php

class TasksController
{

	public function gettodo()
	{
		$task = tasks::getAll();
		return $task;
	}


	public function getTotal()
	{
		$task = tasks::total();
		

		return $task;
	}
	public function stocktodo()
	{
		$task = tasks::stocktodo();
		

		return $task;
	}
	public function stockdoing()
	{
		$task = tasks::stockdoing();
		

		return $task;
	}
	public function stockdone()
	{
		$task = tasks::stockdone();
		

		return $task;
	}



	public function addTask() {
		if (isset($_POST['submit'])) {
		  // Check if any of the form fields are empty
		  if (empty($_POST['task'])) {
			// Display error message
			echo "All form fields are required. Please fill out the form and try again.";
		  } else {
                $data = array();
                // loop through the  task, statut, date  arrays
                foreach ($_POST['task'] as $key => $task) {
                    $data[$key]['task'] = $task;
					$data[$key]['date'] = $_POST['date'][$key];
                }

			$result = tasks::add($data);
			if($result === 'ok'){
			  // Form was submitted successfully
			  header("Refresh:0");

			}else{
			  echo $result;
			}
		  }
		}
	  }
	
	 public function getOneTask()
	 {
		 if (isset($_POST['id'])) {
			 $data = array(
				 'id' => $_POST['id'],
			 );
			 $task = tasks::gettask($data);
			 return $task;
		 }
	 }

	public function updateTask()
	{
		if (isset($_POST['submit'])) {
			$data = array(
				'id' => $_POST['id'],
				'task' => $_POST['task'],
				'situation' => $_POST['situation'],
				'date' => $_POST['date'],
			
			);
	
			$result = Tasks::update($data);
			if ($result === 'ok') {
				Redirect::to('index');
			} else {
				echo $result;
			}
		}
	}
	public function deleteTask(){
		if(isset($_POST['id'])){
			$data['id'] = $_POST['id'];
			$result = Tasks::delete($data);
			if($result === 'ok'){
				Redirect::to('index');
			}else{
				echo $result;
			}
		}
	}
}
?>
