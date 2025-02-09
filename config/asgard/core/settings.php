<?php

return [
    'site-name' => [
        'description' => 'core::settings.site-name',
        'view' => 'text',
        'translatable' => true,
    ],
    'site-name-mini' => [
        'description' => 'core::settings.site-name-mini',
        'view' => 'text',
        'translatable' => true,
    ],
    'site-description' => [
        'description' => 'Site Meta Description',
        'view' => 'textarea',
        'translatable' => true,
    ],
    'site-meta-keywords' => [
        'description' => 'Site Meta Keywords',
        'view' => 'textarea',
        'translatable' => true,
    ],
    'site-theme-color' => [
        'description' => 'Theme Colour',
        'view' => 'text',
        'translatable' => false,
    ],
    'template' => [
        'description' => 'core::settings.template',
        'view' => 'core::fields.select-theme',
    ],
    'analytics-script' => [
        'description' => 'core::settings.analytics-script',
        'view' => 'textarea',
        'translatable' => false,
    ],
    'locales' => [
        'description' => 'core::settings.locales',
        'view' => 'core::fields.select-locales',
        'translatable' => false,
    ],
];
