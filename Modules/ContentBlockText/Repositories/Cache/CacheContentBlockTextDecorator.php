<?php namespace Modules\ContentBlockText\Repositories\Cache;

use Modules\ContentBlockText\Repositories\ContentBlockTextRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheContentBlockTextDecorator extends BaseCacheDecorator implements ContentBlockTextRepository
{
    public function __construct(ContentBlockTextRepository $contentblocktext)
    {
        parent::__construct();
        $this->entityName = 'contentblocktext.contentblocktexts';
        $this->repository = $contentblocktext;
    }
}
