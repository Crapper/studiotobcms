<?php namespace Modules\Email\Entities;

use Illuminate\Database\Eloquent\Model;

class EmailTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'email__email_translations';
}
