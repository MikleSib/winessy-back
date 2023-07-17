<?php

declare(strict_types=1);

return [
    'dsn' => env('SENTRY_LARAVEL_DSN'),

    'release' => "0.2.0",

    // Capture bindings on SQL queries
    'breadcrumbs.sql_bindings' => true,

    'attach_stacktrace' => true,
    'capture_silenced_errors' => true,
    'context_lines' => 10
];
