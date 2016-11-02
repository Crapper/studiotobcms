<?php namespace Modules\ContentBlockImage\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\ContentBlockImage\Entities\ContentBlockImage;
use Modules\ContentBlockImage\Repositories\ContentBlockImageRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ContentBlockImageController extends AdminBaseController
{
    /**
     * @var ContentBlockImageRepository
     */
    private $contentblockimage;

    public function __construct(ContentBlockImageRepository $contentblockimage)
    {
        parent::__construct();

        $this->contentblockimage = $contentblockimage;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$contentblockimages = $this->contentblockimage->all();

        return view('contentblockimage::admin.contentblockimages.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contentblockimage::admin.contentblockimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->contentblockimage->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('contentblockimage::contentblockimages.title.contentblockimages')]));

        return redirect()->route('admin.contentblockimage.contentblockimage.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ContentBlockImage $contentblockimage
     * @return Response
     */
    public function edit(ContentBlockImage $contentblockimage)
    {
        return view('contentblockimage::admin.contentblockimages.edit', compact('contentblockimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentBlockImage $contentblockimage
     * @param  Request $request
     * @return Response
     */
    public function update(ContentBlockImage $contentblockimage, Request $request)
    {
        $this->contentblockimage->update($contentblockimage, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('contentblockimage::contentblockimages.title.contentblockimages')]));

       // return redirect()->route('admin.contentblockimage.contentblockimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContentBlockImage $contentblockimage
     * @return Response
     */
    public function destroy(ContentBlockImage $contentblockimage)
    {
        $this->contentblockimage->destroy($contentblockimage);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('contentblockimage::contentblockimages.title.contentblockimages')]));

        return redirect()->route('admin.contentblockimage.contentblockimage.index');
    }
}
