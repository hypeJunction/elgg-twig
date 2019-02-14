<?php

namespace hypeJunction\Twig;

use Elgg\PluginBootstrap;

class Bootstrap extends PluginBootstrap {

	/**
	 * Get plugin root
	 * @return string
	 */
	protected function getRoot() {
		return $this->plugin->getPath();
	}

	/**
	 * {@inheritdoc}
	 */
	public function boot() {
		elgg_register_event_handler('cache:flush', 'system', function() {
			$cache = elgg_get_cache_path() . 'twig/';
			if (is_dir($cache)) {
				_elgg_rmdir($cache);
			}
		});
	}

	/**
	 * {@inheritdoc}
	 */
	public function init() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {

	}

}