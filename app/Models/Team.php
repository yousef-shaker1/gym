<?php

namespace App\Models;

use App\Models\Section;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['img', 'name', 'age', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
