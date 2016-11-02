<?php namespace Modules\Carousel\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Carousel\Entities\Carousel;
use Modules\Carousel\Repositories\CarouselRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Media\Http\Controllers\Admin\MediaController;
use Modules\Media\Repositories\FileRepository;
use Modules\Media\Entities\File;
use Modules\Media\Support\Traits\MediaRelation;

class FrontendController extends BasePublicController
{
    /**
     * @var CarouselRepository
     */
    use MediaRelation;
    private $carousel;

    public function __construct(Carousel $carousel)
    {
        parent::__construct();

        $this->carousel = $carousel;

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Carousel $carousel, FileRepository $fileRepository)
    {

        //$file = File::all();
        //dump($file);
        $carousels = $this->carousel->all();
        //$car = $fileRepository->findMultipleFilesByZoneForEntity('maincarousel', $carousel);
          //  $test = $this->files()->where('zone','main_carousel')->get();
      // dump($test);
       // print_r($car);
        return view('carousel::public.index', compact('carousels'));
    }


}
