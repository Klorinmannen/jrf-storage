<?php

declare(strict_types=1);

namespace JRF\Storage\SQL\Statement;

interface StatementInterface
{
	public function statement(): array;
}
