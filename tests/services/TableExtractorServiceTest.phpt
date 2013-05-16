<?php

namespace Test\Services;

use Tester,
	Tester\Assert,
	Model\Table,
	Model\Team,
	Services\ExtractorService;

require_once __DIR__ . '/../bootstrap.php';

class TableExtractorServiceTest extends Tester\TestCase
{
	/** @var ExtractorService */
	private $service;

	public function setUp()
	{
		$this->service = new ExtractorService();
	}

	public function testExtractMethod()
	{
		$table = $this->service->extract($this->getSource());

		Assert::true($table instanceof Table);

		Assert::equal(14, $table->count());

		Assert::true($table[0] instanceof Team);

		Assert::equal('AFC Veřovice', $table[0]->getName());
		Assert::equal(44, $table[0]->getPoints());
	}

	private function getSource()
	{
		return __DIR__ . '/../fixtures/results-a-team.html';
	}
}

id(new TableExtractorServiceTest())->run();
