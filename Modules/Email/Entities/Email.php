<?php namespace Modules\Email\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use Translatable;

    protected $table = 'email__emails';
    public $translatedAttributes = [];
    protected $fillable = [];
}
