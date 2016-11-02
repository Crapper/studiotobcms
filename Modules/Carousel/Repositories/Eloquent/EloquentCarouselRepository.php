<?php namespace Modules\Carousel\Repositories\Eloquent;

use Modules\Carousel\Repositories\CarouselRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarouselRepository extends EloquentBaseRepository implements CarouselRepository
{
    public function homeCarousel()
    {
        return $this->model->where('name','Home')->get();

    }
}
