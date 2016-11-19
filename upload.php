<?php

include 'vendor/autoload.php';

use Droogle\GCI\Client;
use Droogle\GCI\Task;
use Droogle\GciTaskUpload\Colors;

$colors = new Colors();

//If the token has not been provided, the app exits.
if(!isset($argv[1])) {
  echo $colors->red('The token has not been provided') . "\n";
  exit;
}
//If the file has not been specified, the app exits.
if(!isset($argv[2])) {
  echo $colors->red('The json file has not been specified') . "\n";
  exit;
}

// If both parameters are provided.

// Creates a GCI Client.
$client = new Client($argv[1]);
// Read the list of tasks.
$tasks = json_decode(file_get_contents($argv[2]));

foreach($tasks as $task) {
  $newTask = new Task([
    'name' => $task->name,
    'description' => $task->description,
    'status' => 2,
    'max_instances' => $task->max_instances,
    'tags' => $task->tags,
    'mentors'=> $task->mentors,
    'is_beginner' => $task->is_beginner,
    'categories' => $task->categories,
    'time_to_complete_in_days' => $task->time_to_complete_in_days,
  ]);

  // Send a request to create the task.
  $response = $client->createTask($newTask);

  // If the task was created successfully.
  if(isset($response['name'])) {
    echo $colors->green('The task ' . $task->name . ' was successfully created') . "\n";
  }
}
