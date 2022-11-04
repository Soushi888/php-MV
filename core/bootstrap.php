<?php

// Global variables
$app = [];

use database\Connection;

require "core/Connection.php";
require "core/Router.php";
require "core/Request.php";

// Get the configuration from the config file
$app['config'] = require 'config.php';

// Initialize the database connection
$app['database'] = Connection::make($app['config']['database']);
