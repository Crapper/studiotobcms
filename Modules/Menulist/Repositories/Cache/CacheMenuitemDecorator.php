<?php namespace Modules\Menulist\Repositories\Cache;

use Modules\Menulist\Repositories\MenuitemRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMenuitemDecorator extends BaseCacheDecorator implements MenuitemRepository
{
    public function __construct(MenuitemRepository $menuitem)
    {
        parent::__construct();
        $this->entityName = 'menulist.menuitems';
        $this->repository = $menuitem;
    }
}
