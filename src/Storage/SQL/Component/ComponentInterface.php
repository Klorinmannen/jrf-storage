<?php

declare(strict_types=1);

namespace JRF\Storage\SQL\Component;

interface ComponentInterface
{
	public function empty();
	public function __toString(): string;
}
