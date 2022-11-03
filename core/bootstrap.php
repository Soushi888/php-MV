<?php

$app = [];

use database\Connection;

require "core/Connection.php";
require "core/Router.php";
require "core/Request.php";
$app['config'] = require 'config.php';

$app['database'] = Connection::make($app['config']['database']);