<?php

declare(strict_types=1);

namespace JRF\Storage\SQL\Component\Filter;

use JRF\Storage\SQL\Component\Column;
use JRF\Storage\SQL\Util\Operator;

class Nullable
{
	public static function create(Column $column, Operator $operator): array
	{
		$filter = static::filter($column, $operator);

		return [
			$filter,
			[]
		];
	}

	public static function filter(Column $column, Operator $operator): string
	{
		return "$column {$operator->value}";
	}
}
