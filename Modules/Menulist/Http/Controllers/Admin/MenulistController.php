<?php namespace Modules\Menulist\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Menulist\Entities\Menulist;
use Modules\Menulist\Repositories\MenulistRepository;
use Modules\Menulist\Entities\Menuitem;
use Modules\Menulist\Repositories\MenuitemRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MenulistController extends AdminBaseController
{
    /**
     * @var MenulistRepository
     */
    private $menulist;

    public function __construct(MenulistRepository $menulist, Menuitem $menuitem, Menulist $menlist)
    {
        parent::__construct();
        $this->menlist = $menlist;
        $this->menulist = $menulist;
        $this->menuitem = $menuitem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menulists = $this->menulist->all();


        return view('menulist::admin.menulists.index', compact('menulists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('menulist::admin.menulists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->menulist->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('menulist::menulists.title.menulists')]));

        return redirect()->route('admin.menulist.menulist.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menulist $menulist
     * @return Response
     */
    public function edit(Menulist $menulist, Menuitem $menuitem)
    {
        $id = $menulist->getAttributeValue('id');
        $menulists = $this->menuitem->where('menulist_id', $id)->get();

        
        return view('menulist::admin.menulists.edit', compact('menulist', 'menuitem', 'menulists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Menulist $menulist
     * @param  Request $request
     * @return Response
     */
    public function update(Menulist $menulist, Request $request)
    {
        $this->menulist->update($menulist, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('menulist::menulists.title.menulists')]));

        return redirect()->route('admin.menulist.menulist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menulist $menulist
     * @return Response
     */
    public function destroy(Menulist $menulist)
    {
        $this->menulist->destroy($menulist);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('menulist::menulists.title.menulists')]));

        return redirect()->route('admin.menulist.menulist.index');
    }
}
