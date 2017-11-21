GCI Task Upload - PHP CLI
===========================
This tool can be used to upload tasks to [Google Code-in](http://codein.withgoogle.com) using an array of tasks in a json file.

Drupal
------
This tool was created and is maintained by the Drupal community

Installation
------
Clone this repository:
```console
git clone https://github.com/Droogle/gci-task-upload gci-task-upload
```
Install dependencies
```console
cd gci-task-upload
composer install
```

Task list example
------
```json
[
  {
    "name": "A task",
    "description": "A longer description of the task with links, etc.",
    "status": 2,
    "max_instances": 35,
    "tags": ["programming", "short"],
    "mentors": ["mentor@org.com", "mentor2@org.com", "admin@org.com"],
    "is_beginner": false,
    "categories": [1, 5],
    "time_to_complete_in_days": 4
  },
  {
    "name": "Yet another task",
    "description": "A longer description of the task with links, etc.",
    "status": 2,
    "max_instances": 35,
    "tags": ["programming", "short"],
    "mentors": ["mentor@org.com", "mentor2@org.com", "admin@org.com"],
    "is_beginner": false,
    "categories": [1, 5],
    "time_to_complete_in_days": 4
  }
]
```

Since a JSON Exporter might export the fields tags, mentors, and categories as 
string or intenger (not as a array), the JSON file can include those fields as:
```json
{
  "name": "A task",
  "description": "A longer description of the task with links, etc.",
  "status": 2,
  "max_instances": 35,
  "tags": "programming",
  "mentors": "mentor@org.com",
  "is_beginner": false,
  "categories": 1,
  "time_to_complete_in_days": 4
}
```
**Extra:** Since the tool the Drupal community uses explodes the data in an
array if there are commas, this was an issue for the fields name and
description. So, those fields can be passed as arrays and will be implode with
a comma in between.

Example
------
To upload tasks via your OS terminal: 
```
php upload.php <api-key> <path-to-json-file>
```
Easy!

License
-------
The MIT License (See LICENSE)
