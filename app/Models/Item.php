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

    public function scopeSearch($query, $search = null)
    {
        $query->when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        });

        return $query;
    }

    public function getQuantityDisplayAttribute()
    {
        return $this->quantity . ' items';
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
