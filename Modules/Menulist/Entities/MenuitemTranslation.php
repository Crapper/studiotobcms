<?php namespace Modules\Menulist\Entities;

use Illuminate\Database\Eloquent\Model;

class MenuitemTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'menulist__menuitem_translations';
}
