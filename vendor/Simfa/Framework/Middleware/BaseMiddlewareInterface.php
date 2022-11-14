<?php


namespace Simfa\Framework\Middleware;


interface BaseMiddlewareInterface
{
	/**
	 * @param array $action
	 */
	public function __construct(array $action = []);

	/**
	 * @return mixed
	 */
	public function execute(): mixed;
}
