<?php
if (isset($_POST['id'])) {
	$existtask = new TasksController();
	$task = $existtask->getOneTask();
}
if (isset($_POST['submit'])) {
	$existProduct = new TasksController();
	$existProduct->updateTask();
}
?>

<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Lilita+One&family=Outfit:wght@200;400;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../Hello/views/css/time.css">
<title>update-task</title>
</head>



<body class="bg-gray-900">
<h1 class="text-center text-gray-500 text-xl font-bold mt-40">Update</h1>
  
<div class="flex justify-center ">


<form class="w-96" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $task->id; ?>">
						</div>  <!-- <input type="text" class="mt-3 focus:outline-none  text-gray-300 bg-gray-800 w-full   py-2 dark:text-gray-400" placeholder="Add a card..." id="inp"> -->
  <input type="text" name="task" value="<?php echo $task->task; ?>" class="mt-3 focus:outline-none  text-gray-300 bg-gray-800 w-full  rounded-md py-2 dark:text-gray-400" placeholder="Add a card..." required>
  <div class="relative rounded-md shadow-sm">
  <select class="mt-3 focus:outline-none rounded-md  text-gray-300 bg-gray-800 w-full py-2 dark:text-gray-400" name="situation">
    <option value="1" >TO DO</option>
    <option value="2" >DOING</option>
    <option value="3" >DONE</option>
  </select>
  <input type="datetime-local" name="date" value="<?php echo $task->task; ?>" min="<?php echo date("Y-m-d H:i");?>" class="bg-blue-400 text-gray-700 rounded-md w-full py-2 mt-4 focus:outline-none pl-2 text-s " required></input>
  
</div>

  <div class="flex justify-around">

    <button type="submit" name="submit" class="mt-3 flex justify-center focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add Task</button>
  </div>
</form>
</div>
</body>
</html>