<?php
/**
 * Created by PhpStorm.
 * User: alexx
 * Date: 23.07.19
 * Time: 15:57
 */


define('DEBUG',true);
define('DEFAULT_CONTROLLER', 'HomeController'); // default controller if there isn't6 one in the url
define('DEFAULT_LAYOUT','default'); // if not layout is set the controller use this layout.
define('SITE_TITLE','MVS framework');// this title will use if no site name will set;
define('PROOT', '/'.$_SERVER['HTTP_HOST'].'/'); // set this to '/' for a live server.
define('MENU_BRAND','RUAH'); //This is the Brand text in server


define('DB_NAME','myfreim');
define('DB_USER','root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');


define('CURRENT_USER_SESSION_NAME','qwerrtyuiop');// session name for logged in user

define('REMEMBER_ME_COOKIE_NAME','ASDFGHJKL12345');// cooke name logged in  user remember me

define('REMEMBER_ME_COOKIE_EXPIRY',2592000);// time and second for remember me cooke live (30 days)

define('ACCESS_RESTRICTED', 'RestrictedController'); //controller name for restricted redirect
