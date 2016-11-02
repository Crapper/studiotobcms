<?php namespace Modules\Menulist\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menuitem extends Model
{
    use Translatable;

    protected $table = 'menulist__menuitems';
    public $translatedAttributes = [];
    protected $fillable = ['menulist_id', 'naam', 'omschrijving', 'prijs'];

    public function  menulist() {
        return $this->belongsTo('Modules\Menulist\Entities\Menulist', 'menulist_id','id');
    }
}
