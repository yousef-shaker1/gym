<?php

namespace App\Models;

use App\Models\rale_offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function raleoffer()
    {
        return $this->hasMany(rale_offer::class);
    }
}
