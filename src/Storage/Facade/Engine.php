<?php

declare(strict_types=1);

namespace JRF\Storage\Facade;

use JRF\Storage\Engine as EngineObject;
use JRF\Storage\Query\Action;
use JRF\Storage\Engine\Driver\Driver;

class Engine
{
	private static null|EngineObject $instance = null;

	public static function setInstance(EngineObject $instance): void
	{
		static::$instance = $instance;
	}

	public static function dispatch(Action $action, null|Driver $driver = null, mixed $args = null): mixed
	{
		if (static::$instance === null)
			throw new \Exception("Engine instance not set", 400);

		return static::$instance->dispatch($action, $driver, $args);
	}

	public static function useDriver(Driver $driver): void
	{
		if (static::$instance === null)
			throw new \Exception("Engine instance not set", 400);

		static::$instance->useDriver($driver);
	}

	public static function reset(): void
	{
		static::$instance = null;
	}
}
