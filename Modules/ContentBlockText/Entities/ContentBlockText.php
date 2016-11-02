<?php namespace Modules\ContentBlockText\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class ContentBlockText extends Model
{
    //use Translatable;

    protected $table = 'contentblocktext__contentblocktexts';
    public $translatedAttributes = [];
    protected $fillable = ['text_title','text_body','row_id','col_number','page_id'];

    public function section()
    {
        return $this->belongsTo('Section', 'row_id','id');
    }
}
