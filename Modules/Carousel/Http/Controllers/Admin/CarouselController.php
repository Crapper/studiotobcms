<?php namespace Modules\Carousel\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Carousel\Entities\Carousel;
use Modules\Carousel\Repositories\CarouselRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Http\Controllers\Admin\MediaController;
use Modules\Media\Repositories\FileRepository;

class CarouselController extends AdminBaseController
{
    /**
     * @var CarouselRepository
     */
    private $carousel;

    public function __construct(CarouselRepository $carousel)
    {
        parent::__construct();

        $this->carousel = $carousel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $carousels = $this->carousel->all();
        return view('carousel::admin.carousels.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('carousel::admin.carousels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->carousel->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('carousel::carousels.title.carousels')]));

        return redirect()->route('admin.carousel.carousel.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Carousel $carousel
     * @return Response
     */
    public function edit(Carousel $carousel, FileRepository $fileRepository)
    {
        $main_carouselFiles = $fileRepository->findMultipleFilesByZoneForEntity('main_carousel', $carousel);
        return view('carousel::admin.carousels.edit', compact('carousel','main_carouselFiles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Carousel $carousel
     * @param  Request $request
     * @return Response
     */
    public function update(Carousel $carousel, Request $request)
    {

        $this->carousel->update($carousel, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('carousel::carousels.title.carousels')]));

        return redirect()->route('admin.carousel.carousel.index');
    }

    public function apiUpdate(Carousel $carousel, Request $request)
    {

        echo $request;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  Carousel $carousel
     * @return Response
     */
    public function destroy(Carousel $carousel)
    {
        $this->carousel->destroy($carousel);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('carousel::carousels.title.carousels')]));

        return redirect()->route('admin.carousel.carousel.index');
    }
}
