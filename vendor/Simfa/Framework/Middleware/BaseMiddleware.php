<?php


namespace Simfa\Framework\Middleware;


abstract class BaseMiddleware implements BaseMiddlewareInterface
{

	public function __construct(public array $action = [])
	{
	}

	abstract public function execute();

}
