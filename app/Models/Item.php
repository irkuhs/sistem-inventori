<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $tables = 'items';

    protected $fillable = [
        'name',
        'color_id',
        'type_id',
        'quantity',
    ];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
