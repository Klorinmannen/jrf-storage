<?php

declare(strict_types=1);

namespace JRF\Storage\Query;

use JRF\Storage\Util as StorageUtil;

class Util extends StorageUtil
{
	public static function stringToArray(string|array $subject): array
	{
		if (is_string($subject))
			$subject = [$subject];

		return $subject;
	}
}
