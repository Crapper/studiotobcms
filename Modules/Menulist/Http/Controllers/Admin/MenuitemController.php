<?php namespace Modules\Menulist\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Modules\Menulist\Entities\Menuitem;
use Modules\Menulist\Repositories\MenuitemRepository;
use Modules\Menulist\Entities\Menulist;
use Modules\Menulist\Repositories\MenulistRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MenuitemController extends AdminBaseController
{
    /**
     * @var MenuitemRepository
     */
    private $menuitem;

    public function __construct(MenuitemRepository $menuitem, MenulistRepository $menulist)
    {
        parent::__construct();

        $this->menuitem = $menuitem;
        $this->menulist = $menulist;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menuitems = $this->menuitem->all();

        return view('menulist::admin.menuitems.index', compact('menuitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $menulist = \DB::table('menulist__menulists')->lists('name', 'id');

        return view('menulist::admin.menuitems.create', compact('menulist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->menuitem->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('menulist::menuitems.title.menuitems')]));

        return redirect()->route('admin.menulist.menuitem.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Menuitem $menuitem
     * @return Response
     */
    public function edit(Menuitem $menuitem)
    {
        return view('menulist::admin.menuitems.edit', compact('menuitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Menuitem $menuitem
     * @param  Request $request
     * @return Response
     */
    public function update(Menuitem $menuitem, Request $request)
    {
        $this->menuitem->update($menuitem, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('menulist::menuitems.title.menuitems')]));

        return redirect()->route('admin.menulist.menuitem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Menuitem $menuitem
     * @return Response
     */
    public function destroy(Menuitem $menuitem)
    {
        $this->menuitem->destroy($menuitem);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('menulist::menuitems.title.menuitems')]));

        return redirect()->route('admin.menulist.menuitem.index');
    }
}
