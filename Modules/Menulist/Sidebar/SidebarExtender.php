<?php namespace Modules\Menulist\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item("Menukaart", function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('menulist::menulists.title.menulists'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.menulist.menulist.create');
                    $item->route('admin.menulist.menulist.index');
                    $item->authorize(
                        $this->auth->hasAccess('menulist.menulists.index')
                    );
                });
                $item->item(trans('menulist::menuitems.title.menuitems'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.menulist.menuitem.create');
                    $item->route('admin.menulist.menuitem.index');
                    $item->authorize(
                        $this->auth->hasAccess('menulist.menuitems.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
