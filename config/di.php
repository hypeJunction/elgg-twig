<?php

return [
	'twig.loader' => \DI\create(\hypeJunction\Twig\ViewLoader::class)
		->constructor(\DI\get('views')),
	'twig' => \DI\create(\hypeJunction\Twig\Twig::class)
		->constructor(
			\DI\get('twig.loader'),
			[
				'cache' => elgg_get_cache_path() . 'twig/',
				'debug' => elgg_get_config('environment') === 'development',
				'auto_reload' => elgg_get_config('environment') === 'development',
			]
		)
		->method('setup'),
];