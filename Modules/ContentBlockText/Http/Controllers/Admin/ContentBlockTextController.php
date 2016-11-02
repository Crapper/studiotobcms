<?php namespace Modules\ContentBlockText\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\ContentBlockText\Entities\ContentBlockText;
use Modules\ContentBlockText\Repositories\ContentBlockTextRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ContentBlockTextController extends AdminBaseController
{
    /**
     * @var ContentBlockTextRepository
     */
    private $contentblocktext;

    public function __construct(ContentBlockTextRepository $contentblocktext)
    {
        parent::__construct();

        $this->contentblocktext = $contentblocktext;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$contentblocktexts = $this->contentblocktext->all();

        return view('contentblocktext::admin.contentblocktexts.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('contentblocktext::admin.contentblocktexts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

       $this->contentblocktext->create($request->all());

       // flash()->success(trans('core::core.messages.resource created', ['name' => trans('contentblocktext::contentblocktexts.title.contentblocktexts')]));

       // return redirect()->route('admin.contentblocktext.contentblocktext.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ContentBlockText $contentblocktext
     * @return Response
     */
    public function edit(ContentBlockText $contentblocktext)
    {
        return view('contentblocktext::admin.contentblocktexts.edit', compact('contentblocktext'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentBlockText $contentblocktext
     * @param  Request $request
     * @return Response
     */
    public function update(ContentBlockText $contentblocktext, Request $request)
    {
        $this->contentblocktext->update($contentblocktext, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('contentblocktext::contentblocktexts.title.contentblocktexts')]));

       // return redirect()->route('admin.contentblocktext.contentblocktext.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ContentBlockText $contentblocktext
     * @return Response
     */
    public function destroy(ContentBlockText $contentblocktext, Request $request)
    {
        $this->contentblocktext->destroy($contentblocktext);

       // flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('contentblocktext::contentblocktexts.title.contentblocktexts')]));

       // return redirect()->route('admin.contentblocktext.contentblocktext.index');
        $message= array('message'=>'ContentBlok is verwijderd');
        echo json_encode($message);
    }
}
