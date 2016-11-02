<?php namespace Modules\Section\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
   // use Translatable;

    protected $table = 'section__sections';
   // public $translatedAttributes = [];
    protected $fillable = ['page_id','content_blok_id','content_blok_type','aantal_kolomen','col'];


    public function contentblocktexts()
    {
        return $this->hasMany('Modules\ContentBlockText\Entities\ContentBlockText','row_id','id');
    }
}
