<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function icons() {
        return $this->belongsTo(Icon::class, 'icon_id');
    }

    public function child(){
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(self::class);
    }
}
