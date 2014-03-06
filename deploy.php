<?php
require 'vendor/autoload.php';
deployer();

task('prod_server', function () {
    connect('vps-53427.cloudnet.se', 'root', rsa('~/.ssh/id_rsa'));
});

task('upload', function () {
  ignore(array(
    'style.css',
  ));
  upload(__DIR__ . '/_site', '/mnt/persist/www/tornstrand2');
});

task('prod', 'Production', ['prod_server', 'upload']);

start();