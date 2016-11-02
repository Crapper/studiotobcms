<?php namespace Modules\Carousel\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Repositories\FileRepository;
use Modules\Media\Support\Traits\MediaRelation;

class Carousel extends Model
{
    use Translatable;
    use MediaRelation;
    protected $table = 'carousel__carousels';
    public $translatedAttributes = [];
    protected $fillable = ['name','full_page'];

    public function getCarouselAttribute()
    {
        return $this->files()->where('zone','main_carousel')->get();
    }
}
