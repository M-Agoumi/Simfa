<?php
/* ************************************************************************************************ */
/*                                                                                                  */
/*                                                        :::   ::::::::   ::::::::  :::::::::::    */
/*   Controller.php                                    :+:+:  :+:    :+: :+:    :+: :+:     :+:     */
/*                                                      +:+         +:+        +:+        +:+       */
/*   By: magoumi <magoumi@student.1337.ma>             +#+      +#++:      +#++:        +#+         */
/*                                                    +#+         +#+        +#+      +#+           */
/*   Created: 2021/03/17 11:42:08 by magoumi         #+#  #+#    #+# #+#    #+#     #+#             */
/*   Updated: 2021/03/17 11:42:08 by magoumi      ####### ########   ########      ###.ma           */
/*                                                                                                  */
/* ************************************************************************************************ */

namespace Simfa\Action;

use Simfa\Framework\Application;
use Simfa\Framework\Db\DbModel;
use Simfa\Framework\Middleware\BaseMiddleware;
use Simfa\Framework\Middleware\FirewallMiddleware;

/**
 * Class Controller
 * base Controller to extend other controllers from it
 */

abstract class Controller
{
	/**
	 * @var string
	 */
	public string $action = '';

    /** @var BaseMiddleware[] */
	protected array $middlewares = [];

	/** adding this method to avoid typing it in every method in our controllers
	 * @param string $view
	 * @param array $params
	 * @return string
	 */
	public function render(string $view, array $params = []): string
	{
		return Application::$APP->view->renderView($view, $params);
	}

    /**
     * @return BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }

	/**
	 * @param BaseMiddleware $middleware
	 * @return void
	 */
	public function registerMiddleware(BaseMiddleware $middleware): void
	{
        $this->middlewares[] = $middleware;
    }

	/**
	 * @param string $to
	 * @param string $subject
	 * @param string $body
	 * @param string $headers
	 * @return bool
	 */
	public function mailer(string $to, string $subject, string $body, string $headers): bool
	{
		if (mail($to, $subject, $body, $headers))
			return true;

		return false;
	}

	/**
	 * @param $to
	 * @param $subject
	 * @param $content
	 * @param string $from
	 * @param array $headers
	 * @return bool
	 */
    public function mail($to, $subject ,$content, string $from = 'admin@simfa.io', $headers = []):bool
    {
	    $header = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$header .= 'From: ' . $from . "\r\n";
	    $header .= 'Reply-To: '. $headers['reply_to'] ?? 'reply@simfa' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();

    	if (is_array($content)) {
    		$body = $this->render('mails/' . $content[0], $content[1]);

    		return $this->mailer($to, $subject, $body, $header);
	    } else
    	    return $this->mailer($to, $subject, $content, $header);
    }

	/** get a slug url
	 * @param $text
	 * @param string $divider
	 * @return string
	 */
	public function slugify($text, string $divider = '-'): string
	{
		// replace non letter or digits by divider
		$text = preg_replace('~[^\pL\d]+~u', $divider, $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, $divider);

		// remove duplicate divider
		$text = preg_replace('~-+~', $divider, $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;
	}

	/** return a json request, don't call if request is already sent, use json_encode directly then
	 * @param $value
	 * @return bool|string
	 */
	protected function json($value): bool|string
	{
		header('Content-Type: application/json');

		return json_encode($value);
	}

	/** get the authenticated user or null instead
	 * @return DbModel|null
	 */
	protected function getAuthenticatedUser(): ?DbModel
	{
		return Application::$APP->user;
	}
}
