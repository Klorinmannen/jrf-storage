# JRF data storage access library
[![PHP version support][php-version-badge]][php-version]
[![CI][ci-badge]][workflow-actions]
[![PHPUnit][phpunit-coverage-badge]][workflow-actions]

[php-version-badge]: https://img.shields.io/badge/php-%5E8.2-7A86B8
[php-version]: https://www.php.net/supported-versions.php
[ci-badge]: https://github.com/Klorinmannen/jrf-storage/workflows/CI/badge.svg
[workflow-actions]: https://github.com/Klorinmannen/jrf-storage/actions
[phpunit-coverage-badge]: ./phpunit-coverage-badge.svg

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
