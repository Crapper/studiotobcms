<?php namespace Modules\Carousel\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller;
use Modules\Media\Repositories\FileRepository;
use Modules\Media\Image\Imagy;
class MediaController extends Controller
{
    private $file;
    private $imagy;
    public function __construct(FileRepository $file, Imagy $imagy)
    {
        $this->file = $file;
        $this->imagy = $imagy;
    }
    public function file(Request $request)
    {
        $mediaId = $request->get('mediaId');
        $thumbName = $request->get('thumbName', 'mediumThumb');
        if($mediaId) {
            $this->file = $this->file->find($mediaId);
            $this->file->thumbnail_path = $this->getThumb($thumbName);
            return Response::json([
                'error' => false,
                'message' => 'File retrieved',
                'result' => $this->file->getAttributes()
            ]);
        }
        return Response::json([
            'error' => true,
            'message' => 'FileId is required'
        ]);
    }
    public function getThumb($thumbName) {
        return $this->imagy->getThumbnail($this->file->path, $thumbName);
    }
}