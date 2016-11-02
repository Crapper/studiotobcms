<?php namespace Modules\ContentBlockImage\Repositories\Cache;

use Modules\ContentBlockImage\Repositories\ContentBlockImageRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContentBlockImageDecorator extends BaseCacheDecorator implements ContentBlockImageRepository
{
    public function __construct(ContentBlockImageRepository $contentblockimage)
    {
        parent::__construct();
        $this->entityName = 'contentblockimage.contentblockimages';
        $this->repository = $contentblockimage;
    }
}
