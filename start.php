<?php

require_once __DIR__ . '/autoloader.php';

/**
 * Render a twig template
 *
 * @param string $template Template name
 * @param array  $vars     Variables
 *
 * @return string
 */
function elgg_twig($template, array $vars = []) {
	try {
		$vars = \hypeJunction\Twig\Twig::instance()->normalizeVars($vars);
		return \hypeJunction\Twig\Twig::instance()->render($template, $vars);
	} catch (Exception $ex) {
		elgg_log($ex, 'ERROR');

		return '';
	}
}

\hypeJunction\Twig\Bootstrap::bind('elgg-twig');