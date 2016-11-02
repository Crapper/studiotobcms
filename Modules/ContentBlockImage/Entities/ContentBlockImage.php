<?php namespace Modules\ContentBlockImage\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class ContentBlockImage extends Model
{
    //use Translatable;
    use MediaRelation;

    protected $table = 'contentblockimage__contentblockimages';
   // public $translatedAttributes = [];
    protected $fillable = ['media__imageables_id','img_path','row_id','col_number','page_id',
                            'afbeeldings_titel','text_body','standaard','overlay','button_label','button_link'];

    public function getImagesForPage()
    {
        return $this->hasMany('Media', 'media__imageables_id','media__imageables_id');
    }

    public function files()
    {

    }
}
