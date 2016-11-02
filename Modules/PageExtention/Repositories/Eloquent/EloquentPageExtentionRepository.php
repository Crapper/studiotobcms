<?php namespace Modules\PageExtention\Repositories\Eloquent;

use Modules\PageExtention\Repositories\PageExtentionRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentPageExtentionRepository extends EloquentBaseRepository implements PageExtentionRepository
{
    public function findForPage($pageId)
    {
        return $this->model->wherePageId($pageId)->first();
    }
}
