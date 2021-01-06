<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $fillable = [
        'kegiatan_id', 'count', 'image'
    ];
    public function kegiatan()
    {

        return $this->BelongsTo('App\Kegiatan');
    }
}
