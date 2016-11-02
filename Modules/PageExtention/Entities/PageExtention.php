<?php namespace Modules\PageExtention\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class PageExtention extends Model
{
    use Translatable;
    use MediaRelation;

    protected $table = 'pageextention__pageextentions';
    public $translatedAttributes = ['sub_title'];
    protected $fillable = ['page_id','author','sub_title','kolom'];
}
