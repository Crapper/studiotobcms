<?php namespace Modules\ContentBlockText\Sidebar;

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
//            $group->item(trans('contentblocktext::abcs.title.abcs'), function (Item $item) {
//                $item->icon('fa fa-copy');
//                $item->weight(10);
//                $item->authorize(
//                     /* append */
//                );
//                $item->item(trans('contentblocktext::contentblocktexts.title.contentblocktexts'), function (Item $item) {
//                    $item->icon('fa fa-copy');
//                    $item->weight(0);
//                    $item->append('admin.contentblocktext.contentblocktext.create');
//                    $item->route('admin.contentblocktext.contentblocktext.index');
//                    $item->authorize(
//                        $this->auth->hasAccess('contentblocktext.contentblocktexts.index')
//                    );
//                });
//// append
//
//            });
//        });

        return $menu;
    }
}
