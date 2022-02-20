<?php

require_once 'MyHandler.php';

ini_set('session.gc_maxlifetime', 86400);
$time = ini_get('session.gc_maxlifetime');
echo $time;

$myHandler = new MyHandler();
session_set_save_handler($myHandler,true);
session_start();

$_SESSION['value1']='red';
$_SESSION['value2']='green';
$_SESSION['value3']='blue';

session_write_close();