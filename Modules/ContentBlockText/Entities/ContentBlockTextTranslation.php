<?php namespace Modules\ContentBlockText\Entities;

use Illuminate\Database\Eloquent\Model;

class ContentBlockTextTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'contentblocktext__contentblocktext_translations';
}
