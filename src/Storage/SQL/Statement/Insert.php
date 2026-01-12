<?php

declare(strict_types=1);

namespace JRF\Storage\SQL\Statement;

use Stringable;

use JRF\Storage\SQL\Component\Set;
use JRF\Storage\SQL\Component\Table;
use JRF\Storage\SQL\Statement\StatementInterface;
use JRF\Storage\SQL\Statement\DTO;
use JRF\Storage\SQL\Util;

class Insert implements StatementInterface, Stringable
{
	private readonly Table $table;
	private readonly Set $set;

	public function __construct(DTO $queryInsert)
	{
		$this->table = Table::create($queryInsert->collections);
		$this->set = Set::create($queryInsert->fieldsWithValues);
	}

	public function __toString(): string
	{
		[$statement, $params] = $this->statement();
		return $statement;
	}

	public static function create(DTO $queryInsert): Insert
	{
		return new Insert($queryInsert);
	}

	public function statement(): array
	{
		$positionalFields = $this->set->positionalFields();
		$positionalParams = $this->set->positionalParams();

		$queryParts[] = "INSERT INTO {$this->table} ({$positionalFields}) VALUES";

		$paramParts = [];
		foreach ($positionalParams as $params)
			$paramParts[] = "({$params})";

		$queryParts[] = Util::join($paramParts, ', ');

		$query = Util::join($queryParts, ' ');
		$params = $this->set->positionalParamValues() ?: null;

		return [
			$query,
			$params
		];
	}
}
