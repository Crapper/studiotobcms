<?php namespace Modules\Menulist\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menulist extends Model
{
    use Translatable;

    protected $table = 'menulist__menulists';
    public $translatedAttributes = [];
    protected $fillable = ['name','description'];

    public function menuitem() {
        return $this->hasMany('Modules\Menulist\Entities\Menuitem', 'menulist_id','id');
    }

    public function  get_list_id(){
        return \DB::table('menulist__menulists')->lists('id');
    }
}
