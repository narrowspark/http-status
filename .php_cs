<?php
use Narrowspark\CS\Config\Config;

$header = <<<'EOF'
This file is part of Narrowspark Framework.

(c) Daniel Bannert <d.bannert@anolilab.de>

This source file is subject to the MIT license that is bundled
with this source code in the file LICENSE.
EOF;

$config = new Config($header, [
    'PhpCsFixerCustomFixers/no_commented_out_code' => false,
    'PhpCsFixerCustomFixers/phpdoc_no_superfluous_param' => false,
    'PhpCsFixerCustomFixers/data_provider_return_type' => true,
    'PhpCsFixerCustomFixers/data_provider_name' => true,
    'PhpCsFixerCustomFixers/comment_surrounded_by_spaces' => true,
    'PhpCsFixerCustomFixers/no_duplicated_imports' => true,
    'PhpCsFixerCustomFixers/no_useless_sprintf' => true,
    'PhpCsFixerCustomFixers/php_unit_no_useless_return' => true,
    'PhpCsFixerCustomFixers/single_line_throw' => true,
    'php_unit_test_case_static_method_calls' => [
        'call_type' => 'self',
    ],
]);
$config->getFinder()
    ->files()
    ->in(__DIR__)
    ->exclude('build')
    ->exclude('vendor')
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$cacheDir = getenv('TRAVIS') ? getenv('HOME') . '/.php-cs-fixer' : __DIR__;

$config->setCacheFile($cacheDir . '/.php_cs.cache');

return $config;
