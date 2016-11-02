<?php


namespace Modules\PageExtention\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Page\Events\PageWasUpdated;
use Modules\Page\Events\PageWasCreated;
use Modules\PageExtention\Events\Handlers\StorePageExtentionData;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        PageWasCreated::class =>[
            StorePageExtentionData::class,
        ],
        PageWasUpdated::class =>[
            StorePageExtentionData::class,
        ],
    ];
}