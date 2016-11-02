<?php namespace Modules\PageExtention\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\ContentBlockImage\Entities\ContentBlockImage;
use Modules\PageExtention\Entities\PageExtention;
use Modules\PageExtention\Repositories\PageExtentionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Section\Entities\Section;

class PageExtentionController extends AdminBaseController
{
    /**
     * @var PageExtentionRepository
     */
    private $pageextention;

    public function __construct(PageExtentionRepository $pageextention)
    {
        parent::__construct();

        $this->pageextention = $pageextention;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Section $section)
    {
        //$pageextentions = $this->pageextention->all();


        return view('pageextention::admin.pageextentions.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pageextention::admin.pageextentions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->pageextention->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('pageextention::pageextentions.title.pageextentions')]));

        return redirect()->route('admin.pageextention.pageextention.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  PageExtention $pageextention
     * @return Response
     */
    public function edit(PageExtention $pageextention, Section $section, FileRepository $fileRepository, ContentBlockImage $contentBlockImage)
    {
        $contentimage = $this->file->findFileByZoneForEntity('contentimage', $contentBlockImage);

        return view('pageextention::admin.pageextentions.edit', compact('pageextention','test', 'sections', 'contentimage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PageExtention $pageextention
     * @param  Request $request
     * @return Response
     */
    public function update(PageExtention $pageextention, Request $request)
    {
        $this->pageextention->update($pageextention, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('pageextention::pageextentions.title.pageextentions')]));

        return redirect()->route('admin.pageextention.pageextention.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PageExtention $pageextention
     * @return Response
     */
    public function destroy(PageExtention $pageextention)
    {
        $this->pageextention->destroy($pageextention);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('pageextention::pageextentions.title.pageextentions')]));

        return redirect()->route('admin.pageextention.pageextention.index');
    }
}
