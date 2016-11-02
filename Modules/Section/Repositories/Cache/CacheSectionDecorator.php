<?php namespace Modules\Section\Repositories\Cache;

use Modules\Section\Repositories\SectionRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSectionDecorator extends BaseCacheDecorator implements SectionRepository
{
    public function __construct(SectionRepository $section)
    {
        parent::__construct();
        $this->entityName = 'section.sections';
        $this->repository = $section;
    }
}
