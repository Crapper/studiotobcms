<?php namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Carousel\Entities\Carousel;
use Modules\ContentBlockImage\Entities\ContentBlockImage;
use Modules\ContentBlockText\Entities\ContentBlockText;
use Modules\Menulist\Entities\Menulist;
use Modules\Menulist\Entities\Menuitem;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Media\Repositories\FileRepository;
use Modules\Page\Entities\Page;
use Modules\Page\Repositories\PageRepository;
use Modules\Section\Entities\Section;

class PublicController extends BasePublicController
{
    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    public function __construct(PageRepository $page, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
    }

    /**
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function uri($slug, Page $pagina, Section $section, ContentBlockText $contentBlockText, ContentBlockImage $contentBlockImage, Menulist $menulist, Menuitem $menuitem)
    {
        $page = $this->page->findBySlug($slug);
        $sections =  $section->where('page_id',$page->id)->get();
        $contentBlok = $contentBlockText->where('page_id',$page->id)->get();
        $contentImage = $contentBlockImage->where('page_id',$page->id)->get();
        $this->throw404IfNotFound($page);

        $menulistitems = Menulist::with('menuitem')->get();
       // $id = $menulistitems->get('id');
       // $menulists = $menuitem->where('menulist_id', $id)->get();

        $get_page_id_footer = $pagina->where('template','contentblokken.footer')->get();
        $footer_page_id = $get_page_id_footer[0]->id;

        $footer =  $section->where('page_id',$footer_page_id)->get();


        $footer_contentBlok = $contentBlockText->where('page_id',$footer_page_id)->get();
        $footer_contentImage = $contentBlockImage->where('page_id',$footer_page_id)->get();

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page','sections', 'contentBlok', 'contentImage'
                                        ,'footer','footer_contentBlok','footer_contentImage', 'menulistitems'
                                        ));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function homepage(Page $pagina, Carousel $carousel, Section $section, ContentBlockText $contentBlockText, ContentBlockImage $contentBlockImage)
    {

        $page = $this->page->findHomepage();
       // echo $page->id;
        $carousels = $carousel->all();
        $sections =  $section->where('page_id',$page->id)->get();


        $contentBlok = $contentBlockText->where('page_id',$page->id)->get();
        $contentImage = $contentBlockImage->where('page_id',$page->id)->get();
        $this->throw404IfNotFound($page);


        $get_page_id_footer = $pagina->where('template','contentblokken.footer')->get();
        $footer_page_id = $get_page_id_footer[0]->id;

        $footer =  $section->where('page_id',$footer_page_id)->get();

        $footer_contentBlok = $contentBlockText->where('page_id',$footer_page_id)->get();
        $footer_contentImage = $contentBlockImage->where('page_id',$footer_page_id)->get();

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page','carousels','sections', 'contentBlok', 'contentImage'
                                        ,'footer','footer_contentBlok','footer_contentImage'
                                        ));
    }


    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $page
     * @return string
     */
    private function getTemplateForPage($page)
    {
        return (view()->exists($page->template)) ? $page->template : 'default';
    }

    /**
     * Throw a 404 error page if the given page is not found
     * @param $page
     */
    private function throw404IfNotFound($page)
    {
        if (is_null($page)) {
            $this->app->abort('404');
        }
    }
}
