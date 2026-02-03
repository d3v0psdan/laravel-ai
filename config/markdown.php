<?php

use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;

return [
    'code_highlighting' => [
        'enabled' => true,
        'theme' => 'github-dark',
    ],

    'add_anchors_to_headings' => false,

    'render_anchors_as_links' => false,

    'commonmark_options' => [],

    'cache_store' => false,

    'renderer_class' => Spatie\LaravelMarkdown\MarkdownRenderer::class,

    /*
     * GFM Extension handles: tables, strikethrough, autolinks, task lists, and fenced code
     */
    'extensions' => [
        GithubFlavoredMarkdownExtension::class,
    ],

    'block_renderers' => [],

    'inline_renderers' => [],

    'inline_parsers' => [],
];
