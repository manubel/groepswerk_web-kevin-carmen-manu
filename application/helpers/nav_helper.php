<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('active_link')) {
	function active_link($controller)
	{
		$router =& load_class('Router', 'core');
		$class = $router->class;

		return ($class == $controller) ? 'active' : '';
	}
}
