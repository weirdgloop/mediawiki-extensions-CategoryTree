<?php
/**
 * @file
 */

namespace MediaWiki\Extension\CategoryTree;

use MediaWiki\Cache\LinkBatchFactory;
use MediaWiki\Config\Config;
use MediaWiki\Language\Language;
use MediaWiki\Linker\LinkRenderer;
use MediaWiki\Linker\LinksMigration;
use Wikimedia\Rdbms\IConnectionProvider;

class CategoryTreeFactory {
	public function __construct(
		private readonly Config $config,
		private readonly Language $contLang,
		private readonly IConnectionProvider $dbProvider,
		private readonly LinkBatchFactory $linkBatchFactory,
		private readonly LinkRenderer $linkRenderer,
		private readonly LinksMigration $linksMigration,
	) {
	}

	public function newCategoryTree(
		array $options
	): CategoryTree {
		return new CategoryTree(
			$options,
			$this->config,
			$this->contLang,
			$this->dbProvider,
			$this->linkBatchFactory,
			$this->linkRenderer,
			$this->linksMigration,
		);
	}
}
