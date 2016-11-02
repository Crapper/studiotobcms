<?php namespace Modules\ContentBlockImage\Sidebar;

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
//            $group->item(trans('contentblockimage::abcs.title.abcs'), function (Item $item) {
//                $item->icon('fa fa-copy');
//                $item->weight(10);
//                $item->authorize(
//                     /* append */
//                );
//                $item->item(trans('contentblockimage::contentblockimages.title.contentblockimages'), function (Item $item) {
//                    $item->icon('fa fa-copy');
//                    $item->weight(0);
//                    $item->append('admin.contentblockimage.contentblockimage.create');
//                    $item->route('admin.contentblockimage.contentblockimage.index');
//                    $item->authorize(
//                        $this->auth->hasAccess('contentblockimage.contentblockimages.index')
//                    );
//                });
//// append
//
//            });
//        });

        return $menu;
    }
}
