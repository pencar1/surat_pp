<?php

return [
    'exports' => [
        'chunk_size'             => 1000,
        'pre_calculate_formulas' => false,
        'strict_null_comparison' => false,
        'csv'                    => [
            'delimiter'              => ',',
            'enclosure'              => '"',
            'line_ending'            => "\n",
            'use_bom'                => false,
            'include_separator_line' => false,
            'excel_compatibility'    => false,
            'output_encoding'        => '',
        ],
        'properties'             => [
            'creator'        => '',
            'lastModifiedBy' => '',
            'title'          => '',
            'description'    => '',
            'subject'        => '',
            'keywords'       => '',
            'category'       => '',
            'manager'        => '',
            'company'        => '',
        ],
    ],
    'imports'            => [
        'read_only'        => true,
        'heading_row'      => [
            'formatter' => 'slug',
        ],
        'csv'              => [
            'delimiter'              => ',',
            'enclosure'              => '"',
            'escape_character'       => '\\',
            'contiguous'             => false,
            'input_encoding'         => 'UTF-8',
        ],
        'start_row'        => 1,
        'chunk_size'       => 1000,
        'temporary_path'   => storage_path('framework/cache/data'),
    ],
];
