<?php

namespace Modules\PageExtention\Composers;


use Illuminate\Contracts\View\View;
use Modules\Carousel\Entities\Carousel as Carousel;

use Modules\ContentBlockImage\Entities\ContentBlockImage;
use Modules\ContentBlockText\Entities\ContentBlockText;
use Modules\PageExtention\Repositories\PageExtentionRepository;
use Modules\Section\Entities\Section;


class PageExtentionComposer
{
    /**
     * @var PageExtentionRepository
     */
    private $pageExtentionRepository;

    public  function __construct(PageExtentionRepository $pageExtentionRepository)
    {
        $this->pageExtentionRepository = $pageExtentionRepository;
    }


    public function compose(View $view)
    {


        $pageExtention = $this->pageExtentionRepository->findForPage(request()->route('page')->id);

       // print_r($pageExtention->page_id);
       // $test = Carousel::all()->first();
        $sections =  Section::where('page_id',request()->route('page')->id)->get();

        $section = Section::all()->first();
        $contentBlok = ContentBlockText::where('page_id',request()->route('page')->id)->get();
        $contentBlokImage = ContentBlockImage::where('page_id',request()->route('page')->id)->get();
        //print_r($contentBlokImage);
        $view->with('pageExtention', $pageExtention);
        //$view->with('test',$test);
        $view->with('section',$section);
        $view->with('sections',$sections);
        $view->with('contentBlok',$contentBlok);
        $view->with('contentBlokImage',$contentBlokImage);

    }
}