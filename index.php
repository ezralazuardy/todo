<?php

require_once __DIR__ . '/data/ToDoRepository.php';

$repository = ToDoRepository::getInstance();

if (isset($_POST['truncate'])) {
     $repository->truncate();
     header('Location: index.php');
}

if (isset($_POST['todo'])) {
     if (!empty(trim($_POST['todo']))) $repository->addToDo(trim($_POST['todo']));
     header('Location: index.php');
}

$todos = $repository->getAllToDos();

?>
<!DOCTYPE HTML>
<html>

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>To Do List</title>
     <link rel="icon" href="./assets/favicon.png" type="image/png" />
     <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.2/tailwind.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'" />
     <style>
          .navbar-brand {
               font-weight: bold;
          }

          .card-title {
               font-weight: 700;
          }

          .card-body {
               font-weight: 350;
          }

          .link {
               color: #2196f3;
               transition: 0.5 ease !important;
               text-decoration: none;
          }

          .link:hover {
               color: #0069c0;
          }

          .card .card-img-top {
               height: 20rem;
          }

          .card-icon {
               width: 1rem;
               padding-bottom: 0.1rem;
          }

          .empty-hint {
               font-size: 1.1rem;
               font-weight: 350;
          }
     </style>
</head>

<body>
     <section class="text-gray-600 body-font relative">
          <div class="container px-24 py-24">
               <div class="flex flex-col text-start p-2 w-full mb-2">
                    <h1 class="w-2/3 mx-auto text-3xl font-black title-font mb-4 text-gray-900">To Do List</h1>
                    <p class="w-2/3 mx-auto leading-relaxed text-base">Save your To Do List easily!</p>
               </div>
               <div class="w-2/3 mx-auto">
                    <div class="flex flex-wrap">
                         <form action="index.php" method="post" class="p-2 w-full">
                              <input type="text" id="todo" name="todo" placeholder="Write your To Do here" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out mb-4" required>
                              <div class="flex flex-row w-full mb-2">
                                   <button type="submit" class="flex text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-md">Add</button>
                         </form>
                         <form action="index.php" method="post">
                              <input type="text" name="truncate" value="true" hidden />
                              <button type="submit" class="flex ml-2 text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded text-md">Remove All</button>
                         </form>
                    </div>
                    <?php foreach ($todos as $todo) : ?>
                         <div class="bg-gray-100 rounded flex p-4 h-full m-2 w-full items-center">
                              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                   <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                   <path d="M22 4L12 14.01l-3-3"></path>
                              </svg>
                              <span class="title-font font-medium"><?= $todo[0] ?></span>
                         </div>
                    <?php endforeach; ?>
               </div>
          </div>
          </div>
     </section>
</body>

</html>