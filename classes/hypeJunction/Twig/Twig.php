<?php

namespace hypeJunction\Twig;

use Elgg\Di\ServiceFacade;
use Twig\Environment;
use Twig\TwigFunction;

class Twig extends Environment {

	use ServiceFacade;

	/**
	 * {@inheritdoc}
	 */
	public static function name() {
		return 'twig';
	}

	/**
	 * Setup environment
	 * @return void
	 */
	public function setup() {
		$this->addGlobal('app', new App());

		$this->addFunction(new TwigFunction('echo', 'elgg_echo'));
		$this->addFunction(new TwigFunction('view', 'elgg_view', [
			'pre_escape' => 'html',
			'is_safe' => ['html'],
		]));
		$this->addFunction(new TwigFunction('assetUrl', 'elgg_get_simplecache_url'));
		$this->addFunction(new TwigFunction('normalizeUrl', 'elgg_normalize_url'));
		$this->addFunction(new TwigFunction('requireJs', 'elgg_require_js'));
	}

	/**
	 * Normalize variables
	 *
	 * @param array $vars Vars
	 * @return array
	 */
	public function normalizeVars(array $vars = []) {
		foreach ($vars as &$value) {
			if (is_array($value)) {
				$value = $this->normalizeVars($value);
			} else if ($value instanceof \ElggEntity) {
				$value = $value->toObject();
			}
		}

		return $vars;
	}

}