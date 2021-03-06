<?php
require_once('libs/smarty/Smarty-3.1.6/libs/Smarty.class.php');
require_once('config.php');

// set time zone
ini_set('date.timezone', $config['timezone']);

// configure error reporting and PHP stuff
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', ($config['debug'] ? 1 : 0));
ini_set('log_errors', ($config['debug'] ? 0 : 1));
ini_set('error_log', $config['logfile']);

// use W3C-conforming URLS when parameters are appended
ini_set('arg_separator.output', '&amp;');

// session support
if ($config['sessions_enabled']) {
    // fall back to using URL for session ID when cookies disabled
    ini_set('session.use_trans_sid', '1');

    // start session    
    session_start();
}

// set up smarty template engine
$template = new Smarty();
$template->template_dir = $config['smarty']['template_dir'];
$template->compile_dir = $config['smarty']['template_compile_dir'];
$template->cache_dir = $config['smarty']['template_cache_dir'];
$template->caching = ($config['smarty']['template_caching_enabled'] ? 1 : 0);
$template->addPluginsDir($config['document_root'].'../share/libs/smarty-plugins');

// assign variables to base template
$template->assign('CONFIG', $config);
$template->assign('BASE_URL', $config['base_url']);
$template->assign('MEDIA_URL', $config['media_url']);
$template->assign('CACHE_BUSTER', $config['cache_buster']);
$template->assign('APP_NAME', $config['app_name']);
$template->assign('APP_TITLE', $config['app_title']);
?>
