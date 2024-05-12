<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] = 'auth/login';
$route['signup'] = 'auth/signup';
$route['register'] = 'auth/register';
$route['login_process'] = 'auth/login_process';
$route['question/details/(:any)'] = 'question/details/$1';
$route['question/upvote/(:any)'] = 'question/upvote/$1';
$route['question/downvote/(:any)'] = 'question/downvote/$1';
$route['user/profile'] = 'user/profile';
$route['user/update_profile'] = 'user/update_profile';
$route['api/questions'] = 'api/questions';
$route['api/post_question'] = 'api/post_question';