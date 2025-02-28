<?php

namespace App\Models;

use App\Models\offer;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rale_offer extends Model
{
    use HasFactory;
    protected $fillable = ['offer_id', 'section_id', 'price'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function offer()
    {
        return $this->belongsTo(offer::class);
    }
}
