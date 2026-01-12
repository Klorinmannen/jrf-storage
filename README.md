# JRF data storage access library
[![PHP version support][php-version-badge]][php]
[![PHPUnit][phpunit-ci-badge]][phpunit-action]

[php-version-badge]: https://img.shields.io/badge/php-%5E8.2-7A86B8
[php]: https://www.php.net/supported-versions.php
[phpunit-action]: https://github.com/Klorinmannen/jrf-storage/actions
[phpunit-ci-badge]: https://github.com/Klorinmannen/jrf-storage/workflows/PHPUnit/badge.svg

### Project goals
* Accessing data stores with a simple interface.
* Should be easy and intuitive to understand and use.
* Lightweight, no dependencies.

## Usage
````
use JRF\Storage\Engine;
use JRF\Storage\MySQL\Query;

$config = [ 
   'driver' => 'mysql',
   'connections' => [
      [
         'name' => 'connection-name',
         'username' => 'username',
         'password' => 'password',
         'host' => 'localhost',
         'port' => '3306',
         'database' => 'database-name'
      ]
   ]
];
$engine = Engine::create($config);
$query = Query::create($engine);

// Select all users
$users = $query->build('User')->select();
````
