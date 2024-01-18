<?php

use JetBrains\PhpStorm\NoReturn;
use Simfa\Framework\Application;

if (! function_exists('asset')) {
	/**
	 * @param $asset
	 * @return string
	 */
	function asset($asset): string
	{
		return Application::$APP->view->asset($asset);
	}
}

if (! function_exists('render')) {
	/**
	 * render a view file
	 * @param string $view file name to be rendered [Ps: can't exceed 612 characters]
	 * @param array $params
	 * @return string|null
	 */
	function render(string $view, array $params = []): ?string
	{
		return Application::$APP->view->renderView($view, $params);
	}
}

if (! function_exists('route')) {
	/**
	 * @param $path
	 * @param $var
	 * @return string
	 */
	function route($path, $var = null): string
	{
		return Application::path($path, $var);
	}
}

if (! function_exists('redirect')) {
	/**
	 * @param $path
	 * @return void
	 */
	function redirect($path = null): void
	{
		Application::$APP->response->redirect($path);
	}
}

if (! function_exists('lang')) {
	/**
	 * @param string $string
	 * @return string
	 */
	function lang(string $string): string
	{
		return Application::$APP->lang($string);
	}
}

if (! function_exists('path')) {
	/**
	 * @param string $path
	 * @param null $var
	 * @return string
	 */
	function path(string $path, $var = null): string
	{
		return Application::$APP->path($path, $var);
	}
}

if (!function_exists('dd')) {

	#[NoReturn] function dd(mixed $data):void
	{
		echo "<pre style='background:#1d1d1d; color: greenyellow; position:absolute; left: 0; top: 0; z-index: 9999999; width: 100%;'>";
		print_r($data);
		echo '<pre>';
		die();
	}

}

if (!function_exists('d')) {
	function d()
	{
		$args = func_get_args();
		call_user_func_array('dump', $args);
	}
}
