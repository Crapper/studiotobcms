<?php namespace Modules\PageExtention\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PageExtentionRepository extends BaseRepository
{
    public function findForPage($pageId);
}
