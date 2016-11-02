<?php
namespace Modules\PageExtention\Events\Handlers;




use Modules\PageExtention\Repositories\PageExtentionRepository;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasUpdated;

class StorePageExtentionData
{

    /**
     * @var PageExtentionRepository
     */
    private $pageExtentionRepository;

    public function __construct(PageExtentionRepository $pageExtentionRepository)
    {
        $this->pageExtentionRepository = $pageExtentionRepository;
    }

    /**
     * @param PageWasCreated|PageWasUpdated $event
     * @return mixed
     */
    public function handle($event)
    {
       // dd($event);


        if(get_class($event) === PageWasCreated::class)
        {
            return $this->createPageExtention($event->pageId,$event->data);

        }

        $pageExtention = $this->pageExtentionRepository->findForPage($event->pageId);

        if($pageExtention)
        {
            return $this->pageExtentionRepository->update($pageExtention,$event->data);
        }

        return $this->createPageExtention($event->pageId,$event->data);

    }

    private function createPageExtention($pageId, $data)
    {


        $data['page_id'] = $pageId;

        return $this->pageExtentionRepository->create($data);
    }
}