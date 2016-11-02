<?php namespace Modules\Menulist\Repositories\Cache;

use Modules\Menulist\Repositories\MenulistRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMenulistDecorator extends BaseCacheDecorator implements MenulistRepository
{
    public function __construct(MenulistRepository $menulist)
    {
        parent::__construct();
        $this->entityName = 'menulist.menulists';
        $this->repository = $menulist;
    }
}
