<?php

namespace Services;

use Model\Table;
use Model\Team;

class ExtractorService
{
	const TABLE = '.doprava';

	const TEAM_ROW = 'tr[height="17]';

	public function extract($source)
	{
		if (!is_string($source)) {
			throw new \InvalidArgumentException("Source parameter required.");
		}

		$pQuery = \phpQuery::newDocumentFileHTML($source);

		$tables = $pQuery->find(self::TABLE);

		$table = new Table;

		foreach ($tables->eq(1)->find(self::TEAM_ROW) as $position => $teamRow) {
			$table[$position] = $this->extractTeam(\pq($teamRow));
		};

		return $table;
	}

	private function extractTeam($teamRow)
	{
		$team = new Team;

		$columns = $teamRow->find('.text5');

		$team->setName($columns->find('a:eq(0)')->text());

		if ($columns->count() === 11) {
			$points = $columns->eq(9)->text();
		} else {
			$points = $columns->eq(8)->text();
		}

		$team->setPoints((int) $points);

		return $team;
	}
}
