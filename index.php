<?php

require 'UserRepositoryInterface.php';
require 'UserFileRepository.php';
require 'UserService.php';
require 'UserModel.php';

define('IS_PRODUCTION', false);

$driver = IS_PRODUCTION ? 'db' : 'file';

$repository = $driver == 'file' ? new UserFileRepository() : new UserDatabaseRepository();

echo "<pre>";

$service = new UserService($repository);

$user = $service->register('Kārlis');

var_dump($user);

echo "</pre>";