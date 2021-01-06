<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    protected $fillable = [
        'category_id', 'name', 'slug', 'date', 'location'
    ];
    public function category()
    {

        return $this->BelongsTo('App\Category');
    }
}
