<?php namespace Modules\Section\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\ContentBlockText\Entities\ContentBlockText;
use Modules\ContentBlockText\Repositories\ContentBlockTextRepository;
use Modules\Section\Entities\Section;
use Modules\Section\Repositories\SectionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Illuminate\Support\Facades\Input;

class SectionController extends AdminBaseController
{
    /**
     * @var SectionRepository
     */
    private $section;

    public function __construct(SectionRepository $section)
    {
        parent::__construct();

        $this->section = $section;




    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$sections = $this->section->all();



        return view('section::admin.sections.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('section::admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->section->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('section::sections.title.sections')]));

        return redirect()->route('admin.section.section.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Section $section
     * @return Response
     */
    public function edit(Section $section)
    {
        return view('section::admin.sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Section $section
     * @param  Request $request
     * @return Response
     */
    public function update(Section $section, Request $request)
    {
        $this->section->update($section, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('section::sections.title.sections')]));

        return redirect()->route('admin.section.section.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Section $section
     * @return Response
     */
    public function destroy(Section $section, ContentBlockTextRepository $contentBlockTextRepository)
    {

        $page_id = Input::get('page_id');

        $section->contentblocktexts()->where('page_id', '=', $page_id)->delete();

        $section->delete();

//        $this->section->destroy($section);
//
//        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('section::sections.title.sections')]));
//
//        return redirect()->route('admin.section.section.index');
    }
}
