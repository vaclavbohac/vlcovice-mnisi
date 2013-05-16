<?php

namespace App;

use Nette\Caching\Cache;
use Services\ExtractorService;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
	/** @var Cache */
	private $cache;

	/** @var ExtractorService */
	private $extractorService;

	public function injectTableCache(Cache $cache)
	{
		$this->cache = $cache;
	}

	public function injectExtractorService(ExtractorService $extractorService)
	{
		$this->extractorService = $extractorService;
	}

	public function renderDefault()
	{
		$table = $this->cache->load('table');

		if (!$table) {
			$table = $this->extractorService->extract($this->context->parameters['tableSource']);

			$this->cache->save('table', $table, array(
				Cache::EXPIRE => '+ 7 days'
			));
		}

		$this->template->table = $table;
	}
}
