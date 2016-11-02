<?php namespace Modules\Menulist\Entities;

use Illuminate\Database\Eloquent\Model;

class MenulistTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'menulist__menulist_translations';
}
