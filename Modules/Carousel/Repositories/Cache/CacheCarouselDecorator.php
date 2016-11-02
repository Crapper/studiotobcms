<?php namespace Modules\Carousel\Repositories\Cache;

use Modules\Carousel\Entities\Carousel;
use Modules\Carousel\Repositories\CarouselRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Media\Repositories\FileRepository;

class CacheCarouselDecorator extends BaseCacheDecorator implements CarouselRepository
{
    public function __construct(CarouselRepository $carousel)
    {
        parent::__construct();
        $this->entityName = 'carousel.carousels';
        $this->repository = $carousel;
    }
    public function homeCarousel()
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.homeCarousel",
                $this->cacheTime,
                function(){
                    return $this->repository->homeCarousel();
                }

            );
    }
}
