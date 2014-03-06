<?php
require 'vendor/autoload.php';
deployer();

// Get parameters for deploy.
$params = parse_ini_file('parameters.ini');

task('prod_server', function () {
    connect($params['prod_server_host'], $params['prod_server_user'], rsa('~/.ssh/id_rsa'));
});

task('upload', function () {
  // ignore(array(
  //   'style.css',
  // ));
  upload($params['local_path'], $params['remote_path']);
});

task('prod', 'Deploy to production.', ['prod_server', 'upload']);

start();