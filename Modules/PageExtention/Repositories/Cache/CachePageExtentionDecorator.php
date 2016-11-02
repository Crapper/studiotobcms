<?php namespace Modules\PageExtention\Repositories\Cache;

use Modules\PageExtention\Repositories\PageExtentionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePageExtentionDecorator extends BaseCacheDecorator implements PageExtentionRepository
{
    public function __construct(PageExtentionRepository $pageextention)
    {
        parent::__construct();
        $this->entityName = 'pageextention.pageextentions';
        $this->repository = $pageextention;
    }

    public function findForPage($pageId)
    {
        return $this->repository->findForPage($pageId);
    }
}
