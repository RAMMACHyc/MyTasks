<?php

$data = new TasksController();
$tasks = $data->getTotal();
$totaltodo = $data->stocktodo();
$totaldoing = $data->stockdoing();
$totaldone = $data->stockdone();

$data = new TasksController();
$tasks = $data->gettodo();
?>
<?php
if (isset($_POST['submit'])) {
    $newtask = new TasksController();
    $newtask->addTask();
}
?>
<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">


        <title>TaSks</title>


    </head>

    <body>


        <div>
            <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased b bg-gradient-to-r from-gray-800 via-gray-700 to-gray-700  text-black dark:text-white">

                <!-- Header -->
                <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
                    <div class="flex items-center justify-start md:justify-center pl-3 w-14 md:w-64 h-14  dark:bg-gray-800 border-none">
                        <img class="w-7 h-7 md:w-10 md:h-10 mr-2 rounded-md overflow-hidden" src="../../Hello/images/Red minimalist people line logo (1).png" />
                        <span class="hidden md:block">TaSks</span>
                    </div>
                    <div class="flex justify-between items-center h-14  dark:bg-gray-800 header-right">
                        <div class="bg-white rounded flex items-center w-full max-w-xl mr-4 p-2 shadow-sm border border-gray-200">
                            <button class="outline-none focus:outline-none">
                                <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                            <input type="text" name="" id="search" placeholder="Search" class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
                        </div>
                        <ul class="flex items-center">

                            <li>
                                <div class="block w-px h-6 mx-3  dark:bg-gray-700"></div>
                            </li>
                            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] === true) { ?>
                                <li>
                                    <a href="logout" class="flex items-center mr-4 hover:text-blue-100">
                                        <span class="inline-flex mr-1">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                        </span> Logout
                                    </a>
                                </li>
                            <?php  } ?>
                            <li>

                        </ul>
                    </div>
                </div>
                <!-- Header -->

                <!-- Sidebar -->
                <div class="fixed flex flex-col  top-14 left-0 w-14  hover:w-64 md:w-64   bg-gradient-to-r from-gray-800 via-gray-800 to-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
                    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                        <ul class="flex flex-col py-4 space-y-1">
                            <li class="px-5 hidden md:block">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                                </div>
                            </li>
                            <li>
                                <a href="home" class="relative flex flex-row items-center h-11 focus:outline-none  dark:hover:bg-gray-700  text-white-600 hover:text-white-800 border-l-4 border-transparent  dark:hover:border-gray-800 pr-6">
                                    <span class="inline-flex justify-center items-center ml-4">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm tracking-wide truncate">Home</span>
                                </a>
                            </li>




                        </ul>
                        <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs">&copy; Copyright @TaSks-2023</p>
                    </div>
                </div>
                <!-- Sidebar -->

                <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
                    <!-- Tasks -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3  p-4 gap-4  dark:text-white">
                        <div class="md:col-span-2 xl:col-span-3">
                            <h2 id="message" class="text-lg font-semibold">Task summaries of recent sprints</h2>
                        </div>
                        <div class="box md:col-span-2 xl:col-span-1">
                            <div class="rounded  dark:bg-purple-50 p-3">
                                <div class="flex justify-between py-1 text-black dark:text-white">
                                    <h3 id="1" class="text-sm text-gray-600 font-semibold">Tasks in TO DO</h3>

                                    <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                                    </svg>
                                </div>

                                <div class="input-group"></div>
                                <?php foreach ($tasks as $task) : ?>
                                    <?php
                                    if (isset($task['task']) && $task['situation'] == 1 && ($task['date'])) {
                                    ?>

                                        <div class="w-full  dark:bg-indigo-400  dark:hover:bg-indigo-500 p-2 rounded mt-1 border-b  dark:border-indigo-600 cursor-pointer">
                                            <p class="tasks"><?php echo $task['task']; ?></p>

                                            <form method="POST" class="mr-1" action="update">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-warning"><i id="btn" class="bi  bi-pencil-square"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-danger"><i id="btn" class="bi  bi-trash3-fill"></i></button>
                                                <p class="tasks text-xs text-right text-indigo-800"><?php echo $task['date']; ?><i class="bi ml-1 bi-clock-fill"></i></p>



                                            </form>

                                        </div>
                                    <?php
                                    }
                                    ?>

                                <?php endforeach; ?>
                                <div class="text-sm  dark:text-gray-50 mt-2">




                                    <form method="post" enctype="multipart/form-data" id="form-1">
                                        <div class="form-fieldset">


                                            <input type="text" name="task[]" class="mt-3 focus:outline-none   bg-purple-50 w-full   py-2 dark:text-gray-400" placeholder="Add a task..." >
                                            <input type="datetime-local" name="date[]" min="<?php echo date("Y-m-d H:i"); ?>" class=" text-gray-700  bg-gray-100 rounded-md w-auto h-8 focus:outline-none pl-2 text-s" ></input>



                                        </div>
                                        <div class="flex justify-around">

                                            <button type="submit" name="submit" class="mt-3 flex justify-center focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add Task</button>
                                            <button type="button" class="add-more mt-3 flex justify-center focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-gray-700 dark:hover:bg-gray-800 dark:focus:ring-gray-900 ">Add More</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                // Clone the first form fieldset and add a button to remove it
                                var formFieldset = document.querySelector(".form-fieldset").cloneNode(true);
                                var removeBtn = document.createElement("button");
                                removeBtn.classList.add("remove-fieldset", "bg-pink-400","rounded-md","w-20","ml-14","mt-1");
                                removeBtn.innerHTML = "Remove";
                                formFieldset.appendChild(removeBtn);


                                // Add click event listener to the "Add More" button
                                var addMoreBtn = document.querySelector(".add-more");
                                addMoreBtn.addEventListener("click", function() {
                                    // Append the cloned form fieldset to the form
                                    var form = document.querySelector(".form-fieldset");
                                    form.appendChild(formFieldset.cloneNode(true));
                                });

                                // Add click event listener to the "Remove" buttons
                                document.addEventListener("click", function(event) {
                                    if (event.target.classList.contains("remove-fieldset")) {
                                        // Remove the parent fieldset when the "Remove" button is clicked
                                        event.target.parentNode.remove();
                                    }
                                });
                            });
                        </script>




                        <div>
                            <div class="rounded  dark:bg-purple-50 p-3">
                                <div class="flex justify-between py-1 text-black dark:text-white">
                                    <h3 class="text-sm text-gray-800 font-semibold">Tasks in Doing</h3>
                                    <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                                    </svg>
                                </div>

                                <?php foreach ($tasks as $task) : ?>
                                    <?php
                                    if (isset($task['task']) && $task['situation'] == 2) {
                                    ?>

                                        <div class="w-full  dark:bg-indigo-400  dark:hover:bg-indigo-500 p-2 rounded mt-1 border-b  dark:border-indigo-700 cursor-pointer">
                                            <p class="tasks"><?php echo $task['task']; ?></p>


                                            <form method="POST" class="mr-1" action="update">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                                <p class="tasks text-xs text-right text-indigo-800"><?php echo $task['date']; ?><i class="bi ml-1 bi-clock-history"></i></p>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                <?php endforeach; ?>


                            </div>
                        </div>
                        <div>
                            <div class="rounded  dark:bg-purple-50 p-3">
                                <div class="flex justify-between py-1 text-black dark:text-white">
                                    <h3 class="text-sm text-gray-800 font-semibold">Tasks in Done</h3>
                                    <svg class="h-4 fill-current text-gray-600 dark:text-gray-500 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M5 10a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4zm7 0a1.999 1.999 0 1 0 0 4 1.999 1.999 0 1 0 0-4z" />
                                    </svg>
                                </div>

                                <?php foreach ($tasks as $task) : ?>
                                    <?php
                                    if (isset($task['task']) && $task['situation'] == 3) {
                                    ?>

                                        <div class="w-full  dark:bg-indigo-400  dark:hover:bg-indigo-500  p-2 rounded mt-1 border-b border-gray-100 dark:border-indigo-700 cursor-pointer">
                                            <p class="tasks"><?php echo $task['task']; ?></p>


                                            <form method="POST" class="mr-1" action="update">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></button>
                                            </form>
                                            <form method="POST" class="ms-1" action="delete">
                                                <input type="hidden" name="id" value="<?php echo $task['id']; ?>">
                                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                                <p class="tasks text-xs text-right text-indigo-800"><?php echo $task['date']; ?><i class="bi ml-1 bi-clock"></i></i></p>
                                            </form>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <!-- Task -->
                    <section class="mt-28   text-gray-800 text-center ">

                        <div class="grid lg:gap-x-12 md:grid-cols-3">
                            <div class="mb-12 md:mb-0">

                                <h3 class="text-2xl font-bold text-pink-500 mb-4"><?php echo $totaltodo[0][0]; ?></h3>
                                <h5 class="text-lg font-medium text-gray-200">To Do</h5>
                            </div>

                            <div class="mb-12 md:mb-0">

                                <h3 class="text-2xl font-bold text-blue-500 mb-4"><?php echo $totaldoing[0][0]; ?></h3>
                                <h5 class="text-lg font-medium text-gray-200">Doing</h5>
                            </div>

                            <div class="mb-12 md:mb-0">

                                <h3 class="text-2xl font-bold text-green-300 mb-4"><?php echo $totaldone[0][0]; ?></h3>
                                <h5 class="text-lg font-medium text-gray-200">Done</h5>
                            </div>
                        </div>
                    </section>



                </div>
            </div>
        </div>

        <script src="../../Hello/views/js/main.js"></script>
        <style>
            @media only screen and (min-width: 768px) {
                .header-right {
                    width: calc(100% - 16rem);
                }
            }
        </style>
    </body>

    </html>

<?php } else {
    Redirect::to('home');
} ?>