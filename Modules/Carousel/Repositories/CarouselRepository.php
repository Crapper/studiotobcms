<?php namespace Modules\Carousel\Repositories;

use Modules\Carousel\Entities\Carousel;
use Modules\Core\Repositories\BaseRepository;
use Modules\Media\Repositories\FileRepository;

interface CarouselRepository extends BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function homeCarousel();
}
