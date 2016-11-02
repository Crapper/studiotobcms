<?php namespace Modules\Section\Sidebar;

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
//        $menu->group(trans('core::sidebar.content'), function (Group $group) {
//            $group->item(trans('section::abcs.title.abcs'), function (Item $item) {
//                $item->icon('fa fa-copy');
//                $item->weight(10);
//                $item->authorize(
//                     /* append */
//                );
//                $item->item(trans('section::sections.title.sections'), function (Item $item) {
//                    $item->icon('fa fa-copy');
//                    $item->weight(0);
//                    $item->append('admin.section.section.create');
//                    $item->route('admin.section.section.index');
//                    $item->authorize(
//                        $this->auth->hasAccess('section.sections.index')
//                    );
//                });
//// append
//
//            });
//        });

        return $menu;
    }
}
