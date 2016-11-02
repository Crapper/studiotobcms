<?php namespace Modules\PageExtention\Entities;

use Illuminate\Database\Eloquent\Model;

class PageExtentionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['sub_title'];
    protected $table = 'pageextention__pageextention_translations';
}
