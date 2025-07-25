<?php

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/app',
        __DIR__ . '/tests',
        __DIR__ . '/routes',
        __DIR__ . '/database',
        ])
    ->withConfiguredRule(
        ArraySyntaxFixer::class,
        ['syntax' => 'short']
    )
    ->withRules([
        ListSyntaxFixer::class,
        NoUnusedImportsFixer::class,
        CleanNamespaceFixer::class,
    ])
    ->withPreparedSets(
        psr12: true,
        laravel: true,
        cleanCode: true,
        arrays: true,
        namespaces: true,
    );
