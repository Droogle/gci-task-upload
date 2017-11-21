<?php

include 'vendor/autoload.php';

use Droogle\Gci\Client;
use Droogle\Gci\Task\Task;
use Droogle\Gci\Task\TaskInterface;
use Droogle\GciTaskUpload\TextFormat;

$text = new TextFormat();

//If the token has not been provided, the app exits.
if(!isset($argv[1])) {
  echo $text->red('The token has not been provided') . "\n";
  exit;
}
//If the file has not been specified, the app exits.
if(!isset($argv[2])) {
  echo $text->red('The json file has not been specified') . "\n";
  exit;
}

// Creates a GCI Client.
$client = new Client($argv[1]);
// Reads the list of tasks.
$tasks = json_decode(file_get_contents($argv[2]));

foreach($tasks as $task) {
  $name = check_string($task->name);

  $newTask = new Task([
    'name' => $name,
    'description' => check_string($task->description),
    'status' => TaskInterface::STATUS_PUBLISHED,
    'max_instances' => $task->max_instances,
    'tags' => check_array($task->tags),
    'mentors'=> check_array($task->mentors),
    'is_beginner' => $task->is_beginner,
    'categories' => check_array($task->categories),
    'time_to_complete_in_days' => check_days_to_complete($task->time_to_complete_in_days),
  ]);

  // Sends a request to create the task.
  $response = $client->createTask($newTask);

  // If the task was created successfully.
  if(isset($response['name'])) {
    $msg = $text->green('The task ') . 
           $text->boldGreen( $name ) .
           $text->green(' was successfully created') . "\n";

    echo $msg;
  }
}

/**
 * Checks if a value is a string.
 *
 * Fields such as name and description must be passed as strings. However, an
 * exported json file might have parts of the text in different array elements
 * since the exported might have splitted the text because of the commas (,)
 *
 * @param array|string $var
 *   The value for an string field.
 *
 * @return string
 *   The correct string value for the field.
 */
function check_string($var) {
  if (is_array($var)) {
    return implode(', ', $var);
  }
  
  return $var;
}

/**
 * Checks if a value is an array.
 *
 * Fields such as mentors, categories, and tags must be passed as arrays of
 * values. However, an exported json file might not have an array if there is
 * only one mentor, tag, or category for a task. In such case, this function
 * returns an array version of the value.
 *
 * @param array|string|int $var
 *   The value for an array field.
 *
 * @return array
 *   The correct array value for the field.
 */
function check_array($var) {
  if(!is_array($var)) {
    $var = array($var);
  }

  return $var;
}

/**
 * Checks if the time_to_complete_in_days value is valid.
 * 
 * GCI API specify that the time to complete in days field should have values
 * >= 3 and <=7. This function checks if the passed value is in the correct
 * range.
 * 
 * @param int $days_to_complete
 *   The time to complete the task.
 * @return int
 *   A valid value for the time_to_complete_in_day field.
 */
function check_days_to_complete($days_to_complete) {
  if ($days_to_complete < 3) {
    return 3;
  } elseif ($days_to_complete > 7) {
    return 7;
  } else {
    return $days_to_complete;
  }
}