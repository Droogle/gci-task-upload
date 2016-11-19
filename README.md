GCI API Task Upload - PHP CLI
===========================
This API can be used to upload tasks to [Google Code-in](http://codein.withgoogle.com) using an array of tasks in a json file.

Drupal
------
This tool was created and is maintained by the Drupal community

Installation
------
Clone this repository:
```console
git clone https://github.com/Droogle/gci-task-upload
```
Install dependencies
```console
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
