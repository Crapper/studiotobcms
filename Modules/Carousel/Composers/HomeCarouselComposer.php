<?php
namespace Modules\Carousel\Composers;
use Illuminate\Contracts\View;
use Modules\Carousel\Repositories;

class HomeCarouselComposer
{
    public function __construct(Repositories\CarouselRepository $carousel)
    {
        $this->carousel = $carousel;
    }

    public function compose(View\View $view)
    {
        $view->with('homeCarousel',$this->carousel->homeCarousel());
    }
}