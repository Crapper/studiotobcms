<?php namespace Modules\Carousel\Entities;

use Illuminate\Database\Eloquent\Model;

class CarouselTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'carousel__carousel_translations';
}
