<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Partials to include on page views
    |--------------------------------------------------------------------------
    | List the partials you wish to include on the different type page views
    | The content of those fields well be caught by the PageWasCreated and PageWasEdited events
    */
    'partials' => [
        'translatable' => [
            'create' => [
                'pageextention::admin.fields.sub-title-create',
            ],
            'edit' => [
                'pageextention::admin.fields.sub-title-edit',
            ],
        ],
        'normal' => [
            'create' => [
                'pageextention::admin.fields.author-create',
            ],
            'edit' => [
                'pageextention::admin.fields.author-edit',
            ],
            'create' => [
                'pageextention::admin.fields.kolom-create',
            ],
            'edit' => [
                'pageextention::admin.fields.kolom-edit',
            ],
            'create' => [
                'pageextention::admin.fields.section-create',
            ],
            'edit' => [
                'pageextention::admin.fields.section-edit',
            ],
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | Dynamic relations
    |--------------------------------------------------------------------------
    | Add relations that will be dynamically added to the Page entity
    */
    'relations' => [
        'extension' => function ($self) {
            return $self->belongsTo(\Modules\PageExtention\Entities\PageExtention::class, 'id', 'page_id')->first();
        }
    ],
];
